
<?php require_once("../../models/Usuario.php");

require_once("../../config/conexion.php");


?>

<section class="paginacion">

	<ul>

		<?php 

			# Establecemos el numero de paginas
			$numero_paginas =$usuario-> numero_paginas($blog_config['post_por_pagina']);

			

		?>

		<!-- Mostramos el boton para retroceder una pagina -->

		<?php 
		require_once("../../models/Usuario.php");
		
				if ($usuario->pagina_actual() === 1): ?>

			<li class="disabled">&laquo;</li>

		<?php else: ?>

			<li><a href="index.php?p=<?php echo $usuario-> pagina_actual() - 1?>">&laquo;</a></li>

		<?php endif; ?>



		<!-- Creamos un elemento li por cada pagina que tengamos -->

		<?php for ($i = 1; $i <= $numero_paginas; $i++): ?>

			<!-- Agregamos la clase active en la pagina actual -->

			<?php if ($usuario->pagina_actual() === $i): ?>

				<li class="active">

					<?php echo $i; ?>

				</li>

			<?php else: ?>

				<li>

					<a href="index.php?p=<?php echo $i?>"><?php echo $i; ?></a>

				</li>

			<?php endif; ?>

		<?php endfor; ?>



		<!-- Mostramos el boton para avanzar una pagina -->

		<?php 
		if ($usuario->pagina_actual() == $numero_paginas): ?>

			<li class="disabled">&raquo;</li>

		<?php else: ?>

			<li><a href="index.php?p=<?php echo $usuario->pagina_actual() + 1; ?>">&raquo;</a></li>

		<?php endif; ?>

	</ul>

</section>