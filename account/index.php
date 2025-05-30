<!DOCTYPE html>
<style>.logo {height: 20px; width: auto;}</style>
<head>
<title>Jester JS</title>
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
<style>
.profile {
	height: 50px;
	width: 50px;
}
.about {
	font-style: italic;
}
.line {
  width: 100%;          /* Full width of the container */
  height: 2px;          /* Line thickness */
  background-color: #000; /* Line color (black) */
  margin: 0px;       /* Add space above and below */
}
.L2 {
	color: yellow;
}
</style>
<br>
<?php
if (isset($_GET["user"])) {
	$user = $_GET["user"];
} else {
	if (isset($_COOKIE["user"])) {
		$user =  explode(":", $_COOKIE["user"])[0]; // Get the username part    
	} else {
		$user = "NONE";
	}
}
$myfile = fopen("Level.txt", "r");
$level = 0;
while ($line = fgets($myfile)) {
			if (explode(":",$line)[0] == "$user" ) {
				$level = explode("\n",explode(":",$line)[1])[0];
				break; // Exit the loop once user is found
			}
		}
fclose($myfile);
$ver = uniqid();
echo "<img class='profile' src='/account/accounts/$user/profile.jpg?ver=$ver' alt='Profile Picture'>";
if ($level < 2) {
echo " $user";
} else {
	echo "<a class='L2'> $user</a>";
}
?>
<br>
<a>About Me</a>
<div class="line"></div>
<?php
// Define the path to the file
$file_path = "../account/accounts/$user/about.txt";

// Check if the file exists before attempting to open it
if (file_exists($file_path)) {
    // Open the file for reading
    $myfile = fopen($file_path, "r") or die("Unable to open file!");

    // Read and echo the contents of the file line by line
    while ($line = fgets($myfile)) {
		$pro = htmlspecialchars($line);
        echo "<a class='about'>$pro</a><br>"; // htmlspecialchars to prevent XSS attacks
    }

    // Close the file after reading
    fclose($myfile);
} else {
    // If the file doesn't exist, display an error message
    echo "Not Loged In";
}
?>
