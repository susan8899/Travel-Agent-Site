<?php
	echo '<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Airline Reservation System</title>
		<link rel="stylesheet" type="text/css" href="home.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	</head>
	<body>
		<a href="home.php" class="dropbtn5">HOME</a>
		<div class="dropdown">
		<button class="dropbtn">BOOKING</button>
		<div class="dropdown-content">
		<a href="book.php">Booking</a>
		</div>
		</div>
		<div class="dropdown1">
		<button class="dropbtn1">LOGIN</button>
		<div class="dropdown-content1">
		<a href="login.php">Login</a>
		<a href="register.php">Registration</a>  
		</div>
		</div>
		<div class="dropdown2">
		<button class="dropbtn2">INVENTORY</button>
		<div class="dropdown-content2">
		<a href="inventory.php">View</a>
		</div>
		</div>
		<div class="dropdown3">
		<button class="dropbtn3">VIEW CART</button>
		<div class="dropdown-content3">
		<a href="shoppingcart.php">View cart</a>
		</div>
		</div>
		<div class="dropdown3">
		<button class="dropbtn3">PROFILE</button>
		<div class="dropdown-content3">
		<a href="profile.php">User profile</a>
		<a href="login.php">Login</a>
		<a href="register.php">Registration</a>
		</div>
		</div>
		<div class="dropdown4">
		<button class="dropbtn4">REGISTRATION</button>
		<div class="dropdown-content4">
		<a href="register.php">Create an account</a>
		</div>
		</div>
		<div class="dropdown6">
		<button class="dropbtn6">LOGOUT</button>
		<div class="dropdown-content6">
		<a href="logout.php?logout">Logout</a>
		</div>
		</div>';
		if ( isset($_SESSION['user'])!="" ) {
			echo '<span id="userWelcome">Welcome, '. $_SESSION['user'] . "!</span>";
		 }
		
		
		echo '<br/>
		<div id = "pic1" >
		<figure></figure>
		<figure></figure>
		<figure></figure>
		<figure></figure>
		<figure></figure>
		</div><br>
		<div class="travel">
		<a target="" href="http://travel.usnews.com/rankings/best-usa-vacations/">
		<img src="usa.jpg"  class="travel" alt="USA" width="150" height="50">
		</a>
		<figcaption>Best Places to Visit in the USA</figcaption>
		</div>
		<div class="travel">
		<a target="" href="http://travel.usnews.com/rankings/best-europe-vacations/">
		<img src="europe.jpg" class="travel" alt="Europe" width="150" height="50">
		</a>
		<figcaption>Best Places to Visit in Europe</figcaption>
		</div>
		<div class="travel">
		<a target="" href="http://travel.usnews.com/rankings/best-asian-vacations/">
		<img src="asia.jpg"  class="travel" alt="Asia" width="150" height="50"\>
		</a>
		<figcaption>Best Places to Visit in Asia</figcaption>
		</div>
		<div id="logo-all">
		<img src="logo.png"  class="logo-all" alt="Logo">
		</div>'
?>