<?php
include 'config.php';
include 'data.php';

if(!empty($_POST["username"]) && $_GET['act']=='cek-user') {
	$query="SELECT * FROM user WHERE username = '$_POST[username]'";
	$qq=mysql_query($query) or die(mysql_error());
	$counts=mysql_num_rows($qq);		
	if ($counts!=0){
			// echo "berhasil";
			// echo "<span style='color: #d9534f'><i class='fa fa-times'></i></span>";
		echo "<div class='alert alert-danger'>Username tidak tersedia</div>";
	}else{
			// echo "gagal";
			// echo "<span style='color: #5cb85c'><i class='fa fa-check'></i></span>";
		echo "<div class='alert alert-success'>Username tersedia</div>";
	}

	} // cek username

	if(!empty($_POST["id"]) && $_GET['act']=='lihat-trans') {
		$query="SELECT * FROM transaksi WHERE id = $_POST[id]";
		$qq=mysql_query($query) or die(mysql_error());
		$counts=mysql_num_rows($qq);		
		if ($counts!=0){
			$row=mysql_fetch_array($qq);
			$ukm=hasil("SELECT nama from ukm where id = $row[ukm]");
			$keterangan=$row['keterangan'];
			$keperluan=hasil("SELECT keperluan from keperluan where id = $row[keperluan]");
			?>
			<div class="row">
				<form>
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-6">
								<label>Periode</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>                   
									<input type="text" class="form-control" name="peride" disabled value="<?php echo $row['periode']; ?>">
								</div>
							</div>
							<div class="col-lg-6">
								<label class="control-label" for="date">Tanggal</label>
								<div class="form-group input-group">
									<div class="input-group-addon">
										<i class="fa fa-calendar"></i>
									</div>
									<input class="form-control" id="date" name="tanggal" placeholder="Tahun-Bulan-Tanggal" type="text" value="<?php echo $row['tanggal']; ?>" disabled/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label>UKM</label>
								<div class="form-group input-group">
									<span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
									<input type="text" class="form-control" name="ukm" disabled value="<?php echo $ukm; ?>">
								</div>
							</div>
							<div class="col-lg-6">
								<label>Jumlah</label>
								<div class="form-group input-group">
									<span class="input-group-addon">Rp</span>
									<input type="text" class="form-control" placeholder="Nominal Pengeluaran" name="jumlah" value="<?php echo $row['jumlah']; ?>" disabled>
								</div>
							</div>
						</div>
						<label>Keperluan</label>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
							<select class="form-control" name="keperluan" disabled>
								<?php
								echo "<option value='$row[keperluan]'>$keperluan</option>";  
								?>
							</select>
						</div>
						<label>Nota</label>
						<img src="../<?php echo $row['nota']; ?>" name="aboutme" width="200" height="200" border="0" class="img-responsive"></img>
						<label>Keterangan</label>
						<div class="form-group input-group">
							<span class="input-group-addon"><i class="fa fa-ellipsis-h"></i></span>
							<input type="text" class="form-control" placeholder="Penjelasan keperluan" name="keterangan" value="<?php echo $keterangan ?>" disabled>
						</div>
					</div> 

				</form>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
	</div>
	<?php		
	}else{
		echo "gagal";
	}

	} // lihat trans

	if ($_GET['act']=='isi-tabel') {
		$periode=$_POST['periode'];
		$ukm=$_POST['ukm'];
		$keperluan=$_POST['keperluan'];
		$sql="SELECT * from transaksi where periode $periode and ukm $ukm and keperluan $keperluan";
	      $q=mysql_query($sql) or die(mysql_error());
	      while ($row=mysql_fetch_array($q)){
	        $ukm=hasil("SELECT nama from ukm where id = $row[ukm]");
	        $keperluan=hasil("SELECT keperluan from keperluan where id = $row[keperluan]");
	        ?>
			<li class="collection-item avatar">
		      <i class="circle teal" style="font-style: normal;"><?php echo substr($ukm, 0,1) ?></i> 
		      <span class="title">
			      <a href="#" onclick="<?php echo 'lihatTransaksi('.$row['id'].')'; ?>" data-toggle="modal" data-target="#ModalLap" ><?php echo $ukm; ?></a>
		      </span>
		      <?php 
		       echo "<p> Rp.$row[jumlah] - $keperluan <br> $row[tanggal] </p>";
		      ?>
		      <a href="#!" type="button" class="secondary-content dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-ellipsis-v fa-2x"></i></a>
			      <ul class="dropdown-menu pull-right" style="top: 10px;">
				    <li><a href="modul.php?isi=transaksi-edit&id=<?php echo $row['id']; ?>">Edit</a></li>
				    <li><a href="save.php?act=hapus_transaksi&id=<?php echo $row['id']; ?> " onclick="return confirm('Anda Yakin?')">Hapus</a></li>
				  </ul>
		    </li>
	<?php }
	}

	if ($_GET['act']=='mobileview') {
		$name="mobileview";
		if ($_POST['toggle']=='true') {
			$val="benar";
		} elseif ($_POST['toggle']=='false') {
			$val="salah";
		}
		setcookie($name, $val, time() + (86400 * 30), "/");
		echo $_COOKIE[$name];
	}
?>