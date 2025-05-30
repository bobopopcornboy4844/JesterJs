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

<div class="page">
  <h class="warnning">Warnning</h><br>
  <a class="warnning">This site is not secure so do not put real password</a><br>
  <h class="bold">Sign Up</h><br>
  
  <form method="POST">
    <label for="fname">Username</label><br>
    <input type="text" id="fname" name="fname" value=""><br>
    <label for="password">Password</label><br>
    <input type="text" id="password" name="password" value=""><br>
    <input type="submit" value="Sign Up">
  </form>
  <?php
// Define the path to the file where names are stored
$file_path = '/var/www/data/login.txt';

// Check if the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input to prevent XSS attacks
    $fname = htmlspecialchars($_POST['fname']);
    $password = htmlspecialchars($_POST['password']);  // You may want to hash the password in real use

    // Validate the input
    if (empty($fname) || empty($password)) {
        echo "Name and password are required.";
        exit; // Exit if the fields are empty
    }

    // Check if the name already exists in the file
    if (file_exists($file_path)) {
        $file_content = file_get_contents($file_path);
        // Check if the name is already in the file
        if (strpos($file_content, $fname) !== false) {
            echo "Name '$fname' is already taken. Please choose another name.";
        } else {
            // If the name is available, append it to the file with the password (hashed ideally)
            $myfile = fopen($file_path, "a") or die("Unable to open file!");
            // Append name and password (You may want to hash the password)
            $txt = "$fname:$password\n";
            fwrite($myfile, $txt);
            fclose($myfile);
            $myfolder = mkdir("../account/accounts/$fname",0777);
            $myicon = copy("../account/accounts/defualt/profile.jpg","../account/accounts/$fname/profile.jpg");
            echo "Name '$fname' has been successfully added. Please goto The login screen";
        }
    } else {
        // If the file doesn't exist, create it and add the name and password
        $myfile = fopen($file_path, "w") or die("Unable to open file!");
        $txt = "$fname:$password\n";
        fwrite($myfile, $txt);
        fclose($myfile);
        $ser = fopen($file_path, "w") or die("Unable to open file!");
        $txt = "$fname:1\n";
        fwrite($ser, $txt);
        fclose($ser);
        echo "Name '$fname' has been successfully added.";
    }
} else {
    echo "Please Enter";
}
?><br>
</div>

<!--<a href="https://docs.google.com/forms/d/e/1FAIpQLScEfm4kCaqXbPuJ47smdeq08zQW-1BbWIxWmNMx9bnvTABk6Q/viewform?usp=sf_link">Sign Up</a><br>-->
<a>Already have an acount? go Login😃!</a><br>
  <a href="login.php">LogIn</a>

