<?php session_start();



require_once("../../../config/conexion.php");
require_once("../../../models/Usuario.php");
$usuario= new Usuario();




// Comprobamos si la session esta iniciada, sino, redirigimos.

$usuario->comprobarSession();



// 1.- Conectamos a la base de datos

$conexion = $usuario ->conexion($bd_config);

if(!$conexion){

	header('Location: ../error.php');

}



$id = $usuario ->limpiarDatos($_GET['id']);



// Comprobamos que exista un ID

if (!$id) {

	header('Location:' . RUTA . '/admin');

}



$statement = $conexion->prepare('DELETE FROM articulos WHERE id = :id');

$statement->execute(array('id' => $id));



header("Location:".Conectar::ruta()."view/UsuHome/");



?>