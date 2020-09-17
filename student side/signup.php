<!--    Name: John Rice
        Assignment Number: 10 (Appointment Booking)    -->
<html>
<body>
	<h2 align=center>Advising Appointment Sign Up</h2>
	<form action='confirmation.php' method='POST'>
	<center>
	<table>
   	<tr>
        	<td align=left> <b>First Name: </b>
        	<td> <input type=text name=first_name>
   	<tr>
        	<td align=left> <b>Last Name: </b>
        	<td> <input type=text name=last_name>
	</table>
	<table cellpadding=10 border=4>
	<?php
		$DBconn = new mysqli (XXXX);
		
		$today = date('m/d/Y');
		$today = strtotime($today);
		//stores todays date (at midnight) in seconds
		$secs = $today;

		//for loop for next seven days
		for($x = 0; $x < 7; $x++)
		{
			$query = "select * from advising where TimeSecs > $today and TakenStatus = 'N/A';";
			$result = mysqli_query($DBconn, $query);
			//if reaches a weekend, decrements so it will have have a weekday in its place
			if(date('D', $secs) == 'Sat' || date('D', $secs) == 'Sun')
			{
				$x--;
			}
			else
			{
				echo "<tr> <td align=left>";
				//builds a section for an upcoming day
				echo "<p style=';background-color:lightgrey;margin:0px'><b>" .  date('D M jS Y', $secs) . "</b></p><br>";
				//looks through lines of file
				while($row = mysqli_fetch_object ($result))
				{
					//if the time is after midnight of the current day it is looking for and before midnight of the following day
					//and the line only has the available time on the line, lists it as available as a radio input
					if($row->TimeSecs > $secs && $row->TimeSecs < ($secs + 86400))
					{
						echo "<input type=radio name=slot value='" . $row->TimeSecs . "'>" . date('g:ia', $row->TimeSecs) . "</input><br>";
					}	
				}
			}
			//adds a days worth of seconds
			$secs += 86400;
			//deals with upcoming daylight savings nonsense by adding an hour
			if(date('m/d', $secs) == '11/03')
			{
				$secs += 3600;
			}
		}	
	?>
	<tr><td align=center>	
	<input type='submit' value='Sign Up'>
	</form>
	</table>
	</form>
	<form action='find.php' method ='POST'>
	<table style='background-color:lightgrey'>
	<tr><td align=center>
	<h3>Forget your appointment time?</h3>
        <tr>
                <td align=leftd> <b>First Name: </b>
                <td> <input type=text name=first>
        <tr>
                <td align=left> <b>Last Name: </b>
                <td> <input type=text name=last>
        <tr><td align=center>
        <input type='submit' value='Search For Appointment'>
        </table>
        </form>
</body>
</html>
