<?php 


/*TODO: Llamando a la clase */


require_once("../../config/conexion.php");
require_once("../../models/Usuario.php");
$usuario = new Usuario();
// Comprobamos si la session esta iniciada, sino, redirigimos.

$usuario->comprobarSession();


$posts =$usuario->obtener_post($blog_config['post_por_pagina']);



    




require 'index.view.php';

require '../../paginacion.php'; 

?>