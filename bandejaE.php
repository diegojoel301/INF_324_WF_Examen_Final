<?php
    session_start();

    include "conexion.inc.php";

    $sql = "select * from flujousuario ";
    $sql .= "where usuario = '". $_SESSION["usuario"]."' ";
    $sql .= "and fecha_fin is null";
    $res = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <table class="table">
		<tr>
			<th scope="col">Flujo</th>
			<th scope="col">Proceso</th>
			<th scope="col">Operacion</th>
		</tr>
		<?php
		while ($registros = mysqli_fetch_array($res)) {
		    echo "<tr>";
		    echo "<td>" . $registros["flujo"] . "</td>";
		    echo "<td>" . $registros["proceso"] . "</td>";
		    echo "<td>";
		    echo "<a href='mflujo.php?flujo=" . $registros["flujo"] . "&proceso=" . $registros["proceso"] . "'>";
		    echo "Ir</a></td>";
		    echo "</tr>";

		    // Guardar la variable local en una sesión
		    $_SESSION['codtramite'] = $registros["numerotramite"];
		}
		?>
	</table>
	<br>
	<a href="nuevoflujo.php">Nuevo</a><br>
	<a href="bandejaS.php">Ver bandeja de salida</a>
</html>
