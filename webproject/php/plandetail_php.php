<?php
	require "connectiondb.php";

	$title=$_POST['title'];
	$title=mysqli_real_escape_string($con,$title);
	$from=$_POST['from'];
	$from=mysqli_real_escape_string($con,$from);
	$to=$_POST['to'];
	$to=mysqli_real_escape_string($con,$to);
	
	$budget=$_SESSION['budget'];
	$people=$_SESSION['people'];
	$email=$_SESSION['email'];
	
	$query="INSERT INTO plans(email,planname,datefrom,dateto,budget,amountspent,remainingamount,individualshare,personnumber)VALUES('$email','$title','$from','$to','$budget','0','$budget','0','$people')";
	mysqli_query($con,$query) or die(mysqli_error($con));
	
	for($i=1;$i<=$people;$i++)
	{
		$s="person".$i;
		$person=$_POST["$s"];
		$query="INSERT INTO viewplan(email,planname,personname,amountspent,individualspent)VALUES('$email','$title','$person','0','0')";
		mysqli_query($con,$query) or die(mysqli_error($con));
	}
	header('location: homepage.php');
?>
	