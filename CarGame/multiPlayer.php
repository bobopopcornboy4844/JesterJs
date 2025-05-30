<?php
// Start the session to track player sessions
session_start();

// Initialize players array
$playersFile = "players.json";
$players = [];

// Load players from the file if it exists
if (file_exists($playersFile)) {
    $players = json_decode(file_get_contents($playersFile), true);
}

// Get action and player ID from URL
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Handle player joining
if ($action == "JOIN") {
    // Find the first available ID that is not in use
    $newPlayerID = null;
    $existingIDs = array_keys($players['players'] ?? []);
    
    // Find the first available ID
    $i = 1;
    while (in_array($i, $existingIDs)) {
        $i++;
    }

    // Assign the new player ID
    $newPlayerID = $i;
    $_SESSION['playerID'] = $newPlayerID; // Store player ID in the session

    // Add the new player to the players array
    $players['players'][$newPlayerID] = [
        'x' => 0, // Starting position X
        'y' => 0, // Starting position Y
        'lastActive' => time() // Time of the last activity
    ];

    // Save the updated players data back to the file
    file_put_contents($playersFile, json_encode($players));

    // Return the new player ID
    echo json_encode(['playerID' => $newPlayerID]);

} else if ($action == "GET") {
    // Handle fetching all players
    if (file_exists($playersFile)) {
        $players = json_decode(file_get_contents($playersFile), true);
    }

    // Filter out inactive players (optional, can be adjusted)
    $players['players'] = array_filter($players['players'], function($player) {
        return $player['lastActive'] > time() - 60; // Only include players active in the last 60 seconds
    });

    // Return the current players data
    echo json_encode($players);

} else {
    // Default case for invalid action
    echo json_encode(['error' => 'Invalid action']);
}
?>
