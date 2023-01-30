<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

	<link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/public/css/estilo.css">

     <div id="modalmantenimiento" class="contenedor">

		<div class="post">

			<article>

				<h2 class="titulo">Editar</h2>

				<form method="post" id="cursos_form"action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" enctype="multipart/form-data" method="post">

					<input type="hidden" name="id" value="<?php echo $post['id']; ?>">

					<input type="text" name="titulo" value="<?php echo $post['titulo'] ?>">

					<input type="text" name="extracto" value="<?php echo $post['extracto']; ?>">

					<textarea name="texto"><?php echo $post['texto']; ?></textarea>

					<input type="file" name="thumb">

					<input type="hidden" name="thumb-guardada" value="<?php echo $post['thumb']; ?>">



					<input type="submit" value="Guardar Datos">

				</form>

			</article>

		</div>

	</div>



