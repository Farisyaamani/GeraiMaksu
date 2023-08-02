<?php
// Replace these values with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catering";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the receipt table based on the order_id
if (isset($_GET['order_id']) && is_numeric($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM receipt WHERE order_id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $file_path = $row['file_path'];

        $file_path = "C:/xampp/htdocs/FYP/FYP/upload-file/" . $file_path;

        // Here, you can also access other columns from the receipt table if needed
        $data = "Order ID: " . $row['order_id'] . "\nFile Path: " . $file_path;

        // Return the data as a JSON object to be processed by JavaScript
        echo json_encode(array("data" => $data, "file_path" => $file_path));
    } else {
        // No data found for the given order_id, show the message in the pop-up window
        echo json_encode(array("data" => "", "file_path" => ""));
    }
} else {
    echo "Invalid order_id";
}

$conn->close();
?>
