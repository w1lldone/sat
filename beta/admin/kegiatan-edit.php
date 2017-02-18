<?php
    $sql="SELECT * from kegiatan where id = $_GET[id]";
    $q=mysql_query($sql) or die(mysql_error());
    $row=mysql_fetch_array($q);
?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <h1 class="page-header" style="color: black">Tambah Dokumentasi kegiatan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Kegiatan
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" role="form" action="save.php?act=edit_kegiatan" enctype="multipart/form-data">
                            <label>Judul</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                <input type="text" class="form-control" name="judul" value="<?php echo $row['judul']; ?>">
                            </div>
                            <label class="control-label" for="date">Tanggal Input</label>
                            <div class="form-group input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input class="form-control" id="date" name="tanggal" placeholder="Tahun-Bulan-Tanggal" type="text" required value="<?php echo $row['tanggal']; ?>"/>
                            </div>
                            <label>Keterangan</label>
                            <div class="form-group">
                                <textarea class="form-control" name="keterangan" rows="3"><?php echo $row['keterangan']; ?></textarea>
                            </div>
                            <label>Gambar</label>
                            <div class="form-group input-group">
                                <img width="300" src="../<?php echo $row['gambar'];?>">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                            <label>Link</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                <input type="text" value="<?php echo $row['link']; ?>" placeholder="Kosongkan jika tidak ada link" class="form-control" name="link">
                            </div>
                            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                            <button class="btn btn-success" type="submit">Submit</button>                         
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
            <!-- /.row -->