<?php
	session_start();
	//echo $_SESSION["rol"];
	include "conexion.inc.php";
	$proceso="P1";
	if($_SESSION["rol"] == 'administrador'){
		$proceso="P1";
	}
	if($_SESSION["rol"] == 'site_store'){
		$proceso="P4";
	}
	if($_SESSION["rol"] == 'cliente'){
		$proceso="P1";
	}
	$sql="select * from flujo where proceso ='P1' and rol='".$_SESSION["rol"]."' or proceso ='P4' and rol='".$_SESSION["rol"]."' or proceso ='P11' and rol='".$_SESSION["rol"]."'";

	$resultado=mysqli_query($con, $sql);
	while($registros=mysqli_fetch_array($resultado)){
		echo $registros["flujo"]."<a href='nuevoflujorol.php?flujo=".$registros["flujo"]."&proceso=".$proceso."'>Nuevo</a>";
		echo "<br>";
	}
	
?>