<?php
	require "connectiondb.php";
	if (!isset($_SESSION['email'])) 
	{
		header('location: indexpage.php');
	}
	else
	{
		$email=$_SESSION['email'];
		$plan=$_SESSION['plan'];
		$query="SELECT * FROM plans WHERE email='$email' AND planname='$plan'";
		$result=mysqli_query($con,$query) or die($mysqli_error($con)); 
		$num=mysqli_num_rows($result);
		if($num==0)
		{
			header('location: homepage.php');
		}
		else
		{
			$row=mysqli_fetch_row($result);
			if($row[7]==0)
			{
				$color="text-dark";
			}
			else if($row[7]>0)
			{
				$color="text-success";
			}
			else
			{
				$color="text-danger";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>View Plan</title>
		<?php require "head.php"?>
	</head>
	<body>
		<!--NAV BAR-->
		<?php require "navbar.php"?>
		
		<div class="container" style="margin-top:80px">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-header text-center bg-primary text-white">
						<h5><?php echo $row[2];?><span class="float-right fa fa-user"> <?php echo $row[9];?></span></h5>
					</div>
					<div class="card-body text-center">
						<p><strong class="float-left">Initial Budget</strong><span class="float-right fa fa-inr"> <?php echo $row[5];?></span></p><br>
						<?php 
						$q="SELECT * FROM viewplan WHERE email='$email' AND planname='$plan'";
						$r=mysqli_query($con,$q) or die($mysqli_error($con)); 
						while($col=mysqli_fetch_row($r))
						{ ?>
							<p><strong class="float-left"><?php echo $col[3]?></strong><span class="float-right fa fa-inr"> <?php echo $col[4];?></span></p><br>
				<?php   } ?>
						<p><strong class="float-left">Total Amount Spent</strong><span class="float-right fa fa-inr"> <?php echo $row[6];?></span></p><br>
						<p><strong class="float-left">Remaining Amount</strong><span class="float-right fa fa-inr <?php echo $color;?>"> <?php echo $row[7];?></span></p><br>
						<p><strong class="float-left">Individual Shares</strong><span class="float-right fa fa-inr"> <?php echo $row[8];?></span></p><br>
						<?php 
						$r=mysqli_query($con,$q) or die($mysqli_error($con)); 
						while($col=mysqli_fetch_row($r))
						{ 
							$am=$col[5]*1;
							$s="";
							if($am==0)
							{
								$cl="text-dark";
							}
							else if($am>0)
							{
								$cl="text-success";
								$s="Gets back";
							}
							else
							{
								$am=0-$am;
								$cl="text-danger";
								$s="Owes";
							}
							?>
							<p><strong class="float-left"><?php echo $col[3]?></strong><span class="float-right <?php echo $cl;?>"> <?php echo $s;?> <i class="fa fa-inr"></i> <?php echo $am;?></span></p><br>
				<?php   } ?>
						<a href="#"  onclick="history.back(1)" class="btn btn-outline-primary fa fa-arrow-left"> Go Back</a>
					 </div>
				</div><br>
			</div>
		</div>
		</div>
		
		<!--FOOTER-->
		<?php require "footer.php"?>
	</body>
</html>