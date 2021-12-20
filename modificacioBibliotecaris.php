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
	    <title>Modificació de bibliotecaris</title>	
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
        <h1>Modificació dde bibliotecaris</h1>
        <form action="modificaBibliotecari.php" method="POST">
			<input type="hidden" name="metode" value="PUT">
			Codi de bibliotecari<input type="text" name="codi" required></br>
			Salari <input type="text" name="salari" required></br>
			Bibliotecari en cap? <input type="text" value="No" name="escap" required></br>
			<input type="submit" value="Enviar">
        </form>
    </body>
</html>
