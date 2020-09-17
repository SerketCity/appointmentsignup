<!--    Name: John Rice
        Assignment Number: 9 (adds appointments to database)    -->
<html>
<body>
	<h3 align="center">Changes Summary</h3>
	<table align="center" cellpadding="20" rules="all" bgcolor="LightGrey">
	<tr>
	<td>
	<?php
		//checks to see if the user picked both a day and times
		if(empty($_POST['day']) || empty($_POST['timee'])) {
			echo "ERROR: Please choose a day and time.";
		} else {
		//connects to mysql
		$DBconn = new mysqli (XXXX);
		$day = $_POST['day'];
		//loops through each time choice		
		foreach($_POST['timee'] as $hours)
		{	
			//adds day and time to produce exact time in seconds
			$TimeSecs = $day + $hours;
			$TakenStatus = "N/A";
			$RealTime = date('D M jS Y @ g:ia', $TimeSecs);
			//adds table entry where TimeSecs is the time in seconds, TakenStatus is N/A since no one has claimed it yet, and RealTime is a readable string
			$query  = "INSERT INTO advising VALUES ($TimeSecs, '$TakenStatus', '$RealTime')";
			$result = mysqli_query ($DBconn, $query);
			//if time is duplicate, tells adviser that it wasnt added a second time
			if($result)
			{
				echo "Successfully added " . date('D M jS Y g:ia', $TimeSecs) . ". <br>";
			} else {
				echo "Could not add " . date('D M jS Y g:ia', $TimeSecs) . ", time already listed. <br>";
			}
		}}	
	?>
	</td></tr>
	<tr><td>
	<center>
	<form method='post' action='submit.php'>
		<input type='submit' value='Go Back'>
	</form>
	</td></tr>
	<tr>
	<td colspan=2>
	<center>
	<a href="times.php">View Upcoming Appointment Times</a>
	</tr>
</body>
</html>
