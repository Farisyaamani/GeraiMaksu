<?php
session_start();
?>
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
	margin-left: 68.5%;
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
.image3 {
    margin-bottom: 400px;
}
  
.image1 {
    margin-top: 50px;
	display: block;
	margin-left: -10%;
	margin-right: auto;
	height: 380px;
	width: 177.9%;
}
  
.image2 {
    display: inline-block;
	border-radius: 20px;
    height: 380px;
    width: 100%;
    margin-bottom: 50px;
    margin-top: -365px;
	margin-left: 64%;
	margin-right: auto;
}
  
.image3 {
    display: inline-block;
	border-radius: 20px;
    height: 380px;
    width: 100%;
    margin-bottom: 200px;
    margin-top: 0px;
	margin-left: 3.5%;
	margin-right: auto;
}

.card2 {
  	box-shadow: 0 40px 20px 0 rgba(0, 0, 0, 0.2);
	border: none;
	border-radius: 10px;
	width: 50%;
	height: 100%;
	padding: 9px 20px;
	margin: -2px 30px;
	text-align: center;	
	font-family: Georgia;
	font-size: 16px;
	background-color: white;
}
  
.cardAddress {
  	box-shadow: 0 40px 20px 0 rgba(0, 0, 0, 0.2);
	border: none;
	border-radius: 10px;
	width: 40%;
	height: 100%;
	padding: 9px 20px;
	margin-bottom: 100px;
    margin-top: -545px;
	margin-left: 120%;
	margin-right: auto;
	text-align: center;
	background-color: white;
	font-family: Georgia;
	font-size: 16px;
	
}

.address {
	font-family: "Lucida Handwriting";
	font-size: 20px;
	font-weight: bold;
}
  
.location-text {
	font-size: 35px;
	font-weight: bold;
	color: black;
	margin-left: 40%;
	margin-right: 120;
}

.whatsapp-btn {
    background-color: white;
    color: black; 
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    text-decoration: none; 
  }
  
    .order-list {
    list-style-type: none;
    padding: 0;
    padding: 5px;
    margin-bottom: 200px;
    margin-left: 55%;
    margin-right: auto;
    width: 500px; /* Adjust the width as per your requirement */
  }

  .order-item {
    margin-bottom: 10px;
    padding: 10px;
    border: 6px solid #EFEFEF;
    border-radius: 5px;
    width: 500px; /* Adjust the width as per your requirement */
    margin-left: auto;
    margin-right: auto;
	background-color: white;
  }
  
  .orderStatusBtn {
  background-color: #855232; /* brown background color */
  color: white; /* White text color */
  padding: 10px 20px; /* Add some padding to the button */
  font-size: 14px; /* Set the font size */
  border: none; /* Remove the button border */
  border-radius: 5px; /* Add rounded corners to the button */
  cursor: pointer; /* Add a pointer cursor on hover */
  margin-left: 70%;
  margin-right: auto; /* Add some right margin to the button */
}

h3 {
  margin-left: 73.5%;
  margin-right: auto;
}
  
</style>
</head>
<body style="background-color: #DEC3A5;">

<section class="content" style="max-width:900px">
  <img src="images/logo.png" alt="Logo" class="logo-image">
  <h2 class="cafe-name">GERAI MAKSU
    <!-- Display the name received as a query parameter -->
	<?php
if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    echo '<span style="position: absolute; right: 30px; top: 160px; font-family: Georgia; font-size: 18px;">Hi, ' . htmlspecialchars($name) . ' !</span>';
}
?>
  </h2>

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
  <button class="orders-button" onclick="redirectToOrderStatusPage()" 
  style="background-color: #F8F0E3;
         color: #3A3B3C;
         padding: 15px;
         font-size: 15px;
         font-weight: bold;
         border: none;" 
  onmouseover="this.style.backgroundColor='lightgray'" 
  onmouseout="this.style.backgroundColor='white'">ORDER STATUS</button>

</div>

<!-- Navigation Buttons -->
<nav class="navbtn">
  <button class="nav-item" onclick="window.location.href='index2.php';">HOME</button>
  <button class="nav-item" onclick="window.location.href='package2.php';">PACKAGE</button>
  <button class="nav-item" onclick="window.location.href='review2.php';">REVIEW</button>
</nav>

<?php
// Assuming you have already established a connection to the MySQL database
$connection = mysqli_connect('localhost', 'root', '', 'catering');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

function displayOrdersForUser($email) {
    global $connection;

    // Array to store orders for the user
    $userOrders = array();

    $tables = array('orderFormA', 'orderFormB', 'orderFormC');

    // Loop through each table and fetch orders for the user
    foreach ($tables as $table) {
        $sql = "SELECT * FROM $table WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Add the order to the userOrders array
                $userOrders[] = $row;
            }
        }
    }

    // Display orders for the user
    if (!empty($userOrders)) {
        echo "<div class='order-container'>";
        echo "<h3>LIST OF ORDERS</h3>";
        echo "<ul class='order-list'>";
        foreach ($userOrders as $order) {
            echo "<li class='order-item'>";
            echo "<strong>Email:</strong> " . $order['email'] . "<br>";
            echo "<strong>Name:</strong> " . $order['name'] . "<br>";
			echo "<strong>Order ID:</strong> " . $order['order_id'] . "<br>";
            echo "<strong>Package:</strong> " . $order['package'] . "<br>";
            echo "<strong>Reservation Date:</strong> " . $order['reservation_date'] . "<br>";
            echo "<strong>Quantity:</strong> " . $order['quantity'] . " pax<br>";
            echo "<strong>Phone No:</strong> " . $order['phone_number'] . "<br>";
            echo "<strong>Address:</strong> " . $order['location'] . "<br><br>";
			echo "<button class='orderStatusBtn' id='orderStatusBtn" . $order['email'] . "' data-email='" . $order['email'] . "' data-set='A' onclick='redirectToOrderStatusPage(\"" . $order['order_id'] . "\")'>ORDER STATUS</button>";
            echo "</li>";
        }
        echo "</ul>";
        echo "</div>";
    } else {
        echo "<p>No orders found for user: $email.</p>";
    }
}

// Get the email from the session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Call the function to display orders for the user
    displayOrdersForUser($email);
} else {
    echo "<p>User email not found in session.</p>";
}

// Close the database connection
mysqli_close($connection);
?>


<script>
  function logout() {
  window.location.href = "index.html";
}

function redirectToOrderStatusPage(order_id) {
    // Redirect to orderStatus.php with the order_id as a query parameter
    window.location.href = "orderStatus.php?order_id=" + order_id;
}
</script>

  <!-- Footer -->
  <div class="footer">
    <p>&copy; 2023 Gerai Maksu. All rights reserved.</p>
  </div>
</body>
</html>
