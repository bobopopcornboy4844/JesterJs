<?php
/**
 * PHP proxy script that proxies the URL given in the "url" parameter.
 *
 * Sends all incoming headers, and also returns all remote headers.
 * Streams the response, so that large responses should work fine.
 * Now handles HTTP redirects (e.g., 301, 302) through the proxy.
 *
 * @author Christian Weiske <cweiske@cweiske.de>
 */

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

// Set up context options
$options = [
    'http' => [
        'ignore_errors' => true, // Get response even on errors
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

$context = stream_context_create($options);

// Function to handle URL fetching and streaming response
function fetchAndStream($url, $context, $maxRedirects = 5) {
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
    while (!feof($fp)) {
        echo fread($fp, 1024);
        ob_flush();
        flush();
    }

    fclose($fp);
}

// Fetch and stream the URL
fetchAndStream($url, $context);
?>
