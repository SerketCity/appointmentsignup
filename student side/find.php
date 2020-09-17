<!--    Name: John Rice
        Assignment Number: 10 (Appointment Finder)    -->
<html>
<body>
	<center>
	<?php
		if(!isset($_POST['first']) || !isset($_POST['last']))
		{
			echo "<h3>ERROR: Please enter a first and last name before searching.</h3>";
		}
		else	
		{
			$name = $_POST['first'] . " " . $_POST['last'];
			echo "<h3>Upcoming Appointments for '" . $name . "':";
			$DBconn = new mysqli (XXXX);
			$date = date('m/d/Y');
			$secs = strtotime($date);
			//finds every entry with entered name
			$query = "select * from advising where TakenStatus = '$name';";
			$result = mysqli_query ($DBconn, $query);
			if(mysqli_num_rows($result) == 0)
			{
				echo "<h4>No appointments found.</h4>";
			}
			else
			{
				//lists appointments if they are after midnight of today
				while ($row = mysqli_fetch_object ($result))
				{
					if($row->TimeSecs > $secs)
						echo "<h3>$row->RealTime</h3>";
				}
			}
		}
	?>
</body>
</html>
