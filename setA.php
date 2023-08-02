<?php
session_start();
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
	  .orderForm {
		margin-bottom: 200px;
	  }
	
      .ayamMerah {
    max-width: 200px;
    margin-left: -200px;
	margin-bottom: 100px;
  }

  .kariIkan {
    max-width: 200px;
    margin-left: -20px;
	margin-bottom: 100px;
	margin-left: 0;
  }

  .sambalUdang {
    max-width: 200px;
    margin-right: -20px;
	margin-bottom: 100px;
  }

  .ulam {
    max-width: 200px;
    margin-right: -20px;
	margin-bottom: 100px;
	margin-left: 20px;
  }

  .sirap {
    max-width: 200px;
    margin-right: -200px;
	margin-bottom: 100px;
	margin-left: 20px;
  }
      
      .orderForm {
        max-width: 600px;
        margin-left: 430px;
        margin-right: -200px;
        background-color: #F8F0E3;
        padding: 20px;
        text-align: center;
		border-radius: 10px;
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
      input[type="date"],
	  input[type="number"]{
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
        padding: 12px 20px;
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
	  
	  .menus {
	font-size: 36px;
	text-align: center;
	margin-left: 44%;
	margin-right: auto;
	width: 700px;
	font-weight: bold;
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
    <script>
      function clearForm() {
        document.getElementById("myForm").reset();
      }
    </script>
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

      <p class="menus">
        <i style="text-align: center; font-weight: bold;">SET A</i>
        <br><br><br>
        <img src="images/ayamMerah.jpg" alt="ayam Merah" class="ayamMerah">
        <img src="images/kariIkan.jpg" alt="kari Ikan" class="kariIkan">
        <img src="images/sambalUdang.jpg" alt="sambal Udang" class="sambalUdang">
        <img src="images/ulam.jpg" alt="ulam" class="ulam">
        <img src="images/sirap.jpg" alt="sirap" class="sirap">
      </p>
	  
      <div class="orderForm">
        <form id="myForm" name="myForm" method="post" class="form" action="pro_setA.php">
          <p>Fill in this form to make a reservation.</p>
          <hr>
          <label for="name"><b>Name</b></label>
          <input type="text" placeholder="Enter Name" name="name" id="name" required>
          <br>
		  <label for="package"><b>Package</b></label>
          <input type="text" placeholder="Enter Package" name="package" id="package" required>
          <br>
          <label for="resDate"><b>Reservation Date</b></label>
          <input type="date" placeholder="Enter Reservation Date" name="resDate" id="resDate" required>
          <br>
		  <label for="quantity"><b>Pax Quantity</b></label>
          <input type="number" placeholder="Enter Quantity" name="quantity" id="quantity" min="1" max="50" required>
          <br>
          <label for="phoneNo"><b>Phone Number</b></label>
          <input type="text" placeholder="Enter Phone Number" name="phoneNo" id="phoneNo" required>
          <br>
          <label for="location"><b>Address</b></label>
          <textarea placeholder="Enter Address" name="location" id="location" required></textarea>
          <br>
          <div class="clearfix">
            <button type="button" class="cancelbtn" onclick="clearForm()">Cancel</button>
            <button type="submit" class="signupbtn">Submit</button>
          </div>
        </form>
      </div>
	</section>
	<!-- Footer -->
  <div class="footer">
    <p>&copy; 2023 Gerai Maksu. All rights reserved.</p>
  </div>
  </body>
</html>
