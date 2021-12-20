<?php
	session_start();
	$sessionId = session_id();
	if (!isset($_SESSION['codi'])){
		header("location: index.html");
	}
	
	$codi = $_POST["codi"];
	
	if($_POST["metode"]=="DELETE") {
		$filename="bibliotecari";
		$fitxer=fopen($filename,"r") or die ("No s'ha pogut obrir el fitxer");
		if ($fitxer) {
			$mida_fitxer=filesize($filename);	
			$linia = explode(PHP_EOL, fread($fitxer,$mida_fitxer-1));
		}
		for ($i = 0; $i < count($linia); $i++) {
		  $prova = explode(",",$linia[$i],10);
		  if ($codi == $prova[4]) {
			$posicion = $i;
		  }
		}
		unset($linia[$posicion]);
		fclose($fitxer);
		$fitxer=fopen($filename,"w") or die ("No s'ha pogut obrir el fitxer");
		
		foreach ($linia as $cadena) {
			fwrite($fitxer,$cadena."\n");
		}
		
		fclose($fitxer);
		header("location: mostrarBibliotecaris.php");
	} else {
		echo "ERROR 405 MÈTODE NO PERMÉS</br>";
		echo "No s'ha esborrat el bibliotecari";
		header("refresh:5; url=eliminacioBibliotecaris.php");
	}
?>
