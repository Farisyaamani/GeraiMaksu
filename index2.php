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
  
</style>
</head>
<body style="background-color: #DEC3A5;">

<section class="content" style="max-width:900px">
  <img src="images/logo.png" alt="Logo" class="logo-image">
  <h2 class="cafe-name">GERAI MAKSU
    <!-- Display the name received as a query parameter -->
	<?php
session_start();
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
  onmouseout="this.style.backgroundColor='white'">ORDER LIST</button>

</div>

<!-- Navigation Buttons -->
<nav class="navbtn">
  <button class="nav-item" onclick="window.location.href='index2.php';">HOME</button>
  <button class="nav-item" onclick="window.location.href='package2.php';">PACKAGE</button>
  <button class="nav-item" onclick="window.location.href='review2.php';">REVIEW</button>
</nav>

<!-- Gerai Description -->
  <p class="welcome-text"><i>&nbsp Welcome !</i></p>
  <img src="images/home.jpg" alt="Gerai Maksu" class="image1">
  <br><br><br>
  <div class="column2">
    <div class="card2">
      <div class="container2">
	  <h3 class="address">GERAI MAKSU</h3>
		<p>We offer food catering services that are reasonably priced 
		and according to your budget. Whether it's a birthday party, 
		workplace activities such as meetings and courses, akikah mailings 
		and doa selamat ceremony we are ready to help.</p>
		<br>
        <h2 class="address">OPERATING TIME</h2>
        <p>Day: Monday - Saturday</p>
        <p>Time: 9.00 am - 3.30 pm</p>
		<br>
      </div>
    </div>
  </div>
  <img src="images/geraiImage.jpg" alt="Gerai Maksu" class="image2">
  
<a href="https://www.google.com/maps/place/5%C2%B018'36.8%22N+100%C2%B025'49.1%22E/@5.3102222,100.4303056,17z/data=!3m1!4b1!4m4!3m3!8m2!3d5.3102222!4d100.4303056?entry=ttu" target="_blank">
  <img src="images/image2.png" alt="location" class="image3">
</a>

  <div class="column2">
    <div class="cardAddress">
      <div class="container2">
		<h3 class="address">ADDRESS</h3>
		<p>Gerai Makanan MBSP,<br>
		No 8, Lorong Industri Ringan Juru, <br>
		14100 Bukit Mertajam,<br>
		Pulau Pinang</p>
		<br>
		<h4 class="address">PHONE NUMBER</h4>
		<!-- WhatsApp Button -->
		<p>
		  <a href="https://wa.me/60124639730?text=Hai%20Gerai%20Maksu!" target="_blank" class="whatsapp-btn">
			012-4639730 (WhatsApp)
		  </a>
		</p>
      </div>
    </div>
  </div>
<script>
  function logout() {
  window.location.href = "index.html";
}

function redirectToOrderStatusPage() {
  window.location.href = "listOrder.php";
}
</script>

  <!-- Footer -->
  <div class="footer">
    <p>&copy; 2023 Gerai Maksu. All rights reserved.</p>
  </div>
</body>
</html>
