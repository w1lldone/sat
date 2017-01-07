<?php
	session_start();
	unset($_SESSION['nama']);
	unset($_SESSION['pref']);
	unset($_SESSION['idsk']);

	header('location:login.php');
?>