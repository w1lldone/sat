<div class="row">
	<div class="col-lg-5 col-lg-offset-3" style="margin-top: 20px">
		<div class="card ">
			<div class="card-content">
				<span class="card-title">Daftar User SAT</span>
				<ul class="collection">
					<?php
					$sql="SELECT * from user where privilage <> 'admin'";
					$q=mysql_query($sql) or die(mysql_error());
					while ($row=mysql_fetch_array($q)){
						$ukm=hasil("SELECT nama from ukm where id = $row[ukm]");
						?>
						<li class="collection-item avatar">
							<a href="#"><i class="fa fa-user circle teal"></i></a> 
							<span class="title">
								<?php echo $row['nama']; ?>
							</span>
							<?php 
							echo "<p>Username : </i> $row[username] <br>UKM : </i> $ukm </p>";
							?>
							<a href="#!" type="button" class="secondary-content dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true"><i class="fa fa-ellipsis-v fa-2x"></i></a>
							<ul class="dropdown-menu pull-right" style="top: 10px;">
								<li><a href="modul.php?isi=user-edit&username=<?php echo $row['username']; ?>">Edit</a></li>
								<li><a href="save.php?act=hapus_user&username=<?php echo $row['username']; ?> " onclick="return confirm('Anda Yakin?')">Hapus</a></li>
							</ul>
						</li>
						<?php } ?> 
						<!-- fecth array -->
					</ul>
				</div>
				<div class="card-action text-center teal">
					<a href="modul.php?isi=user-tambah" class="btn btn-circle white"><i class="fa fa-plus teal-text"></i> </a>
				</div>
			</div>			
		</div>
	</div>
	
	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Tambah Periode</h4>
            </div>
            <div class="modal-body">
            <form method="post" role="form" action="save.php?act=tambah_periode">
                    <div class="form-group input-group">
                        <span class="input-group-addon">Tahun</span>                                
                        <input class="form-control" placeholder="Contoh : 2016" type="text" name="periode">
                        <span class="input-group-btn">
                    </span>
                </div>
           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                 </form> 
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Fixed action button -->
<div class="fixed-action-btn" style="bottom: 20px; right: 2%;">
    <a href="modul.php?isi=user-tambah" class="btn-floating btn-large teal" title="Tambah Transaksi">
      <i class="fa fa-plus"></i>
  </a>
</div>