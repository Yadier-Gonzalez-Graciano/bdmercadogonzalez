<?php session_start(); ?>

<?php
if (!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
// Incluyendo el archivo de conexión a la base de datos
include_once("conexion.php");

if (isset($_POST['update'])) {
	$id_sucursales = $_POST['id_sucursales'];
	$direccion = $_POST['direccion'];
	$numempleados = $_POST['numempleados'];
	$numdepartamentos = $_POST['numdepartamentos'];
	$suctel = $_POST['suctel'];
	$cantidadproductos = $_POST['cantidadproductos'];
	$tamanosuc = $_POST['tamanosuc'];
	

	// Verificar campos vacíos
	if ( empty($id_sucursales) || empty($direccion) || empty($numempleados) || empty($numdepartamentos) || empty($suctel) || empty($cantidadproductos) || empty($tamanosuc)) {
		if (empty($id_sucursales)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}
		if (empty($direccion)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($numempleados)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($numdepartamentos)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($suctel)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($cantidadproductos)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

		if (empty($tamanosuc)) {
			echo "<font color='red'>El campo está vacío.</font><br/>";
		}

	} else {
		// Actualizando la tabla
// Actualizando la tabla
		$resultado = mysqli_query($mysqli, "UPDATE sucursales SET direccion='$direccion', numempleados='$numempleados', numdepartamentos='$numdepartamentos', suctel='$suctel', cantidadproductos='$cantidadproductos', tamanosuc='$tamanosuc'  WHERE id_sucursales'$id_sucursales'");

		// Redireccionando a la página de visualización. En este caso, es ver.php
		header("Location: ver.php");
	}
}
?>

<?php
// Obtener el id del URL
$id_sucursales = $_GET['id_sucursales'];

if ($id_sucursales != '') {
	// Seleccionar los datos asociados con este id particular
	$resultado = mysqli_query($mysqli, "SELECT * FROM sucursales WHERE id_sucursales=$id_sucursales");

	while ($res = mysqli_fetch_array($resultado)) {
		$id_sucursales = $res['id_sucursales'];
		$direccion = $res['direccion'];
		$numempleados = $res['numempleados'];
		$numdepartamentos = $res['numdepartamentos'];
		$suctel = $res['suctel'];
		$cantidadproductos = $res['cantidadproductos'];
		$tamanosuc = $res['tamanosuc'];
	}
} else {
	echo "ID de id_cliente no encontrado en la URL. Asegúrate de pasar el ID correctamente.";
}
?>


<html>

<head>
	<title>Editar Datos</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver Productos</a> | <a href="cerrar.php">Cerrar Sesión</a>
	<br /><br />

	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr>
				<td>Id sucursales</td>
				<td><input type="text" name="id_sucursales" value="<?php echo $id_sucursales; ?>"></td>
			</tr>
			<tr>
				<td>Direccion</td>
				<td><input type="text" name="direccion" value="<?php echo $direccion; ?>"></td>
			</tr>
			<tr>
				<td>Numempleados</td>
				<td><input type="text" name="numempleados" value="<?php echo $numempleados; ?>"></td>
			</tr>
			<tr>
				<td>Numdepartamentos</td>
				<td><input type="text" name="numdepartamentos" value="<?php echo $numdepartamentos; ?>"></td>
			</tr>
			<tr>
				<td>suc tel</td>
				<td><input type="text" name="suctel" value="<?php echo $suctel; ?>"></td>
			</tr>
			<tr>
				<td>cantidadproductos</td>
				<td><input type="text" name="cantidadproductos" value="<?php echo $cantidadproductos; ?>"></td>
			</tr>
			<tr>
				<td>tamaño suc</td>
				<td><input type="text" name="tamanosuc" value="<?php echo $tamanosuc; ?>"></td>
			</tr>
				<td><input type="hidden" name="id_sucursales" value=<?php echo $_GET['id_sucursales']; ?>></td>
				<td><input type="submit" name="update" value="Actualizar"></td>
			</tr>
		</table>
	</form>
</body>

</html>