<?php
session_start();

// Assuming you have a database connection established.
$connection = mysqli_connect('localhost', 'root', '', 'catering');
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Retrieve the email from the session
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Create the 'review' table if it doesn't exist
    $createTableQuery = "CREATE TABLE IF NOT EXISTS review (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    mysqli_query($connection, $createTableQuery);

    // Handle form submission and insert review data into the 'review' table
    if (isset($_POST['review'])) {
        $reviewContent = $_POST['review'];

        // Insert the review data into the 'review' table
        $insertReviewQuery = "INSERT INTO review (email, content) VALUES (?, ?)";
        $insertReviewStmt = mysqli_prepare($connection, $insertReviewQuery);
        mysqli_stmt_bind_param($insertReviewStmt, 'ss', $email, $reviewContent);
        mysqli_stmt_execute($insertReviewStmt);
    }
} else {
    // Handle the scenario when the user is not logged in or the email is not available in the session.
    echo "User not logged in or email not available in the session.";
}

// Fetch reviews from the 'review' table
$fetchReviewQuery = "SELECT * FROM review ORDER BY date_created DESC";
$result = mysqli_query($connection, $fetchReviewQuery);

// Array to store the reviews
$reviews = array();

while ($row = mysqli_fetch_assoc($result)) {
    $reviews[] = $row;
}
?>
<!DOCTYPE html>
<html>
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
#displayReview {
	margin-bottom: 200px;
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
  <h2 class="cafe-name">GERAI MAKSU
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

<p class="reviewTitle"><i>FEEDBACK AND REVIEW</i></p>
<div class="orderForm">
    <form id="myForm" name="myForm" method="post" class="form" onsubmit="submitReview(event)">
        <p>Good feedback is the key to improvement.</p>
        <hr>
        <label for="review"><b>Are you satisfied with our service?</b></label>
        <textarea placeholder="Write here" name="review" id="review" required></textarea>
        <br>
        <div class="clearfix">
            <button type="button" class="cancelbtn" onclick="clearForm()">Cancel</button>
            <button type="submit" class="signupbtn">Submit</button>
        </div>
    </form>
</div>

<!-- Display area for user's review -->
<div id="displayReview" class="reviews-container">
    <h2>Customer Feedback</h2>
    <?php
    // Loop through the reviews and generate the review cards
    foreach ($reviews as $review) {
        echo '<div class="review-card">';
        echo '<div class="review-info">';
        echo '<h3>' . htmlspecialchars($review['email']) . '</h3>';
        echo '<span class="review-date">' . htmlspecialchars($review['date_created']) . '</span>';
        echo '</div>';
        echo '<div class="review-content">' . htmlspecialchars($review['content']) . '</div>';
        echo '</div>';
    }
    ?>
</div>

<script>
	function logout() {
	  window.location.href = "index.html";
    }
	
    function clearForm() {
        document.getElementById("myForm").reset();
    }
	function submitReview(event) {
            event.preventDefault();
            // Your JavaScript code for submitting the review goes here
            document.getElementById('myForm').submit();
        }
</script>
	  
<!-- Footer -->
  <div class="footer">
    <p>&copy; 2023 Gerai Maksu. All rights reserved.</p>
  </div>
</body>
</html>