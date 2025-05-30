<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$about = $_POST['about'];
		$dir = "index.html";
		$myfile = fopen("$dir", "w") or die("Unable to open file! at $dir");
		fwrite($myfile, $about);
		fclose($myfile);
		echo "<script>history.replaceState({}, '', './'); window.location.reload();</script>";
}
?>
