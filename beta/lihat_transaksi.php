<?php
include 'config.php';
include 'data.php';

if(!empty($_POST["id"])) {
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

}
?>