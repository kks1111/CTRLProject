<?php
	require "connectiondb.php";
	if (!isset($_SESSION['email'])) 
	{
		header('location: indexpage.php');
	}
	else
	{
		$email=$_SESSION['email'];
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Home Page</title>
		<?php require "head.php"?>
		<style>
		#ADD {
			position: fixed;
			bottom: 30px;
			right: 5px;
		  }
		 </style>
	</head>
	<body>
		<!--NAV BAR-->
		<?php require "navbar.php"?>
		
		<?php
		$query="SELECT email FROM plans WHERE email='$email'";
		$result=mysqli_query($con,$query) or die($mysqli_error($con));
		$num=mysqli_num_rows($result);
		if($num==0) 
		{ ?>
			<div class="container" style="margin-top:100px">
				<h3>You don't have any active plans</h3><br>
				<div class="card col-4 offset-4 bg-light" style="height:180px">
					<div class="card-body text-center my-5" >
						<a href="createplan.php" class="card-link"><span class="fa fa-plus-circle"></span> Create a new plan</a>
					</div>
				</div>
			</div>
		<?php 
		}
		else
		{ 
			$query="SELECT * FROM plans WHERE email='$email'";
			$result=mysqli_query($con,$query) or die($mysqli_error($con));
		?>
			<div class="container" style="margin-top:80px">
			<h3>You plans</h3><br>
			<div class="row">
			<?php while($row=mysqli_fetch_row($result)) 
			{ ?>
				<div class="col-sm-12 col-md-6 col-lg-4">
				<div class="card">
					<div class="card-header text-center bg-primary text-white">
						<h5><?php echo $row[2];?><span class="float-right fa fa-user"> <?php echo $row[9];?></span></h5>
					</div>
					<div class="card-body text-center">
						<p><strong class="float-left">Budget</strong><span class="float-right fa fa-inr"> <?php echo $row[5];?></span></p><br>
						<p><strong class="float-left">Date</strong><span class="float-right"> <?php echo date_format(date_create($row[3]),"jS M Y").' - '.date_format(date_create($row[4]),"jS M Y");?></span></p><br><br>
						<a href="viewplan.php?plan=<?php echo $row[2];?>" class="btn btn-outline-primary btn-block">View Plan</a>
					 </div>
				</div><br>
				</div>	
			<?php		
			} ?>
			</div><br>
			<div>
				<a href="createplan.php"><span class="fa fa-plus-circle fa-5x" id="ADD" style="padding-right:1px"></span> </a>
			</div>
			</div>
			<?php
		} ?>
		
		<!--FOOTER-->
		<?php require "footer.php"?>
	</body>
</html>