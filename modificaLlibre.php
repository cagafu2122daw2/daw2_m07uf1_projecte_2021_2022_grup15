<?php
	session_start();
	$sessionId = session_id();
	if (!isset($_SESSION['codi'])){
		header("location: index.html");
	}
	
	$isbn = $_POST["isbn"];
	$prestec = $_POST["prestec"];
	$dataprestec = $_POST["dataprestec"];
	$usuariprestec = $_POST["usuariprestec"];
	
	if($_POST["metode"]=="PUT") {
		$filename="llibres";
		$fitxer=fopen($filename,"r") or die ("No s'ha pogut obrir el fitxer");
		if ($fitxer) {
			$mida_fitxer=filesize($filename);	
			$linia = explode(PHP_EOL, fread($fitxer,$mida_fitxer-1));
		}
		for ($i = 0; $i < count($linia); $i++) {
		  $prova = explode(",",$linia[$i],6);
		  if ($isbn == $prova[2]) {
			$posicion = $i;
			$texto = $prova[0].",".$prova[1].",".$isbn.",".$prestec.",".$dataprestec.",".$usuariprestec;
		  }
		}
		$linia[$posicion]=$texto;
		fclose($fitxer);
		$fitxer=fopen($filename,"w") or die ("No s'ha pogut obrir el fitxer");
		
		foreach ($linia as $cadena) {
			fwrite($fitxer,$cadena."\n");
		}
		
		fclose($fitxer);
		header("location: mostrarLlibres.php");
	} else {
		echo "ERROR 405 MÈTODE NO PERMÉS</br>";
		echo "No s'ha afegit un nou llibre";
		header("refresh:5; url=modificacioLlibres.php");
	}
?>
