<?php  echo "Lista productos xd"; ?>

<?php
    $user=$_SESSION['usuario'];
	$tramite=$_SESSION['codtramite'];
	include "conexion.inc.php";
	$sql = "SELECT * FROM book_store.libro";
	$resultado = mysqli_query($con, $sql);
?>


<table>
	<tr>
		<th>Id</th>
		<th>Nombre</th>
		<th>Descripcion</th>
		<th>Autor</th>
        <th>Editorial</th>
	</tr>

	<?php
	while ($registros = mysqli_fetch_array($resultado)) {
		echo "<tr>";
		echo "<td>" . $registros["id"] . "</td>";
		
		echo "<td>" . $registros["nombre"]. " </td>";

		echo "<td>" . $registros["descripcion"] ."</td>";
		
		echo "<td>" . $registros["autor"] . "</td>";

        echo "<td>" . $registros["editorial"] . "</td>";
		
		echo "</tr>";
	}
	?>
</table>