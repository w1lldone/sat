<?php
	if (isset($_POST['toggle'])) {
		$name='mobileview';
		if ($_POST['toggle']=='true') {
			$val='on';
		} else{
			$val='off';
		}
		setcookie($name, $val, time() + (86400 * 30), "/");
	}
?>