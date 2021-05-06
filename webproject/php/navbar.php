<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="indexpage.php">Ctrl Budget</a>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mynavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="mynavbar">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a class="nav-link" href="aboutus.php"><span class="fa fa-exclamation-circle"></span> About Us</a></li>
				
				<?php if (isset($_SESSION['email'])) {?>
				
				<li class="nav-item"><a class="nav-link" href="changepassword.php"><span class="fa fa-cog"></span> Change Password</a></li>
				<li class="nav-item"><a class="nav-link" href="logout.php"><span class="fa fa-sign-out"></span> Logout</a></li>
				
				<?php } else {?>
				
				<li class="nav-item"><a class="nav-link" href="signup.php"><span class="fa fa-user"></span> Sign Up</a></li>
				<li class="nav-item"><a class="nav-link" href="login.php"><span class="fa fa-sign-in"></span> Login</a></li>
				
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>
