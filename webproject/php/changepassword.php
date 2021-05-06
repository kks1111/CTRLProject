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
		<title>Change Password</title>
		<?php require "head.php"?>
	</head>
	<body>
		<!--NAV BAR-->
		<?php require "navbar.php"?>
		
		<div class="container" style="padding:80px 1px">
		<div class="col-12 col-md-6 offset-md-3">
			<div class="card font-weight-bold">
				<div class="card-header text-center"><h5>Change Password</h5></div>
				<div class="card-body">
					<form method="post" action="changepassword_php.php">
						<div class="form-group">
							<label for="oldpassword">Old Password:</label>
							<input type="password" class="form-control" name="oldpassword" placeholder="Old Password" required>
						</div>
						<div class="form-group">
							<label for="newpassword">New Password:</label>
							<input type="password" class="form-control" name="newpassword" placeholder="New Password (Min. 6 characters)" required>
						</div>
						<div class="form-group">
							<label for="repassword">Confirm New Password:</label>
							<input type="password" class="form-control" name="repassword" placeholder="Re-type New Password" required>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Change</button>
					</form>
				</div>
			</div>
		</div>
		</div>
		
		<!--FOOTER-->
		<?php require "footer.php"?>
	</body>
</html>