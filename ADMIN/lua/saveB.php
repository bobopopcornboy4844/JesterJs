<?php
if (explode($_COOKIE['user'],":")[0] != "Admin" && false) {
echo "<script>history.replaceState({}, '', '../');
window.location.reload();</script>";
}else {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$about = $_POST['about'];
                $txt = str_replace("|<|","<",$about);
		$dir = $_GET["file"];
		$myfile = fopen("$dir", "w") or die("Unable to open file! at $dir");
		fwrite($myfile, $txt);
		fclose($myfile);
		echo "<script>history.replaceState({}, '', '/ADMIN/lua');
window.location.reload();</script>";
}
}
?>
