<?php
// data.php adalah kumpulan function yg sering dipanggil
	$hasil=null;
	function hasil($query){
		$qq=mysql_query($query) or die(mysql_error());
		$counts=mysql_num_rows($qq);		
		if ($counts!=0){
			$hasil=mysql_result($qq, 0);
			return $hasil;
		}
		
	}

	function tambahUrut($tabel){
		$sql="select * from $tabel where status = 1";
		$q=mysql_query($sql) or die(mysql_error());
		while ($row=mysql_fetch_array($q)){
			$b=$row['urut']+1;
			mysql_query("update $tabel set urut = $b where id = $row[id] ");
		}
	}

	function kurangUrut($tabel, $start){
		$query="select * from $tabel where status = 1 and urut > $start";
		$qq=mysql_query($query) or die(mysql_error());
		$counts=mysql_num_rows($qq)+$start;
		while ($start <= $counts) {
			$a=$start+1;
			mysql_query("update $tabel set urut = $start where urut = $a ");
			$start++;
		}

	}

	function urutUp($tabel, $id){
		$start=hasil("select urut from $tabel where id = $id");
		$up=$start-1;
		$atas=hasil("select id from $tabel where urut = $up");	
		mysql_query("update $tabel set urut = $start where id = $atas ");
		mysql_query("update $tabel set urut = $up where id = $id");
	}

	function urutDown($tabel, $id){
		$start=hasil("select urut from $tabel where id = $id");
		$down=$start+1;
		$bawah=hasil("select id from $tabel where urut = $down");	
		mysql_query("update $tabel set urut = $start where id = $bawah ");
		mysql_query("update $tabel set urut = $down where id = $id");
	}

	function pengurus($id){
		$sql="select * from pengurus where id = $id ";
        $q=mysql_query($sql) or die(mysql_error());
        $row=mysql_fetch_array($q);
        $pecah=explode(" ", $row['nama']);
        $inisial[0]="";
        if (isset($pecah[2]) && $pecah[2]!="") {
           $inisial=str_split($pecah[2]);
        }
        $nama=$pecah[0]." ".$pecah[1]." ".$inisial[0];
	    echo "<a href='#' data-toggle='modal' data-target='#$row[panggilan]'>";
	    echo 	"<img class='img-circle center-block bundar' src='$row[gambar]' width='175' height='175' alt='logo'></a>";
        echo "<h3 class='number timer'>$nama</h3>";
        echo "<h5>$row[jabatan]</h5>";
	}
?>