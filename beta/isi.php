<?php
	if ($level=='admin') {

		if ($_GET['isi']=="kegiatan-tabel") {
			include 'admin/kegiatan-tabel.php';
		}

		if ($_GET['isi']=="kegiatan-edit") {
			include 'admin/kegiatan-edit.php';
		}

		if($_GET['isi']=="admin-home"){
			include "admin/admin-home.php";
		}

		if($_GET['isi']=="ukm-tambah"){
			include "admin/ukm-tambah.php";
		}

		if($_GET['isi']=="ukm-edit"){
			include "admin/ukm-edit.php";
		}

		if($_GET['isi']=="user-tambah"){
			include "admin/user-tambah.php";
		}

		if($_GET['isi']=="user-tabel"){
			$tabel="user-tabel.php";
			if (isset($_COOKIE['mobileview'])) {
				if ($_COOKIE['mobileview']=='on') {
					$tabel="user-tabel-m.php";
				}
			}
			include "admin/$tabel";
		}

		if($_GET['isi']=="ukm-tabel"){
			$tabel="ukm-tabel.php";
			if (isset($_COOKIE['mobileview'])) {
				if ($_COOKIE['mobileview']=='on') {
					$tabel="ukm-tabel-m.php";
				}
			}
			include "admin/$tabel";
		}

		if($_GET['isi']=="laporan-tabel"){
			$tabel="laporan-tabel.php";
			if (isset($_COOKIE['mobileview'])) {
				if ($_COOKIE['mobileview']=='on') {
					$tabel="laporan-tabel-m.php";
				}
			}
			include "admin/$tabel";
		}

		if($_GET['isi']=="transaksi-tambah"){
			include "admin/transaksi-tambah.php";
		}

		if($_GET['isi']=="user-edit"){
			include "admin/user-edit.php";
		}

		if($_GET['isi']=="transaksi-edit"){
			include "admin/transaksi-edit.php";
		}

		if($_GET['isi']=="kegiatan-tambah"){
			include "admin/kegiatan-tambah.php";
		}

		if($_GET['isi']=="pengurus"){
			include "admin/pengurus.php";
		}

		if($_GET['isi']=="pengurus-tambah"){
			include "admin/pengurus-tambah.php";
		}

	} // level admin

	//------------------------------------------------------------------------------------------------------------------ 
	//------------------------------------------------------------------------------------------------------------------
	//------------------------------------------------------------------------------------------------------------------
	//------------------------------------------------------------------------------------------------------------------

	if ($level=='ukm') {
		
		if($_GET['isi']=="laporan-tabel"){
			$tabel="laporan-tabel-ukm.php";
			if (isset($_COOKIE['mobileview'])) {
				if ($_COOKIE['mobileview']=='on') {
					$tabel="laporan-tabel-ukm-m.php";
				}
			}
			include "admin/$tabel";
		}

		if($_GET['isi']=="transaksi-tambah"){
			include "admin/transaksi-tambah-ukm.php";
		}

		if($_GET['isi']=="user-edit"){
			include "admin/user-edit-ukm.php";
		}

		if($_GET['isi']=="transaksi-edit"){
			include "admin/transaksi-edit-ukm.php";
		}

		if($_GET['isi']=="admin-home"){
			include "admin/admin-ukm-home.php";
		}

	} //level ukm

?>