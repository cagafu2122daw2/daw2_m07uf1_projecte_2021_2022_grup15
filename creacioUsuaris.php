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
	    <title>Creació d'usuaris</title>	
    </head>
    <body>
		<input type="button" value="Torna enrere" onClick="history.back();">
		<a href="gestioUsuaris.php">Gestió d'usuaris</a>
		<div style="float: right;font-size: 14px;">
			<?php
				echo "Id d'usuari: ".$_SESSION['codi']."</br>Id de sessió: ".$sessionId;
			?>
			</br><a href="tancarSessio.php">Tancar sessió</a>
		</div>
        <h1>Creació d'usuaris</h1>
        <form action="creaUsuari.php" method="POST">
		  <input type="hidden" name="metode" value="PUT">
		  Nom i cognoms <input type="text" name="nom" required></br>
		  Adreça <input type="text" name="adreca" required></br>
		  Correu electrónic <input type="text" name="correu" required></br>
		  telefon <input type="text" name="telefon" required></br>
		  Identificador personal <input type="text" name="id" required></br>
		  Contrasenya <input type="text" name="contrasenya" required></br>
		  Te un llibre en prestec? <input type="text" name="prestec" required></br>
		  Data d'inici del prestec <input type="text" name="dataprestec" required></br>
		  ISBN del llibre en prestec <input type="text" name="isbnprestec" required></br>
		  <input type="submit" value="Enviar">
		</form>
    </body>
</html>
