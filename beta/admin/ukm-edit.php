<?php
$id=$_GET['id'];
$periode=$_GET['periode'];
$ukm=hasil("SELECT nama FROM ukm where id = $id");
$anggaran=hasil("SELECT anggaran FROM anggaran WHERE ukm = $id AND periode = $periode");
?>
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <h1 class="page-header" style="color: black">Edit Divisi/Budgeting</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Data UKM
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" role="form" action="save.php?act=edit_ukm" enctype="multipart/form-data">
                            <label>Nama Divisi/Budgeting</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                <input type="text" class="form-control" name="nama" value="<?php echo $ukm; ?>">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <label>Anggaran</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control" name="anggaran" value="<?php echo $anggaran; ?>">
                                    </div>
                                </div>
                                <div class="col-xs-6">    
                                    <label>Periode</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" disabled="true" class="form-control" name="tahun" value="<?php echo $periode; ?>">
                                        <input type="hidden" name="periode" value="<?php echo $periode; ?>">
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