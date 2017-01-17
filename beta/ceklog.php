<?php
	include"config.php";

	$pass=md5($_POST['password']);
	$user=$_POST['username'];

	$sql=mysql_query("select * from user where username='$user' and pass='$pass'");
	$count=mysql_num_rows($sql);
	$rs=mysql_fetch_array($sql);
	
	if($count>0){		
		session_start();
			$_SESSION['nama']=$rs['nama'];
			$_SESSION['pref']=$rs['privilage'];
			$_SESSION['ukm']=$rs['ukm'];
			$_SESSION['username']=$rs['username'];

			if ($_SESSION['pref']=='admin') {
				header('location:modul.php?isi=admin-home');
			}

			if ($_SESSION['pref']=='ukm') {
				header('location:modul.php?isi=admin-home');
			}
			
			
	} 
	else{
		echo"<center><h2>username atau password anda salah.</h2><br>
				<a href=login.php><b>Ulangi Lagi</b></a></center>
				<a href=index.php><b>Kembali</b></a></center>";	
	}
?>