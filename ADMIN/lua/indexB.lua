require 'apache2'
local lfs = require("lfs")
html = [[
<!DOCTYPE html>
<head>
<title>Jester Js</title>
<link rel="icon" type="image/x-icon" href="/images/favicon.ico?v=2">
</head>

<style>
body {
	overflow:hidden;
}
</style>

<div class="header">
  <a href="../../" class="logo"><image style="height: 50px; width: auto;" src="/images/JesterLOGO.png"> JS</image></a>
  <div class="header-right">
    <a class="active" href="../../">Home</a>
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

local function readFile(filePath)
    local file, err = io.open(filePath, "r")
    if not file then
        return nil, "Error opening file: " .. err
    end
    
    local content = file:read("*a") -- Read the entire file
    file:close()
    return content
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
    
    if r.method == "POST" then
        r:parsebody() -- Parses the body and populates r:parseargs
        local post_data = r:parseargs()
    end

    r:puts(html)
    local args = r:parseargs()
    if not args["action"] or args["action"] == "list" then
        local dir = args["file"]
        if not dir then
            dir = ""
        end
        hdir = dir
        dir = "../var/www/html"..dir
        local parts = {}
	for part in hdir:gmatch("([^/]+)") do
		table.insert(parts, part)
	end
	local file = parts[#parts]
	local parts = {}
	if file then
		for part in file:gmatch("([^.]+)") do
			table.insert(parts, part)
		end
	end
        if #parts <= 1 then
			fstyle = "color: black; text-decoration: none;"
			r:puts('<a style="'..fstyle..'" href="?file=/'..hdir.."/"..'../" >back</a><br>')
			r:puts('<a style="'..fstyle..'" href="NewDIR.php?file='..hdir..'" >NewDir</a><br>')
			r:puts('<a style="'..fstyle..'" href="NewFile.php?file='..hdir..'" >NewFile</a><br><br>')
                        r:puts('<div style="height: calc(100vh - 192px);width:100%;overflow:auto;">')
			delete = '<a href="?action=delete&file=%s">[Delete]</a>'
			for file in lfs.dir(dir) do
				if file ~= "." and file ~= ".." then
					if pcall(function () lfs.dir(dir.."/"..file) end) then
						icon = "<img src='ICON/FOLDER_ICON.png' style='width:17px;height:auto;'>"
					else
						icon = "<img src='ICON/FILE_ICON.png' style='width:17px;height:auto;'>"
					end
					r:puts(string.format(icon..'<a style="'..fstyle..'" href="?file=%s">%s '..delete..'</a><br>\n',hdir.."/"..file, file,hdir.."/"..file))
				end
			end
			r:puts('</div>')
		else
			r:puts("<form action='saveB.php?file=../.."..hdir.."' method='POST'><br><input type='submit' Value='Save'><br>")
                        local file = readFile(dir)
                        file = string.gsub(file,"<","|<|")
			r:puts("<textarea name='about' id='about' style='height: calc(100vh - 192px);width:100%;resize: none;background:none;'>"..file.."")
			r:puts("")
		end
	elseif args["action"] == "delete" then
		r:puts("DELETE")
		local dir = args["file"]
		dir = "../var/www/html"..dir
		local success, err = os.remove(dir)
		if success then
			r.headers_out["Location"] = "../lua"
			return apache2.HTTP_MOVED_TEMPORARILY
		else
			print("Error deleting file:", err)
		end
		--r.headers_out["Location"] = "../lua"
        --return apache2.HTTP_MOVED_TEMPORARILY
    end
end

