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
	    <title>Gestió de llibres</title>	
    </head>
    <body>
		<input type="button" value="Torna enrere" onClick="history.back();">
		<?php  if($_SESSION["cap"]=="Si"){echo '<a href="cap.php">Panel de bibliotecari en cap</a>';}
		else {echo '<a href="bibliotecari.php">Panel de bibliotecari</a>';} ?>
		<div style="float: right;font-size: 14px;">
			<?php
				echo "Id d'usuari: ".$_SESSION['codi']."</br>Id de sessió: ".$sessionId;
			?>
			</br><a href="tancarSessio.php">Tancar sessió</a>
		</div>
        <h1>Gestió de llibres</h1>
        <a href="creacioLlibres.php">Creació de llibres</a></br></br>
        <a href="mostrarLlibres.php">Visualtizació de llibres</a></br></br>
        <a href="modificacioLlibres.php">Modificació de llibres</a></br></br>
        <a href="eliminarLlibres.php">Eliminació de llibres</a></br></br>
    </body>
</html>
