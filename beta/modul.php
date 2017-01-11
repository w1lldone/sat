<?php
	include 'cekadmin.php'; 

	if ($_SESSION['pref']=='admin') {

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>SAT - Sport of Agriculture Technology</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>

    <link href="../css/icon.css" rel="stylesheet">

    <!-- toggle button css -->
    <link href="../css/bootstrap-toggle.min.css" rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="../bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="../img/logo/logo-sat-kotak.png"/>

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Icons Font -->
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body onpageshow="mengisiCard()">
<?php
    $level="";
    if(!empty($_SESSION['nama'])){
        $level=$_SESSION['pref'];
        $ukm=$_SESSION['ukm'];
        $username=$_SESSION['username'];
    }
    if($level=='admin'){ ?>           
	<nav class="navbar navbar-default navbar-static-top z-depth-1" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand teal-text" href="modul.php?isi=admin-home">Admin SAT</a>
		</div>
		<!-- /.navbar-header -->

		<ul class="nav navbar-top-links navbar-right">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="modul.php?isi=user-edit&username=<?php echo $username; ?>"><i class="fa fa-gear fa-fw"></i> Akun</a>
					</li>
					<li class="divider"></li>
					<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
					</li>
				</ul>
				<!-- /.dropdown-user -->
			</li>
			<!-- /.dropdown -->
		</ul>
		<!-- /.navbar-top-links -->

		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					<li class="sidebar-search">
						<div class="input-group custom-search-form">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
								<button class="btn btn-default z-depth-0" type="button">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
						<!-- /input-group -->
					</li>
					<li>
                        <a href="modul.php?isi=admin-home"><i class="fa fa-home fa-fw"></i> Home</a>
                    </li> 
                    <li>
						<a href="modul.php?isi=ukm-tabel"><i class="fa fa-usd fa-fw"></i> UKM/Budget</a>
					</li>                       
					<li>
						<a href="modul.php?isi=user-tabel"><i class="fa fa-user fa-fw"></i> User</a>
					</li> 
					<li>
						<a href="modul.php?isi=laporan-tabel"><i class="fa fa-shopping-cart fa-fw"></i> Laporan</a>
					</li>
                    <div class="sidebar-search">
                        <form action="toggle.php" method="POST">
                            <div class="input-group">
                                <input id="mobToggle" name="toggle" type="checkbox" checked data-toggle="toggle" data-size="small" data-on="Mobile View On" data-off="Mobile View Off" data-width="150">
                            </div>
                        </form>
                        <div id="cek"></div>
                    </div>                        
				</ul>
			</div>
			<!-- /.sidebar-collapse -->
		</div>
		<!-- /.navbar-static-side -->
	</nav>
	<?php } //if privilage tpi
	// else if($level=='admin'){ 
	?>

    <div id="page-wrapper" style="background-color: #f8f8f8">
        <?php
        include 'config.php'; 
        include 'data.php';
        include "isi.php";  ?>
    </div>

    <!-- modal lihat transaksi -->
    <div class="modal fade" id="ModalLap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Lihat Transaksi</h4>
            </div>
            <div class="modal-body" id="isiModal">

            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bootstrap-assets/js/bootstrap.min.js"></script>

    <!-- Import materialize -->
    <script type="text/javascript" src="../js/materialize.min.js"></script>

    <!-- Button tables js -->
    <script src="../js/bootstrap-toggle.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
     <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <!-- DataTables JavaScript -->
    <script src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="../js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap-datepicker3.css"/>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <!-- set data toggle on/off -->
    <script>
        $(document).ready(function() {
            <?php
            if (isset($_COOKIE['mobileview'])) {
                if ($_COOKIE['mobileview']=="on") {
                    echo "$('#mobToggle').bootstrapToggle('on');";
                } else {
                    echo "$('#mobToggle').bootstrapToggle('off');";
                }
            } else{
                echo "$('#mobToggle').bootstrapToggle('off');";
            }
            ?>
        })
    </script>

	<script>
	    $(document).ready(function() {
	        $('#dataTables-example').DataTable({
	            responsive: true,
                "order":[[0, "desc"]]
	        });
	    });
	</script>

	<!-- Date picker -->
    <script>
        $(document).ready(function(){
        var date_input=$('input[name="tanggal"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        };
        date_input.datepicker(options);
        })  
    </script> 

    <!-- cek username -->
    <script>
    function checkAvailability() {
        $.ajax({
        url: "urlajax.php?act=cek-user",
        data:'username='+$("#username").val(),
        type: "POST",
        success:function(data){
            $("#CekUsername").html(data);
        },
        error:function (){}
        });
    }
    </script>

    <!-- isi tabel -->
    <script>
    function mengisiCard() {
        $.ajax({
        url: "urlajax.php?act=isi-tabel",
        data:"periode="+ $("#periode").val() +"&ukm="+ $("#ukm").val() + "&keperluan="+ $("#keperluan").val(),
        type: "POST",
        success:function(data){
            $("#isiCard").html(data);
        },
        error:function (){}
        });
    }
    </script>

    <!-- Lihat transaksi -->
    <script>
    function lihatTransaksi(id) {
        $.ajax({
        url: "urlajax.php?act=lihat-trans",
        data:'id='+id,
        type: "POST",
        success:function(data){
            $("#isiModal").html(data);
        },
        error:function (){}
        });
    }
    </script>

    <!-- cek password -->
    <script>
        function cekpassword(){
            var password = $("#password1").val();
            var confirmPass = $("#password2").val();

            if (password != confirmPass)
                $("#cekpassword").html("<div class='alert alert-danger'>Password tidak cocok!</div>");
            else
                $("#cekpassword").html("<div class='alert alert-success'>Password cocok!</div>");
        }
        $(document).ready(function () {
            $("#password1, #password2").keyup(cekpassword);
        });        
    </script>

    <script>
      $(function() {
        $('#mobToggle').change(function() {
            $.ajax({
                url: "save.php?act=toggle",
                data:'toggle='+$(this).prop('checked'),
                type: "POST",
                success:function(){
                    location.reload();
                },
                error:function (){
                }
            });
        });
      })
    </script>
</body>

</html>

<?php } ?>