<?php session_start();?>
<?php 
include 'header.php';
 include_once 'dbconnect.php';
 $result = mysqli_query($conn, "SELECT * FROM inventory");
 if($_SESSION['user'] == 'admin')
 {
		$result2 = mysqli_query($conn, "SELECT * FROM orders");
 }
 
?>

		<h2> Inventory</h2>
		<br>
		<div class="invTable">
		<table>
            <td>Flight Number</td>
            <td>Seat Number</td>
            <td>Available</td>
        </tr>
        <?php 
			while($res = mysqli_fetch_array($result)) {         
				echo "<tr>";
				echo "<td>".$res['FlightNumber']."</td>";
				echo "<td>".$res['SeatNumber']."</td>";
				if($res['Available'] == 1)
				{
					echo "<td>True</td>";
				}
				else
				{
					echo "<td>False</td>";
				}
			}
        ?>
		</table>
		<?php
			if($_SESSION['user'] == 'admin')
			{
				echo '<h2> Orders</h2>
						<br>
						<div class="invTable">
						<table>
							<td>Order Number</td>
							<td>Username</td>
							<td>Parking</td>
							<td>Flight Number</td>
							<td>Seat Number</td>
							<td>Rental Car</td>
							<td>Flight Info</td>
							<td>Date Ordered</td>
						</tr>';
				while($res2 = mysqli_fetch_array($result2)) {         
					echo "<tr>";
					echo "<td>".$res2['OrderNumber']."</td>";
					echo "<td>".$res2['Username']."</td>";
					echo "<td>".$res2['Parking']."</td>";
					echo "<td>".$res2['FlightNumber']."</td>";
					echo "<td>".$res2['SeatNumber']."</td>";
					echo "<td>".$res2['RentalCar']."</td>";
					echo "<td>".$res2['FlightInfo']."</td>";
					echo "<td>".$res2['DateofOrder']."</td>";					
				}
				echo '</table>';
	
			}
		?>
		</div>
	</body>
</html>