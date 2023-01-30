
 

  <style>
	  

 /*  tamaño de letra tipo de letra y fondo de el body urc*/ 

 /*  tamañop de titulos y subtitulos, utiles para mostrar el titulo de cada noticia, la fecha y hora de subida*/ 



.contenedor {
	max-width: 900px;
	width: 60%;
	margin: auto;
}



/* --- estilos para el header  tamaño y color de fondo asi como letras ---*/

/* --- Post --- */
.post {
	width: 100%;
	background: #fff;
	box-shadow: 0px 0px 5px rgba(0,0,0, .5);
	margin-bottom: 30px;
	padding: 30px;
}

.post article .titulo {
	font-family: "Oswald", Arial, Sans-serif;
	font-size: 28px;
	font-weight: normal;
	line-height: 28px;
	margin-bottom: 10px;
}

.post article .titulo a {
	color:#000;
}

.post article .fecha {
	color:#747474;
	font-size: 14px;
	margin-bottom: 20px;
}
/* --- margen para la foto del articulo el cual es un .thumb--*/

.post article .thumb {
	margin-bottom: 20px;
}
/* ---tamaño foto principal de noticia ---*/

.post article .thumb img {
	vertical-align: top;
	width: 50%;
   
}

.post article .extracto {
	font-size: 14px;
	line-height: 20px;
	margin-bottom: 20px;
}

.post article .continuar {
	color:#BB1F35;
	font-weight: bold;
}

.btn {
	padding: 15px;
	display: inline-block;
	margin: 15px 0;
	background: #595959;
	color:#fff;
	font-size: 1em;
	font-family: Arial, sans-serif, helvetica;
	border-radius: 2px;
	border:none;
}

.btn:hover {
	text-decoration: none;
	background: #BB1F35;
}


  </style>
 
<div class="contenedor">

		<section class="post">

			<article>

				<h2 class="titulo"><?php echo $post['titulo'] ?></h2>

				<p class="fecha"><p class="fecha"><?php
				$usuario= new Usuario();
			
				echo $usuario->fecha($post['fecha']); ?></p></p>

				<div class="thumb">

					<img src="<?php echo $post['thumb']; ?>" alt="<?php echo $post['titulo'] ?>">

				</div>

				<!-- Con la funcion nl2br insertamos un salto de linea antes de todas las lineas nuevas de un string. -->

				<p class="extracto"><?php echo nl2br($post['texto']); ?></p>

			</article>
			
           <th><a href="index.php?>" class="btn btn-danger">Volver</a></th> 
		</section>

	</div>


	<?php require '../../paginacion.php'; ?>

