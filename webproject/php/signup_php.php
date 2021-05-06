<?php
    require "connectiondb.php";
	
	$regex_email="/^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9]+)*(\.[a-z]{2,3})$/";
	$regex_phone="/^[6789][0-9]{9}$/";
	
    $name=$_POST['name'];
	$name=mysqli_real_escape_string($con,$name);

	$email=$_POST['email'];
	if(!preg_match($regex_email,$email)) 
	{
		echo "<script>alert('Invalid Email')</script>";
		echo "<script>location.href='signup.php'</script>";
		die();
	} 
	$email=mysqli_real_escape_string($con,$email);

	$password=$_POST['password'];
	if(strlen($password)<6) 
	{
		echo "<script>alert('Password Contains Atleast 6 Characters')</script>";
		echo "<script>location.href='signup.php'</script>";
		die();
	} 
	$password=mysqli_real_escape_string($con,$password);
	$password=md5($password);

	$phone=$_POST['phone'];
	if(!preg_match($regex_phone,$phone)) 
	{
		$flag=1;
		echo "<script>alert('Invalid Phone Number')</script>";
		echo "<script>location.href='signup.php'</script>";
		die();
	} 
	$phone=mysqli_real_escape_string($con,$phone);

	$query="SELECT * FROM users WHERE email='$email'";
	$result=mysqli_query($con,$query) or die($mysqli_error($con));
	$num=mysqli_num_rows($result);

	if($num!=0)
	{
		echo "<script>alert('Email Already Exists')</script>";
		echo "<script>location.href='signup.php'</script>";
		die();
	} 
	else
	{
		$query="INSERT INTO users(name,email,password,phone)VALUES('$name','$email','$password','$phone')";
		mysqli_query($con,$query) or die(mysqli_error($con));
		$_SESSION['email']=$email;
		header('location: homepage.php');
	}
?>