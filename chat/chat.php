<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user = $_COOKIE['user'];
  if (isset($user)) {
    $user = explode(":",$user);
    $user = $user[0];
    $myfile = fopen("../account/security.txt", "r");
	while ($line = fgets($myfile)) {
		if (explode(":",$line)[0] == "$user" ) {
			$security = explode("\n",explode(":",$line)[1])[0];
			break; // Exit the loop once user is found
		}
	}
fclose($myfile);

if (!$security) {
	setcookie("user", "$fname:", time() + 86400, "/");
	$level = 1;
}
    $message = $_POST['message'];
    $txt= "\n$user:$message";
    $myfile = fopen("chat.txt", "a") or die("Unable to open file!");
    fwrite($myfile, $txt);
    fclose($myfile);
    echo "<script>history.replaceState({}, '', '../chat/'); window.location.reload();</script>";
  }
}
?>