<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<style>
.logo-image {
	border-radius: 50%;
    height: 150px;
    display: block;
    float: left;
    margin-left: 5%;
    width: 150px; /* Adjust the width as per your image size */
	margin-top: 20px;
}
	
.cafe-name {
	font-family: "Lucida Handwriting";
	font-size: 50px;
	background-color: #B1907F;
    padding: 60px 310px;
    text-align: center;
    color: black;
    width: 100%;
	margin-top: -10px;
	margin-left: -10px;
	margin-right: auto;
}

.navbtn {
	margin-left: 65%;
	margin-right: auto;
	width: 500px;
}

.nav-item {
	background-color: #DEC3A5;
	color: black;
	border-color: #DEC3A5;
	border: 5px solid #DEC3A5;
	overflow: hidden;
	padding: 12px 16px;
	text-align: center;
	text-decoration: none;	
	font-size: 20px;
	margin-left: -8px;
	margin-right: auto;
}

.nav-item:hover {
    background-color: #B1907F; /* Change the background color on hover */
    color: white; /* Change the text color on hover */
    cursor: pointer;
  }
	
.welcome-text {
	font-size: 50px;
	font-weight: bold;
	color: black;
	margin-left: 61%;
	margin-right: 120;
	width: 500px;
  }
  
a:hover {
    color: brown;
}

/* Footer Styles */
.footer {
    background-color: #B1907F;
    padding: 20px;
    text-align: center;
    color: black;
    width: 100%;
    position: fixed;
    bottom: 0;
	margin-left: -10px;
	margin-right: auto;
}

  /* Add margin to elements above the footer */
  .order-container {
    margin-bottom: 100px;
  }

.location-text {
	font-size: 35px;
	font-weight: bold;
	color: black;
	margin-left: 40%;
	margin-right: 120;
  }

.order-container {
  background-color: #f2f2f2; /* Light gray background for the order container */
  padding: 10px;
  border-radius: 15px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle shadow effect */
  width: 500px;
  margin-left: 490px;
  margin-right: auto;
}

.order-container ul {
  list-style-type: none; /* Remove the default list bullet points */
  padding: 0;
}

.order-container li {
  margin-bottom: 10px; /* Add some vertical spacing between list items */
}

.order-container li strong {
  font-weight: bold; /* Bolden the labels */
}

.new-page-link {
  background-color: #855232; /* brown background color */
  color: white; /* White text color */
  padding: 10px 20px; /* Add some padding to the button */
  font-size: 14px; /* Set the font size */
  border: none; /* Remove the button border */
  border-radius: 5px; /* Add rounded corners to the button */
  cursor: pointer; /* Add a pointer cursor on hover */
  margin-right: 50%; /* Add some right margin to the button */
  margin-right: auto;
}

.new-page-link:hover {
  background-color: #c7a28b; /* Darken the background color on hover */
}


/* CSS for the "Approve" button */
.approve-button {
  background-color: #917e57; /* brown background color */
  color: white; /* White text color */
  padding: 10px 20px; /* Add some padding to the button */
  font-size: 16px; /* Set the font size */
  border: none; /* Remove the button border */
  border-radius: 5px; /* Add rounded corners to the button */
  cursor: pointer; /* Add a pointer cursor on hover */
  margin-right: 10px; /* Add some right margin to the button */
}

.approve-button:hover {
  background-color: #6b5d41; /* Darken the background color on hover */
}

/* CSS for the "Reject" button */
.reject-button {
  background-color: #6b4c37; /* Red background color */
  color: white; /* White text color */
  padding: 10px 20px; /* Add some padding to the button */
  font-size: 16px; /* Set the font size */
  border: none; /* Remove the button border */
  border-radius: 5px; /* Add rounded corners to the button */
  cursor: pointer; /* Add a pointer cursor on hover */
}

.reject-button:hover {
  background-color: #8a6349; /* Darken the background color on hover */
}


</style>
</head>
<body style="background-color: #DEC3A5;">

<!-- Cafe's Name -->
<section class="content" style="max-width:900px">
  <img src="images/logo.png" alt="Logo" class="logo-image">
  <h2 class="cafe-name">GERAI MAKSU</h2>

