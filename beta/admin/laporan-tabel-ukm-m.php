<div class="row" >
	<div class="col-lg-5 col-lg-offset-3" style="margin-top: 20px">
		<h3 class="light">Laporan Transaksi</h3>
		<div class="card ">
			<div class="card-content">
                <form method="post" role="form" action="modul.php?isi=laporan-tabel">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>                                
                        <select class="form-control" name="periode" id="periode" onclick="mengisiCard()">
                            <?php
                            $sql2="SELECT DISTINCT periode FROM anggaran order by periode desc";
                            $q2=mysql_query($sql2) or die(mysql_error());
                            while ($row2=mysql_fetch_array($q2)){
                                echo "<option value='=$row2[periode]'>$row2[periode]</option>";
                            }    
                            ?>
                        </select>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-dribbble"></i> </span>                                
                        <select class="form-control" name="ukm" id="ukm" onclick="mengisiCard()">
                            <?php
                            $nama=hasil("SELECT nama from ukm where id = $sukm");
                            echo "<option value='=$sukm'>$nama</option>";
                            ?>
                        </select>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-shopping-cart"></i> </span> 
                        <select class="form-control" name="keperluan" id="keperluan" onclick="mengisiCard()">
                            <?php
                            $sql2="SELECT * from keperluan";
                            $q2=mysql_query($sql2) or die(mysql_error());
                            echo "<option value=''>All</option>";
                            while ($row2=mysql_fetch_array($q2)){
                                echo "<option value='=$row2[id]'>$row2[keperluan]</option>";
                            }    
                            ?>
                        </select>
                    </div>
                    <a class="btn yellow darken-4 waves-effect waves-light" href="modul.php?isi=laporan-tabel" title="Reset"><i class="fa fa-repeat"></i></a> 
                </form> 
            </div>
        </div>
        <div class="alert alert-info alert-dismissable" style="margin-bottom: 0px">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            Untuk Mengekspor Tabel menjadi <strong>Excel,</strong>  matikan mobile view
        </div>
        <div class="card ">
            <div class="card-content">
                <ul class="collection" id="isiCard">
                    
                </ul>
            </div>
            <div class="card-action text-center teal">
               <a href="modul.php?isi=transaksi-tambah" class="btn btn-circle white"><i class="fa fa-plus teal-text"></i> </a>
           </div>
       </div>			
   </div>
</div>

<div class="fixed-action-btn" style="bottom: 20px; right: 2%;">
    <a href="modul.php?isi=transaksi-tambah" class="btn-floating btn-large teal" title="Tambah Transaksi">
      <i class="fa fa-plus"></i>
  </a>
</div>