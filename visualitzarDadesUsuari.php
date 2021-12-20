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
	    <title>Dades personals</title>	
    </head>
    <body>
		<input type="button" value="Torna enrere" onClick="history.back();">
		<div style="float: right;font-size: 14px;">
			<?php
				echo "Id d'usuari: ".$_SESSION['codi']."</br>Id de sessió: ".$sessionId;
			?>
			</br><a href="tancarSessio.php">Tancar sessió</a>
		</div>
        <h1>Dades personals</h1>
        <table border=1>
			<tr>
				<th>Nom complert</th><th>Adreça</th><th>Correu electrònic</th><th>Tèlefon</th><th>Identificador personal</th><th>Contrasenya</th><th>Llibre en préstec?</th><th>Data inici préstec</th><th>ISBN llibre en préstec</th>
			</tr>
			<?php
				$filename="usuaris";
				$fitxer=fopen($filename,"r") or die ("No s'ha pogut obrir el fitxer");
				if ($fitxer) {
					$mida_fitxer=filesize($filename);	
					$linia = explode(PHP_EOL, fread($fitxer,$mida_fitxer-1));
				}
				foreach ($linia as $cadena) {
					$prova = explode(",",$cadena,9);
					if ($prova[4]==$_SESSION['codi']) {
						echo "<tr><td>".$prova[0]."</td><td>".$prova[1]."</td><td>".$prova[2]."</td><td>".$prova[3]."</td><td>".$prova[4]."</td><td>".$prova[5]."</td><td>".$prova[6]."</td><td>".$prova[7]."</td><td>".$prova[8]."</td></tr>";
					}	
				}
				fclose($fitxer);
			?>
        </table>
    </body>
</html>
