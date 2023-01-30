
    <?php require_once("../html/MainHead.php"); ?>
	<?php require_once("../html/MainMenu.php"); ?>
   

<div class="contenedor">

	<h2>Panel de Control</h2>

	<a href="../UsuHome/admin/nuevo.php" class="btn">Nueva Noticia</a>
<!-- <a href="../administracion/user.php" class="btn">Agregar Oferentes</a> -->
<!-- <a href="../rutas/ruta.php" class="btn">Agregar Ruta</a> -->

	<a href="cerrar.php" class="btn">Cerrar Sesion</a>
     	


	<?php foreach($posts as $post): ?>

	<section class="post">

		<article>

			<h2 class="titulo"><?php echo $post['id'] . '.- ' . $post['titulo']; ?></h2>

			<a href="../UsuHome/admin/editar.php?id=<?php echo $post['id']; ?>">Editar</a>

			<a href="../UsuHome/admin/single.php?id=<?php echo $post['id']; ?>">Ver</a>

			<a href="../UsuHome/admin/borrar.php?id=<?php echo $post['id']; ?>">Borrar</a>

		</article>

	</section>

	<?php endforeach; ?>

</div>



<?php require '../../paginacion.php'; ?>



