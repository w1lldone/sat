<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar User SAT</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
            Tabel User
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Nama</th>
                                <th>UKM</th>
                                <th>Action</th>                                            
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql="select * from user where privilage <> 'admin'";
                          $q=mysql_query($sql) or die(mysql_error());
                          while ($row=mysql_fetch_array($q)){
                            $ukm=hasil("SELECT nama from ukm where id = $row[ukm]");
                            echo"<tr class='odd gradeX'>";
                            echo"<td>$row[username]</td>";
                            echo"<td>$row[nama]</td>";
                            echo"<td>$ukm</td>";
                            ?>
                            <!-- Split button --> 
                            <td class="text-center">    
                                <a href="modul.php?isi=user-edit&username=<?php echo $row['username']; ?>">
                                    <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-edit"></i></button>
                                </a>
                                <a href="save.php?act=hapus_user&username=<?php echo $row['username']; ?>">
                                    <button type="button" class="btn btn-danger btn-circle" onclick="return confirm('Anda Yakin akan menghapus user?')"><i class="fa fa-times"></i></button>
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

            <!-- Fixed action button -->
<div class="fixed-action-btn" style="bottom: 20px; right: 24px;">
    <a href="modul.php?isi=user-tambah" class="btn-floating btn-large teal" title="Tambah User">
      <i class="fa fa-plus"></i>
    </a>
</div>