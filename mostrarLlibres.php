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
	    <title>Visualització de llibres</title>	
    </head>
    <body>
		<input type="button" value="Torna enrere" onClick="history.back();">
		<a href="gestioLlibres.php">Gestió de llibres</a>
		<div style="float: right;font-size: 14px;">
			<?php
				echo "Id d'usuari: ".$_SESSION['codi']."</br>Id de sessió: ".$sessionId;
			?>
			</br><a href="tancarSessio.php">Tancar sessió</a>
		</div>
        <h1>Visualització de llibres</h1>
        <table border=1>
			<tr>
				<th>Títol</th><th>Autor</th><th>ISBN</th><th>Llibre en prestec?</th><th>Data inici prestec</th><th>Codi usuari en prestec</th>
			</tr>
			<?php
				$filename="llibres";
				$fitxer=fopen($filename,"r") or die ("No s'ha pogut obrir el fitxer");
				if ($fitxer) {
					$mida_fitxer=filesize($filename);	
					$linia = explode(PHP_EOL, fread($fitxer,$mida_fitxer-1));
				}
				foreach ($linia as $cadena) {
					$prova = explode(",",$cadena,6);
					echo "<tr><td>".$prova[0]."</td><td>".$prova[1]."</td><td>".$prova[2]."</td><td>".$prova[3]."</td><td>".$prova[4]."</td><td>".$prova[5]."</td></tr>";
				}
				fclose($fitxer);
			?>
        </table>
    </body>
</html>
