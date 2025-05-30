<!DOCTYPE html>
<head>
<title>Jester Js</title>
<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>
<link rel="stylesheet" href="index.css">
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
				dropdowns.style.display = "none";
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
			text-decoration: none;
			display: ;
		}

		/* Change color on hover */
		.dropdown-content a:hover {
			background-color: #ddd;
		}

		/* Style for the active dropdown when clicked */
		.dropdown.active .dropdown-content {
			display: ;
		}
	</style>
  </div>
</div> 
<div class="i">
  <h class="nig">Log In</h><br>
  
  <form method="POST">
	<label>Username</label><br>
	<input type="text" id="fname" name="fname" value=""><br>
	<label>Password</label><br>
	<input type="password" name="password" id="password" value=""><br>
	<input type="submit" value="Log In">
  </form>
  <?php
// Define the path to the file containing user login information
$file_path = '/var/www/data/login.txt';

// Check if the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Sanitize input to prevent XSS attacks
	$fname = $_POST['fname'];
	$password = $_POST['password']; // The password entered by the user
	// Validate the input (make sure it's not empty)
	if (empty($fname) || empty($password)) {
		echo "Username and password are required.";
		exit; // Exit if the fields are empty
	}

	// Check if the file exists
	if (file_exists($file_path)) {
		// Open the file for reading
		$myfile = fopen($file_path, "r") or die("Unable to open login info!");

		// Flag to track if user is found
		$user_found = false;

		// Read each line of the file and check if it matches the username and password
		while ($line = fgets($myfile)) {
			$uANDp = explode(":",$line);
			$uANDp[1] = chop($uANDp[1]);
			if ($uANDp[0]==$fname && $uANDp[1]==$password) {
				echo "Login successful. Welcome, $fname!";
				$user_found = true;
				$myfile = fopen("security.txt", "a") or die("Unable to open file!");
				// Append name and password (You may want to hash the password)
				$secure = uniqid();
				$txt = "$fname:$secure\n";
				fwrite($myfile, $txt);
				fclose($myfile);
				setcookie("user", "$fname:$secure", time() + 86400, "/");
				
				break; // Exit the loop once user is found
			}
		}

		// Close the file after reading
		fclose($myfile);

		// If no matching user was found, display an error message
		if (!$user_found) {
			echo "wrong user or password";
		}
	} else {
		echo "The login file does not exist.";
	}
} else {
	echo "Please put Username and password";
}
?>
  <br>
</div>
