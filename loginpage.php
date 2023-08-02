<?php
// Assuming you have a MySQL database connection
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "catering";

// Start the session
session_start();

// Check if the form was submitted and the required fields are present
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    // Retrieve the email and password from the login form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create a connection to the database
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email and password exist in the custregistration table
    $checkUserQuery = "SELECT * FROM custregistration WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($checkUserQuery);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email and password exist, insert them into the custlogin table
        $insertQuery = "INSERT INTO custlogin (email, password) VALUES (?, ?)";
        $stmtInsert = $conn->prepare($insertQuery);
        $stmtInsert->bind_param("ss", $email, $password);
        if ($stmtInsert->execute() === false) {
            die("Error inserting data: " . $stmtInsert->error);
        } else {
            // Fetch the "name" from the custregistration table
            $nameQuery = "SELECT name FROM custregistration WHERE email = ?";
            $stmtName = $conn->prepare($nameQuery);
            $stmtName->bind_param("s", $email);
            $stmtName->execute();
            $resultName = $stmtName->get_result();

            if ($resultName->num_rows > 0) {
                $row = $resultName->fetch_assoc();
                $name = $row['name'];

                // Store the name and email in the session
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;

                // Redirect to index2.php after successful login
                header("Location: index2.php");
                exit();
            } else {
                // Handle the case if the name is not found (optional)
            }

            $stmtName->close();
        }
        // Close the prepared statement for inserting data
        $stmtInsert->close();
    } else {
        // Email and password do not exist, display an alert message
        echo '<script>alert("Invalid email or password");</script>';
    }

    // Close the prepared statement for checking user
    $stmt->close();
    // Close the database connection
    $conn->close();
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

.account {
	text-align: center;
	margin-left: 65%;
	margin-right: auto;
}

.loginbtn {
  	background-color: #6F4E37;
  	color: white;
  	padding: 14px 20px;
  	margin: 8px 0;
  	border: none;
  	cursor: pointer;
  	width: 100%;
}

.loginbtn:hover {
  	opacity: 0.8;
}

.cancelbtn {
  	width: auto;
  	padding: 10px 18px;
  	background-color: #CB6D51;
	color: white;
	border: none;
}

.cancelbtn:hover {
  	opacity: 0.8;
}

.login {
  	padding: 20px;
	margin-left: 0;
	margin-right: auto;
}

span.pswrd {
	float: right;
	padding-top: 16px;
}

.bgimage {
	margin-left: 55%;
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

.pswrd {
	cursor: pointer;
}

.pswrd:hover {
  	opacity: 0.8;
	color: brown;
}
</style>
</head>
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
    <button type="submit" form="loginForm"class="loginDrop">Login</button>
    <a href="registerpage.html">Register</a>
  </div>
</div>

<!-- Navigation Buttons -->
<nav class="navbtn">
  <button class="nav-item" onclick="window.location.href='index.html';">HOME</button>
  <button class="nav-item" onclick="window.location.href='package.html';">PACKAGE</button>
  <button class="nav-item" onclick="window.location.href='review.php';">REVIEW</button>
</nav>

<center> <h1 class="account">LOGIN</h1> </center>   
    <form action="loginpage.php" method="post" class="bgimage" style="background-image: url('images/bgimage.jpg');">
        <div class="login">
			<label for="username"><b>Username</b></label>
			<input type="text" placeholder="&nbsp Enter Username" class="info" name="email" required>
			<br><br>
			<label for="pswrd"><b>Password</b></label>
			<input type="password" placeholder="&nbsp Enter Password" class="info" name="password" required>
			<br><br>
			<button type="submit" class="loginbtn">Login</button>
		</div>

		<div class="login" style="background-color:#f1f1f1">
			<button type="cancel" class="cancelbtn">Cancel</button>
		 </div>
	</form>

<div class="error-message">
        <?php echo $errorMsg; ?>
    </div>

<!-- Footer -->
  <div class="footer">
    <p>&copy; 2023 Gerai Maksu. All rights reserved.</p>
  </div>

<script>
function redirectToForgotPassword() {
    window.location.href = 'forgotPassword.html';
  }
</script>

</body>
</html>
