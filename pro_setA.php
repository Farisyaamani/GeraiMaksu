<?php
// Start the session
session_start();

// Function to generate a random order_id
function generateRandomOrderId() {
    return rand(100000, 999999);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $package = $_POST["package"];
    $reservationDate = $_POST["resDate"];
    $quantity = $_POST["quantity"];
    $phoneNo = $_POST["phoneNo"];
    $location = $_POST["location"];

    // Retrieve the email and order_id from the session
if (isset($_SESSION['email'])) { 
    $email = $_SESSION['email'];

        // Connect to the database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "catering";
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create the orderFormA table if it doesn't exist
        $sql = "CREATE TABLE IF NOT EXISTS orderFormA (
            id INT AUTO_INCREMENT PRIMARY KEY,
            order_id INT NOT NULL,
            name VARCHAR(255) NOT NULL,
            package VARCHAR(255) NOT NULL,
            reservation_date DATE NOT NULL,
            quantity INT NOT NULL,
            phone_number VARCHAR(15) NOT NULL,
            location TEXT NOT NULL,
            email VARCHAR(255) NOT NULL
        )";

        if ($conn->query($sql) === TRUE) {
            // Generate a random order_id
            $order_id = generateRandomOrderId();

            // Insert the form data into the orderFormA table, including the email and order_id
            $insertSql = "INSERT INTO orderFormA (order_id, name, package, reservation_date, quantity, phone_number, location, email) 
                          VALUES ('$order_id', '$name', '$package', '$reservationDate', '$quantity', '$phoneNo', '$location', '$email')";

            if ($conn->query($insertSql) === TRUE) {
                // Data insertion successful
            } else {
                // Error inserting data
                echo "Error inserting data: " . $conn->error;
            }
        } else {
            // Error creating table
            echo "Error creating table: " . $conn->error;
        }

        // Close the database connection
        $conn->close();
    } else {
        // Email not found in session
        echo "Email not found in session!";
    }
}
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    padding: 60px 319px;
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
	  .column2 {
		margin-bottom: 200px;
	  }
	  
      .message {
        display: flex;
        align-items: center;
        background-color: white;
        text-align: center;
        font-size: 18px;
        margin-top: 40px;
        margin-left: 300px;
        padding: 20px;
      }

      .message::before {
        content: '\2713';
        font-size: 20px;
        margin-right: 10px;
      }
	  
.order-details {
  	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	border: none;
	width: 70%;
	height: 20%;
	padding: 9px 20px;
	margin: auto 420px;
	text-align: center;	
	background-color: white;
	border-radius: 8px;
}
	
      .order-details {
        list-style-type: none;
        padding-bottom: 2px;
		padding-top: 2px;
      }

      .order-details li {
        margin-bottom: 10px;
      }
	  
	  .checkout-button {
        background-color: #B1907F;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 0;
		margin-left: 960px;
      }
	  
	  .food {
		  font-size: 24px;
	  }
    </style>
  </head>
  <body style="background-color: #DEC3A5;">
    <!-- Cafe's Name -->
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
      </div>

      <!-- Navigation Buttons -->
<nav class="navbtn">
  <button class="nav-item" onclick="window.location.href='index2.php';">HOME</button>
  <button class="nav-item" onclick="window.location.href='package2.php';">PACKAGE</button>
  <button class="nav-item" onclick="window.location.href='review2.php';">REVIEW</button>
</nav>
	  <br>
	  
<?php
// Display the order details based on the user's input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo '<ul class="order-details">';
  echo '<h3 class="food">ORDER DETAILS</h3>';
  echo '<hr>'; // Adding a horizontal line below the heading
  echo '<li><strong>Package:</strong> ' . $package . '</li>';
  echo '<li><strong>Pax Quantity:</strong> ' . $quantity . ' pax</li>';
  // Calculate and display the total price in MYR
  // You can replace the placeholder $pricePerPax with the actual price per pax
  $pricePerPax = 15.00; // Replace 15.00 with the actual price per pax in MYR
  $totalPrice = $quantity * $pricePerPax;
  echo '<hr>'; // Adding a horizontal line below the heading
  echo '<h4 style="margin-bottom: 20px;"><strong>TOTAL PRICE:</strong> RM' . number_format($totalPrice, 2) . '</h4>';
  echo '</ul>';
  // Checkout Button
  echo '<button id="checkoutButton" class="checkout-button">CHECKOUT</button>';
  echo '</div>'; // Closing the order-details-container div
}
?>

<script>
  // Get the "CHECKOUT" button element by its ID
  const checkoutButton = document.getElementById('checkoutButton');

  // Add a click event listener to the button
  checkoutButton.addEventListener('click', function() {
    // Redirect to checkout.html
    window.location.href = 'checkout.php';
  });
  
 function logout() {
  window.location.href = "index.html";
}
</script>

</section>
	<!-- Footer -->
  <div class="footer">
    <p>&copy; 2023 Gerai Maksu. All rights reserved.</p>
  </div>
  </body>
</html>