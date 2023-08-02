<?php
// Assuming you have a database connection established.
$connection = mysqli_connect('localhost', 'root', '', 'catering');
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch reviews from the 'review' table
$fetchReviewsQuery = "SELECT * FROM review ORDER BY date_created DESC";
$result = mysqli_query($connection, $fetchReviewsQuery);
?>

<!DOCTYPE html>
<html>
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
#displayReview {
	margin-bottom: 200px;
}

.dropbtn {
  background-color: #F8F0E3;
  color: #3A3B3C;
  padding: 18px;
  font-size: 15px;
  border: none;
font-weight: bold;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.loginDrop {
  display: none;
  position: absolute;
  background-color: white;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a:hover {
	color: black;
}

.dropdown:hover .dropdown-content {
	display: block;
}

.dropdown:hover .dropbtn {
	background-color: white;
	opacity: 50%;
}
	  
.reviewTitle {
	font-size: 36px;
	text-align: center;
	margin-left: 44%;
	margin-right: auto;
	width: 700px;
	font-weight: bold;
}

.orderForm {
	max-width: 600px;
	margin: 0px auto;
	margin-left: 430px;
	margin-right: -200px;
	background-color: #F8F0E3;
	padding: 20px;
	text-align: center;
}
		  
.orderForm p {
	font-size: 18px;
	margin-bottom: 20px;
}
		  
.orderForm label {
	display: block;
	text-align: left;
	margin-bottom: 10px;
}
		  
input[type="text"],
input[type="date"] {
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #F8F0E3;
	background-color: white;
	box-sizing: border-box;
}
		  
textarea {
	width: 100%;
	padding: 12px 10px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #F8F0E3;
	background-color: white;
	box-sizing: border-box;
}
		  
.orderForm .clearfix {
	overflow: auto;
}
		  
.orderForm .cancelbtn,
.orderForm .signupbtn {
	float: none;
	display: block;
	width: 100%;
	padding: 10px;
}	  
		  
/* CSS for the displayReview container */
#displayReview {
	max-width: 600px;
	margin: 0px auto;
	margin-left: 430px;
	margin-bottom: 200px;
	margin-right: -200px;
	padding: 20px;
	background-color: white;
	border-radius: 5px;
	box-shadow: 0 10px 4px rgba(0, 0, 0, 0.1);
	margin-top: 50px;
}

#displayReview h2 {
	text-align: center;
}

/* Additional styles for review cards within the container */
#displayReview .review-card {
	background-color: #decac1;
	border-radius: 5px;
	padding: 10px;
	box-shadow: 0 6px 4px rgba(0, 0, 0, 0.1);
	margin-bottom: 20px; /* Add spacing between review cards */
}

/* Ensure long text wraps within the review card */
#displayReview .review-content {
	word-wrap: break-word;
}

#displayReview .review-info {
	display: flex;
	justify-content: space-between;
	margin-bottom: 10px;
}

#displayReview .review-info h3 {
	font-size: 18px;
	font-weight: bold;
}

#displayReview .review-date {
	font-size: 14px;
	color: #888888;
}

.signupbtn {
  	background-color: #6F4E37;
  	color: white;
  	padding: 14px 20px;
  	margin: 8px 0;
  	border: none;
  	cursor: pointer;
  	width: 100%;
}

.signupbtn:hover {
  	opacity: 0.8;
}

.cancelbtn {
  	width: auto;
  	padding: 14px 20px;
  	margin: 8px 0;
  	border: none;
  	cursor: pointer;
  	width: 100%;
	background-color: #CB6D51;
	color: white;
}
</style>

<body style="background-color: #DEC3A5;">

<!-- Cafe's Name -->
<section class="content" style="max-width:900px">
  <img src="images/logo.png" alt="Logo" class="logo-image">
  <h2 class="cafe-name">GERAI MAKSU</h2>

<!-- Dropdown Buttons -->
  <div class="dropdown">
  <button class="dropbtn">ADMIN</button>
  <div class="dropdown-content">
    <a href="adminLogin.html">Login</a>
  </div>
</div>    
  
<!-- Dropdown Buttons -->
  <div class="dropdown">
  <button class="dropbtn">CUSTOMER</button>
  <div class="dropdown-content">
    <a href="loginpage.php">Login</a>
    <a href="registerpage.html">Register</a>
  </div>
</div>

<!-- Navigation Buttons -->
<nav class="navbtn">
  <button class="nav-item" onclick="window.location.href='index.html';">HOME</button>
  <button class="nav-item" onclick="window.location.href='package.html';">PACKAGE</button>
  <button class="nav-item" onclick="window.location.href='review.php';">REVIEW</button>
</nav>

<!-- Display area for user's review -->
<div id="displayReview" class="reviews-container">
    <h2>Customer Feedback</h2>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="review-card">
            <div class="review-info">
                <h3><?php echo htmlspecialchars($row['email']); ?></h3>
            </div>
            <div class="review-content">
                <?php echo htmlspecialchars($row['content']); ?>
            </div>
			<br>
			<div class="review-date">
				<?php echo htmlspecialchars($row['date_created']); ?>
			</div>
        </div>
    <?php } ?>
</div>
	  
<!-- Footer -->
  <div class="footer">
    <p>&copy; 2023 Gerai Maksu. All rights reserved.</p>
  </div>
</body>
</html>