<!DOCTYPE html>
<head>
<title>Class work</title>
<link rel="icon" type="image/x-icon" href="/images/favicon.ico?v=2">
</head>

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
<div class="maintext">
<div class="main" id="#home">
  <h>Welcome To the WebSite</h><br>
  <a>Here you can find all sorts of games</a><br>
  <h>News</h><br>
  <div id='news'></div>
  <script src="news.js"></script>
</div>
<div style="margin-top: 30px"> </div>
<h style="margin-top: 30px;font-size: 30px;">The Computer Games</h><br>
<div class="games">
  <script>function go(game) {
	window.location.href = 'http://jesterjs.servehttp.com/Games/'+game;
};
function href(lin) {
	window.location.href = "http://jesterjs.servehttp.com/"+lin
}

</script>
  <div class="box" onclick="go('Minecraft.html')">
    <img class="icon" src="images/mcIcon.png">
    <div class="TextBox">Minecraft</div>
  </div>
  <div class="box" onclick="go('Minesweeper');">
    <img class="icon" src="images/MineSweeperIcon.png">
    <div class="TextBox">MineSweeper</div>
  </div>
  <div class="box" onclick="go('tetris');">
    <img class="icon" src="images/tetris.jpeg">
    <div class="TextBox">Tetris</div>
  </div>
  <div class="box" onclick="go('Snow-Rider3D-main');">
    <img class="icon" src="images/SnowRider.png">
    <div class="TextBox">Snow Rider 3d</div>
  </div>
  <div class="box" onclick="go('CC');">
    <img class="icon" src="images/CC.png">
    <div class="TextBox">Computer<br> Craft</div>
  </div>
  <div class="box" onclick="href('Request/read.php');">
    <img class="icon" src="images/requestIcon.png">
    <div class="TextBox">Read Requests</div>
  </div>
  <div class="box" onclick="href('memesound');">
    <img class="icon" src="images/memesound.png">
    <div class="TextBox">Meme  soundboard</div>
  </div>
  <div class="box" onclick="href('chat/');">
    <img class="icon" src="images/requestIcon.png">
    <div class="TextBox">CHAT</div>
  </div>
  <div class="box" onclick="href('pro%20xy.php?url='+prompt('URL'));">
    <img class="icon" src="images/requestIcon.png">
    <div class="TextBox">PROXY</div>
  </div>
  <!--
  <div class="box" onclick="href('TheJestersTheater');">
    <img class="icon" src="images/JesterTheater.jpeg">
    <div class="TextBox">The Jesters Theater</div>
  </div>
  -->
  <?php
  require 'security.php';
  $user =  explode(":", $_COOKIE["user"])[0];
  $myfile = fopen("account/Level.txt", "r");
	while ($line = fgets($myfile)) {
			if (explode(":",$line)[0] == "$user" ) {
				$level = explode("\n",explode(":",$line)[1])[0];
				break; // Exit the loop once user is found
			}
		}
	fclose($myfile);
  if ($level >= 2) {
	  $link = "href('ADMIN');";
	echo '
	<div class="box" onclick="' . $link . '">
    <img class="icon" src="images/memesound.png">
    <div class="TextBox">Admin Panel</div>
	</div>
	';
	}
   ?>
  <style>
    .games {
  display: grid;
  grid-template-columns: repeat(auto-fill,minmax(200px, 1fr));
  /* xxxxxgrid-template-columns: repeat(3,1fr); */
  grid-gap: 20px;
}
    .box {
  cursor: pointer;
  width: 100px;
  height: 150px;
  border: 1px solid black;
  padding: 10px;
  margin: 10px;
  border-radius: 40px;
  overflow: hidden;
  background-color: white;
}
.icon {
  height: auto;
  width: 120px;
  right: 10px;
  top: -10px;
  position: relative;
}
.TextBox {
  position: relative;
  background-color: darkGray;
  height: 200px;
  width: 150px;
  top: -15px;
  left:-10px;
}

  </style>
</div>
<div class="main" id="Games">
  <h>The Moblie Games</h><br>
  <a class="bold">NEVER GOING TO MAKE THEM</a>
</div>
</div>
<div class="main" id="Games">
  <h>Requests for games or website</h><br>
  <form method="POST">
    <label for="fname">Need to be loged  in</label><br>
    <input type="text" id="fname" name="fname" value="The Games name Gos HERE"><br>
    <input type="submit" value="Submit">
  </form> 
</div>
</div>
<link rel="stylesheet" href="index.css?v=1">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the value of 'fname' from the POST request and sanitize it
  $name = htmlspecialchars($_POST['fname']);

  // Check if the 'fname' is empty
  if (empty($name)) {
    echo "Name is empty"; // If empty, print a message
  } else {
	 if (isset($_COOKIE["user"])) {
		 $user = explode(":",$_COOKIE["user"])[0];
    // Open the file in append mode ('a' to add without overwriting)
    $myfile = fopen("Request/requests.txt", "a") or die("Unable to open file!");

    // Write the sanitized name followed by a new line to the file
    $txt = "$user:$name\n";
    fwrite($myfile, $txt);

    // Close the file
    fclose($myfile);

    echo "Name '$name' has been added to the requests."; // Confirmation message
	}
  }
}
?>