<!-- Logout Button -->
<div class="logout">
  <button type="submit" class="logOutBtn" onclick="logout()" 
  style="background-color: #F8F0E3;
         color: #3A3B3C;
         padding: 15px;
         font-size: 15px;
         font-weight: bold;
         border: none;" 
  onmouseover="this.style.backgroundColor='lightgray'" 
  onmouseout="this.style.backgroundColor='white'">LOGOUT
  </button>
</div>

<!-- Navigation Buttons -->
<nav class="navbtn">
  <button class="nav-item" onclick="window.location.href='adminIndex.html';">HOME</button>
  <button class="nav-item" onclick="window.location.href='adminPackage.html';">PACKAGE</button>
  <button class="nav-item" onclick="window.location.href='adminReview.html';">REVIEW</button>
</nav>

<?php
// Assuming you have already established a connection to the MySQL database
$connection = mysqli_connect('localhost', 'root', '', 'catering');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to fetch and store orders based on the specified table
function fetchOrders($table) {
    global $connection;

    $orders = array(); // Create an empty array to store the orders

    $sql = "SELECT * FROM $table";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $order_id = $row['order_id'];
            if (!isset($orders[$order_id])) {
                $orders[$order_id] = array();
            }
            $orders[$order_id][] = $row; // Add the row to the orders array using order_id as the key
        }
    }

    return $orders;
}

// Call the function to fetch and store orders from each table
$ordersA = fetchOrders('orderFormA');
$ordersB = fetchOrders('orderFormB');
$ordersC = fetchOrders('orderFormC');

// Close the database connection
mysqli_close($connection);

// Reverse the arrays to make the new data go on top and the past data go to the bottom
$ordersA = array_reverse($ordersA);
$ordersB = array_reverse($ordersB);
$ordersC = array_reverse($ordersC);
?>

<?php
if (!empty($ordersA)) {
    echo "<div class='order-container'>";
    echo "<h3>ORDERS FROM SET A:</h3>";



    foreach ($ordersA as $order_id => $orderGroup) {
        foreach ($orderGroup as $order) {
            echo "<ul class='order-list'>";
            echo "<li class='order-item'>";
            echo "<strong>Email:</strong> " . $order['email'] . "<br>";
            echo "<strong>Order ID:</strong> " . $order['order_id'] . "<br>"; // Display the order_id
            echo "<strong>Name:</strong> " . $order['name'] . "<br>";
            echo "<strong>Package:</strong> " . $order['package'] . "<br>";
            echo "<strong>Reservation Date:</strong> " . $order['reservation_date'] . "<br>";
            echo "<strong>Quantity:</strong> " . $order['quantity'] . " pax<br>";
            echo "<strong>Phone No:</strong> " . $order['phone_number'] . "<br>";
            echo "<strong>Address:</strong> " . $order['location'] . "<br><br>";

            // Add "Proceed," "Approve," and "Reject" buttons with the data-set attribute
            echo "<button class='approve-button' id='approveBtn_" . $order['order_id'] . "_A' data-order-id='" . $order['order_id'] . "' data-set='A'>Approve</button>";
            echo "<button class='reject-button' id='rejectBtn_" . $order['order_id'] . "_A' data-order-id='" . $order['order_id'] . "' data-set='A'>Reject</button><br><br>";
			// Add the button to the new page
			echo "<button class='new-page-link' onclick='showReceiptData(" . $order['order_id'] . ")'>View Receipt</button><br>";
            echo "</li>";
        }
        echo "</ul>";
    }

    echo "</div>";
} else {
    echo "<p>No orders found for SET A.</p>";
}
?>


