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



// Comprobamos si la session esta iniciada, sino, redirigimos.

$usuario ->comprobarSession();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {



	// Limpiamos los datos para evitar que el usuario inyecte codigo.

	$titulo =  $usuario ->limpiarDatos($_POST['titulo']);

	$extracto = $usuario -> limpiarDatos($_POST['extracto']);

	


	$texto = $_POST['texto'];

	$id =  $usuario ->limpiarDatos($_POST['id']);

	$thumb_guardada = $_POST['thumb-guardada'];

	$thumb = $_FILES['thumb'];



	# Comprobamos que el nombre del thumb no este vacio, si lo esta

	# significa que el usuario no agrego una nueva thumb y entonces utilizamos la thumb anterior.

	if (empty($thumb['name'])) {

		$thumb = $thumb_guardada;

	} else {

		// De otra forma cargamos la nueva thumb

		// Direccion final del archivo incluyendo el nombre

		# Importante recordar que este archivo se encuentra dentro de la carpeta admin, asi que

		# tenemos que concatenar al inicio '../' para bajar a la raiz de nuestro proyecto.

		$archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];



		move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido);

		$thumb = $_FILES['thumb']['name'];



	}



	$statement = $conexion->prepare('UPDATE articulos SET titulo = :titulo, extracto = :extracto, texto = :texto, thumb = :thumb WHERE id = :id');

	$statement->execute(array(

		':titulo' => $titulo,

		':extracto' => $extracto,

		':texto' => $texto,

		':thumb' => $thumb,

		':id' => $id

	));



	header("Location: /admin/index.php");

} else {

	$id_articulo =  $usuario ->id_articulo($_GET['id']);



	if (empty($id_articulo)) {

		header('Location: /admin');

	}



	// Obtenemos el post por id

	$post =  $usuario ->obtener_post_por_id($conexion, $id_articulo);



	// Si no hay post en el ID entonces redirigimos.

	if (!$post) {

		header('Location:/admin/index.php');

	}

	$post = $post[0];

}

	

require '../editar.index.view.php';



?>