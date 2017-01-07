<?php
		if($_GET['isi']=="admin"){
			include "admin/home.php";
		}

		if($_GET['isi']=="user-tabel"){
			include "admin/user-tabel.php";
		}

		if($_GET['isi']=="ukm-tabel"){
			include "admin/ukm-tabel.php";
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

		if($_GET['isi']=="anggaran-tabel"){
			include "admin/anggaran-tabel.php";
		}

		if($_GET['isi']=="laporan-tabel"){
			include "admin/laporan-tabel.php";
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

		if($_GET['isi']=="card"){
			include "admin/card.php";
		}
?>