<?php  require_once("../../config/conexion.php");?>

<!DOCTYPE html>
<html lang="es">
  <head>
  <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <script type="text/javascript" src="cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- include summernote css/js-->


    <?php require_once("../html/MainHead.php"); ?>
	
    <title>URC::Servicios</title>
  </head>

  <body>

    <?php require_once("../html/MainMenu.php"); ?>

    <?php require_once("../html/MainHeader.php"); ?>
	<div class="br-mainpanel">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Solicitud de servicio</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Inicio</a></li>
								<li class="active">Nueva solicitud</li>
							</ol>
						</div>
					</div>
				</div>
			
	
			<div class="box-typical box-typical-padding">
				<p>
					 Modulo Solicitudes y quejas
				</p>

				<h5 class="m-t-lg with-border">Ingresar Información</h5>

			
					<form method="post" id="ticket_form">

						<input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION["idUsuario"] ?>">

						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Categoria</label>
								<select id="cat_id" name="cat_id" class="form-control">
									
								</select>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="soli_titulo">Titulo</label>
								<input type="text" class="form-control" id="soli_titulo" name="soli_titulo" placeholder="Ingrese Titulo">
							</fieldset>
						</div>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="soli_descrip">Descripción</label>
								<div class="summernote-theme-1">
									<textarea id="soli_descrip" name="soli_descrip" class="summernote" name="name"></textarea>
								</div>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
						</div>
					</form>
				</div>

			</div>
	             	</div>
	                </div>
             	</div>
	</div>	
	<!-- Contenido -->
	

    <?php require_once("../html/MainJs.php"); ?>
	<script type="text/javascript" src="servicio.js"></script>

  

	
  </body>
</html>
<?php
  
?>