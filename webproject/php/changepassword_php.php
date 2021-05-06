<?php
	require "connectiondb.php";

	$oldpass=$_POST['oldpassword'];
	$oldpass=mysqli_real_escape_string($con,$oldpass);
	$oldpass=md5($oldpass);

	$newpass=$_POST['newpassword'];
	if(strlen($newpass)<6)
	{
		echo "<script>alert('Password Contains Atleast 6 Characters')</script>";
		echo "<script>location.href='changepassword.php'</script>";
		die();
	}
	$newpass=mysqli_real_escape_string($con,$newpass);
	$newpass=md5($newpass);

	$repass=$_POST['repassword'];
	$repass=mysqli_real_escape_string($con,$repass);
	$repass=md5($repass);
	
	$email=$_SESSION['email'];

	$query="SELECT password FROM users WHERE email='$email'";
	$result=mysqli_query($con,$query) or die($mysqli_error($con));
	$row=mysqli_fetch_array($result);

	$password=$row['password'];

if ($newpass!=$repass) 
{
    echo "<script>alert('Passwords Are Not Same')</script>";
	echo "<script>location.href='changepassword.php'</script>";
	die();
} 
else 
{
    if ($oldpass==$password) 
	{
        $query="UPDATE users SET password='$newpass' WHERE email='$email'";
        mysqli_query($con,$query) or die($mysqli_error($con));
        echo "<script>alert('Password Changed Successfully')</script>";
		require "logout.php";
		echo "<script>location.href='indexpage.php'</script>";
		die();
    } 
	else
        echo "<script>alert('Wrong Old Password')</script>";
		echo "<script>location.href='changepassword.php'</script>";
		die();
}
?>
