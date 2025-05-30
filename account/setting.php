<!DOCTYPE html>
<head>
<title>Jester Js</title>
<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>
<link rel="stylesheet" href="index.css">
<style>
.profile {
	height: 50px;
	width: 50px;
}
.about {
	height: 400px;
	width: 400px;
	border: none;
	resize: none;
}
</style>
<div class="header">
  
  <a href="../" class="logo"><image style="height: 50px; width: auto;" src="/images/JesterLOGO.png"> JS</image></a>
  <div class="header-right">
	<a class="active" href="../">Home</a>
	<script>
		function menu() {
			var dropdowns = document.getElementById("dropdownMenu");
			if (dropdowns.style.display === "grid") {
				dropdowns.style.display = "none";
			}else {
				dropdowns.style.display = "grid"
			}
		}
	</script>
	<a class="menu" onclick="menu()">Acount</a>
	<div class="dropdown-content" id="dropdownMenu">
		<a href="/account">Profile</a>
		<a href="/account/setting.php">Settings</a>
		<a href="/account/signup.php">Sign Up</a>
		<a href="/account/login.php">Log In</a>
		<a href="/account/logout.php">Log Out</a>
	</div>
	<style>
		.menu {
			cursor: pointer;
			}
		/* Container for the dropdown menu */
		.dropdown {
			position: relative;
			display: inline-block;
			margin-bottom: 40px;
		}

		/* Dropdown content (hidden by default) */
		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
			z-index: 1;
			border-radius: 5px;
			margin-top: 70px;
		}

		/* Links inside the dropdown */
		.dropdown-content a {
			color: black;
			padding: 5px 5px;
			text-decoration: none;
			display: block;
		}

		/* Change color on hover */
		.dropdown-content a:hover {
			background-color: #ddd;
		}

		/* Style for the active dropdown when clicked */
		.dropdown.active .dropdown-content {
			display: block;
		}
	</style>
  </div>
</div> 
<?php
if (isset($_COOKIE['user'])) {
	$file_path = "security.txt";
	$myfile = fopen($file_path, "r") or die("Unable to open login info!");
	$user = $_COOKIE['user'];
	
	$user_found = false;

	// Read each line of the file and check if it matches the username and password
	while ($line = fgets($myfile)) {
		if ($line == "$user\n" ) {
			$user_found = true;
			break; // Exit the loop once user is found
		}
	}

	// Close the file after reading
	fclose($myfile);

	// If no matching user was found, display an error message
	if (!$user_found) {
		setcookie("user","", time() + 1, "/");
		echo "Not Found";
	}
}
?>

<?php
if (isset($_COOKIE["user"])) {
	$user =  explode(":", $_COOKIE["user"])[0];
	echo "Hello, $user";
	echo "<br>";
	echo "<img class='profile' src='/account/accounts/$user/profile.jpg' alt='Profile Picture'>";
} else {
	// Cookie "user" is not set
	//echo "<script> location.href = '../'; </script>";
}
?>

<form method="POST" enctype="multipart/form-data">
	<label>Profile Picture (.jpg | .jpeg)</label><br>
	<input type="file" id="file" name="file"><br>
	<label>About</label><br>
	<textarea id="about" name="about"><?php
	$file_path = "../account/accounts/$user/about.txt";

	// Check if the file exists before attempting to open it
	if (file_exists($file_path)) {
	// Open the file for reading
		
		$myfile = fopen($file_path, "r") or die("Unable to open file!");

	
		while ($line = fgets($myfile)) {
			$pro = htmlspecialchars($line);
			echo $pro; // htmlspecialchars to prevent XSS attacks
		}

		
		fclose($myfile);
	}
	?></textarea><br>
	<input type="submit" Value="Save"><br>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$user =  explode(":", $_COOKIE["user"])[0];
	if (isset($_FILES['file']) && $_FILES['file']['name'] != '') {
		$dir = "../account/accounts/$user";
		$targetFile = $dir . '/' . "profile.jpg";
		$fileType = $_FILES['file']['type'];
		$allowedTypes = ['image/jpeg', 'image/jpg']; // Allow PNG, JPG, JPEG
			
		$fileTmpName = $_FILES['file']['tmp_name'];
		$finfo = finfo_open(FILEINFO_MIME_TYPE);
		$realMimeType = finfo_file($finfo, $fileTmpName);
		
		// Check if the file is an allowed type
		if (in_array($realMimeType, $allowedTypes)) {
			if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
				echo "File uploaded successfully!";
			} else {
				echo "Error uploading file!";
			}
		} else {
			echo "Invalid file type. Only JPG, JPEG, and PNG are allowed.";
		}
	}
	if (isset($_POST["about"])) {
		$about = $_POST['about'];
		$about = htmlspecialchars($about, ENT_QUOTES, 'UTF-8');
		$myfile = fopen("../account/accounts/$user/about.txt", "w") or die("Unable to open file!");
		fwrite($myfile, $about);
		fclose($myfile);
		echo "<script>history.replaceState({}, '', '/account');
window.location.reload();</script>";
	}
}
?>

