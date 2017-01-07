<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <h1 class="page-header" style="color: black">Tambah Transaksi</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data Transaksi
            </div>
            <div class="panel-body">
                <div class="row">
                    <form method="post" role="form" action="save.php?act=tambah_transaksi" enctype="multipart/form-data">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Periode</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>                   
                                        <select class="form-control" name="periode">
                                            <?php
                                            $sql2="SELECT DISTINCT periode FROM anggaran order by periode desc";
                                            $q2=mysql_query($sql2) or die(mysql_error());
                                            while ($row2=mysql_fetch_array($q2)){
                                                echo "<option value='$row2[periode]'>$row2[periode]</option>";
                                            }    
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label" for="date">Tanggal</label>
                                    <div class="form-group input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input class="form-control" id="date" name="tanggal" placeholder="Tahun-Bulan-Tanggal" type="text" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>UKM</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                                        <select class="form-control" name="ukm">
                                            <?php
                                            $sql2="SELECT * FROM ukm";
                                            $q2=mysql_query($sql2) or die(mysql_error());
                                            while ($row2=mysql_fetch_array($q2)){
                                                echo "<option value='$row2[id]'>$row2[nama]</option>";
                                            }    
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Jumlah</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control" placeholder="Nominal Pengeluaran" name="jumlah" required>
                                    </div>
                                </div>
                            </div>
                            <label>Keperluan</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-shopping-cart"></i></span>
                                <select class="form-control" name="keperluan">
                                    <?php
                                    $sql2="SELECT * FROM keperluan";
                                    $q2=mysql_query($sql2) or die(mysql_error());
                                    while ($row2=mysql_fetch_array($q2)){
                                        echo "<option value='$row2[id]'>$row2[keperluan]</option>";
                                    }    
                                    ?>
                                </select>
                            </div>
                            <label>Upload Nota</label>
                            <div class="form-group input-group">
                                <input type="file" name="fileToUpload" id="fileToUpload" required>
                            </div>
                            <label>Keterangan</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-ellipsis-h"></i></span>
                                <input type="text" class="form-control" placeholder="Penjelasan keperluan" name="keterangan" on>
                            </div>
                            <input type="hidden" name="username" value="<?php echo $username; ?>">                        
                            <input type="submit" class="btn btn-success" value="Sumbit" name="submit">
                        </div> 

                    </form>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
            <!-- /.row -->