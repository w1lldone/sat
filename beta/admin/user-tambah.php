<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <h1 class="page-header" style="color: black">Tambah User</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data User
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" role="form" action="save.php?act=tambah_user" enctype="multipart/form-data">
                            <label>Nama</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <label>Username</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="username" class="form-control" id="username" name="username" onBlur="checkAvailability()">    
                            </div>

                            <div id="CekUsername"></div>    

                            <label>Masukkan Password</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password1" id="password1" required>
                            </div>
                            <label>Ulangi Password</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password2" id="password2" onchange="cekpassword();" required>
                            </div>

                            <div id="cekpassword"></div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Kewenangan</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                                        <select class="form-control" name="kewenangan">
                                            <option value="ukm">Divisi</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Divisi (Kosongkan jika admin)</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                                        <select class="form-control" name="ukm">
                                            <option value="0"></option>
                                            <?php
                                                $sql2="SELECT * FROM ukm order by nama asc";
                                                $q2=mysql_query($sql2) or die(mysql_error());
                                                while ($row2=mysql_fetch_array($q2)){
                                                    echo "<option value='$row2[id]'>$row2[nama]</option>";
                                                }    
                                            ?>
                                        </select>
                                    </div>
                                </div>
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