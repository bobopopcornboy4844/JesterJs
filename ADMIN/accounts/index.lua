require 'apache2'
local lfs = require("lfs")
html = [[
<!DOCTYPE html>
<head>
<title>Jester Java</title>
<link rel="icon" type="image/x-icon" href="/images/favicon.ico?v=2">
</head>

<div class="header">
  <a href="../" class="logo"><image style="height: 50px; width: auto;" src="/images/JesterLOGO.png"> Java</image></a>
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
<link rel="stylesheet" href="../../index.css">

]]
function mysplit(inputstr, sep)
  if sep == nil then
    sep = "%s"
  end
  local t = {}
  for str in string.gmatch(inputstr, "([^"..sep.."]+)") do
    table.insert(t, str)
  end
  return t
end

function handle(r)
    local user = r:getcookie("user") 
    local filename = "/var/www/html/account/Level.txt"
    local level = nil -- Initialize level variable
    if not user then
        r.headers_out["Location"] = "../../"
        return apache2.HTTP_MOVED_TEMPORARILY
    end
    user = mysplit(user,"%3")[1]
    user = string.sub(user,1,-2)
    -- Open the file for reading
    local file, err = io.open(filename, "r")
    if not file then
        r.content_type = "text/plain"
        r:puts("Error: Cannot open file: " .. (err or "unknown error"))
        return apache2.HTTP_INTERNAL_SERVER_ERROR
    end

    -- Process each line
    for line in file:lines() do
        local parts = {}
        for part in line:gmatch("([^:]+)") do
            table.insert(parts, part)
        end

        if parts[1] == user then
            level = parts[2]:gsub("\n", "") -- Remove any trailing newline characters
            break -- Exit loop once the user is found
        end
    end

    -- Close the file
    file:close()

    -- Generate the response
    r.content_type = "text/html"
    level = tonumber(level)
    if level then
        if level < 2 then
            r.headers_out["Location"] = "../../"
            return apache2.HTTP_MOVED_TEMPORARILY
        end
    else
        r.headers_out["Location"] = "../../"
        return apache2.HTTP_MOVED_TEMPORARILY
    end
    r:puts(html)
    local file, err = io.open("../var/www/data/login.txt", "r")
    for line in file:lines() do
        if line ~= "Admin:password2" then
          r:puts(line.."<br>")
        end
    end
end