<!-- Display orders from SET B (reversed) -->
<?php
if (!empty($ordersB)) {
    echo "<div class='order-container'>";
    echo "<h3>ORDERS FROM SET B:</h3>";
	
    foreach ($ordersB as $order_id => $orderGroup) {
        foreach ($orderGroup as $order) {
            echo "<ul class='order-list'>";
            echo "<li class='order-item'>";
	
			echo "<strong>Email:</strong> " . $order['email'] . "<br>";
            echo "<strong>Order ID:</strong> " . $order['order_id'] . "<br>"; // Display the order_id
            echo "<strong>Name:</strong> " . $order['name'] . "<br>";
            echo "<strong>Package:</strong> " . $order['package'] . "<br>";
            echo "<strong>Reservation Date:</strong> " . $order['reservation_date'] . "<br>";
            echo "<strong>Quantity:</strong> " . $order['quantity'] . " pax<br>";
            echo "<strong>Phone No:</strong> " . $order['phone_number'] . "<br>";
            echo "<strong>Address:</strong> " . $order['location'] . "<br><br>";
            // Add "Proceed," "Approve," and "Reject" buttons with the data-set attribute
            echo "<button class='approve-button' id='approveBtn_" . $order['order_id'] . "_B' data-order-id='" . $order['order_id'] . "' data-set='B'>Approve</button>";
            echo "<button class='reject-button' id='rejectBtn_" . $order['order_id'] . "_B' data-order-id='" . $order['order_id'] . "' data-set='B'>Reject</button><br><br>";
			// Add the button to the new page
			echo "<button class='new-page-link' onclick='showReceiptData(" . $order['order_id'] . ")'>View Receipt</button><br>";
            echo "</li>";
        }
        echo "</ul>";
    }

    echo "</div>";
} else {
    echo "<p>No orders found for SET B.</p>";
}
?>

<!-- Display orders from SET C (reversed) -->
<?php
if (!empty($ordersC)) {
    echo "<div class='order-container'>";
    echo "<h3>ORDERS FROM SET C:</h3>";
	
    foreach ($ordersC as $order_id => $orderGroup) {
        foreach ($orderGroup as $order) {
            echo "<ul class='order-list'>";
            echo "<li class='order-item'>";
			echo "<strong>Email:</strong> " . $order['email'] . "<br>";
            echo "<strong>Order ID:</strong> " . $order['order_id'] . "<br>"; // Display the order_id
            echo "<strong>Name:</strong> " . $order['name'] . "<br>";
            echo "<strong>Package:</strong> " . $order['package'] . "<br>";
            echo "<strong>Reservation Date:</strong> " . $order['reservation_date'] . "<br>";
            echo "<strong>Quantity:</strong> " . $order['quantity'] . " pax<br>";
            echo "<strong>Phone No:</strong> " . $order['phone_number'] . "<br>";
            echo "<strong>Address:</strong> " . $order['location'] . "<br><br>";
            // Add "Proceed," "Approve," and "Reject" buttons with the data-set attribute
            echo "<button class='approve-button' id='approveBtn_" . $order['order_id'] . "_C' data-order-id='" . $order['order_id'] . "' data-set='C'>Approve</button>";
            echo "<button class='reject-button' id='rejectBtn_" . $order['order_id'] . "_C' data-order-id='" . $order['order_id'] . "' data-set='C'>Reject</button><br><br>";
			// Add the button to the new page
			echo "<button class='new-page-link' onclick=\"showReceiptData(" . $order['order_id'] . ")\">View Receipt</button><br>";
			
            echo "</li>";
        }
        echo "</ul>";
    }

    echo "</div>";
} else {
    echo "<p>No orders found for SET C.</p>";
}
?>


  <!-- Footer -->
  <div class="footer">
    <p>&copy; 2023 Gerai Maksu. All rights reserved.</p>
  </div>
  
<div id="popUpContainer" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);">
  <h3>Receipt</h3>
  <p id="receiptData"></p>
  <div id="filePreview">
    <img id="previewImage" src="" alt="Receipt File Preview">
  </div>
  <button onclick="closePopUp()">Close</button>
</div>
<script>
// Add event listener to the parent container for approve and reject buttons
var orderContainers = document.getElementsByClassName('order-container');

for (var i = 0; i < orderContainers.length; i++) {
    orderContainers[i].addEventListener('click', function(event) {
        var target = event.target;
        var orderId = target.getAttribute('data-order-id'); // Use data-order-id instead of data-email
        var set = target.getAttribute('data-set');

        if (target.classList.contains('approve-button')) {
            handleButtonClick('approve', orderId, set);

            // Update the specific button style
            target.style.backgroundColor = "#4CAF50"; // Green color for "Approve"
            target.style.pointerEvents = "none"; // Disable further clicks
        } else if (target.classList.contains('reject-button')) {
            handleButtonClick('reject', orderId, set);

            // Update the specific button style
            target.style.backgroundColor = "#f44336"; // Red color for "Reject"
            target.style.pointerEvents = "none"; // Disable further clicks
        }
    });
}

