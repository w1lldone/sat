<?php
session_start();
if ($_SESSION['pref']=='admin' || $_SESSION['pref']=='ukm') {

	include 'config.php';
	include 'data.php';

	if ($_GET['act']=='tambah_ukm') {
		$cek=hasil("select id from ukm where nama = '$_POST[nama]'");

		if ($cek!=null) {
			echo "<script>window.alert('Nama UKM/Budget sudah ada');
			window.location=('modul.php?isi=ukm-tambah')</script>";
		}

		else{
			mysql_query("
				INSERT INTO ukm(nama)
				VALUES (
				'$_POST[nama]'
				)
				");

			$id=hasil("select id from ukm where nama = '$_POST[nama]'");

			mysql_query("
				INSERT INTO anggaran(periode, ukm, anggaran)
				VALUES (
				'$_POST[periode]',
				'$id',
				'$_POST[anggaran]'
				)
				");

			echo "<script>window.alert('UKM/Budget Berhasil ditambahkan');
			window.location=('modul.php?isi=ukm-tabel')</script>";
		}	
	} //tambah ukm

	if ($_GET['act']=='edit_ukm') {
		
		mysql_query("
			UPDATE ukm SET
			nama = '$_POST[nama]'	
			where id = $_POST[id]
			");

		mysql_query("
			UPDATE anggaran SET
			anggaran = $_POST[anggaran]
			where ukm = $_POST[id] and periode = $_POST[periode]
			");

		echo "<script>window.alert('UKM/Budget Berhasil diedit');
		window.location=('modul.php?isi=ukm-tabel')</script>";
		
	} //edit ukm

	if ($_GET['act']=='hapus_ukm') {
		mysql_query("DELETE FROM ukm where id = $_GET[id]");
		echo "<script>window.alert('UKM/Budget berhasil dihapus');
		window.location=('modul.php?isi=ukm-tabel')</script>";
	} // hapus ukm

	if ($_GET['act']=='hapus_periode') {
		mysql_query("DELETE FROM anggaran where periode = $_GET[periode]");
		echo "<script>window.alert('Periode berhasil dihapus');
		window.location=('modul.php?isi=ukm-tabel')</script>";
	} // hapus periode

	if ($_GET['act']=='tambah_periode') {
		$sql="select * from anggaran where periode = $_POST[periode]";
		$q=mysql_query($sql) or die(mysql_error());
		$count=mysql_num_rows($q);

		if ($count==0) {
			$sql="select * from ukm";
			$q=mysql_query($sql) or die(mysql_error());
			$tahun=hasil("select max(periode) from anggaran");
			while ($row=mysql_fetch_array($q)){
				$anggaran=hasil("select anggaran from anggaran where ukm = $row[id] and periode = $tahun");
				mysql_query("INSERT INTO anggaran(periode, ukm, anggaran)
					VALUES (
					'$_POST[periode]',
					'$row[id]',
					'$anggaran'
					)
				");
			}
			echo "<script>window.alert('Periode Berhasil ditambahkan');
			window.location=('modul.php?isi=ukm-tabel')</script>";

		} else{
			echo "<script>window.alert('Periode Sudah Ada');
			window.location=('modul.php?isi=ukm-tabel')</script>";
		}
		
	} // tambah periode

	if ($_GET['act']=='tambah_user') {
		$pass=md5($_POST['password1']);
		mysql_query("
			INSERT INTO user(username, pass, nama, privilage, ukm)
				VALUES (
				'$_POST[username]',
				'$pass',
				'$_POST[nama]',
				'$_POST[kewenangan]',
				'$_POST[ukm]'
				)
			");
		echo "<script>window.alert('user berhasil ditambah');
		window.location=('modul.php?isi=user-tabel')</script>";
	} // tambah user

	if ($_GET['act']=='edit_user') {
		
		mysql_query("
			UPDATE user SET
			nama = '$_POST[nama]',
			ukm = $_POST[ukm]	
			where username = '$_POST[usern]'
			");

		if (!empty($_POST['password1'])) {
			$pass=md5($_POST['password1']);
			mysql_query("
			UPDATE user SET
			pass = '$pass'
			where username = '$_POST[usern]'
			");
		}

		if ($_POST['usern']!=$_POST['username']) {
			mysql_query("
			UPDATE user SET
			username = '$_POST[username]'
			where username = '$_POST[usern]'
			");

			$_SESSION['username']=$_POST['username'];
		}
		
		if ($_SESSION['pref']=='ukm' ) {
			echo "<script>window.alert('User Berhasil diedit');
		window.location=('modul.php?isi=admin-home')</script>";
		}

		if ($_SESSION['pref']=='admin' ) {
			echo "<script>window.alert('User Berhasil diedit');
		window.location=('modul.php?isi=user-tabel')</script>";
		}
		
		
	} //edit user

	if ($_GET['act']=='hapus_user') {
		mysql_query("
			DELETE FROM user WHERE username = '$_GET[username]'
			");

		echo "<script>window.alert('User Berhasil dihapus');
		window.location=('modul.php?isi=user-tabel')</script>";
	}

	if ($_GET['act']=='tambah_transaksi') {

		$loc="img/nota/";
		$target_dir="../".$loc;
		$files=$_FILES;
		
		$upload=uploadFile($files, $target_dir, $loc);

		if ($upload['status']==1) {
			mysql_query("INSERT INTO transaksi(ukm, username, periode, tanggal, jumlah, keperluan, nota, keterangan)
			VALUES(
			'$_POST[ukm]',
			'$_POST[username]',
			$_POST[periode],
			'$_POST[tanggal]',
			$_POST[jumlah],
			'$_POST[keperluan]',
			'$upload[nama]',
			'$_POST[keterangan]')");
			echo "<script>window.alert('Tambah transaksi berhasil');
			window.location=('modul.php?isi=laporan-tabel')</script>";
		}

	} // tambah transaksi

	if ($_GET['act']=='edit_transaksi') {

		mysql_query("UPDATE transaksi set
			ukm='$_POST[ukm]',
			username='$_POST[username]',
			periode=$_POST[periode],
			tanggal='$_POST[tanggal]',
			jumlah=$_POST[jumlah],
			keperluan=$_POST[keperluan],
			keterangan='$_POST[keterangan]' where id=$_POST[id]");



		echo "<script>window.alert('Transaksi diperbarui');
		window.location=('modul.php?isi=laporan-tabel')</script>";

		if (!empty($_FILES["fileToUpload"]["name"])) {
			$loc="img/nota/";
			$target_dir="../".$loc;
			$gbrlama=hasil("SELECT nota from transaksi where id = $_POST[id]");
			$files=$_FILES;

			$upload=uploadFile($files, $target_dir, $loc);

			if ($upload['status']==1) {
				mysql_query("
					UPDATE transaksi set 
					nota = '$upload[nama]'
					where id = $_POST[id]
					");
			}			

			unlink("../$gbrlama");
		}	
			
	} // edit transaksi

	if ($_GET['act']=='hapus_transaksi') {
		$nota=hasil("SELECT nota from transaksi where id = $_GET[id]");
		mysql_query("
			DELETE from transaksi where id = $_GET[id]
		");	
		unlink("../$nota");
		echo "<script>window.alert('Transaksi dihapus');
		window.location=('modul.php?isi=laporan-tabel')</script>";
	}	

} // Pref admin

// akttifkan atau matikan mobile view
	if ($_GET['act']=='toggle') {
		if (isset($_POST['toggle'])) {
			$name='mobileview';
			if ($_POST['toggle']=='true') {
				$val='on';
			} else{
				$val='off';
			}
			setcookie($name, $val, time() + (86400 * 30), "/");
			echo "success";
		}
	}

	if ($_GET['act']=='tambah_kegiatan') {
		$loc="img/kegiatan/";
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
				window.location=('modul.php?isi=kegiatan-tabel')</script>";	
		}
	} // tambah kegiatan


	if ($_GET['act']=='edit_kegiatan') {
		mysql_query("UPDATE kegiatan set
			judul='$_POST[judul]',
			keterangan='$_POST[keterangan]',
			tanggal='$_POST[tanggal]' 
			where id=$_POST[id]");

		if (!empty($_FILES["fileToUpload"]["name"])) {
			$loc="img/kegiatan/";
			$target_dir="../".$loc;
			$gbrlama=hasil("SELECT gambar from kegiatan where id = $_POST[id]");
			$files=$_FILES;

			$upload=uploadFile($files, $target_dir, $loc);

			if ($upload['status']==1) {
				mysql_query("
					UPDATE kegiatan set 
					gambar = '$upload[nama]'
					where id = $_POST[id]
					");
			}			

			unlink("../$gbrlama");
		}

		echo "<script>window.alert('Edit Kegiatan berhasil');
			window.location=('modul.php?isi=kegiatan-tabel')</script>";	
	} // edit kegiatan

	if ($_GET['act']=='hapus_kegiatan') {
		$gambar=hasil("SELECT gambar from kegiatan where id = $_GET[id]");
		mysql_query("
			DELETE from kegiatan
			where id = $_GET[id]
			");
		unlink("../$gambar")	;
		echo "<script>window.alert('Hapus Kegiatan berhasil');
			window.location=('modul.php?isi=kegiatan-tabel')</script>";	
	}

	if ($_GET['act']=='tambah_divisi') {
		mysql_query("INSERT INTO divisi(jabatan, nama, line, email, jadwal)
					VALUES(
					'$_POST[jabatan]',
					'$_POST[nama]',
					'$_POST[line]',
					'$_POST[email]',
					'$_POST[jadwal]')");
		echo "<script>window.alert('Tambah Pengurus berhasil');
				window.location=('modul.php?isi=pengurus')</script>";	
	}

	if ($_GET['act']=='edit_p_inti') {

		if (!empty($_FILES['fileToUpload']['name'])) {
			$loc="img/foto/";
			$target_dir="../".$loc;
			$gbrlama=hasil("SELECT foto from pengurus where id = $_POST[id]");
			$files=$_FILES;

			$upload=uploadFile($files, $target_dir, $loc);

			if ($upload['status']==1) {
				mysql_query("
					UPDATE pengurus set 
					foto = '$upload[nama]'
					where id = $_POST[id]
					");
			}			

			unlink("../$gbrlama");
		}

		mysql_query("
			UPDATE pengurus	set 
			nama = '$_POST[nama]',
			line =  '$_POST[line]',
			email =  '$_POST[email]'
			where id = $_POST[id]
			");

		echo "<script>window.alert('edit Pengurus berhasil');
				window.location=('modul.php?isi=pengurus')</script>";
	}

	if ($_GET['act']=='edit_divisi') {
		mysql_query("
			UPDATE divisi set 
			jabatan = '$_POST[jabatan]',
			nama = '$_POST[nama]',
			line =  '$_POST[line]',
			jadwal =  '$_POST[jadwal]',
			email =  '$_POST[email]'
			where id = $_POST[id]
			");

		echo "<script>window.alert('edit Pengurus berhasil');
				window.location=('modul.php?isi=pengurus')</script>";
	}
?>