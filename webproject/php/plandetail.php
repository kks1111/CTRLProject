<?php
	require "connectiondb.php";
	if (!isset($_SESSION['email'])) 
	{
		header('location: indexpage.php');
	}
	if (isset($_SESSION['budget']) and isset($_SESSION['people']))
	{
		$budget=$_SESSION['budget'];
		$people=$_SESSION['people'];
	}
	else
	{
		header('location: createplan.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Plan Detail</title>
		<?php require "head.php"?>
	</head>
	<body>
		<!--NAV BAR-->
		<?php require "navbar.php"?>
		
		<div class="container" style="padding:80px 1px">
		<div class="col-12 col-md-6 offset-md-3">
			<div class="card font-weight-bold">
				<div class="card-body">
					<form method="post" action="plandetail_php.php">
						<div class="form-group">
							<label for="title">Title:</label>
							<input type="text" class="form-control" name="title" placeholder="Enter Title (Ex. Trip to Goa)" required>
						</div>
						<div class="form-row">
							<div class="col">
								<div class="form-group">
									<label for="from">From:</label>
									<input type="date" class="form-control" name="from"  min="2019-01-01" max="<?php echo date("Y-m-d")?>" required>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label for="to">To:</label>
									<input type="date" class="form-control" name="to"  min="2019-01-01" max="<?php echo date("Y-m-d")?>" required>
								</div>
							</div>
						</div>
						<div class="form-row">
							<div class="col-8">
								<div class="form-group">
									<label for="budget">Initial Budget:</label>
									<input type="text" class="form-control" name="budget" value="<?php echo $budget;?>" disabled>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label for="people">No. of people:</label>
									<input type="text" class="form-control" name="people" value="<?php echo $people;?>" disabled>
								</div>
							</div>
						</div>
						<?php for($i=1;$i<=$people;$i++)
						{ ?>
							<div class="form-group">
								<label for="person<?php echo $i;?>">Person <?php echo $i;?>:</label>
								<input type="text" class="form-control" name="person<?php echo $i;?>" placeholder="Person <?php echo $i;?> Name" required>
							</div>
						<?php 
						} ?>
						<button type="submit" class="btn btn-outline-primary btn-block">Submit</button>
					</form>
				</div>
			</div>
		</div>
		</div>
		
		<!--FOOTER-->
		<?php require "footer.php"?>
	</body>
</html>