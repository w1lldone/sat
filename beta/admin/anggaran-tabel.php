<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Daftar Anggaran SAT</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="col-lg-4">
                    <form method="post" role="form" action="modul.php?isi=anggaran-tabel">
                        <div class="form-group input-group">
                            <span class="input-group-addon">Periode</span>                                
                            <select class="form-control" name="periode">
                                <option value="sumarji">2016</option>
                            </select>
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form> 
                </div>     
                <a href="ukm-tambah.php" target="_blank">
                    <button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i>  Tambah Periode</button>
                </a>
            </div>
            <!-- /.panel-heading -->
            
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <div class="row">
                                          
                    </div>    
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>UKM</th>
                                <th>Anggaran</th>
                                <th>Action</th>                                            
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          $sql="select * from ukm";
                          $q=mysql_query($sql) or die(mysql_error());
                          while ($row=mysql_fetch_array($q)){
                            echo"<tr class='odd gradeX'>";
                            echo"<td>$row[nama]</td>";
                            ?>
                            <!-- Split button --> 
                            <td class="text-center">
                            <a href="modul.php?isi=user-edit&id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-info">Edit</button></a>
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