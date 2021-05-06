<?php
	require "connectiondb.php";
	if (isset($_SESSION['email'])) 
	{
		header('location: homepage.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login</title>
		<?php require "head.php"?>
	</head>
	<body>
		<!--NAV BAR-->
		<?php require "navbar.php"?>
		
		<div class="container" style="padding:80px 1px">
		<div class="col-12 col-md-6 offset-md-3">
			<div class="card font-weight-bold">
				<div class="card-header text-center"><h5>Login</h5></div>
				<div class="card-body">
					<form method="post" action="login_php.php">
						<div class="form-group">
							<label for="email">Email address:</label>
							<input type="email" class="form-control" name="email" placeholder="Enter Valid Email" required>
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" name="password" placeholder="Password (Min. 6 characters)" required>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Login</button>
					</form>
				</div>
				<div class="card-footer">
					<h6>Don't have an account? <a href="signup.php">Click here to Sign Up</a></h6>
				</div>
			</div>
		</div>
		</div>
		
		<!--FOOTER-->
		<?php require "footer.php"?>
	</body>
</html>