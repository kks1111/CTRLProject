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
		<title>Sign Up</title>
		<?php require "head.php"?>
	</head>
	<body>
		<!--NAV BAR-->
		<?php require "navbar.php"?>
		
		<div class="container" style="padding:80px 1px">
		<div class="col-12 col-md-6 offset-md-3">
			<div class="card font-weight-bold">
				<div class="card-header text-center"><h5>Sign Up</h5></div>
				<div class="card-body">
					<form method="post" action="signup_php.php">
						<div class="form-group">
							<label for="name">Name:</label>
							<input type="text" class="form-control" name="name" placeholder="Name" required>
						  </div>
						  <div class="form-group">
							<label for="email">Email address:</label>
							<input type="email" class="form-control" name="email" placeholder="Enter Valid Email" required>
						  </div>
						  <div class="form-group">
							<label for="password">Password:</label>
							<input type="password" class="form-control" name="password" placeholder="Password (Min. 6 characters)" required>
						  </div>
						  <div class="form-group">
							<label for="phone">Phone Number:</label>
							<input type="text" class="form-control" name="phone" placeholder="Enter Valid Phone Number (Ex: 8448444853)"required>
						  </div>
						  <button type="submit" class="btn btn-primary btn-block">Submit</button>
					</form>
				</div>
			</div>
		</div>
		</div>
		
		<!--FOOTER-->
		<?php require "footer.php"?>
	</body>
</html>