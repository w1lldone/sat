<?php
// data.php adalah kumpulan function yg sering dipanggil
	$hasil=null;
	function hasil($query){
		$qq=mysql_query($query) or die(mysql_error());
		$counts=mysql_num_rows($qq);		
		if ($counts!=0){
			$hasil=mysql_result($qq, 0);
			return $hasil;
		}
		
	}

	function uploadFile($files, $target_dir, $loc){
		$hasil=array();
		$target_file = $target_dir . basename($files["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	// Check if image file is a actual image or fake image
		$check = getimagesize($files["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$ket =  "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			$ket = "File is not an image.";
			$uploadOk = 0;
		}
	// Check if file already exists
		if (file_exists($target_file)) {
			$ket = "File sudah ada, mohon ganti nama file";
			$uploadOk = 0;
		}

	// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			$ket = "Hanya file gambar yg boleh diupload";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$hasil = array('status' => $uploadOk, 'ket' => $ket);
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($files["fileToUpload"]["tmp_name"], $target_file)) {
				$nama=basename( $files["fileToUpload"]["name"]);
				$hasil = array('status' => $uploadOk, 'nama' => "$loc"."$nama");
			} else {
				$hasil = array('status' => 0);
			}
		}
		return $hasil;
	} // end function
?>