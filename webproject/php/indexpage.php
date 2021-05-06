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
		<title>Index Page</title>
		<?php require "head.php"?>
	</head>
	<body>
		<!--NAV BAR-->
		<?php require "navbar.php"?>
		
		<div class="col-xl-12">
		<div class="container" id="backgroundimage">
			<div class="row">
				<div id="indexcontent" > 
				<center>
					<h3>We help you control your budget</h3><br>
					<a class="btn btn-primary" href="login.php" role="button">Start Today</a>
				</center>
				</div>
			</div>
		</div>
		</div>
		
		<!--FOOTER-->
		<?php require "footer.php"?>
	</body>
</html>