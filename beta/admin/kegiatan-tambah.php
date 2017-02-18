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
                        <form method="post" role="form" action="save.php?act=tambah_kegiatan" enctype="multipart/form-data">
                            <label>Judul</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                <input type="text" class="form-control" name="judul">
                            </div>
                            <label class="control-label" for="date">Tanggal Input</label>
                            <div class="form-group input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input value="<?php echo date("Y-m-d"); ?>" class="form-control" id="date" name="tanggal" placeholder="Tahun-Bulan-Tanggal" type="text" required/>
                            </div>
                            <label>Keterangan</label>
                            <div class="form-group">
                                <textarea class="form-control" name="keterangan" rows="3"></textarea>
                            </div>
                            <label>Gambar</label>
                            <div class="form-group input-group">
                                <input type="file" name="fileToUpload" id="fileToUpload" required>
                            </div>
                            <label>Link</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-link"></i></span>
                                <input type="text" placeholder="Kosongkan jika tidak ada link" class="form-control" name="link">
                            </div>
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