<?php
    $periode=hasil("SELECT max(periode) from anggaran"); 
    $per='<>0';
    $uk='<>0';
    $kep='<>0';
    $sql="SELECT * from transaksi where periode = $periode";
    $ukm="";
if (!empty($_POST['periode'])) {
    $periode="$_POST[periode]";
    $per="<>$_POST[periode]";
    $keperluan="";
    if ($_POST['ukm']!='') {
        $ukm="=$_POST[ukm]";
        $uk="<>$_POST[ukm]";
    }
    if ($_POST['keperluan']!='') {
        $keperluan="=$_POST[keperluan]";
        $kep="<>$_POST[keperluan]";
    }
    $sql="SELECT * from transaksi where periode = $periode and ukm $ukm and keperluan $keperluan";
 }
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Laporan Penggunaan Dana SAT</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Transaksi UKM SAT Tahun : 
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    <form method="post" role="form" action="modul.php?isi=laporan-tabel">
                        <div class="col-lg-3">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i> </span>                                
                                <select class="form-control" name="periode" id="periode">
                                    <?php
                                    $sql2="SELECT DISTINCT periode FROM anggaran where periode $per order by periode desc";
                                    $q2=mysql_query($sql2) or die(mysql_error());
                                    if ($_POST['periode']!="") {
                                        echo "<option value='$_POST[periode]'>$_POST[periode]</option>";
                                    }
                                    while ($row2=mysql_fetch_array($q2)){
                                        echo "<option value='$row2[periode]'>$row2[periode]</option>";
                                    }    
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-dribbble"></i> </span>                                
                                <select class="form-control" name="ukm" id="ukm">
                                    <?php
                                    $sql2="SELECT * from ukm where id $uk order by nama";
                                    $q2=mysql_query($sql2) or die(mysql_error());
                                    if ($_POST['ukm']!="") {
                                        $val=hasil("SELECT nama from ukm where id = $_POST[ukm]");
                                        echo "<option value='$_POST[ukm]'>$val</option>";
                                    }
                                    echo "<option value=''>All</option>";
                                    while ($row2=mysql_fetch_array($q2)){
                                        echo "<option value='$row2[id]'>$row2[nama]</option>";
                                    }    
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-shopping-cart"></i> </span> 
                                <select class="form-control" name="keperluan" id="keperluan">
                                    <?php
                                    $sql2="SELECT * from keperluan where id $kep";
                                    $q2=mysql_query($sql2) or die(mysql_error());
                                    if ($_POST['keperluan']!="") {
                                        $val=hasil("SELECT keperluan from keperluan where id = $_POST[keperluan]");
                                        echo "<option value='$_POST[keperluan]'>$val</option>";
                                    }
                                    echo "<option value=''>All</option>";
                                    while ($row2=mysql_fetch_array($q2)){
                                        echo "<option value='$row2[id]'>$row2[keperluan]</option>";
                                    }    
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <button class="btn waves-effect waves-light" type="submit" name="action" title="Submit"><i class="fa fa-send"></i></button>
                            </form> 
                            <a class="btn yellow darken-4 waves-effect waves-light" href="modul.php?isi=laporan-tabel" title="Reset"><i class="fa fa-repeat"></i></a>
                        </div>    
                </div>      
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>UKM</th>
                                <th>Jumlah</th>
                                <th>Keperluan</th>
                                <th>Action</th>                                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                              $q=mysql_query($sql) or die(mysql_error());
                              while ($row=mysql_fetch_array($q)){
                                $namaukm=hasil("SELECT nama from ukm where id = $row[ukm]");
                                $keperluan=hasil("SELECT keperluan from keperluan where id = $row[keperluan]");
                                echo"<tr class='odd gradeX'>";
                                echo"<td>$row[tanggal]</td>";
                                echo"<td>$namaukm</td>";
                                echo"<td>Rp.".number_format($row['jumlah'], 0, ',', '.')."</td>";
                                echo"<td>$keperluan</td>";
                                ?>
                                <!-- Split button --> 
                                <td class="text-center">
                                    <a href="#" onclick="<?php echo 'lihatTransaksi('.$row['id'].')'; ?>">
                                        <button data-toggle="modal" data-target="#ModalLap" id="lihatLap" value="<?php echo $row['id']; ?>" title="lihat transaksi" type="button" class="btn btn-success btn-circle"><i class="fa fa-eye"></i></button>
                                    </a>
                                    <a href="modul.php?isi=transaksi-edit&id=<?php echo $row['id']; ?>">
                                        <button title="edit transaksi" type="button" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></button>
                                    </a>
                                    <a href="save.php?act=hapus_transaksi&id=<?php echo $row['id']; ?> " onclick="return confirm('Anda Yakin?')">
                                        <button title="hapus transaksi" type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                    </a>
                                </td> 
                        <?php } ?>
                        </tbody>
                    </table>
                    <form action="urlAjax.php?act=export-excel" method="POST">
                                <input type="hidden" name="periode" value="<?php echo $periode; ?>">
                                <input type="hidden" name="ukm" value="<?php echo $ukm; ?>">
                                <button class="btn blue waves-effect waves-light" type="submit"><i class="fa fa-file-excel-o" title="Export"></i> Ekspor Tabel</button>
                    </form>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<!-- fixed action button -->
<div class="fixed-action-btn" style="bottom: 20px; right: 2%;">
    <a href="modul.php?isi=transaksi-tambah" class="btn-floating btn-large teal" title="Tambah Transaksi">
      <i class="fa fa-plus"></i>
    </a>
</div>
