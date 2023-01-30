
 <?php  require_once("../../config/conexion.php");?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once("../html/MainHead.php"); ?>

    <title>Empresa::Articulos</title>
  </head>

  <body>

    <?php require_once("../html/MainMenu.php"); ?>

    <?php require_once("../html/MainHeader.php"); ?>

    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Base de datos Oferentes URC</a>
        </nav>
      </div>
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Miembros URC</h4>
        <p class="mg-b-0">Miembros URC</p>
      </div>

      <div class="br-pagebody">
         <div class="br-section-wrapper">
       
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Oferentes</h6>
            <p class="mg-b-30 tx-gray-600">Listado de oferentes</p>

       <button class="btn btn-outline-primary" id="add_button"
        onclick="nuevo()"> Nuevo Registro</button>

            <p></p>

            <div class="table-wrapper"></div>
                <table id="oferente_data" class="table display responsive nowrap">
                <thead>
                    <tr>
                    <th class="wd-15p">Nombre</th>
                    <th class="wd-15p">Apellido Paterno</th>
                    <th class="wd-15p">Apellido Materno</th>
                    <th class="wd-15p"> Sexo</th>
                    <th class="wd-15p"> Calle</th>
                    <th class="wd-15p"> Colonia</th>
                    <th class="wd-15p"> No.</th>
                    <th class="wd-15p"> Telefono</th>
                    <th class="wd-15p"> Correo</th>

                    <th class="wd-10p"></th>
                    <th class="wd-10p"></th>
                             





                    
                    </tr>
                </thead>
                <tbody>

                </tbody>
                </table>
            </div>

        </div>
      </div>
    </div>

    <?php require_once("modalmantenimiento.php"); ?>

    <?php require_once("../html/MainJs.php"); ?>
    <script type="text/javascript" src="./adminmntoferente.js"></script>
  </body>
</html>
<?php
  
?>