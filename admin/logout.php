<?php
	session_start();
	$_SESSION['LibsLogon'] = 0;
	session_destroy();
	header("location:login.php");
?>