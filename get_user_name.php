<?php
// Your database connection code here
// Replace the following with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catering";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming you have some way to identify the user (e.g., using a user ID or session)
// Replace 'user_id' with the actual column name in your 'custregistration' table that uniquely identifies the user
$userID = $_SESSION['user_id']; // Replace $_SESSION['user_id'] with your actual way of identifying the user

// Prepare and execute the query
$stmt = $conn->prepare("SELECT name FROM custregistration WHERE user_id = ?");
$stmt->bind_param("s", $userID);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch the name from the database result
    $row = $result->fetch_assoc();
    $userName = $row['name'];
    // Return the name as a JSON response
    echo json_encode($userName);
} else {
    echo json_encode(null); // User not found or any other error
}

$stmt->close();
$conn->close();
?>
