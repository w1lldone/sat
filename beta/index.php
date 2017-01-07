<?php
session_start();
if ($_SESSION['privilage']=='admin') {
 	header('location:modul.php?isi=slider-tabel');
 } else {
 	header('location:login.php');
 }
?>