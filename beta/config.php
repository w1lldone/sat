<?php
	//config.php fungsinya menghubungkan php dengan database mysql
	$dbhost='localhost';
	$dbuser='root';
	$dbpass="";
	$dbname='sat';
	mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_select_db($dbname);

	
?>