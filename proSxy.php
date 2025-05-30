<?php
/**
 * Debugged PHP proxy script that proxies the URL given in the "url" parameter.
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure URL is provided
if (!isset($_GET['url']) || $_GET['url'] == '') {
    header('HTTP/1.0 400 Bad Request');
    echo "url parameter missing\n";
    exit(1);
}

// Decode the URL if it doesn't have the correct prefix
$url = $_GET['url'];
if (substr($url, 0, 7) != 'http://' && substr($url, 0, 8) != 'https://') {
    $url = base64_decode($url);
    if (substr($url, 0, 7) != 'http://' && substr($url, 0, 8) != 'https://') {
        header('HTTP/1.0 400 Bad Request');
        echo "Only http and https URLs supported\n";
        exit(1);
    }
}

// Set up context options, including redirect handling and POST request forwarding
$options = [
    'http' => [
        'ignore_errors' => true,  // Get response even on errors
        'header' => [],
    ]
];

// Send original headers except for the Host header
foreach (apache_request_headers() as $name => $value) {
    if (strtolower($name) == 'host') {
        continue;
    }
    $options['http']['header'][] = $name . ': ' . $value;
}

// If it's a POST request, include the POST data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    echo "Handling POST request...\n";  // Debugging
    $options['http']['method'] = 'POST';
    $options['http']['content'] = file_get_contents('php://input');
    $options['http']['header'][] = 'Content-Type: ' . ($_SERVER['CONTENT_TYPE'] ?? 'application/x-www-form-urlencoded');
}

$context = stream_context_create($options);

// Function to handle URL fetching and streaming response
function fetchAndStream($url, $context, $maxRedirects = 5) {
    echo "Fetching URL: $url\n";  // Debugging

    if ($maxRedirects <= 0) {
        header('HTTP/1.0 400 Bad Request');
        echo "Too many redirects\n";
        exit(1);
    }

    $fp = fopen($url, 'r', false, $context);
    if (!$fp) {
        header('HTTP/1.0 400 Bad Request');
        echo "Error fetching URL\n";
        exit(1);
    }

    // Check for redirect status codes (301, 302, etc.)
    if (is_array($http_response_header)) {
        foreach ($http_response_header as $header) {
            if (preg_match('/^HTTP\/[0-9\.]+\s+([0-9]+)\s+/', $header, $matches)) {
                $statusCode = $matches[1];
                if (in_array($statusCode, ['301', '302', '303', '307', '308'])) {
                    // Find the Location header to follow the redirect
                    foreach ($http_response_header as $header) {
                        if (preg_match('/^Location:\s*(.+)$/i', $header, $matches)) {
                            $redirectUrl = trim($matches[1]);
                            if (!empty($redirectUrl)) {
                                // Recurse with the new redirect URL
                                return fetchAndStream($redirectUrl, $context, $maxRedirects - 1);
                            }
                        }
                    }
                }
            }
            // Send the response header to the client
            header($header);
        }
    }

    // Stream the response data
    $bufferSize = 1024 * 8; // Set a larger buffer size for performance
    $responseContent = '';
    while (!feof($fp)) {
        $responseContent .= fread($fp, $bufferSize);
    }
    
    // If it's an HTML response, rewrite the form actions to go through the proxy
    if (stripos($responseContent, '<html') !== false) {
        echo "HTML response detected. Rewriting form actions...\n";  // Debugging
        $responseContent = rewriteFormAction($responseContent, 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
    }

    // Output the response content
    echo $responseContent;  // Debugging the final output

    fclose($fp);
}

// Function to rewrite form action URLs to go through the proxy
function rewriteFormAction($htmlContent, $proxyUrl) {
    return preg_replace_callback('/<form[^>]*action=["\']([^"\']+)["\'][^>]*>/i', function($matches) use ($proxyUrl) {
        $actionUrl = $matches[1];
        // If the action is an absolute URL, rewrite it to use the proxy
        if (preg_match('/^https?:\/\//', $actionUrl)) {
            return str_replace($actionUrl, $proxyUrl . '?url=' . urlencode($actionUrl), $matches[0]);
        }
        // Otherwise, it's a relative URL, rewrite it with the full proxy URL
        return str_replace($actionUrl, $proxyUrl . '?url=' . urlencode($actionUrl), $matches[0]);
    }, $htmlContent);
}

// Fetch and stream the URL
fetchAndStream($url, $context);
?>
