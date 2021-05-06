<?php
	require "connectiondb.php";

	$email=$_POST['email'];
	$email=mysqli_real_escape_string($con,$email);
	$password=$_POST['password'];
	$password=mysqli_real_escape_string($con,$password);
	$password=md5($password);

	$query="SELECT email FROM users WHERE email='$email'";
	$result=mysqli_query($con,$query) or die($mysqli_error($con));
	$num=mysqli_num_rows($result);
	if($num==0) 
	{
		echo "<script>alert('Email Not Registered')</script>";
		echo "<script>location.href='login.php'</script>";
		die();
	} 
	$query="SELECT password FROM users WHERE email='$email' AND password='$password'";
	$result=mysqli_query($con,$query) or die($mysqli_error($con));
	$num=mysqli_num_rows($result);
	if($num==0)
	{
		echo "<script>alert('Password Not Correct')</script>";
		echo "<script>location.href='login.php'</script>";
		die();
	}
	else 
	{
		$_SESSION['email']=$email;
		header('location: homepage.php');
	}
?>
