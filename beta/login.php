<?php
	session_start();
	if (isset($_SESSION['pref'])) {
		header('location:modul.php?isi=admin-home');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>

    <!-- Import Google Font -->
    <link href="../css/icon.css" rel="stylesheet">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<main>
	<div class="container" style="padding: 0 20px 0 20px;">
		<div class="row" style="margin-top: 30px">
			<div class="col m5 offset-m3">
				<div class="center"><img src="../img/logo/logo-sat.png" width="40%" height="40%"></div>
				<h5 class="light center">Login Sistem Informasi SAT</h5>
				<div class="card grey lighten-3">
					<div class="card-content">
						<div class="row center">
							<i class="material-icons large teal-text text-lighten-2">person_pin</i>
						</div>
						<form class="row" action="ceklog.php" method="POST">
							<div class="col s10 offset-s1">
								<div class="input-field">
						          <input name="username" id="username" type="text" class="validate" required>
						          <label for="username">Username</label>
						        </div>
								<div class="input-field">
						          <input name="password" id="password" type="password" class="validate" required>
						          <label for="password">Password</label>
						        </div>
						        <div class="input-field right">
							        <button class="btn waves-effect waves-light" type="submit" name="action">Login</button>
						        </div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>


<!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

<!-- Import materialize js -->
    <script type="text/javascript" src="../js/materialize.min.js"></script>
</body>
</html>