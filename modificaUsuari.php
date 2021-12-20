<?php
	session_start();
	$sessionId = session_id();
	if (!isset($_SESSION['codi'])){
		header("location: index.html");
	}
	
	$codi = $_POST["codi"];
	$prestec = $_POST["prestec"];
	$dataprestec = $_POST["dataprestec"];
	$isbnprestec = $_POST["isbnprestec"];	
	
	if($_POST["metode"]=="PUT") {
		$filename="usuaris";
		$fitxer=fopen($filename,"r") or die ("No s'ha pogut obrir el fitxer");
		if ($fitxer) {
			$mida_fitxer=filesize($filename);	
			$linia = explode(PHP_EOL, fread($fitxer,$mida_fitxer-1));
		}
		for ($i = 0; $i < count($linia); $i++) {
		  $prova = explode(",",$linia[$i],9);
		  if ($codi == $prova[4]) {
			$posicion = $i;
			$texto = $prova[0].",".$prova[1].",".$prova[2].",".$prova[3].",".$prova[4].",".$prova[5].",".$prestec.",".$dataprestec.",".$isbnprestec;
		  }
		}
		$linia[$posicion]=$texto;
		fclose($fitxer);
		$fitxer=fopen($filename,"w") or die ("No s'ha pogut obrir el fitxer");
		
		foreach ($linia as $cadena) {
			fwrite($fitxer,$cadena."\n");
		}
		
		fclose($fitxer);
		header("location: mostrarUsuaris.php");
	} else {
		echo "ERROR 405 MÈTODE NO PERMÉS</br>";
		echo "No s'ha afegit un nou usuari";
		header("refresh:5; url=modificacioUsuaris.php");
	}
?>
