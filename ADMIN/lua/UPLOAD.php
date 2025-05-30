<form method="POST" enctype="multipart/form-data">
    <input type="file" name="sound">
    <button type="submit">Submit</button>
</form>
<?php
// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the 'user' cookie exists
    if (isset($_COOKIE["user"])) {
        // Check if the file was uploaded
        if (isset($_FILES['sound']) && $_FILES['sound']['error'] === UPLOAD_ERR_OK) {
            // Retrieve the directory from the GET parameter and sanitize it
            $uploadDir = isset($_GET['file']) ? basename($_GET['file']) : 'default';
            $uploadDir = "../../$uploadDir";

            // Make sure the upload directory exists, if not, create it
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Get the uploaded file details
            $fileName = $_FILES['sound']['name'];
            $fileTmpName = $_FILES['sound']['tmp_name'];
            $fileSize = $_FILES['sound']['size'];
            $fileType = $_FILES['sound']['type'];

            // Generate a unique file name to avoid overwriting files
            $filePath = $uploadDir . '/' . $fileName;

            // Move the uploaded file to the upload directory
            if (move_uploaded_file($fileTmpName, $filePath)) {
                echo "<script>window.location = '/ADMIN/lua';</script>";
            } else {
                echo "Failed to move uploaded file.";
            }
        } else {
            echo "Error uploading file.";
        }
    }
}
?>
