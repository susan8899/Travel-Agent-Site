<?php 
session_start();
include 'Dbconnect.php';

$flight = array();
$resFlights=mysqli_query($conn, "SELECT * FROM inventory WHERE Available = 1");
mysqli_close($conn);
//print_r($rowFlights);
$count = mysqli_num_rows($resFlights); 
if($count > 0) {
	
	while($rowFlights = mysqli_fetch_assoc($resFlights)) {
		$flight[] = $rowFlights;
			
	}
} else {
	$errMSG = "No Available Flights.";
}

//print_r($flight);






if( isset($_POST['addcart']) ) { 
  $travelinfo = 'Departure: ' . trim($_POST['depart']);
  $travelinfo = strip_tags($travelinfo);
  $travelinfo = htmlspecialchars($travelinfo);
  
  $travelinfo .= ', Arrival: ' . trim($_POST['arrival']);
  $travelinfo = strip_tags($travelinfo);
  $travelinfo = htmlspecialchars($travelinfo);
  
  $travelinfo .= ', ' . trim($_POST['class'] . ' Class');
  $travelinfo = strip_tags($travelinfo);
  $travelinfo = htmlspecialchars($travelinfo);
  
  $travelinfo .= ', Departure Date: ' . trim($_POST['depdate']);
  $travelinfo = strip_tags($travelinfo);
  $travelinfo = htmlspecialchars($travelinfo);
  
  $travelinfo .= ', Return Date: ' . trim($_POST['retdate']);
  $travelinfo = strip_tags($travelinfo);
  $travelinfo = htmlspecialchars($travelinfo);
  
  $travelinfo .= ', ' . trim($_POST['oneway']);
  $travelinfo = strip_tags($travelinfo);
  $travelinfo = htmlspecialchars($travelinfo);
  
  $travelinfo .= ', ' . trim($_POST['twoway']);
  $travelinfo = strip_tags($travelinfo);
  $travelinfo = htmlspecialchars($travelinfo);
  
  $travelinfo .= ', Persons: ' . trim($_POST['person']);
  $travelinfo = strip_tags($travelinfo);
  $travelinfo = htmlspecialchars($travelinfo);
  
  $cartype = trim($_POST['cartype']);
  $cartype = strip_tags($cartype);
  $cartype = htmlspecialchars($cartype);
  
  $parking = trim($_POST['parking']);
  $parking = strip_tags($parking);
  $parking = htmlspecialchars($parking);
  
  $flightNumber = trim($_POST['flightNumber']);
  $flightNumber = strip_tags($flightNumber);
  $flightNumber = htmlspecialchars($flightNumber);
  
  $seatNumber = trim($_POST['seatNumber']);
  $seatNumber = strip_tags($seatNumber);
  $seatNumber = htmlspecialchars($seatNumber);
  
  
  // prevent sql injections/ clear user invalid inputs
  $username = trim($_SESSION['user']);
  $username = strip_tags($username);
  $username = htmlspecialchars($username);
  
  // if there's no error, continue to login
  if (!$error) {
   
	$_SESSION['travelinfo'] = $travelinfo;
	$_SESSION['parking'] = $parking;
	$_SESSION['car'] = $cartype;
	$_SESSION['flightnumber'] = $flightNumber;
	$_SESSION['seatnumber'] = $seatNumber;
	header("Location: shoppingcart.php");
    exit();
  } 
 }
