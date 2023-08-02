<?php
// Assuming you have already established a connection to the MySQL database
$connection = mysqli_connect('localhost', 'root', '', 'catering');

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission for customer registration
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pswrd'];
    $confirmPassword = $_POST['pswrd-confirm'];

    // Check if the email already exists in the database
    $sqlCheckEmail = "SELECT * FROM custregistration WHERE email = '$email'";
    $resultCheckEmail = mysqli_query($connection, $sqlCheckEmail);
    if (mysqli_num_rows($resultCheckEmail) > 0) {
        echo "<script>alert('Email already exists. Please use a different email.');</script>";
    } else {
        // Insert the data into the "custregistration" table
        $sqlInsert = "INSERT INTO custregistration (name, email, password, confirm_password) VALUES ('$name', '$email', '$password', '$confirmPassword')";

        if (mysqli_query($connection, $sqlInsert)) {
            echo "<script>alert('Account created successfully.'); window.location.href = 'loginpage.php';</script>";
        } else {
            echo "<script>alert('Error creating account: " . mysqli_error($connection) . "');</script>";
        }
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
.bgimage {
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

.bgimage {
	margin-left: 50%;
	margin-right: auto;
	width: 600px;
	border-radius: 10px;
	padding-top: 16px;
	padding-bottom: 16px;
}

.account {
	text-align: center;
	margin-left: 65%;
	margin-right: auto;
}

.register {
	margin-left: 8.5%;
	margin-right: auto;
	width: 500px;
	border-radius: 10px;
	padding-top: 16px;
	padding-bottom: 16px;
}

.info {
	background-color: white;
  	color: black;
  	padding: 16px 0;
  	margin: 10px 0;
  	border: none;
  	cursor: text;
  	width: 100%;
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

.cancelbtn:hover {
  	opacity: 0.8;
}

.error {
    color: red;
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

</head>
<body>
<center> <h1 class="account">SIGN UP</h1> </center>   
<form name="myForm" action="registerPage.php" method="post" class="bgimage" style="background-image: url('images/bgimage.jpg');" onsubmit="return validateForm();">
	<div class="register">
		<p style="text-align: center; font-size: 18px;">Fill in this form to create an account.</p>
		<hr>
		
		<label for="name"><b>Name</b></label>
		<input type="text" placeholder="&nbsp Enter Name" class="info" name="name" id="name" required>
		
		<label for="email"><b>Email</b></label>
		<input type="text" placeholder="&nbsp Enter Email" class="info" name="email" id="email" required>
		<span id="emailError" class="error"></span>

		<label for="pswrd"><b>Password</b></label>
		<input type="password" placeholder="&nbsp Enter Password" class="info" name="pswrd" id="password" required>
		<span id="passwordError" class="error"></span>

		<label for="pswrd-repeat"><b>Confirm Password</b></label>
		<input type="password" placeholder="&nbsp Confirm Password" class="info" name="pswrd-confirm" id="confirmPassword" required>
		<span id="confirmPasswordError" class="error"></span>

		<div class="clearfix">
		  <button type="cancel" class="cancelbtn">Cancel</button>
		  <button type="submit" class="signupbtn">Sign Up</button>
		</div>
	</div>
</form>

<script>
function validateForm() {
  var email = document.forms["myForm"]["email"].value;
  var password = document.forms["myForm"]["pswrd"].value;
  var confirmPassword = document.forms["myForm"]["pswrd-confirm"].value;
  var emailError = document.getElementById("emailError");
  var passwordError = document.getElementById("passwordError");
  var confirmPasswordError = document.getElementById("confirmPasswordError");

  var isValid = true;

  // Email validation
  if (!validateEmail(email)) {
    emailError.textContent = "Please enter a valid email address";
    emailError.style.color = "red"; // Set the color to red
    isValid = false;
  } else {
    emailError.textContent = "";
  }

  // Password validation
  if (password.length < 6) {
    passwordError.textContent = "Password must be at least 6 characters";
    passwordError.style.color = "red"; // Set the color to red
    isValid = false;
  } else {
    passwordError.textContent = "";
  }

  // Confirm password validation
  if (confirmPassword !== password) {
    confirmPasswordError.textContent = "Passwords do not match";
    confirmPasswordError.style.color = "red"; // Set the color to red
    isValid = false;
  } else {
    confirmPasswordError.textContent = "";
  }

  return isValid;
}

function validateEmail(email) {
  var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  return emailRegex.test(email);
}
</script>
<!-- Footer -->
  <div class="footer">
    <p>&copy; 2023 Gerai Maksu. All rights reserved.</p>
  </div>
</body>
</html>