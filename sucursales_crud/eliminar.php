<?php session_start(); ?>

<?php
if (!isset($_SESSION['valido'])) {
	header('Location: iniciar.php');
}
?>

<?php
include("conexion.php");

$id_sucursales = $_GET['id_sucursales'];

$resultado = mysqli_query($mysqli, "DELETE FROM sucursales WHERE id_sucursales=$id_sucursales");

header("Location:ver.php");
?>