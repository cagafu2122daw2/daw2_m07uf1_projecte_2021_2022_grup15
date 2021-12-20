<?php
	session_start();
	$sessionId = session_id();
	if (!isset($_SESSION['codi'])){
		header("location: index.html");
	}
	$nom = $_POST["nom"];
	$adreca = $_POST["adreca"];
	$correu = $_POST["correu"];
	$telefon = $_POST["telefon"];
	$id = $_POST["id"];
	$contrasenya = $_POST["contrasenya"];
	$prestec = $_POST["prestec"];
	$dataprestec = $_POST["dataprestec"];
	$isbnprestec = $_POST["isbnprestec"];

	if($_POST["metode"]=="PUT") {
	  $continua = 1;
	  $filename = "usuaris";
	  $fitxer = fopen($filename, "r") or die ("No s'ha pogut obrir el fitxer");
	  if ($fitxer) {
		$mida_fitxer = filesize($filename);
		$linia = explode(PHP_EOL, fread($fitxer,$mida_fitxer-1));
	  }
	  
	  // Contrasenyes fortes
		$uppercase = preg_match('@[A-Z]@', $contrasenya);
		$lowercase = preg_match('@[a-z]@', $contrasenya);
		$number    = preg_match('@[0-9]@', $contrasenya);
		$specialChars = preg_match('@[^\w]@', $contrasenya);

		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($contrasenya) < 8) {
			$continua = 0;
			echo "La contrasenya ha d'incloure al menys 8 caràcters, majúscules, minúscules, números i un caràcter especial";
			header("refresh:5; url=creacioUsuaris.php");
			
		}

	  
	  foreach ($linia as $cadena) {
		$prova = explode(",",$cadena,9);
		if ($id == $prova[4]) {
			$continua = 0;
		  echo "Ja existeix un usuari amb aquest identificador!";
		  header("refresh:5; url=creacioUsuaris.php");
		}
	  }
		if ($continua == 1) {
		  fclose($fitxer);
		  $fitxer=fopen($filename,"a") or die ("No s'ha pogut obrir el fitxer");
		  $text = $nom.",".$adreca.",".$correu.",".$telefon.",".$id.",".$contrasenya.",".$prestec.",".$dataprestec.",".$isbnprestec."\n";
		  fwrite($fitxer,$text);
		  fclose($fitxer);
		  header("location: mostrarUsuaris.php");
	  }
	} else {
	  echo "ERROR 405 MÉTODE NO PERMÉS</br>";
	  echo "No s'ha afegit in nou llibre";
	  header("refresh:5; url=creacioUsuaris.php");
	}
?>
