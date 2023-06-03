<?php
/*
http://localhost/work/mflujo.php?flujo=F1&proceso=P1
*/
include "conexion.inc.php";
session_start();
$flujo = $_GET["flujo"];
$proceso = $_GET["proceso"];

$pantalla = $_GET["pantalla"];
$tramite = $_SESSION["codtramite"];
$uuu = $_SESSION["usuario"]; //usuario global

$condi = "SELECT tipo FROM flujo ";
$condi .= "WHERE flujo='$flujo' and proceso='$proceso' ";

$result = mysqli_query($con, $condi);
$regist = mysqli_fetch_array($result);
$tipo = $regist["tipo"];
$ps="";


if ($tipo == 'C') {
    $nombre = $_GET['nombre'];
    $descripcion = $_GET['descripcion'];
    $autor = $_GET['autor'];
    $editorial = $_GET['editorial'];

    if (isset($_GET["Siguiente"])) {
        if (isset($_GET["Si"])) {
            /*
            if($proceso == "P7")
            {
                echo "xd";
            }
            */

            $sql = "SELECT * FROM flujocondicional ";
            $sql .= "WHERE codFlujo='$flujo' and codProceso='$proceso'";
            $resultado = mysqli_query($con, $sql);
            $registros = mysqli_fetch_array($resultado);
            $procesoSiguiente = $registros["codProcesoSi"];
        }
        if (isset($_GET["No"])) {
            $sql = "SELECT * FROM flujocondicional ";
            $sql .= "WHERE codFlujo='$flujo' and codProceso='$proceso'";
            $resultado = mysqli_query($con, $sql);
            $registros = mysqli_fetch_array($resultado);
            $procesoSiguiente = $registros["codProcesoNo"];
        }
        //completar el flujo usuario
        $today = getdate();
	    $fecha_fin = $today["year"] . "-" . $today["mon"] . "-" . $today["mday"] . " " . $today["hours"] . ":" . $today["minutes"];
	    $sql = "UPDATE flujousuario SET fecha_fin='$fecha_fin' WHERE numerotramite='$tramite' and proceso='$proceso'";
	    $resultado = mysqli_query($con, $sql);
    }
    if (isset($_GET["Anterior"])) {
        $sql = "SELECT * FROM flujo ";
        $sql .= "WHERE flujo='$flujo' and proceso_siguiente='$proceso'";
        $resultado = mysqli_query($con, $sql);
        $registros = mysqli_fetch_array($resultado);
        $procesoSiguiente = $registros["proceso"];
        if ($procesoSiguiente == null) {
            $sql = "SELECT * FROM flujocondicional ";
            $sql .= "WHERE codFlujo='$flujo' and (codProcesoSi='$proceso' or codProcesoNo='$proceso') ";
            $resultado = mysqli_query($con, $sql);
            $registros = mysqli_fetch_array($resultado);
            $procesoSiguiente = $registros["codProceso"];
        }
    }

    //if(

    header("Location: mflujo.php?flujo=$flujo&proceso=$procesoSiguiente");
    
}
else
{
    
    if(isset($_GET["Siguiente"]))
    { 
        if($proceso == "P3")
        {
            sleep(5);
        }
        
        $sql = "SELECT * FROM flujo ";
        $sql .= "WHERE flujo = '$flujo' and proceso = '$proceso'";
        $resultado = mysqli_query($con, $sql);
        $registros = mysqli_fetch_array($resultado);
        $proceso_siguiente = $registros['proceso_siguiente'];
        #echo "xd";
        header("Location: mflujo.php?flujo=$flujo&proceso=$proceso_siguiente");
    }
    
    if(isset($_GET["Anterior"]))
    { 
        $sql = "SELECT * FROM flujo ";
        $sql .= "WHERE flujo='$flujo' and proceso_siguiente='$proceso'";
        $resultado = mysqli_query($con, $sql);
        $registros = mysqli_fetch_array($resultado);
        $proceso_siguiente = $registros["proceso"];
        header("Location: mflujo.php?flujo=$flujo&proceso=$proceso_siguiente");
    }
/*
    if (($procesoSiguiente == "P7" || $procesoSiguiente == "P8" || $procesoSiguiente == "P9") && !(isset($_GET["Anterior"])))
    {
        
        if ($procesoSiguiente == "P7")
        {
            


            $today = getdate();
            $fecha_ini = $today["year"] . "-" . $today["mon"] . "-" . $today["mday"] . " " . $today["hours"] . ":" . $today["minutes"];
            $fecha_fin = "NULL";

            $sql = "INSERT INTO flujousuario VALUES ('" . $tramite . "','" . $flujo . "','$proceso','" . $fecha_ini . "' ";
            $sql .= "," . $fecha_fin . ",'" . $usuario . "')";
            $resultado = mysqli_query($con, $sql);
        }
    }
*/
}
?>
