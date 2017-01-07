<?php
    $sql="select * from pengurus";
    $q=mysql_query($sql) or die(mysql_error());
    while ($row=mysql_fetch_array($q)){
?>
<div class="modal fade" id="<?php echo $row[panggilan]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title" id="myModalLabel"><span class="fa fa-user"></span> More About <?php echo $row['panggilan']; ?></h4>
            </div>
            <div class="modal-body">
                <center>
                    <img src="img/ph/ajek.jpg" name="aboutme" width="140" height="140" border="0" class="img-circle"></img>
                    <h3 class="media-heading" style="margin-top: 20px;"><?php echo $row['nama']; ?></h3>
                    <div class="row">
                        <div class="col-lg-4 col-xs-4">
                            <i class="fa fa-3x fa-gift"></i>
                            <br> 
                            <span class="label label-warning" style="margin-top: 10px;"><?php echo $row['tgl_lahir']; ?></span>
                        </div>
                        <div class="col-lg-4 col-xs-4">
                            <i class="fa fa-3x fa-home"></i>
                            <br> 
                            <span class="label label-info" style="margin-top: 10px;"><?php echo $row['alamat']; ?></span>
                        </div>
                        <div class="col-lg-4 col-xs-4">
                            <i class="fa fa-3x fa-briefcase"></i>
                            <br> 
                            <span class="label label-success" style="margin-top: 10px;">TIP <?php echo $row['angkatan']; ?></span>
                        </div>
                    </div>
                </center>
                <hr>
                <center>
                    <p class="text-left"><strong>Motto: </strong><br>
                        <?php echo $row['motto']; ?></p>
                        <br>
                    </center>
                </div>
                <div class="modal-footer">
                    <div class="row text-center">
                        <div class="col-lg-4 col-xs-4">
                            <a href="<?php echo $row[fb]; ?>" target="blank"><i class="fa fa-facebook fa-2x"></i></a>
                        </div>
                        <div class="col-lg-4 col-xs-4">
                            <a href="<?php echo $row[twt]; ?>" target="blank"><i class="fa fa-twitter fa-2x"></i></a>
                        </div>
                        <div class="col-lg-4 col-xs-4">
                            <a href="<?php echo $row[ig]; ?>" target="blank"><i class="fa fa-instagram fa-2x"></i></a>
                        </div>
                        <div class="row">
                            <center><button class="btn btn-default" data-dismiss="modal" style="margin-top: 20px">Close</button></center>
                        </div>
                    </div>
                </div>
            </div>
            <!--modal body -->
        </div>
        <!--modal content -->
    </div>
    <!-- modal dialog -->
</div>
<!--modal-->
<?php } ?>


