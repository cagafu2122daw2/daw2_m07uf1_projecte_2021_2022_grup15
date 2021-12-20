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
	    <title>Creació de bibliotecaris</title>	
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
        <h1>Creació de bibliotecaris</h1>
        <form action="creaBibliotecari.php" method="POST">
		  <input type="hidden" name="metode" value="PUT">
		  Nom i cognoms <input type="text" name="nom" required></br>
		  Adreça <input type="text" name="adreca" required></br>
		  Correu electrónic <input type="text" name="correu" required></br>
		  telefon <input type="text" name="telefon" required></br>
		  Identificador personal <input type="text" name="id" required></br>
		  Contrasenya <input type="text" name="contrasenya" required></br>
		  Num seguretat social <input type="text" name="nsocial" required></br>
		  Data d'inici <input type="text" name="datainici" required></br>
		  Salari <input type="text" name="salari" required></br>
		  Es bibliotecari en cap? <input type="text" name="escap" required></br>
		  <input type="submit" value="Enviar">
		</form>
    </body>
</html>
