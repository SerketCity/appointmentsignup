<!--    Name: John Rice
        Assignment Number: 9 (lists upcoming appointment times)    -->

<html>
<center>
<table rules=all border=5>
<tr>
<td bgcolor=black colspan=4 align=center><font color=white>Upcoming Appointment Times
<tr>
<td bgcolor=lightgrey>Time
<td bgcolor=lightgrey>Advisee
<td bgcolor=lightgrey>


<?php
// connect the database
$today = date('m/d/Y');
$today = strtotime($today);
$DBconn = new mysqli (XXXX);


//checks to see if page was loaded via delete button click
if (isset($_POST['delTime']))
{
	$delNumb = $_POST['delTime'];
	//statement that deletes from table
	$query = "DELETE FROM advising WHERE TimeSecs='$delNumb'";
	$result = mysqli_query ($DBconn, $query);
}	


// submit and process the query for existing appointments
$query = "select * from advising;";
$result = mysqli_query ($DBconn, $query);
//prints all upcoming appointments (starting at midnight of the current day), whether they have been taken or not. i decided to not filter them because a professor may want to 
//see all times at once and cancel appointment times, booked or not.
while ($row = mysqli_fetch_object ($result))
{	
	if($row->TimeSecs > $today)
	{
		echo ("<tr> <td> $row->RealTime <td> $row->TakenStatus <td>
		<form action=times.php method=post><input type=submit value='Delete'>
		<input type=hidden name='delTime' value='$row->TimeSecs'> 
		</form>");
	}
}
?>

</table>
</html>
