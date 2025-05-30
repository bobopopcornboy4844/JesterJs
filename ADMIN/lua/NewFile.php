<form method="POST">
<label>File Name</label><br>
<input type="text" name="Filen" id="Filen"><br>
<button type="submit">CREATE</button><br>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$about = "";
		$dir = $_GET['file'];
		$fname = $_POST['Filen'];
		$dir = "../../$dir/$fname";
		$myfile = fopen("$dir", "w") or die("Unable to open file! at $dir");
		fwrite($myfile, $about);
		fclose($myfile);
		echo "<script>history.replaceState({}, '', '/ADMIN/lua');
window.location.reload();</script>";
}
?>
