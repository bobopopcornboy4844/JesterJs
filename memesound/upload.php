<?php
// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the 'name' field from the form
    $name = isset($_POST['name']) ? $_POST['name'] : '';
	if (isset($_COOKIE["user"])) {
	    // Check if the file was uploaded
	    if (isset($_FILES['sound']) && $_FILES['sound']['error'] === UPLOAD_ERR_OK) {
	        // Define the upload directory
	        $uploadDir = 'uploads/';
	        
	        // Make sure the upload directory exists, if not, create it
	        if (!is_dir($uploadDir)) {
	            mkdir($uploadDir, 0777, true);
	        }
	        
	        // Get the uploaded file details
	        $fileName = $_FILES['sound']['name'];
	        $fileTmpName = $_FILES['sound']['tmp_name'];
	        $fileSize = $_FILES['sound']['size'];
	        $fileType = $_FILES['sound']['type'];
	
	        // Define the allowed file extensions (MP3 only for this example)
	        $allowedTypes = ['audio/mp3'];
	
	        // Check file extension
	        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
	
	        // Use finfo to check the file's MIME type more accurately
	        $finfo = finfo_open(FILEINFO_MIME_TYPE); // Return MIME type
	        $realMimeType = finfo_file($finfo, $fileTmpName);
	        finfo_close($finfo);
	
	        // Check if the file is an MP3 by MIME type and extension
	        if (($realMimeType === 'audio/mpeg' || in_array($fileType, $allowedTypes)) && $fileExtension === 'mp3') {
	            // Generate a unique file name to avoid overwriting files
	            $newFileName = uniqid('sound_') . '.mp3';
	            $filePath = $uploadDir . $newFileName;
	
	            // Move the uploaded file to the 'uploads' directory
	            if (move_uploaded_file($fileTmpName, $filePath)) {
	                $listfile = fopen("memes.txt", "a") or die("Unable to open file!");
	
	    // Write the sanitized name followed by a new line to the file
					$user = explode(":",$_COOKIE["user"])[0];
					$txt = "$user:$name:$newFileName:\n";
					fwrite($listfile, $txt);
	    // Close the file
					fclose($listfile);
	            } else {
	                echo "Failed to move uploaded file.";
	            }
	        } else {
	            echo "Invalid file type. Only MP3 files are allowed.";
	        }
	    } else {
	        echo "Error uploading file.";
	    }
	}
}
echo "<script>window.location = 'index.php';</script>";
?>
