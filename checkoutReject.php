<?php
session_start();
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-p4SBX+VQzDbzoTlU9Ar7QTaJLTX1W1dNpsK3Lwi9xUs+CRoFUc+84mgyhz8CCZ7bq3AR9Xn5PWZ5V+R6BgnqQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  #displayReview {
    margin-bottom: 200px;
  }

  /* Order Status Styles */
  .order-status-container {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	border: none;
	width: 70%;
	height: 20%;
	padding: 35px 10px;
	margin: auto 420px;
	text-align: center;	
	background-color: white;
	border-radius: 20px;
}
  
  .order-status-label {
    display: inline-block;
    margin-right: 50px;
    padding: 10px 20px;
    border: 1px solid #B1907F;
    border-radius: 5px;
    font-size: 18px;
    font-weight: bold;
	background-color: red;
	color: white;
  }

  /* Next Button Styles */
  .next-button {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #B1907F;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
  }
</style>
  
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
	
    <!-- Order Status Section -->
<div class="order-status-container">
  <h3 class="orderStatus" style="margin: 0; font-size: 28px;">ORDER STATUS</h3><br>
  <div class="order-status-label">&#10004; Order Rejected</div>
  <button class="next-button" onclick="back()">OK</button>
</div>

<script>
  function back() {
    window.location.href = "listOrder.php";
  }

function logout() {
  window.location.href = "index.html";
}
</script>


    <!-- Footer -->
    <div class="footer">
      <p>&copy; 2023 Gerai Maksu. All rights reserved.</p>
    </div>
  </body>
</html>
