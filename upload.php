<?php
session_start();

// Step 1: Set up a connection to your database (Replace these credentials with your database details)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "catering";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Check if the form is submitted and the file is uploaded
if (isset($_POST["submit"]) && isset($_FILES["fileToUpload"])) {
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        // Handle the case when the email is not available in the session (e.g., redirect to login page)
        // You can customize this based on your application's requirements.
        die("Error: Email not found in the session. Please log in again.");
    }
    $target_dir = "C:/xampp/htdocs/FYP/FYP/upload-file"; // Replace "uploads/" with the directory where you want to store the uploaded files
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    // Step 3: Create the "receipt" table if it doesn't exist
    $sql_create_table = "CREATE TABLE IF NOT EXISTS receipt (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        order_id INT NOT NULL,
        email VARCHAR(255) NOT NULL,
        file_path VARCHAR(255) NOT NULL
    )";

    if ($conn->query($sql_create_table) === FALSE) {
        echo "Error creating table: " . $conn->error;
    }

    // Step 4: Retrieve the order_id from the approve_orders table
    $sql_select_order = "SELECT order_id FROM approve_orders WHERE email = '$email'"; // Assuming the approve_orders table has an email field

    $result = $conn->query($sql_select_order);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $order_id = $row['order_id'];
    } else {
        // Handle the case when the order_id is not found in the approve_orders table
        // You can customize this based on your application's requirements.
        die("Error: Order ID not found in the approve_orders table for this email.");
    }

    // Step 5: Insert the uploaded file information into the "receipt" table along with the retrieved order_id
    $sql_insert = "INSERT INTO receipt (order_id, email, file_path) VALUES ('$order_id', '$email', '$target_file')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "File successfully uploaded and inserted into the database. The order ID is: " . $order_id;
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }

    // Move the uploaded file to the desired directory
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>
