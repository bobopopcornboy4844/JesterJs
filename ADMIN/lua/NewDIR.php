<form method="POST">
<label>Make a Dir</label><br>
<input name='file'><br>
<button type="submit">CREATE</button><br>
</form>

<?php
// Ensure the 'file' parameter is provided
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['file'])) {
    // Get the directory name from the 'file' GET parameter and remove any unwanted quotes or extra spaces
	$dir = $_GET['file'] . "/" . $_POST['file'];
    //$dir = trim($dir, "\"");

    // Prepend the path to where the directories will be created (../../)
    $dirPath = "../../" . $dir;

    // Create the directory with 0777 permissions, allowing full access
    mkdir($dirPath, 0777, true);

    // Redirect and reload the page using JavaScript
    echo "<script>
            history.replaceState({}, '', '/ADMIN/lua');
            window.location.reload();
          </script>";
} else {
}
?>
