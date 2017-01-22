<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <h1 class="page-header" style="color: black">Tambah Kepengurusan UKM</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                UKM
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" role="form" action="save.php?act=tambah_divisi" enctype="multipart/form-data">
                            <label>Nama UKM</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                                <input type="text" class="form-control" name="jabatan">
                            </div>
                            <label>Nama Ketua</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <label>Kontak LINE</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-wechat"></i></span>
                                <input type="text" class="form-control" name="line">
                            </div>
                            <label>Email</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <label>Jadwal Latihan</label>
                            <div class="form-group">
                                <textarea class="form-control" name="jadwal" rows="3"></textarea>
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