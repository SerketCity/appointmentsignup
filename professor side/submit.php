<!--    Name: John Rice
        Assignment Number: 9 (choose times to add)    -->
<html>
<head>
	<title>Add Advising Times</title>
</head>
<body>
	<h3 align=center>Add New Advising Times</h3>
	<form method='post' action='AddTimes.php'>
	<table cellpadding=20 rules=all align=center bgcolor="LightGrey">
		<tr>
		<td>
		Select day: <br>
		<hr>
		<?php
			$date = date('m/d/Y');
			//converts the current day to seconds
			$secs = strtotime($date);
			//generates the next 21 days, except saturdays and sundays, as radio inputs. value for each button is that day (at midnight) in seconds
			for($x = 0; $x < 22; $x++)
			{
				if(date('D', $secs) != 'Sat' && date('D', $secs) != 'Sun')
				{
					echo "<input type='radio' name='day' value='" . $secs . "'>" . date('D M jS Y', $secs) . "<br>";
				}
				//adds horizontal rules after every friday to break up weeks
				if(date('D', $secs) == 'Fri')
				{
					echo "<hr>";
				}
				//adds a days worth of seconds
				$secs += 86400;
				//deals with daylight savings nonsense by adding an hour 
				if(date('m/d', $secs) == '11/03')
				{
					$secs += 3600;
				}	
			}	
		?>
		</td>
		<td>
			<!-- Hardcoded time options, values are the number of seconds into the day the options are -->
			Select time(s): <br>
			<hr>
			<input type='checkbox' name='timee[]' value='28800'>08:00am<br>
			<input type='checkbox' name='timee[]' value='30600'>08:30am<br>
			<input type='checkbox' name='timee[]' value='32400'>09:00am<br> 
			<input type='checkbox' name='timee[]' value='34200'>09:30am<br> 
			<input type='checkbox' name='timee[]' value='36000'>10:00am<br> 
			<input type='checkbox' name='timee[]' value='37800'>10:30am<br> 
			<input type='checkbox' name='timee[]' value='39600'>11:00am<br> 
			<input type='checkbox' name='timee[]' value='41400'>11:30am<br> 
			<hr>
			<input type='checkbox' name='timee[]' value='43200'>12:00pm<br> 
			<input type='checkbox' name='timee[]' value='45000'>12:30pm<br> 
			<input type='checkbox' name='timee[]' value='46800'>01:00pm<br> 
			<input type='checkbox' name='timee[]' value='48600'>01:30pm<br> 
			<input type='checkbox' name='timee[]' value='50400'>02:00pm<br> 
			<input type='checkbox' name='timee[]' value='52200'>02:30pm<br> 
			<input type='checkbox' name='timee[]' value='54000'>03:00pm<br> 
			<input type='checkbox' name='timee[]' value='55800'>03:30pm<br> 
			<input type='checkbox' name='timee[]' value='57600'>04:00pm<br> 
			<input type='checkbox' name='timee[]' value='59400'>04:30pm<br> 
			<input type='checkbox' name='timee[]' value='61200'>05:00pm<br> 
			<input type='checkbox' name='timee[]' value='63000'>05:30pm<br>
			<input type='checkbox' name='timee[]' value='64800'>06:00pm<br>
		</td>
		</tr>
		<tr>
		<td colspan=2>
		<center>
		<input type='submit' value='Save Time(s)'>
		<tr>
		<td colspan=2>
		<center>
        	<a href="times.php">View Upcoming Appointment Times</a>
		</tr>
	</form>
</body>
</html>
