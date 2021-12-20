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
	    <title>Gestió de bibliotecaris</title>	
    </head>
    <body>
		<input type="button" value="Torna enrere" onClick="history.back();">
		<a href="cap.php">Panel de bibliotecari en cap</a>
		<div style="float: right;font-size: 14px;">
			<?php
				echo "Id d'usuari: ".$_SESSION['codi']."</br>Id de sessió: ".$sessionId;
			?>
			</br><a href="tancarSessio.php">Tancar sessió</a>
		</div>
        <h1>Gestió de bibliotecaris</h1>
        <a href="creacioBibliotecaris.php">Creació de bibliotecaris</a></br></br>
        <a href="mostrarBibliotecaris.php">Visualtizació de bibliotecaris</a></br></br>
        <a href="modificacioBibliotecaris.php">Modificació de bibliotecaris</a></br></br>
        <a href="eliminacioBibliotecaris.php">Eliminació de bibliotecaris</a></br></br>
    </body>
</html>
