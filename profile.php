<?php session_start();?>
<?php 
include 'header.php';
include_once 'dbconnect.php';
$result = mysqli_query($conn, "SELECT * FROM customers where username = '" . $_SESSION['user'] . "'");
while($res = mysqli_fetch_array($result)) { 
	$_SESSION['email'] = $res['email'];
}

?>
		<div id="profile">
			<br/>
			<br/>
			Username: 		 <span id= "username"><?php echo $_SESSION['user'];?></span>
			<br/>
			<br/>
			<br/>

			Email:       <span id= "email"><?php echo $_SESSION['email'];?></span>
			<br/>
			<br/>
			<br/>

		</div>
	</body>
</html>


    

