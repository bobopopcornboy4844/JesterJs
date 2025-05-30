<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Play Sounds</title>
    <style>
        .re {
            height: 50px;
            width: 50px;
            border: 2px solid #2c3e50;
            cursor: pointer;
            margin: 5px;
            display: inline-block;
        }
        .aw {
			font-size:1vw;
			}
        .by {
            font-size: 9px;
        }
        .grid {
			display: grid; /* Enable grid layout */
			grid-template-columns: repeat(3, 1fr); /* Create 3 equal-width columns */
			grid-gap: 5px; /* Space between grid items */
			padding: 10px; /* Padding around the grid */
			}
    </style>
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
<body>

<script>
function play(dir) {
    console.log('Playing sound from: ', dir);
    
    // Create a new Audio object with the MP3 file path
    const audio = new Audio(dir);
    
    // Play the sound
    audio.play().catch(function(error) {
        console.error('Error playing audio:', error);
    });
}
</script>

<div class="grid">
<?php
$file_path = 'memes.txt';

// Check if the file exists before attempting to open it
if (file_exists($file_path)) {
    // Open the file for reading
    $myfile = fopen($file_path, "r") or die("Unable to open file!");

    // Read and echo the contents of the file line by line
    while ($line = fgets($myfile)) {
        $ur = explode(":", $line); // Split the line by colon
        if (count($ur) < 3) {
            continue; // Skip lines that don't have enough parts
        }
        $user = $ur[0];
        $name = $ur[1];
        $file = $ur[2];
        
        // Optional: Clean the file path (if needed, uncomment and adjust)
        // $file = substr($file, 1, strlen($file) - 2);  // Remove first and last characters

        // Escape file path using JSON encoding (for safety)
        $escaped_file = json_encode($file);  // This will handle special characters and line breaks properly
        $escaped_file = substr($escaped_file,0,strlen($escaped_file)-3) . '"';
        // Dynamically generate the play function call with the correctly escaped file path
        $play = "play($escaped_file)";  // Passing the escaped file path directly to play function
        
        // Display the clickable element with name and user info
        echo "<div class='re' onclick='" . $play . "'>";
        echo "<a class='aw'>" . htmlspecialchars($name) . "</a>" . "<br>"; // Escape name to prevent XSS
        echo "<a class='by'>By: " . htmlspecialchars($user) . "</a>";
        echo "</div>";
    }

    // Close the file after reading
    fclose($myfile);
} else {
    // If the file doesn't exist, display an error message
    echo "Error: Unable to find the file.";
}
?>
</div>
<a>Add a meme sound</a>
<form method="POST" enctype="multipart/form-data" action="upload.php">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="sound">Sound File (MP3):</label><br>
        <input type="file" id="sound" name="sound" accept="audio/mp3" required><br><br>
		<label>(Need to be loged in)</label><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
