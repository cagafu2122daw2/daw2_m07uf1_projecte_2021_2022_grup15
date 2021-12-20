<?php
	session_start();
	$sessionId = session_id();
	if (!isset($_SESSION['codi'])){
		header("location: index.html");
	}
	
	$titol = $_POST["titol"];
	$autor = $_POST["autor"];
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
		foreach ($linia as $cadena) {
			$prova = explode(",",$cadena,6);
			if ($isbn == $prova[2]) {
				header("refresh:5; url=creacioLlibres.php");
				die("Ja existeix un llibre amb aquest ISBN!");
			}
		}
		fclose($fitxer);
		$fitxer=fopen($filename,"a") or die ("No s'ha pogut obrir el fitxer");
		$text = $titol.",".$autor.",".$isbn.",".$prestec.",".$dataprestec.",".$usuariprestec."\n";
		fwrite($fitxer,$text);
		fclose($fitxer);
		header("location: mostrarLlibres.php");
	} else {
		echo "ERROR 405 MÈTODE NO PERMÉS</br>";
		echo "No s'ha afegit un nou llibre";
		header("refresh:5; url=creacioLlibres.php");
	}
?>
