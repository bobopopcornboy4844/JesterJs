<!DOCTYPE html>
<head>
<title>READ REQUESTS</title>
<link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>
<link rel="stylesheet" href="../index.css">
<style>
.re {
	cursor: pointer;
  width: auto;
  height: auto;
  border: 1px solid black;
  padding: 10px;
  margin: 10px;
  border-radius: 40px;
  background-color: white;
}
.icon {
	height: 20px;
	width: 20px;
}
.username {
	font-style: italic;
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
// Define the path to the file
$file_path = 'requests.txt';

// Check if the file exists before attempting to open it
if (file_exists($file_path)) {
    // Open the file for reading
    $myfile = fopen($file_path, "r") or die("Unable to open file!");

    // Read and echo the contents of the file line by line
    while ($line = fgets($myfile)) {
		$ur = explode(":",$line);
		$user = $ur[0];
		$request = $ur[1];
		$href = "../account/?user=$user";
		echo "<div class='re'  onclick='location.href =" . '"' . $href . '"' . "' >";
		echo "<img class='icon' src='../account/accounts/$user/profile.jpg'>";
		echo "<a class='username'>$user</a>";
		echo "<a>| </a>";
        echo htmlspecialchars($request) . "<br>"; // htmlspecialchars to prevent XSS attacks
		echo "</div>";
    }

    // Close the file after reading
    fclose($myfile);
} else {
    // If the file doesn't exist, display an error message
    echo "What the FUCK happend WHERE IS IT";
}
?>
