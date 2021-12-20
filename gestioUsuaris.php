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
	    <title>Gestió d'usuaris</title>	
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
        <h1>Gestió d'usuaris</h1>
        <a href="creacioUsuaris.php">Creació d'usuaris</a></br></br>
        <a href="mostrarUsuaris.php">Visualtizació d'usuaris</a></br></br>
        <a href="modificacioUsuaris.php">Modificació d'usuaris</a></br></br>
        <a href="eliminacioUsuaris.php">Eliminació d'usuaris</a></br></br>
    </body>
</html>
