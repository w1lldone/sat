<?php 
$periode=hasil('select max(periode) from anggaran');
if (isset($_POST['periode'])) {
      $periode=$_POST['periode'];
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar UKM/Budgeting SAT</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Anggaran UKM SAT Tahun : <?php echo $periode; ?></div>
            <!-- /.panel-heading -->

            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-4">
                        <form method="post" role="form" action="modul.php?isi=ukm-tabel">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>                                
                                <select class="form-control" name="periode" onchange="this.form.submit()">
                                    <?php
                                    $sql2="SELECT DISTINCT periode FROM anggaran WHERE periode <> $periode order by periode desc";
                                    $q2=mysql_query($sql2) or die(mysql_error());
                                    echo "<option value='$periode'>$periode</option>";
                                    while ($row2=mysql_fetch_array($q2)){
                                        echo "<option value='$row2[periode]'>$row2[periode]</option>";
                                    }    
                                    ?>
                                </select>
                                <span class="input-group-btn">
                                    <button class="btn btn-danger z-depth-0" type="submit" onclick="return confirm('Anda Yakin menghapus periode?')" formaction="save.php?act=hapus_periode&periode=<?php echo $periode; ?>"><i class="fa fa-times"></i>
                                    </button>
                                </span>
                            </div>
                            <noscript><input type="sumbit" value="submit"> </noscript>
                        </form> 
                    </div>
                    <div class="col-lg-8">
                    </div>    
                </div>
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Anggaran</th>
                                <th>Pengeluaran</th>
                                <th>Action</th>                                            
                            </tr>
                        </thead>
                        <tbody>
                          <?php                    
                          $sql="SELECT * from ukm";
                          $q=mysql_query($sql) or die(mysql_error());
                          while ($row=mysql_fetch_array($q)){
                            echo"<tr class='odd gradeX'>";
                            echo"<td>$row[nama]</td>";
                            $anggaran=hasil("SELECT anggaran from anggaran where ukm = $row[id] and periode = $periode");
                            $keluar=hasil("SELECT SUM(jumlah) from transaksi where ukm = $row[id] and periode = $periode");
                            echo"<td>Rp.".number_format($anggaran, 0 , ',', '.')."</td>";
                            echo"<td>Rp.".number_format($keluar, 0 , ',', '.')."</td>";
                            ?>
                            <!-- Split button --> 
                            <td class="text-center">
                                <a href="modul.php?isi=ukm-edit&id=<?php echo $row['id']; ?>&periode=<?php echo $periode; ?>">
                                    <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></button>
                                </a>
                                <a href="save.php?act=hapus_ukm&id=<?php echo $row['id']; ?> " onclick="return confirm('Anda Yakin?')">
                                    <button type="button" class="btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
                                </a>
                            </td> 
                            <?php } ?>
                        </tbody>
                    </table>
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
<div class="fixed-action-btn click-to-toggle" style="bottom: 35px; right: 24px;">
        <a class="btn-floating btn-large teal" title="Tambah">
          <i class="fa fa-plus"></i>
        </a>
        <ul style="list-style-type: none;">
          <li><a href="modul.php?isi=ukm-tambah" class="btn-floating green" title="Tambah UKM/Budget"><i class="fa fa-usd"></i></a></li>
          <li><a data-toggle="modal" data-target="#myModal" class="btn-floating blue" title="Tambah Periode"><i class="fa fa-calendar-o"></i></a></li>
        </ul>
</div>
