<?php
 ob_start();
 session_start();
 include_once 'dbconnect.php';


 if ( isset($_POST['buy']) ) {
	$travel = $_SESSION['travelinfo'];
	$flightNum = $_SESSION['flightnumber'];
	$seatNum = $_SESSION['seatnumber'];
	$parking = $_SESSION['parking'];
	$car = $_SESSION['car'];
	$username = $_SESSION['user'];
	$today = date("Y-m-d H:i:s");  
	
	$query = "INSERT INTO orders(Username, Parking, FlightNumber, SeatNumber, RentalCar, FlightInfo, DateofOrder) VALUES('$username', '$parking', '$flightNum', '$seatNum', '$car', '$travel', '$today')";
	$res = mysqli_query($conn, $query);
    
	if ($res) {
		$query = "Update inventory set Available=0 where FlightNumber='$flightNum' AND SeatNumber='$seatNum'";
		$res = mysqli_query($conn, $query);
		$_SESSION['travelinfo'] = "";
		$_SESSION['flightnumber'] = "";
		$_SESSION['seatnumber'] = "";
		$_SESSION['parking'] = "";
		$_SESSION['car'] = "";
		header("Location: home.php");
		exit();
	} else {
	   echo '<script>alert("Something went wrong, try again later...");</script>';
	}      
}
?>
<?php include 'header.php';?>
	<div id="cart">
		<h2> Cart</h2>
		<ul>
			<li>Flight Info: <?php echo $_SESSION['travelinfo'];?></li>
			<li>Flight Number: <?php echo $_SESSION['flightnumber'];?></li>
			<li>Seat Number: <?php echo $_SESSION['seatnumber'];?></li>
			<li>Parking: <?php echo $_SESSION['parking'];?></li>
			<li>Car Info: <?php echo $_SESSION['car'];?></li>
		
		</ul>
	
	
	</div>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
		<div id="pay">
			<div id="payment">
				<img src="allcard.jpg" alt="all card" title="card" style="margin:0; padding:0;" height="50" width="300">
				<br>
				<label>Payment Method : </label>
				<div id="radio">
					<input type="radio" id="r2" name="r" value="1"/>
					<label>Credit Card</label>
				</div>
			</div>
			<br/>
			<div id="ccard">
				<label>Card Number : </label> 
				<input type="text" id="cardnum" /> 
				<label>Expiration : (MM/YYYY)</label>
				<input type="text" id="month" maxlength="2" size="2"/>
				<input type="text" id="year" maxlength="4" size="4"/>
				<br>
				<label>3 Digit Security Number</label>
				<input type="text" id="secnum" maxlength="3" size="3"/>
			</div>
			<br/>
			<button type="submit" id="buy" name="buy">BUY</button>
        </div>
		</form>
        <div id ="clear"></div>
		<p id="demo">
		</p>
	</body>
</html>

<script>
$(document).ready(function(){
               
                 $('#ccard').hide();
                $('#buy').hide();
                $('#information').hide();
                $("input[type='radio']").click(function(){
                
                    check_radio(this);
               });
                $("#buy").click(function(){
                  
                    var cardnum = $("#cardnum").val();
                    var month = $("#month").val();
                    var year = $("#year").val();
                    var secnum = $("#secnum").val();
                  
                    if ( cardnum.length == 0)
                    {
                        alert("Please Enter 13 Digit Card Number");
                        $("#cardnum").focus();
                    }else if (isNaN(cardnum))
                    {
                         alert("Please Enter only numbers");
                         $("#cardnum").focus();   
                    } else if ( month.length == 0)
                    {
                        alert("Please Enter Month of your card Expiration");
                        $("#month").focus();
                    }else if (isNaN(month))
                    {
                         alert("Please Enter only numbers for Month");
                         $("#month").focus();   
                    } else if (month < 0 || month > 12)
                    {
                         alert("Please Enter numbers for Month Ex January-00");
                         $("#month").focus();   
                    }else if (year.length == 0)
                    {
                        alert("Please Enter Year of your card Expiration");
                        $("#year").focus();
                    }else if (isNaN(year))
                    {
                         alert("Please Enter only numbers for Years");
                         $("#cardnum").focus();   
                    }else if (year.length !== 4)
                    {
                         alert("Enter year of your Card Expirition");
                         $("#year").focus();   
                    }else if ( secnum.length == 0)
                    {
                        alert("Please Enter 3 Digit Security Number");
                        $("#secnum").focus();
                    }else if (isNaN(secnum))
                    {
                         alert("Please Enter only numbers");
                         $("#secnum").focus();   
                    }
                    else if (secnum.length !== 3)
                    {
                         alert("Please Enter exactly 3 digit numbers from back of your card");
                         $("#secnum").focus();   
                    }else{
                        alert("Order Successful!")
                    }
                });
            });
            
        function check_radio(obj){
        
            if (obj.value == "1")
            {
                $('#ccard').show();
              
                $('#buy').show();
            }
            else if (obj.value == "2"){
          
                $('#ccard').hide();
                $('#buy').show();
            }
        }
            
            jQuery.validator.setDefaults({
              debug: true,
              success: "valid"
            });
            $( "#form" ).validate({
              rules: {
                field: {
                  required: true,
                  step: 10
                }
              }
            });


  

</script>
 
<?php


?>
 
