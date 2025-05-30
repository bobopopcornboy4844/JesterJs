<!DOCTYPE html>
<head>
<title>HARD algebra</title>
<link rel="icon" type="image/x-icon" href="/images/favicon.ico?v=2">
</head>
<link rel="stylesheet" href="../index.css">
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
$user =  explode(":", $_COOKIE["user"])[0];
  $myfile = fopen("../account/Level.txt", "r");
	while ($line = fgets($myfile)) {
			if (explode(":",$line)[0] == "$user" ) {
				$level = explode("\n",explode(":",$line)[1])[0];
				break; // Exit the loop once user is found
			}
		}
	fclose($myfile);
// Check if the user is logged in (example condition)
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
if ($level < 2) {
    // Redirect user to login page or an access denied page
    header("Location: ../../");
    exit(); // Make sure to stop the script after the redirect
}

// The page content will only be visible if the user is logged in
?>
<a href="/ADMIN/lua">File manger</a><br>
<a href="/ADMIN/accounts">Accounts</a>
