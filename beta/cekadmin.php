<?php
	session_start();
	if ($_SESSION['pref']!='admin') {
		header('location:login.php');
	}
?>