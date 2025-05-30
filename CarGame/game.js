// Set up player and canvas
let x = 0;
let y = 0;
let playerID = null; // This will be set when joining
let players = {}; // Object to hold players data

// Track mouse movement
document.body.addEventListener("mousemove", function (e) {
  x = e.clientX;
  y = e.clientY;
});

// Get canvas and context
const canvas = document.getElementById("game");
const ctx = canvas.getContext("2d");

// Set canvas size to match the window
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// Update canvas size on window resize
window.addEventListener("resize", function () {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
});

// Join the game and get playerID
fetch("http://73.83.240.230/CarGame/multiPlayer.php?action=JOIN")
  .then((response) => response.json())
  .then((data) => {
    playerID = data.playerID; // Assign the player ID after joining
    console.log("Joined with playerID:", playerID);
  })
  .catch((error) => console.error("Error joining game:", error));


// Periodically fetch players data from the server
function getPlayers() {
  fetch("http://73.83.240.230/CarGame/multiPlayer.php?action=GET")
    .then((response) => response.json())
    .then((playerJSON) => {
      console.log("Full Server Response:", playerJSON); // Log the full response to check its structure

      // Check if 'players' exists and is an object
      if (playerJSON && playerJSON.players && typeof playerJSON.players === 'object') {
        const playersData = playerJSON.players; // Access the players data
        
        // Iterate through the player data
        Object.keys(playersData).forEach((id) => {
          const player = playersData[id];
          if (id !== playerID) { // Skip the local player (with the same playerID)
            players[id] = player;
          }
        });
      } else {
        console.error("Players data is missing or not an object:", playerJSON);
      }
    })
    .catch((error) => console.error("Error fetching players:", error));
}

// Fetch player data periodically (e.g., every 500ms)
setInterval(getPlayers, 500); // Update player data from the server every 500ms

// Game logic: Update local player position
function game() {
  if (players[playerID]) {
    players[playerID].x = x;
    players[playerID].y = y;
  }
}

// Draw players on the canvas
function draw() {
  game();
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  // Iterate over players and draw them
  Object.keys(players).forEach((id) => {
    const player = players[id];
    ctx.beginPath();
    ctx.arc(player.x, player.y, 30, 0, Math.PI * 2, true);
    ctx.fillStyle = id === playerID.toString() ? "red" : "blue"; // Local player in red, others in blue
    ctx.fill();
    ctx.stroke();
  });

  requestAnimationFrame(draw); // Continue the animation loop
}

// Start the drawing loop
draw();
