<?php 
    $usuario=$_POST["username"];
    $password=$_POST["password"];
    session_start();

    include "conexion.inc.php";
    $sql = "select count(*) as contador, rol from book_store.usuario ";
    $sql .= "where username = '$usuario' and password=md5('$password') group by username"; /* cambiar */
    $resultado = mysqli_query($con, $sql);
    $registros = mysqli_fetch_array($resultado);
    $contador = $registros["contador"];

    if ($contador > 0)
    {
        header("Location: bandejaE.php");
        $_SESSION["usuario"] = $usuario;
        $_SESSION["rol"] = $registros["rol"];
    }
    else
        header("Location: index.php");
?>
