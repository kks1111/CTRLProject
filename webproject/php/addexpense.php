<?php
	require "connectiondb.php";
	if(!isset($_SESSION['email']))
	{
		header('location: indexpage.php');
	}
	$imagename=NULL;
	if($_FILES['bill']['size']!=0) 
	{
		$file_name=$_FILES["bill"]["name"];
		$imageFileType=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
		$extensions_arr=array("jpg","jpeg","png","gif","bmp");
		if(in_array($imageFileType,$extensions_arr))
		{	
			$imagename=date("Ymd").time().'.'.$imageFileType; 
			$cwd=getcwd();
			chdir("../images/"); 
			$target_path=getcwd().'/'.basename($imagename);
			chdir($cwd);
			if(!move_uploaded_file($_FILES['bill']['tmp_name'],$target_path))
			{
				die();
			}
			
		}
	}
	$title=$_POST['title'];
	$title=mysqli_real_escape_string($con,$title);
	$from=$_POST['date'];
	$from=mysqli_real_escape_string($con,$from);
	$amount=$_POST['amount'];
	$amount=mysqli_real_escape_string($con,$amount);
	$person=$_POST['person'];
	$person=mysqli_real_escape_string($con,$person);
	
	$plan=$_SESSION['plan'];
	$email=$_SESSION['email'];
	
	$query="INSERT INTO expense(email,planname,personname,expensename,amount,date,bill)VALUES('$email','$plan','$person','$title','$amount','$from','$imagename')";
	$result=mysqli_query($con,$query) or die(mysqli_error($con));
	
	$query="SELECT * FROM plans WHERE email='$email' AND planname='$plan'";
	$result=mysqli_query($con,$query) or die($mysqli_error($con)); 
	$row=mysqli_fetch_row($result);
	$a=$row[6]*1;
	$b=$row[7]*1;
	$d=$row[9]*1;
	$amount=$amount*1;
	$e=$a+$amount;
	$f=$b-$amount;
	$g=$e/$d;
	
	$query="SELECT * FROM viewplan WHERE email='$email' AND planname='$plan' AND personname='$person'";
	$result=mysqli_query($con,$query) or die($mysqli_error($con)); 
	$row=mysqli_fetch_row($result);
	$h=$row[4]*1;
	$c=$h+$amount;
	
	$c=(string)$c;
	$query="UPDATE viewplan SET amountspent='$c' WHERE email='$email' AND planname='$plan' AND personname='$person'";
	$result=mysqli_query($con,$query) or die($mysqli_error($con)); 
	
	$query="SELECT * FROM viewplan WHERE email='$email' AND planname='$plan'";
	$result=mysqli_query($con,$query) or die($mysqli_error($con)); 
	while($row=mysqli_fetch_row($result))
	{
		$h=$row[4]*1;
		$i=$h-$g;
		$i=(string)$i;
		$qu="UPDATE viewplan SET individualspent='$i' WHERE email='$email' AND planname='$plan' AND personname='$row[3]'";
		$re=mysqli_query($con,$qu) or die($mysqli_error($con)); 
	}
	
	$e=(string)$e;
	$f=(string)$f;
	$g=(string)$g;
	
	$query="UPDATE plans SET amountspent='$e',remainingamount='$f',individualshare='$g' WHERE email='$email' AND planname='$plan'";
	$result=mysqli_query($con,$query) or die($mysqli_error($con)); 
 
	header("location: viewplan.php?plan=$plan");
?>
	