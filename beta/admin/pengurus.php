<div class="row" >
	<div class="col-lg-12" style="margin-top: 20px">
		<h3 class="light">Pengurus Inti</h3>
	</div>
</div>
<div class="row">
<?php 
$sql="SELECT * from pengurus";
$q=mysql_query($sql) or die(mysql_error());
while ($row=mysql_fetch_array($q)) {
?>
	<div class="col-lg-4">
		<div class="card">
			<div class="card-content">
				<span class="card-title"><?php echo $row['jabatan']; ?></span>
				<button class="btn-floating teal white-text pull-right" onclick="EnableForm2(<?php echo "'field$row[id]', 'butt$row[id]'" ?>)"><i class="fa fa-pencil"></i></button>
				<form action="save.php?act=edit_p_inti" method="POST" enctype="multipart/form-data">
					<fieldset id="field<?php echo $row['id']; ?>" disabled>
						<div class="form-group input-group">
							<img width="200" src="../<?php echo $row['foto'];?>">
							<p>rekomendasi Ukuran : 300 x 300</p>
							<input type="file" name="fileToUpload" id="fileToUpload">
						</div>
						<div class="form-group input-group">
					      <div class="input-group-addon"><i class="fa fa-user"></i></div>
					      <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
					    </div>
					    <div class="form-group input-group">
					      <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
					      <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
					    </div>
					    <div class="form-group input-group">
					      <div class="input-group-addon"><i class="fa fa-wechat"></i></div>
					      <input type="text" class="form-control" name="line" value="<?php echo $row['line']; ?>">
					    </div>
					    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
					</fieldset>
				
			</div>
			<div class="card-action text-center teal">
				<button style="opacity: 0;" id="butt<?php echo $row['id']; ?>" type="submit" class="btn light-blue white-text">Submit</button>
				</form>				
			</div>
		</div>			
	</div>
<?php } ?>
</div>
<div class="row">
	<div class="col-lg-4">
		<h3 class="light">Divisi</h3>
	</div>
</div>
<div class="row">
	<?php 
		$sql="SELECT * from divisi order by jabatan asc";
		$q=mysql_query($sql) or die(mysql_error());
		while ($row=mysql_fetch_array($q)) {?>
			<div class="col-lg-4">
				<div class="card ">
					<div class="card-content">
						<form action="save.php?act=edit_divisi" method="POST">
							<fieldset id="field<?php echo $row['id']; ?>" disabled="">
								<div class="form-group input-group" id="jabatan">
							      <div class="input-group-addon"><i class="fa fa-dribbble"></i></div>
							      <input type="text" class="form-control" name="jabatan" value="<?php echo $row['jabatan']; ?>">
							    </div>
								<div class="form-group input-group">
							      <div class="input-group-addon"><i class="fa fa-user"></i></div>
							      <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
							    </div>
							    <div class="form-group input-group">
							      <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
							      <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
							    </div>
							    <div class="form-group input-group">
							      <div class="input-group-addon"><i class="fa fa-wechat"></i></div>
							      <input type="text" class="form-control" name="line" value="<?php echo $row['line']; ?>">
							    </div>
							    <label>Jadwal Latihan</label>
		                        <div class="form-group">
		                            <textarea class="form-control" name="jadwal" rows="3"><?php echo $row['jadwal']; ?></textarea>
		                        </div>
		                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
		                        <button style="opacity: 0;" id="butt<?php echo $row['id']; ?>" type="submit" class="btn teal white-text">Save</button>
							</fieldset>
						</form>
					</div>
					<div class="card-action text-center teal">
						<button class="btn white teal-text" onclick="EnableForm2(<?php echo "'field$row[id]', 'butt$row[id]'" ?>)">Edit</button>
					</div>
				</div>		
			</div>
	<?php }
	?>
</div>

<div class="fixed-action-btn" style="bottom: 20px; right: 24px;">
    <a href="modul.php?isi=pengurus-tambah" class="btn-floating btn-large teal" title="Tambah Kepengurusan UKM">
      <i class="fa fa-plus"></i>
    </a>
</div>
