<div class="row">
    <div class="col-lg-6 col-lg-offset-3">
        <h1 class="page-header" style="color: black">Tambah UKM/Budgeting</h1>
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
                        <form method="post" role="form" action="save.php?act=tambah_ukm" enctype="multipart/form-data">
                            <label>Nama UKM/Budgeting</label>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-group"></i></span>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-lg-6">
                                    <label>Anggaran</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">Rp</span>
                                        <input type="text" class="form-control" name="anggaran">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-lg-6">    
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