// Function to handle the AJAX request for approving or rejecting the order
function handleButtonClick(action, orderId, set) {
    var btn = document.getElementById(action + 'Btn_' + orderId + '_' + set);

    // Update button color based on the action
    if (action === 'approve') {
        btn.style.backgroundColor = "#4CAF50"; // Green color for "Approve"
    } else if (action === 'reject') {
        btn.style.backgroundColor = "#f44336"; // Red color for "Reject"
    }

    btn.style.pointerEvents = "none"; // Disable further clicks

    // Send the data to the server using AJAX
    var xhr = new XMLHttpRequest();
    var url = 'process_order.php';
    var params = 'action=' + action + '&order_id=' + encodeURIComponent(orderId) + '&set=' + set; // Use order_id instead of email

    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                if (response === 'Success') {
                    // Data successfully inserted, do nothing
                } else {
                    // Handle any errors if needed
                }
            } else {
                // Request failed, handle any errors if needed
            }
        }
    };

    xhr.onerror = function () {
        // AJAX error
        alert('AJAX error occurred.');
    };

    xhr.send(params);
}

// Add event listener to the parent container for approve and reject buttons
var orderContainers = document.getElementsByClassName('order-container');

for (var i = 0; i < orderContainers.length; i++) {
    orderContainers[i].addEventListener('click', function(event) {
        var target = event.target;
        var orderId = target.getAttribute('data-order-id'); // Use data-order-id instead of data-email
        var set = target.getAttribute('data-set');

        if (target.classList.contains('approve-button')) {
            handleButtonClick('approve', orderId, set);

            // Update the specific button style
            target.style.backgroundColor = "#4CAF50"; // Green color for "Approve"
            target.style.pointerEvents = "none"; // Disable further clicks
        } else if (target.classList.contains('reject-button')) {
            handleButtonClick('reject', orderId, set);

            // Update the specific button style
            target.style.backgroundColor = "#f44336"; // Red color for "Reject"
            target.style.pointerEvents = "none"; // Disable further clicks
        }
    });
}

function logout() {
  window.location.href = "index.html";
}

function showReceiptData(order_id) {
  console.log("showReceiptData function called with order_id: " + order_id);
  // Make an AJAX request to the PHP file
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      // Parse the JSON response
      var response = JSON.parse(this.responseText);

      // Update the receiptData div with the retrieved data
      document.getElementById("receiptData").innerText = response.data;

      // Update the filePreview div with the file_path or a message
      var file_path = response.file_path;
      var previewImage = document.getElementById("previewImage");

      if (file_path) {
        // Display the image preview using the file_path
        previewImage.src = file_path;
        previewImage.style.display = "block";
        previewImage.alt = "Receipt File Preview";

        // Create a link to the file
        var fileLink = document.createElement("a");
        fileLink.href = file_path;
        fileLink.target = "_blank"; // Open the link in a new tab
        fileLink.innerText = "Open Receipt";
        document.getElementById("filePreview").innerHTML = ""; // Clear the content first
        document.getElementById("filePreview").appendChild(fileLink);
      } else {
        // If no file_path is available, show a message
        previewImage.style.display = "none";
        previewImage.alt = ""; // Clear the alt attribute
        document.getElementById("filePreview").innerText = "No receipt available.";
      }

      // Show the pop-up container
      document.getElementById("popUpContainer").style.display = "block";
    }
  };

  xhr.open("GET", "get_receipt_data.php?order_id=" + order_id, true);
  xhr.send();
}

  function closePopUp() {
  // Hide the pop-up container
  document.getElementById("popUpContainer").style.display = "none";
  
  // Reset the content of the pop-up container
  document.getElementById("receiptData").innerText = "";
  document.getElementById("previewImage").src = "";
  document.getElementById("filePreview").innerText = "";
}


</script>



</body>
</html>
