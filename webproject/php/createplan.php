<?php
	require "connectiondb.php";
	if (!isset($_SESSION['email'])) 
	{
		header('location: indexpage.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Create Plan</title>
		<?php require "head.php"?>
	</head>
	<body>
		<!--NAV BAR-->
		<?php require "navbar.php"?>
		
		<div class="container" style="padding:80px 1px">
		<div class="col-12 col-md-6 offset-md-3">
			<div class="card font-weight-bold">
				<div class="card-header text-center bg-primary text-white"><h5>Create New Plan</h5></div>
				<div class="card-body">
					<form method="post" action="createplan_php.php">
						<div class="form-group">
							<label for="budget">Initial Budget:</label>
							<input type="text" class="form-control" name="budget" placeholder="Initial Budget (Ex. 4000)" required>
						</div>
						<div class="form-group">
							<label for="people">How many people you want to add in your group?</label>
							<input type="text" class="form-control" name="people" placeholder="No. of people"  required>
						</div>
						<button type="submit" class="btn btn-outline-primary btn-block">Next</button>
					</form>
				</div>
			</div>
		</div>
		</div>
		
		<!--FOOTER-->
		<?php require "footer.php"?>
	</body>
</html>