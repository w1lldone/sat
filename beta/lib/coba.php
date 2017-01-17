<?php
	include 'php-export-data.class.php';
	include '../data.php';
	include '../config.php';

	$exporter = new ExportDataExcel('browser', 'test.xls');

	$exporter->initialize(); // starts streaming data to web browser

	$exporter->addRow(array("tanggal", "ukm", "keperluan", "jumlah"));

	$sql="SELECT * from transaksi";
	$q=mysql_query($sql) or die(mysql_error());
    while ($row=mysql_fetch_array($q)){
	    $ukm=hasil("SELECT nama from ukm where id = $row[ukm]");
	    $keperluan=hasil("SELECT keperluan from keperluan where id = $row[keperluan]");
	    
		$exporter->addRow(array("$row[tanggal]", "$ukm", "$keperluan", "$row[jumlah]"));
	}

	$exporter->finalize();	     

?>