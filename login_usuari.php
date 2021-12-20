<?php
	session_start();
	$tipus = $_POST["tipus"];
    $usuari = $_POST["usuari"];
    $contrasenya = $_POST["contrasenya"];
    switch ($tipus) {
		case "usuari":
			$filename="usuaris";
			$fitxer=fopen($filename,"r") or die ("No s'ha pogut obrir el fitxer");
			if ($fitxer) {
			$mida_fitxer=filesize($filename);	
			$linia = explode(PHP_EOL, fread($fitxer,$mida_fitxer));
			}
			foreach ($linia as $cadena) {
				$prova = explode(",",$cadena,9);
				if ($prova[4]==$usuari && $prova[5]==$contrasenya) {
					$_SESSION['codi'] = $usuari;
					header("location: usuaris.php");
				}
			}
			break;
			
		case "bibliotecari":
			$filename="bibliotecari";
			$fitxer=fopen($filename,"r") or die ("No s'ha pogut obrir el fitxer");
			if ($fitxer) {
			$mida_fitxer=filesize($filename);	
			$linia = explode(PHP_EOL, fread($fitxer,$mida_fitxer));
			}
				foreach ($linia as $cadena) {
					$prova = explode(",",$cadena,10);
					if ($prova[4]==$usuari && $prova[5]==$contrasenya && $prova[9]=="No") {
						$_SESSION['codi'] = $usuari;
						header("location: bibliotecari.php");
					}
				}
			break;
			
		case "cap":
			$filename="bibliotecari";
			$fitxer=fopen($filename,"r") or die ("No s'ha pogut obrir el fitxer");
			if ($fitxer) {
			$mida_fitxer=filesize($filename);	
			$linia = explode(PHP_EOL, fread($fitxer,$mida_fitxer));
			}
				foreach ($linia as $cadena) {
					$prova = explode(",",$cadena,10);
					if ($prova[4]==$usuari && $prova[5]==$contrasenya && $prova[9]=="Si") {
						$_SESSION['codi'] = $usuari;
						$_SESSION['cap'] = "Si";
						header("location: cap.php");
					}
				}
			break;
	}
    
	
	fclose($fitxer);
	echo "Usuari o contrasenya incorrectes</br>";
	echo "Torna-ho a intentar en 10 segons";
	header("refresh:10; url=login_usuari.html");
?>
