<?php
	include('auth.php');

	session_start();

	$s_username = $_POST['login'];
	$s_password = $_POST['passwd'];

	if ($_POST['submit'] === "OK")
	{
		if (auth($s_username, $s_password) == true)
		{
			$_SESSION['logged_on'] = $s_username;
			$_SESSION['access_level'] = get_access($s_username, $s_password);
			header("Location: index.php");
		}
		else
		{
			$_SESSION['logged_on'] = "Guest";
		}
	}
?>

<!DOCTYPE html>
<html>
	<body>
		<h1>Login</h1>
		<form action="login.php" method="POST">
			<label for="login">Username:</label>
			<input type="input" name="login" value="" required="true" />
			<label for="passwd">Password:</label>
			<input type="password" name="passwd" required="true" />
			<input type="submit" name="submit" value="OK">
		</form>
		<br/>
		<a href="create.php">Create Account</a>
		<br/>
		<a href="#">Forgot Password</a>
	</body>
</html>