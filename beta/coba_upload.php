<?php
	include 'config.php';
	include 'data.php';
	
	$loc="img/";
	$target_dir="../".$loc;
	$files=$_FILES;
	$upload=uploadFile($files, $target_dir, $loc);
	
	if ($upload['status']==1) {
	mysql_query("INSERT INTO kegiatan(tanggal, judul, keterangan, gambar)
				VALUES(
				'$_POST[tanggal]',
				'$_POST[judul]',
				'$_POST[keterangan]',
				'$upload[nama]')");
	echo "<script>window.alert('Tambah Kegiatan berhasil');
			window.location=('modul.php?isi=kegiatan')</script>";	
	}
?>