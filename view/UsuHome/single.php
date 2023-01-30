<?php 


require_once("../../config/conexion.php");
require_once("../../models/Usuario.php");

$usuario = new Usuario();
$conexion = $usuario->conexion($bd_config);

// $id_articulo = (int)limpiarDatos($_GET['id']);

$id_articulo = $usuario->id_articulo($_GET['id']);



if (!$conexion) {

	header('Location: error.php');

}



if (empty($id_articulo)) {

	header('Location: index.php');

}



$post = $usuario->obtener_post_por_id($conexion, $id_articulo);



if (!$post) {

	// Redirigimos al index si no hay post

	header('Location: index.php');

}



$post = $post[0];



require 'single.view.php';
	
		 require '../../paginacion.php';



?>