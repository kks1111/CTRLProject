<?php
	require "connectiondb.php";

	$budget=$_POST['budget'];
	$budget=mysqli_real_escape_string($con,$budget);
	$people=$_POST['people'];
	$people=mysqli_real_escape_string($con,$people);
	
	$people=$people*1;
	$budget=$budget*1;
	
	if($budget<50)
	{
		echo "<script>alert('Budget should be greater than or equal to 50')</script>";
		echo "<script>location.href='createplan.php'</script>";
		die();
	}
	if($people<1)
	{
		echo "<script>alert('No. of people should be greater than or equal to 1')</script>";
		echo "<script>location.href='createplan.php'</script>";
		die();
	}
	else
	{
		$_SESSION['budget']=$budget;
		$_SESSION['people']=$people;
		header('location: plandetail.php');
	}
?>
	