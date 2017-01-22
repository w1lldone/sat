<?php 
  include 'beta/config.php';
  include 'beta/data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>SAT - Sports of Agriculture Technology</title>

  <!-- CSS  -->
  <link href="css/icon.css" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

      <!-- Icons Font -->
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

  <style type="text/css">
    .garis {
      border: 5px solid;
    }

    .fa-15 {
      font-size: 1.5em
    }
  </style>
</head>
<body class="grey lighten-4">

  <div class="navbar-fixed">
    <nav class="teal" role="navigation">
      <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo left">SAT</a>
        <!-- <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a> -->
        <ul class="right hide-on-small-only">
          <li><a href="#index-banner">Home</a></li>
          <li><a href="#divisi">Divisi</a></li>
          <li><a href="#kegiatan">Kegiatan</a></li>
          <li><a href="#laporan">Laporan</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
          <li><a href="index.php">Home</a></li>
          <li><a href="#divisi">Divisi</a></li>
          <li><a href="#kegiatan">Kegiatan</a></li>
          <li><a href="#laporan">Laporan</a></li>
        </ul>
        <ul class="right hide-on-med-and-up">
          <li><a href="#index-banner"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="#divisi"><i class="fa fa-dribbble fa-lg"></i></a></li>
          <li><a href="#kegiatan"><i class="fa fa-camera fa-lg"></i></a></li>
          <li><a href="#laporan"><i class="fa fa-shopping-cart fa-lg"></i></a></li>
        </ul>
      </div>
    </nav>
  </div>

    <div class="section scrollspy no-pad-bot" id="index-banner">
      <div class="container">
        <br><br>
        <h1 class="header center teal-text">Sports of Agriculture Technology</h1>
        <div class="row center">
         <img class="responsive-img" src="img/logo/logo-besar-sat.png">
         <h5 class="header col s12 light">Unit kegiatan yang menjadi wadah bagi mahasiswa Fakultas Teknologi Pertanian UGM untuk menyalurkan minat dan bakat dalam bidang olahraga</h5>
       </div>
       <div class="row center">
       <div class="col l2"></div>
       <?php 
        $sql="SELECT * from pengurus";
        $q=mysql_query($sql) or die(mysql_error());
        while ($row=mysql_fetch_array($q)) {
       ?>
        <div class="col l4 s12">
          <div class="card blue-grey darken-1 white-text">
            <div class="card-content">
              <div class="center">
                <img src="<?php echo $row['foto']; ?>" class="circle garis" width="150">
                <p><?php echo $row['jabatan']; ?></p>
                <h5><?php echo $row['nama']; ?></h5>
                <h6><?php echo $row['email']; ?></h6>
                <div style="margin-top: 20px">
                  <a title="Id Line" class="btn-floating white" onclick="copyToClipboard('<?php echo $row['line'] ?>')"><i class="material-icons light-blue-text">message</i></a>
                </div>
              </div>
            </div>
          </div>
          <!-- card -->
        </div>
        <!-- col l5 -->
      <?php } ?>
      </div>
      <!-- row -->
      <br><br>

    </div>
  </div>

  <div id="divisi" class="section scrollspy">
    <div class="parallax-container valign-wrapper" style="height: auto">
    <div class="container">
      <div class="row center">
        <div class="col s12 ">
          <h2 class="header white-text">Divisi SAT</h2>  
        </div>
      </div>
      <div class="row">
      <?php 
      $sql="SELECT * from divisi where id = 5";
      $q=mysql_query($sql) or die(mysql_error());
      $row=mysql_fetch_array($q);
      ?>
        <div class="col s12 m6 l3">
          <div class="card">
            <div class="card-content">
              <div class="center">
                <img class="responsive-img" src="img/sports/badminton.png" style="max-width: 50%">
                <h5 class="center"><?php echo $row['jabatan']; ?></h5>
                <p class="light center"><strong>Ketua</strong><br><?php echo $row['nama']; ?></p>
                <p class="light center"><strong>Jadwal</strong><br><?php echo $row['jadwal']; ?></p>
                <div class="center" style="margin-top: 10px">
                  <a onclick="copyToClipboard('<?php echo $row['line'] ?>')" class="btn-floating light-blue"><i class="material-icons white-text">message</i></a>
                  <a title="email" onclick="copyToClipboard('<?php echo $row['email'] ?>')" class="btn-floating light-blue"><i class="material-icons white-text">email</i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
        $sql="SELECT * from divisi where id = 7";
        $q=mysql_query($sql) or die(mysql_error());
        $row=mysql_fetch_array($q);
        ?>
        <div class="col s12 m6 l3">
          <div class="card">
            <div class="card-content">
              <div class="center">
                <img class="responsive-img" src="img/sports/basket.png"  style="max-width: 50%">
                <h5 class="center"><?php echo $row['jabatan']; ?></h5>
                <p class="light center"><strong>Ketua</strong><br><?php echo $row['nama']; ?></p>
                <p class="light center"><strong>Jadwal</strong><br><?php echo $row['jadwal']; ?></p>
                <div class="center" style="margin-top: 10px">
                  <a onclick="copyToClipboard('<?php echo $row['line'] ?>')" class="btn-floating light-blue"><i class="material-icons white-text">message</i></a>
                  <a title="email" onclick="copyToClipboard('<?php echo $row['email'] ?>')" class="btn-floating light-blue"><i class="material-icons white-text">email</i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
        $sql="SELECT * from divisi where id = 6";
        $q=mysql_query($sql) or die(mysql_error());
        $row=mysql_fetch_array($q);
        ?>
        <div class="col s12 m6 l3">
          <div class="card">
            <div class="card-content">
              <div class="center">
                <img class="responsive-img" src="img/sports/football.png"  style="max-width: 50%">
                <h5 class="center"><?php echo $row['jabatan']; ?></h5>
                <p class="light center"><strong>Ketua</strong><br><?php echo $row['nama']; ?></p>
                <p class="light center"><strong>Jadwal</strong><br><?php echo $row['jadwal']; ?></p>
                <div class="center" style="margin-top: 10px">
                  <a onclick="copyToClipboard('<?php echo $row['line'] ?>')" class="btn-floating light-blue"><i class="material-icons white-text">message</i></a>
                  <a title="email" onclick="copyToClipboard('<?php echo $row['email'] ?>')" class="btn-floating light-blue"><i class="material-icons white-text">email</i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php 
        $sql="SELECT * from divisi where id = 3";
        $q=mysql_query($sql) or die(mysql_error());
        $row=mysql_fetch_array($q);
        ?>
        <div class="col s12 m6 l3">
          <div class="card">
            <div class="card-content">
              <div class="center">
                <img class="responsive-img" src="img/sports/voli.png" style="max-width: 50%">
                <h5 class="center"><?php echo $row['jabatan']; ?></h5>
                <p class="light center"><strong>Ketua</strong><br><?php echo $row['nama']; ?></p>
                <p class="light center"><strong>Jadwal</strong><br><?php echo $row['jadwal']; ?></p>
                <div class="center" style="margin-top: 10px">
                  <a onclick="copyToClipboard('<?php echo $row['line'] ?>')" class="btn-floating light-blue"><i class="material-icons white-text">message</i></a>
                  <a title="email" onclick="copyToClipboard('<?php echo $row['email'] ?>')" class="btn-floating light-blue"><i class="material-icons white-text">email</i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="img/sports/sports-siluet.jpg" alt="Unsplashed background img 2" style="display: block; transform: translate3d(-50%, 141px, 0px);"></div>
  </div> 
  <!-- end divisi sat -->
  </div>
  <!-- end section divisi -->
  

  <div class="section scrollspy" style="margin-top: 50px" id="kegiatan">
    <div class="container">
      <div class="row">
        <div class="col l4 m4 s12 push-l8 push-m8">
          <h4 class="header teal-text right-align">Galeri Kegiatan</h4>
          <blockquote class="right-align" style="border-left-color: #009688">Dokumentasi kegiatan, latihan rutin, turnamen dan lomba yang diikuti anggota SAT</blockquote>
        </div>
        <div class="col l8 m8 s12 pull-l4 pull-m4">
          <div class="slider" style="margin-bottom: 30px">
            <ul class="slides">
            <?php
            $sql="SELECT * from kegiatan order by tanggal desc limit 5";
            $q=mysql_query($sql) or die(mysql_error());
            while ($row=mysql_fetch_array($q)) {
            ?>
              <li>
                <img src="<?php echo $row['gambar']; ?>"> <!-- random image -->
                <div class="caption left-align">
                  <h3><?php echo $row['judul']; ?></h3>
                  <h5 class="light grey-text text-lighten-3"><?php echo $row['keterangan']; ?></h5>
                </div>
              </li>
              <?php } ?>
              
            </ul>
          </div>
        </div>  
      </div>


    </div>

    <div class="section scrollspy" id="laporan">
      <div class="container">
        <div class="row">
          <div class="col l5 m5 s12">
            <h4 class="header teal-text ">Laporan Anggaran</h4>
            <blockquote style="border-left-color: #009688">Laporan penggunaan anggaran belanja divisi SAT Periode 2017</blockquote>
          </div>
          <div class="col l7 m7 s12">
            <ul class="collection z-depth-1">
            <?php
              $sql="SELECT * from ukm order by nama asc";
              $q=mysql_query($sql) or die(mysql_error());
              while ($row=mysql_fetch_array($q)){
                $periode=hasil("SELECT max(periode) from transaksi");
                $ang=hasil("SELECT anggaran from anggaran where ukm = $row[id] and periode = $periode");
                $pengel=hasil("SELECT sum(jumlah) from transaksi where ukm = $row[id] and periode = $periode");
                $persen=round($pengel/$ang*100);
              ?>
              <li class="collection-item avatar">
                <a href="#"><i class="material-icons circle teal">shopping_basket</i></a> 
                <span class="title">
                  <?php echo $row['nama']; ?>
                </span>
                <p class="grey-text text-darken-1">Anggaran : Rp <?php echo number_format($ang,'0',',','.'); ?><br>Pengeluaran : Rp <?php echo number_format($pengel,'0',',','.') ?></p>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="page-footer blue-grey darken-1">
    <div class="container">
      <div class="row">
        <div class="col l5 s12">
          <h5 class="white-text">Sports of Agriculture Technolgy</h5>
          <img src="img/logo/sat-polos.png" width="150">
          <p class="grey-text text-lighten-4">Fakultas Teknologi Pertanian UGM<br>Jl. Flora no.1 Bulaksumur Yogyakarta 55281</p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Links</h5>
          <ul>
              <li><a class="white-text" target="_blank" href="beta">Login</a></li>
              <li><a class="white-text" target="_blank" href="http://ugm.ac.id">Universitas Gadjah Mada</a></li>
              <li><a class="white-text" target="_blank" href="http://tp.ugm.ac.id">Fakultas Teknologi Pertanian</a></li>
            </ul>
        </div>
        <div class="col l4 s12">
            <h5 class="white-text">Follow Us</h5>
            <a href="#" class="btn-floating white"><i class="fa fa-instagram blue-grey-text"></i></a>
            <a href="#" class="btn-floating white"><i class="fa fa-facebook blue-grey-text"></i></a>
            <a href="#" class="btn-floating white"><i class="fa fa-twitter blue-grey-text"></i></a>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        © 2015 - 2017 SAT, Developed by <a href="https://www.facebook.com/Wildan.ar.rahman">WildOne</a> All rights reserved.
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <!-- jQuery -->
  <script src="beta/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.parallax').parallax();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $(".button-collapse").sideNav();
      $('.carousel').carousel();
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.slider').slider({full_width: true, interval: 10000, transition: 800});
    });
  </script>

  <script>
    function copyToClipboard(text) {
      window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
    }
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.scrollspy').scrollSpy();
    });
  </script>

</body>
</html>
