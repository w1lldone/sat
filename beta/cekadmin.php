<?php
	session_start();
	if ($_SESSION['pref']!='admin' || $_SESSION['pref']!='ukm') {
		header('location:login.php');
	}
?>