<?php
	include 'ImageResize.php';

	use \Eventviva\ImageResize;

	$gambar = "gambar.png";
	$image = new ImageResize($gambar);
	$image->resizeToHeight(300);
	$image->save("$gambar");

?>