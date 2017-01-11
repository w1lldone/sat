<div class="row" >
	<div class="col-lg-5" style="margin-top: 20px">
		<h3 class="light">Transaksi Terakhir</h3>
		<div class="card ">
			<div class="card-content">
				<ul class="collection">
				<?php
				$sql="SELECT * from transaksi order by tanggal desc limit 5";
				$q=mysql_query($sql) or die(mysql_error());
				while ($row=mysql_fetch_array($q)){
					$ukm=hasil("SELECT nama from ukm where id = $row[ukm]");
					$keperluan=hasil("SELECT keperluan from keperluan where id = $row[keperluan]");
				?>
				    <li class="collection-item avatar">
				      <a href="#"><i class="material-icons circle teal">shopping_basket</i></a> 
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
			    <?php } ?> 
			    <!-- fecth array -->
				</ul>
				</div>
				<div class="card-action text-center teal">
					<a href="modul.php?isi=laporan-tabel" class="white-text">More</a>
				</div>
			</div>			
		</div>
		<div class="col-lg-4" style="margin-top: 20px">
			<h3 class="light">Serapan Dana</h3>
			<?php
				$sql="SELECT * from ukm";
				$q=mysql_query($sql) or die(mysql_error());
				while ($row=mysql_fetch_array($q)){
					$periode=hasil("SELECT max(periode) from transaksi");
					$ang=hasil("SELECT anggaran from anggaran where ukm = $row[id] and periode = $periode");
					$pengel=hasil("SELECT sum(jumlah) from transaksi where ukm = $row[id] and periode = $periode");
					$persen=round($pengel/$ang*100);
				?>
			<div class="card-panel">
				<span class="lead "><?php echo $row['nama']; ?></span>
				<span class="lead pull-right"><?php echo $persen; ?>%</span>
				<div class="progress active" style="margin-bottom: 0px">
                    <div class="progress-bar progress-bar-success light-blue lighten-1" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $persen; ?>%">
                    </div>
                </div>
			</div>
			<div class="card-panel" style="margin-top: -1rem; padding: 10px;">
			<a title="Tambah User" href="modul.php?isi=user-tambah" class="btn btn-circle"><i class="fa fa-plus fa-small"></i></a>
			<?php
				$sql2="SELECT * from user where ukm = $row[id]";
				$q2=mysql_query($sql2) or die(mysql_error());
				while ($row2=mysql_fetch_array($q2)){ ?>
				<div class="chip" title="Penanggung Jawab">
				    <i class="fa fa-user"></i> 
				    <?php echo $row2['nama']; ?>
				</div>
				<?php } // fetch user row ?>
			</div>
			<?php } //fetch row ukm ?>
			<!-- card panel -->
		</div>
		<div class="col-lg-3" style="margin-top: 20px">
			<h3 class="light">Bantuan</h3>
			<ul class="collapsible" data-collapsible="accordion">
			<li>
		      <div class="collapsible-header"><i class="fa fa-tablet"></i>Mobile View</div>
		      <div class="collapsible-body"><p class="text-justify">Jika anda menggunakan Smartphone/Tablet aktifkan Mobile view untuk <strong class="teal-text"> meringkas tampilan</strong>. Tombol Mobile view berada di bagian bawah menu utama</p></div>
		    </li>
		    <li>
		      <div class="collapsible-header"><i class="fa fa-dollar"></i>UKM/Budget</div>
		      <div class="collapsible-body"><p class="text-justify">Bagian UKM/Budget berfungsi untuk <strong style="color: #009688">menambah anggaran UKM atau kegiatan</strong>  lain, seperti porsenigama. <br>
		      Setiap UKM/Budget memiliki minimal satu user penanggung jawab yang dapat dibuat pada bagian User. <br>
		      Periode UKM/Budget ditambah setiap <strong style="color: #009688"> dilakukan pengajuan dana.</strong> Periode lama dapat dihapus</p></div>
		    </li>
		    <li>
		      <div class="collapsible-header"><i class="fa fa-user"></i>User</div>
		      <div class="collapsible-body"><p>User adalah <strong style="color: #009688">penanggung jawab atas penggunaan dana</strong> dari masing-masing UKM. User dapat login dan memasukkan laporan penggunaan dana. Admin dapat membuat  <strong style="color: #009688">user penanggung jawab UKM maupun user Administrator</strong> SISAT</p></div>
		    </li>
		    <li>
		      <div class="collapsible-header"><i class="fa fa-shopping-cart"></i>Laporan</div>
		      <div class="collapsible-body"><p>Semua transaksi penggunaan dana UKM ditampilkan di bagian Laporan. Admin dapat menyeleksi transaksi berdasar <strong style="color: #009688">UKM, Keperluan, dan Periode</strong>. Laporan dapat <strong style="color: #009688">diekspor menjadi file Excel.</strong></p></div>
		    </li>
		  </ul>
		</div>
	
	</div>
