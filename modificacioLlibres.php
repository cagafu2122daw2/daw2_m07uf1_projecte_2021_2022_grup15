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
	    <title>Modificació de llibres</title>	
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
        <h1>Modificació de llibres</h1>
        <form action="modificaLlibre.php" method="POST">
			<input type="hidden" name="metode" value="PUT">
			ISBN <input type="text" name="isbn" required></br>
			Llibre en préstec? <input type="text" name="prestec" required></br>
			Data inici préstec <input type="text" name="dataprestec" required></br>
			Codi usuari en préstec <input type="text" name="usuariprestec" required></br>
			<input type="submit" value="Enviar">
        </form>
    </body>
</html>
