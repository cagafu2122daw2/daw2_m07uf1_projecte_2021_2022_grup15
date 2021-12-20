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
	    <title>Panel de bibliotecari</title>	
    </head>
    <body>
		<input type="button" value="Torna enrere" onClick="history.back();">
		<div style="float: right;font-size: 14px;">
			<?php
				echo "Id d'usuari: ".$_SESSION['codi']."</br>Id de sessió: ".$sessionId;
			?>
			</br><a href="tancarSessio.php">Tancar sessió</a>
		</div>
        <h1>Panel de bibliotecari</h1>
        <a href="gestioLlibres.php">Gestió de llibres</a></br></br>
        <a href="gestioUsuaris.php">Gestió d'usuaris</a></br></br>
        <a href="visualitzarDadesBibliotecari.php">Dades personals</a></br></br>
    </body>
</html>
