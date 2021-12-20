<?php 
	session_start();
	$sessionId = session_id();
	if (!isset($_SESSION['codi'])){
		header("location: index.html");
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
	    <title>Dades de bibliotecaris</title>	
    </head>
    <body>
		<input type="button" value="Torna enrere" onClick="history.back();">
		<a href="gestioBibliotecaris.php">Gestió de bibliotecaris</a>
		<div style="float: right;font-size: 14px;">
			<?php
				echo "Id d'usuari: ".$_SESSION['codi']."</br>Id de sessió: ".$sessionId;
			?>
			</br><a href="tancarSessio.php">Tancar sessió</a>
		</div>
        <h1>Dades de bibliotecaris</h1>
        <table border=1>
			<tr>
				<th>Nom complert</th><th>Adreça</th><th>Correu electrònic</th><th>Tèlefon</th><th>Identificador personal</th><th>Contrasenya</th><th>Num seguretat social</th><th>Data inici</th><th>Salari</th><th>Es bibliotecari en cap?</th>
			</tr>
			<?php
				$filename="bibliotecari";
				$fitxer=fopen($filename,"r") or die ("No s'ha pogut obrir el fitxer");
				if ($fitxer) {
					$mida_fitxer=filesize($filename);	
					$linia = explode(PHP_EOL, fread($fitxer,$mida_fitxer-1));
				}
				foreach ($linia as $cadena) {
					$prova = explode(",",$cadena,10);
					echo "<tr><td>".$prova[0]."</td><td>".$prova[1]."</td><td>".$prova[2]."</td><td>".$prova[3]."</td><td>".$prova[4]."</td><td>".$prova[5]."</td><td>".$prova[6]."</td><td>".$prova[7]."</td><td>".$prova[8]."</td><td>".$prova[9]."</td></tr>";
				}
				fclose($fitxer);
			?>
        </table>
    </body>
</html>
