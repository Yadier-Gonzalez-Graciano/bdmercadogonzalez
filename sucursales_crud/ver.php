<?php session_start(); ?>

<?php
if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
include_once("conexion.php");

$resultado = mysqli_query($mysqli, "SELECT * FROM sucursales WHERE id=".$_SESSION['id']." ORDER BY id_sucursales DESC");
?>

<html>
<head>
	<title>Página principal</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="agregar.html">Agregar nuevo dato</a> | <a href="cerrar.php">Cerrar sesión</a>
	<br/><br/>

	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Id sucursales</td>
			<td>Direccion</td>
			<td>numempleados</td>
			<td>numdepartamentos</td>
			<td>suctel</td>
			<td>cantidadproductos</td>
			<td>tamanosuc</td>
			<td>Opciones</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($resultado)) {		
			echo "<tr>";
			echo "<td>".$res['id_sucursales']."</td>";
			echo "<td>".$res['direccion']."</td>";
			echo "<td>".$res['numempleados']."</td>";
			echo "<td>".$res['numdepartamentos']."</td>";
			echo "<td>".$res['suctel']."</td>";
			echo "<td>".$res['cantidadproductos']."</td>";	
			echo "<td>".$res['tamanosuc']."</td>";
			echo "<td><a href=\"editar.php?id_sucursales=$res[id_sucursales]\">Editar</a> | <a href=\"eliminar.php?id_sucursales=$res[id_sucursales]\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
