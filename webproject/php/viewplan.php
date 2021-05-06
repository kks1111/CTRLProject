<?php
	require "connectiondb.php";
	if (!isset($_SESSION['email'])) 
	{
		header('location: indexpage.php');
	}
	else
	{
		$email=$_SESSION['email'];
		$plan=$_GET['plan'];
		$_SESSION['plan']=$plan;
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
			<div class="col-md-6">
				<div class="card">
					<div class="card-header text-center bg-primary text-white">
						<h5><?php echo $row[2];?><span class="float-right fa fa-user"> <?php echo $row[9];?></span></h5>
					</div>
					<div class="card-body text-center">
						<p><strong class="float-left">Budget</strong><span class="float-right fa fa-inr"> <?php echo $row[5];?></span></p><br>
						<p><strong class="float-left">Remaining Amount</strong><span class="float-right fa fa-inr <?php echo $color;?>"> <?php echo $row[7];?></span></p><br>
						<p><strong class="float-left">Date</strong><span class="float-right"> <?php echo date_format(date_create($row[3]),"jS M Y").' - '.date_format(date_create($row[4]),"jS M Y");?></span></p>
					 </div>
				</div><br>
				<div class="row">
				<?php  
				$qu="SELECT * FROM expense WHERE email='$email' AND planname='$plan'";
				$re=mysqli_query($con,$qu) or die($mysqli_error($con)); 
				while($rr=mysqli_fetch_row($re))
				{ ?>
				<div class="col-6">
				<div class="card">
					<div class="card-header text-center bg-primary text-white">
						<h5><?php echo $rr[4];?></h5>
					</div>
					<div class="card-body text-center">
						<p><strong class="float-left">Amount</strong><span class="float-right fa fa-inr"> <?php echo $rr[5];?></span></p><br>
						<p><strong class="float-left">Paid by</strong><span class="float-right"> <?php echo $rr[3];?></span></p><br>
						<p><strong class="float-left">Paid on</strong><span class="float-right"> <?php echo date_format(date_create($rr[6]),"jS M Y");?></span></p><br>
						<?php if($rr[7]==NULL) 
						{ ?>
							<a href="#">You don't have bill</a>
				<?php   } else 
						{ 
							$s=$rr[7];
							$s="http://localhost/webproject/images/$rr[7]";
				?>
							<a href="<?php echo $s;?>" target="_blank">Show bill</a>
				<?php   } ?>
					 </div>
				</div><br><br>
				</div>
		<?php 	} ?>
				</div>
			</div>
			<div class="col-md-5 offset-md-1 font-weight-bold">
				<a href="expensedist.php" class="btn btn-outline-primary my-5">Expense Distribution</a>
				<div class="card">
					<div class="card-header text-center bg-primary text-white">
						<h5>Add New Expense</h5>
					</div>
					<div class="card-body">
						<form method="post" action="addexpense.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="title">Title:</label>
								<input type="text" class="form-control" name="title" placeholder="Expense Name" required>
							</div>
							<div class="form-group">
								<label for="date">Date:</label>
								<input type="date" class="form-control" name="date" min="<?php echo $row[3];?>" max="<?php echo $row[4];?>"required>
							</div>
							<div class="form-group">
								<label for="amount">Amount Spent:</label>
								<input type="text" class="form-control" name="amount" placeholder="Amount Spent" required>
							</div>
							<div class="form-group">
								<select name="person" class="form-control custom-select" required>
									<option selected disabled>Choose</option>
									<?php 
									$q="SELECT * FROM viewplan WHERE email='$email' AND planname='$plan'";
									$r=mysqli_query($con,$q) or die($mysqli_error($con)); 
									while($col=mysqli_fetch_row($r))
									{ ?>
										<option><?php echo $col[3];?></option>
							<?php	} ?>
								</select>
							</div>
							<div class="form-group">
								<label for="bill">Upload Bill:</label>
								<input type="file" class="form-control" name="bill">
							</div>
							<button type="submit" class="btn btn-outline-primary btn-block">Add</button>
						</form>
					</div>
				</div><br><br>
			</div>
		</div>
		</div>
		
		<!--FOOTER-->
		<?php require "footer.php"?>
	</body>
</html>