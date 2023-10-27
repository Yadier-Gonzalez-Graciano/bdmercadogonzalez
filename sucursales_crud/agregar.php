<?php
session_start();

if(!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<html>
<head>
	<title>Agregar datos</title>
</head>

<body>
<?php
include_once("conexion.php");

if(isset($_POST['update'])) {	
	$id_sucursales = $_POST['id_sucursales'];
	$direccion = $_POST['direccion'];
	$numempleados = $_POST['numempleados'];
	$numdepartamentos = $_POST['numdepartamentos'];
	$suctel = $_POST['suctel'];
	$cantidadproductos = $_POST['cantidadproductos'];
	$tamanosuc = $_POST['tamanosuc'];
	$id = $_SESSION['id'];

	if(empty($id_sucursales) || empty($direccion) || empty($numempleados) || empty($numdepartamentos) || empty($suctel) || empty($cantidadproductos) || empty($tamanosuc) ) {
		echo "<font color='red'>Por favor, complete todos los campos.</font><br/>";
		echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
	} else { 
		$resultado = mysqli_query($mysqli, "INSERT INTO sucursales (id_sucursales, direccion, numempleados, numdepartamentos, suctel, cantidadproductos, tamanosuc, id) VALUES ('$id_sucursales', '$direccion', '$numempleados', '$numdepartamentos', '$suctel', '$cantidadproductos', '$tamanosuc', '$id')");
		
		if($resultado){
			echo "<font color='green'>Datos añadidos con éxito.</font>";
			echo "<br/><a href='ver.php'>Ver resultados</a>";
		} else {
			echo "Error en la inserción: " . mysqli_error($mysqli);
		}
	}
}
?>
</body>
</html>
