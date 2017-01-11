<?php
		if($_GET['isi']=="admin"){
			include "admin/home.php";
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

		if($_GET['isi']=="ukm-tambah"){
			include "admin/ukm-tambah.php";
		}

		if($_GET['isi']=="ukm-edit"){
			include "admin/ukm-edit.php";
		}

		if($_GET['isi']=="user-tambah"){
			include "admin/user-tambah.php";
		}

		if($_GET['isi']=="user-edit"){
			include "admin/user-edit.php";
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

		if($_GET['isi']=="transaksi-view"){
			include "admin/transaksi-view.php";
		}

		if($_GET['isi']=="transaksi-edit"){
			include "admin/transaksi-edit.php";
		}

		if($_GET['isi']=="admin-home"){
			include "admin/admin-home.php";
		}

?>