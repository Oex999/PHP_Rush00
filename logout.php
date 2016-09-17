<?php
	session_start();
	if ($_SESSION['logged_on'] != null || $_SESSION['logged_on'] !== "")
		$_SESSION['logged_on'] = null;
	header("Location: index.php");
?>