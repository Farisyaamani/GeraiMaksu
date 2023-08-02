<?php
session_start();

// Assuming you have a database connection established.
$connection = mysqli_connect('localhost', 'root', '', 'catering');
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Retrieve the order_id from the URL parameter
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Check if the data exists in the reject_orders table.
    $rejectOrderQuery = "SELECT * FROM reject_orders WHERE order_id = ?";
    $rejectOrderStmt = mysqli_prepare($connection, $rejectOrderQuery);
    mysqli_stmt_bind_param($rejectOrderStmt, 'i', $order_id); 
    mysqli_stmt_execute($rejectOrderStmt);
    $rejectOrderResult = mysqli_stmt_get_result($rejectOrderStmt);

    // Check if the data exists in the approve_orders table.
    $approveOrderQuery = "SELECT * FROM approve_orders WHERE order_id = ?";
    $approveOrderStmt = mysqli_prepare($connection, $approveOrderQuery);
    mysqli_stmt_bind_param($approveOrderStmt, 'i', $order_id);
    mysqli_stmt_execute($approveOrderStmt);
    $approveOrderResult = mysqli_stmt_get_result($approveOrderStmt);

    // Check if the data exists in orderFormA table.
    $orderFormAQuery = "SELECT * FROM orderFormA WHERE order_id = ?";
    $orderFormAStmt = mysqli_prepare($connection, $orderFormAQuery);
    mysqli_stmt_bind_param($orderFormAStmt, 'i', $order_id);
    mysqli_stmt_execute($orderFormAStmt);
    $orderFormAResult = mysqli_stmt_get_result($orderFormAStmt);

    // Check if the data exists in orderFormB table.
    $orderFormBQuery = "SELECT * FROM orderFormB WHERE order_id = ?";
    $orderFormBStmt = mysqli_prepare($connection, $orderFormBQuery);
    mysqli_stmt_bind_param($orderFormBStmt, 'i', $order_id);
    mysqli_stmt_execute($orderFormBStmt);
    $orderFormBResult = mysqli_stmt_get_result($orderFormBStmt);

    // Check if the data exists in orderFormC table.
    $orderFormCQuery = "SELECT * FROM orderFormC WHERE order_id = ?";
    $orderFormCStmt = mysqli_prepare($connection, $orderFormCQuery);
    mysqli_stmt_bind_param($orderFormCStmt, 'i', $order_id);
    mysqli_stmt_execute($orderFormCStmt);
    $orderFormCResult = mysqli_stmt_get_result($orderFormCStmt);

    if (mysqli_num_rows($rejectOrderResult) > 0) {
        // Data exists in reject_orders table
        // Redirect to checkoutReject.php
        header("Location: checkoutReject.php?order_id=$order_id");
        exit;
    } elseif (mysqli_num_rows($approveOrderResult) > 0) {
        // Data exists in approve_orders table
        // Redirect to checkoutApproved.php
        header("Location: checkoutApproved.php?order_id=$order_id");
        exit;
    } elseif (mysqli_num_rows($orderFormAResult) > 0 || mysqli_num_rows($orderFormBResult) > 0 ||
        mysqli_num_rows($orderFormCResult) > 0) {
        // Data exists but pending
        // Redirect to checkout.php
        header("Location: checkout.php?order_id=$order_id");
        exit;
    } else {
        // No data found in any of the tables
        // Redirect to noOrder.php
        header("Location: noOrder.php");
        exit;
    }
} else {
    // Order ID not provided in the URL parameter, handle the scenario as needed.
    echo "Order ID not provided.";
}
?>
