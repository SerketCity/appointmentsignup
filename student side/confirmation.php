<!--    Name: John Rice
        Assignment Number: 10 (Booking Handler)    -->
<html>
<body>
<center>
	<?php
		$DBconn = new mysqli (XXXX);
		$appt = $_POST['slot'];
		$query = "select * from advising where TimeSecs = $appt and TakenStatus = 'N/A';";
                $result = mysqli_query($DBconn, $query);

		//first if makes sure user input in the first and last name box, elseif makes sure appt is still available after loading page and clicking submit
		if(strlen($_POST['first_name']) == 0 || strlen($_POST['last_name']) == 0)
		{
			echo "<h3>ERROR: Appointment not booked. Please enter a first and last name when booking.</h3>";
		} elseif(mysqli_num_rows($result) == 0) {
			echo "<h3>ERROR: Appointment not booked. Slot already taken by another advisee. Please select a different time.</h3>";
		} else
		{
			$name = $_POST['first_name'] . " " . $_POST['last_name'];
			$query = "update advising set TakenStatus = '$name' where TimeSecs = $appt;";
			$result = mysqli_query($DBconn, $query);
			echo "<h3>Successfully booked appointment for " . $name . " at " . date('g:ia', $appt) . " on " . date('D M jS Y', $appt) . "!</h3>";
		}	
	?>
</body>
</html>
