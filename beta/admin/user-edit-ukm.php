<?php 
    if ($_SESSION['pref']=='ukm') {
        $nama=hasil("SELECT nama from user where username = '$username'");
        $namaukm=hasil("SELECT nama from ukm where id = $sukm");
?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <h1 class="page-header" style="color: black">Edit User</h1>
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
                        <form method="post" role="form" action="save.php?act=edit_user" enctype="multipart/form-data">
                            <label>Nama</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <input type="text" class="form-control" name="nama" required value="<?php echo $nama; ?>">
                                <input type="hidden" name="usern" value="<?php echo $username; ?>">
                            </div>
                            <label>Username</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="username" value="<?php echo $username; ?>" name="username" onchange="checkAvailability()">    
                            </div>

                            <div id="CekUsername"></div>    

                            <label>Password Baru</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password1" id="password1" placeholder="Kosongkan jika tidak mengganti password">
                            </div>
                            <label>Ulangi Password</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" name="password2" id="password2" onchange="cekpassword();" placeholder="Kosongkan jika tidak mengganti password">
                            </div>

                            <div id="cekpassword"></div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Kewenangan</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                                        <select class="form-control" name="kewenangan">
                                        <option value="ukm">UKM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>UKM</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                                        <select class="form-control" name="ukm">
                                            <?php
                                            echo "<option value='$sukm'>$namaukm</option>";   
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
<?php } ?>