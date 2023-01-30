<?php
  /*TODO: Llamando Cadena de Conexion */
  require_once("../config/conexion.php");
  
  if(isset($_POST["enviar"]) and $_POST["enviar"]=="si"){
    require_once("../models/Usuario.php");
    /*TODO: Inicializando Clase */
    $usuario = new Usuario();
    $usuario->login();
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:image:type" content="image/png">

    <link rel="stylesheet" href="../public/css/estilos.css">

    <link rel="stylesheet" href="../public/css/separate/pages/login.min.css">
    
    
    <link rel="stylesheet" href="../public/css/lib/bootstrap/bootstrap.min.css">
    <title>URC::Acceso</title>
</head>

<body>
    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
                    <form class="sign-box" action="" method="post" id="login_form">


                            <input type="hidden" id="rol_id" name="rol_id" value="1">



                            <!-- Capturando mensaje de error -->
                            <?php
            if (isset($_GET["m"])){
              switch($_GET["m"]){
                case "1";
                  ?>
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong class="d-block d-sm-inline-block-force">Error!</strong> Datos Incorrectos
                            </div>
                            <?php
                break;

                case "2";
                  ?>
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong class="d-block d-sm-inline-block-force">Error!</strong> Campos vacios
                            </div>
                            <?php
                break;
              }
            }
          ?>
                            <script
                                src="https://www.google.com/recaptcha/api.js?render=6LdlqqIiAAAAAAnzJDC4_ZF7K743HAxpfXavtrYK">
                            </script>



                            <script>
                            $(document).ready(function() {
                                $('#entrar').click(function() {
                                    grecaptcha.ready(function() {
                                        grecaptcha.execute(
                                            '6LdlqqIiAAAAAAnzJDC4_ZF7K743HAxpfXavtrYK', {
                                                action: 'validarUsuario'
                                            }).then(function(token) {
                                            $('#form-login').prepend(
                                                '<input type="hidden" name="token" value="' +
                                                token + '" >');
                                            $('#form-login').prepend(
                                                '<input type="hidden" name="action" value="validarUsuario" >'
                                                );
                                            $('#form-login').submit();
                                        });
                                    });
                                });
                            });
                            </script>
                            <div class="signin-logo tx-center tx-18 tx-bold tx-inverse"><span class="tx-normal">[</span>
                               Union Revolucionaria<span class="tx-normal">]</span></div>

                            <header class="sign-title" id="lbltitulo">Acceso Usuario</header>

                            <div class="form-group">
                                <div class="sign-avatar">
                                    <img src="public/1.jpg" alt="" id="imgtipo">
                                </div>
                                <header class="sign-title" id="lbltitulo">Acceso Usuario</header>
                                <input type="text" id="usuario" name="usuario" class="form-control"
                                    placeholder="Ingrese Correo Electronico">
                            </div>
                            <div class="form-group">
                                <input type="password" id="pass" name="pass" class="form-control"
                                    placeholder="Ingrese Contraseña">
                            </div>
                            <input type="hidden" name="enviar" class="form-control" value="si">
                            <div class="float-left reset">
                                <a href="#" id="btnsoporte">Acceso Soporte</a>
                            </div>
                            <button type="submit" class="btn btn-info btn-block">Acceder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="public/lib/jquery/jquery.js"></script>
        <script src="public/lib/popper.js/popper.js"></script>
        <script src="public/lib/bootstrap/bootstrap.js"></script>
        <script type="text/javascript" src="index.js"></script>

</body>

</html>