?>
<?php include 'header.php';?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
		<div id="ticket">
			<h5>Flight Booking</h5>
			 <input type="text" placeholder="Deparature airport" size="30" name="depart"> 
			 <input type="text" placeholder="Arrival airport" name="arrival" size="30">
			 <select name="class">
				 <option value="Economy">Economy</option>
				 <option value="Business">Business</option>
				 <option value="First">First</option>
			 </select>
			 <br><br><br>
			 <input type="text" placeholder="Deparature Date" name="depdate" size="30" id ="calendar">
			 <input type="text" placeholder="Return Date" name="retdate" size="30" id="calendar1"> 
			 <br><br>
			 <input type ="checkbox" name="oneway" value="One Way">One Way
			 <input type ="checkbox" name="twoway" value="Two Way">Two Way
			 <br>
			 <select name="person">
				<option value="1">Adults:1</option>
				  <option value="2">2</option>
				  <option value="3">3</option>
				  <option value="4">4</option>
				  <option value="5">5</option>
				  <option value="6">6</option>
				  <option value="7">7</option>
				  <option value="8">8</option>
			 </select>
			 <br/><br/>
			 Flight Number: 
			 <select id='pick' name='flightNumber'>
			 <?php
				for($i = 0; $i < count($flight); $i++)
				{

					  unset($id);
					  $id = $flight[$i]['FlightNumber'];
					  echo '<option value="'.$id.'">'.$id.'</option>';
                 
				}
			?>
			</select>
			<br/>
			Seat Number: 
			 <select id='drop' name='seatNumber'>
				<?php
					for($i = 0; $i < count($flight); $i++)
					{

						unset($id);
						$id = $flight[$i]['SeatNumber'];
						echo '<option value="'.$id.'">'.$id.'</option>';
                 
					}
				?>
			 </select>
		</div>
		
		
		<div id="car">
		<h5>Car Booking</h5>
			Car Type:
			<select name="cartype">
				<option value="suv">SUV</option>
				<option value="Compact">Compact</option>
				<option value="Midsize">Midsize</option>
				<option value="Luxury">Luxury</option>
			</select>
			<br><br>
			<input type="text" placeholder="Pickup Location" size="30" name="pickup">
			<br><br>
			<input type="text" placeholder="Pickup" name="pickupdate" size="30" id ="calendar">
			<select name="pickuptime">
				<option value="0">Time:00</option>
				<option value="2">01</option>
				<option value="2">02</option>
				<option value="3">03</option>
				<option value="4">04</option>
				<option value="5">05</option>
				<option value="6">06</option>
				<option value="7">07</option>
				<option value="8">08</option>
				<option value="2">09</option>
				<option value="3">10</option>
				<option value="4">12</option>
				<option value="5">13</option>
				<option value="6">14</option>
				<option value="7">15</option>
				<option value="8">16</option>
				<option value="2">17</option>
				<option value="3">18</option>
				<option value="4">19</option>
				<option value="5">20</option>
				<option value="6">21</option>
				<option value="7">22</option>
				<option value="8">23</option>
			</select> 
			<select name="min">
				<option value="0">Time:00</option>
				<option value="1">Time:30</option>
			</select>
			<br><br>
			<input type="text" placeholder="Drop off" name="pickup" size="30" id="calendar1"> 
			<select name="dropofftime">
				<option value="0">Time:00</option>
				<option value="2">01</option>
				<option value="2">02</option>
				<option value="3">03</option>
				<option value="4">04</option>
				<option value="5">05</option>
				<option value="6">06</option>
				<option value="7">07</option>
				<option value="8">08</option>
				<option value="2">09</option>
				<option value="3">10</option>
				<option value="4">12</option>
				<option value="5">13</option>
				<option value="6">14</option>
				<option value="7">15</option>
				<option value="8">16</option>
				<option value="2">17</option>
				<option value="3">18</option>
				<option value="4">19</option>
				<option value="5">20</option>
				<option value="6">21</option>
				<option value="7">22</option>
				<option value="8">23</option>
			</select> 
			<select name="min1">
				<option value="0">Time:00</option>
				<option value="1">Time:30</option>
			</select>
			<br>
		</div>
		
		<div id="parking">
		<h5>Parking Booking</h5>
			Parking Type:
			<select name="parking">
				<option value="blue">Blue Parking</option>
				<option value="red">Red Parking</option>
				<option value="green">Green Parking</option>
				<option value="gold">Gold Parking *TRENDING*</option>
			</select>
			<br><br>
			<input type="submit" name="addcart"value="Add to Cart"/>
		</div>
		</form>
		<div id ="clear"></div>
	</body>
</html>
<script>   
	$(function() {
		$( "#calendar" ).datepicker();  
	  
	}); 
	$(function() {
		$( "#calendar1" ).datepicker();  
	}); 
$('#pick').change(
    function() {
        document.getElementById("drop").selectedIndex = document.getElementById("pick").selectedIndex;
    }
);
$('#drop').change(
    function() {
        document.getElementById("pick").selectedIndex = document.getElementById("drop").selectedIndex;
    }
);
			
</script>