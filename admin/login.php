<?php
session_start();
require_once "../BUS/AccountBUS.php";
if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];
	if (AccountBUS::Login($username, $password)) {
		if (AccountBUS::checkAdmin($username)) {
			$_SESSION["username"] = "admin";
			header("Location: indexadmin.php");
		} else echo "<script>alert('You are not the admin')</script>";
	} else echo "<script>alert('The account or password is incorrect')</script>";
}
?>
<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
	<div class="container">
		<section id="content">
			<form action="" method="post">
				<h1>Admin Login</h1>
				<div>
					<input type="text" placeholder="Username" required="" name="username" />
				</div>
				<div>
					<input type="password" placeholder="Password" required="" name="password" />
				</div>
				<div>
					<input type="submit" name="submit" value="Log in" />
				</div>
			</form><!-- form -->
			<div class="button">
				<a href="#">Training with live project</a>
			</div><!-- button -->
		</section><!-- content -->
	</div><!-- container -->
</body>

</html>

<?php 
	if(isset($_SESSION["username"])){
		header("location: indexadmin.php");
	}
?>