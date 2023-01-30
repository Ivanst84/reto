<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["idUsuario"])) {
?>
  
  <!DOCTYPE html>
  <html>
  <?php
  
require_once("../html/MainHead.php");
require_once("../html/MainMenu.php");
 require_once("../html/MainHeader.php");

?><meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
   
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<link rel="stylesheet" href="../../public/css/separate/vendor/fancybox.min.css">
<link rel="stylesheet" href="../../public/css/separate/pages/activity.min.css">







<link rel="stylesheet" href="../../public/css/main.css"> 


<title>URC</>:: Atencion</title>
  </head>

  <body class="with-side-menu">

    

               
                <input type="hidden" id="idx" value="1"><!-- ID del Usuario-->
                <input type="hidden" id="rol_idx" value="1"><!-- Rol del Usuario-->

               

     


               
        
    <!-- Contenido -->
    <div class="page-content">
      <div class="container-fluid">

        <header class="section-header">
          <div class="tbl">
            <div class="tbl-row">
              <div class="tbl-cell">
                <h3 id="lblnomidticket">Detalle Ticket - 1</h3>
                <div id="lblestado"></div>
                <span class="label label-pill label-primary" id="lblnomusuario"></span>
                <span class="label label-pill label-default" id="lblfechcrea"></span>
                <ol class="breadcrumb breadcrumb-simple">
                  <li><a href="#">Home</a></li>
                  <li class="active">Detalle Ticket</li>
                </ol>
              </div>
            </div>
          </div>
        </header>

        <div class="box-typical box-typical-padding">
          <div class="row">

              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="cat_nom">Categoria</label>
                  <input type="text" class="form-control" id="cat_nom" name="cat_nom" readonly>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tick_titulo">Titulo</label>
                  <input type="text" class="form-control" id="tick_titulo" name="tick_titulo" readonly>
                </fieldset>
              </div>

              <div class="col-lg-12">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tickd_descripusu">Descripción</label>
                  <div class="summernote-theme-1">
                    <textarea id="tickd_descripusu" name="tickd_descripusu" class="summernote" name="name"></textarea>
                  </div>

                </fieldset>
              </div>

          </div>
        </div>

        <section class="activity-line" id="lbldetalle">

        </section>

        <div class="box-typical box-typical-padding" id="pnldetalle">
          <p>
            Ingrese su duda o consulta
          </p>
          <div class="row">
              <div class="col-lg-12">
                <fieldset class="form-group">
                  <label class="form-label semibold" for="tickd_descrip">Descripción</label>
                  <div class="summernote-theme-1">
                    <textarea id="tickd_descrip" name="tickd_descrip" class="summernote" name="name"></textarea>
                  </div>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <button type="button" id="btnenviar" class="btn btn-rounded btn-inline btn-primary">Enviar</button>
                <button type="button" id="btncerrarticket" class="btn btn-rounded btn-inline btn-warning">Cerrar</button>
              </div>
          </div>
			  </div>

      </div>
    </div>
    <!-- Contenido -->

   



<?php require_once("../html/MainJs.php"); ?>

<script type="text/javascript" src="detallesolicitud.js"></script>
  </body>

  </html>
<?php
} else {
  header("Location:" . Conectar::ruta() . "index.php");
}
?>