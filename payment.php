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
  .column2 {
    margin-bottom: 200px;
  }

.card2 {
  	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	border: none;
	width: 50%;
	height: 100%;
	padding: 9px 20px;
	margin: 8px 0;
	margin-left: 515px;
	margin-right: auto;
	text-align: center;	
	border-radius: 20px;
	background-color: white;
}

.qrCode {
width: 400px;
height: 400px;
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

<div class="column2">
    <div class="card2">
        <div class="container2">
            <h3 class="food">QR CODE PAYMENT</h3>
            <p>Scan this QR code to make a payment</p>
            <img src="images/qrCode.jpg" alt="QR Code" class="qrCode">
            <br>
            <h2 class="food">ACCOUNT NUMBER</h2>
            <p>NAME: Nur Seriyana Binti Shabudin</p>
            <p>ACCOUNT NO: Maybank 157308025903</p>
            <br>

            <!-- File Upload Form -->
			<h2 class="food">UPLOAD FILE</h2>
			<form action="upload.php" method="post" enctype="multipart/form-data" onsubmit="return showSuccessMessage()">
				<input type="file" name="fileToUpload" id="fileToUpload" accept=".pdf, .png, .jpg, .jpeg">
				<br><br>
				<input type="submit" value="Upload File" name="submit">
			</form>
        </div>
    </div>
</div>

<!-- JavaScript function to show the success message -->
<script>
    function showSuccessMessage() {
        alert("File successfully uploaded!");
        return true; // Allow form submission to proceed
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
