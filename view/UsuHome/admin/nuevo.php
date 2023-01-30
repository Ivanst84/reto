
<?php 
 
 
require_once("../../../config/conexion.php");
require_once("../../../models/Usuario.php");



$usuario= new Usuario();

// Comprobamos si la session esta iniciada, sino, redirigimos.

$usuario->comprobarSession();



// Conectamos a la base de datos





// Comprobamos si los datos han sido enviados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conexion = $usuario ->conexion($bd_config);

	$titulo = $usuario->limpiarDatos($_POST['titulo']);

	$extracto =$usuario-> limpiarDatos($_POST['extracto']);

	// Con la funcion nl2br podemos transformar los saltos de linea en etiquetas <br>

	$texto = $_POST['texto'];

	$thumb = $_FILES['thumb']['tmp_name'];

  echo $thumb;

	// Direccion final del archivo incluyendo el nombre

	# Importante recordar que este archivo se encuentra dentro de la carpeta admin, asi que

	# tenemos que concatenar al inicio '../' para bajar a la raiz de nuestro proyecto.


	$statement =$conexion->prepare(

		'INSERT INTO articulos (id, titulo, extracto, texto ) 

		VALUES (null, :titulo, :extracto, :texto )'

	);



	$statement->execute(array(

		':titulo' => $titulo,

		':extracto' => $extracto,

		':texto' => $texto,


	));



    header("Location:".Conectar::ruta()."view/UsuHome/");
}






require '../nuevo.view.php';



?>
