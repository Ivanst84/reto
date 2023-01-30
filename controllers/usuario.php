<?php
    /*TODO: Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*TODO: Llamando a la clase */
    require_once("../models/Usuario.php");
    /*TODO: Inicializando Clase */
    $usuario = new Usuario();
    function limpiarDatos($datos)
    {
  
    
    // Eliminamos los espacios en blanco al inicio y final de la cadena

               $datos = trim($datos);



               // Quitamos las barras / escapandolas con comillas

              $datos = stripslashes($datos);



               // Convertimos caracteres especiales en entidades HTML (&, "", '', <, >)

              $datos = htmlspecialchars($datos);

                   return $datos;

     }


    /*TODO: Opcion de solicitud de controller */
    switch($_GET["op"]){

        /*TODO: MicroServicio para poder mostrar el listado de cursos de un usuario con certificado */
        case "listar_cursos":
             
      $posts = obtener_post($blog_config['post_por_pagina']);



// Si no hay post entonces redirigimos

                if(!$posts){

	         header('Location: error.php');

}



require 'views/index.view.php';

            

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

            break;

        /*TODO: MicroServicio para poder mostrar el listado de cursos de un usuario con certificado */
        case "listar_cursos_top10":
            $datos=$usuario->get_cursos_x_usuario_top10($_POST["usu_id"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["cur_nom"];
                $sub_array[] = $row["cur_fechini"];
                $sub_array[] = $row["cur_fechfin"];
                $sub_array[] = $row["inst_nom"]." ".$row["inst_apep"];
                $sub_array[] = '<button type="button" onClick="certificado('.$row["curd_id"].');"  id="'.$row["curd_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-id-card-o"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);

            break;

        /*TODO: Microservicio para mostar informacion del certificado con el curd_id */
        case "mostrar_curso_detalle":
            $datos = $usuario->get_curso_x_id_detalle($_POST["curd_id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["curd_id"] = $row["curd_id"];
                    $output["cur_id"] = $row["cur_id"];
                    $output["cur_nom"] = $row["cur_nom"];
                    $output["cur_descrip"] = $row["cur_descrip"];
                    $output["cur_fechini"] = $row["cur_fechini"];
                    $output["cur_fechfin"] = $row["cur_fechfin"];
                    $output["cur_img"] = $row["cur_img"];
                    $output["usu_id"] = $row["usu_id"];
                    $output["usu_nom"] = $row["usu_nom"];
                    $output["usu_apep"] = $row["usu_apep"];
                    $output["usu_apem"] = $row["usu_apem"];
                    $output["inst_id"] = $row["inst_id"];
                    $output["inst_nom"] = $row["inst_nom"];
                    $output["inst_apep"] = $row["inst_apep"];
                    $output["inst_apem"] = $row["inst_apem"];
                }

                echo json_encode($output);
            }
            break;
        /*TODO: Total de Cursos por usuario para el dashboard */
        case "total":
            $datos=$usuario->get_total_cursos_x_usuario($_POST["usu_id"]);
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["total"] = $row["total"];
                }
                echo json_encode($output);
            }
            break;
        /*TODO: Mostrar informacion del usuario en la vista perfil */
        case "mostrar":
            $datos = $usuario->get_articulo_id($_POST["id"]);
            if(is_array($datos)==true and count($datos)<>0){
                foreach($datos as $row){
                    $output["id"] = $row["id"];

                    $output["titulo"] = $row["titulo"];
                    
                    $output["extracto"] = $row["extracto"];
                    $output["texto"] = $row["texto"];
                   
                    
                }
                echo json_encode($output);
            }
            break;
            case "mostrar_usuario":

                $datos = $usuario->get_usuario_id($_POST["idUsuario"]);
                if(is_array($datos)==true and count($datos)<>0)
                {
                    foreach($datos as $row){
                        $output["idUsuario"] = $row["idUsuario"];
    
                        $output["usuario"] = $row["usuario"];
                        
                        $output["correo"] = $row["correo"];
                        $output["pass"] = $row["pass"];
                        $output["telefono"] = $row["telefono"];
                        
                    }
                    echo json_encode($output);
                }
                break;
        /*TODO: Mostrar informacion segun DNI del usuario registrado */
    
        /*TODO: Actualizar datos de perfil */
        case "update_perfil":
            $usuario->update_usuario_perfil(
                $_POST["idUsuario"],
                $_POST["usuario"],
                $_POST["correo"],
                $_POST["pass"],
                $_POST["telefono"]
               
            );
            case "insert_comentario":
                $usuario->insert_comentario($_POST["usuario"]);
            break;
        /*TODO: Guardar y editar cuando se tenga el ID */
        case "guardaryeditar":
            if(empty($_POST["id"])){  
                
                $usuario->insert_articulo(
                    
                 $_POST["titulo"],$_POST["extracto"],$_POST["texto"],$_POST["thumb"]
                );
            }else{
                $usuario->update_articulo($_POST["id"],$_POST["titulo"],$_POST["extracto"],$_POST["texto"],$_POST["thumb"]);
            }
            break;
        /*TODO: Eliminar segun ID */
        case "eliminar":
            $usuario->delete_articulo($_POST["id"]);
            break;
        /*TODO:  Listar toda la informacion segun formato de datatable */
        case "listar":
                $datos=$usuario->get_usuario();
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    $sub_array[] = $row["titulo"];
                    $sub_array[] = $row["extracto"];
                    $sub_array[] = $row["fecha"];
                    $sub_array[] = $row["texto"];
                    $sub_array[] = $row["thumb"];
                    $sub_array[] = '<button type="button" onClick="editar('.$row["id"].');"  id="'.$row["id"].'" class="btn btn-outline-warning btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="eliminar('.$row["id"].');"  id="'.$row["id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="imagen('.$row["id"].');"  id="'.$row["id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
                    $data[] = $sub_array;
                }

                $results = array(
                    "sEcho"=>1,
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data);
                echo json_encode($results);
                break;
        /*TODO: Listar todos los usuarios pertenecientes a un curso */
        case "listar_ruta_oferente":
            $datos=$usuario->get_persona_ruta_x_id($_POST["idRuta"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["nombreRuta"];
                $sub_array[] = $row["nombre_o"]." ".$row["apellidoP_o"]." ".$row["apellidoM_o"];
                $sub_array[] = $row["correo_o"];
                $sub_array[] = $row["telefono_o"];
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["ru_of_id"].');"  id="'.$row["ru_of_id"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;

        case "listar_detalle_usuario":
            $datos=$usuario->get_usuario_modal($_POST["idRuta"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = "<input type='checkbox' name='detallecheck[]' value='". $row["id_o"] ."'>";
                $sub_array[] = $row["nombre_o"];
                $sub_array[] = $row["apellidoP_o"];
                $sub_array[] = $row["apellidoM_o"];
                $sub_array[] = $row["correo_o"];
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
          case "guardar_desde_excel":
            
            $usuario->insert_usuario($_POST["usu_nom"],$_POST["usu_apep"],$_POST["usu_apem"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["usu_sex"],$_POST["usu_telf"],$_POST["rol_id"],$_POST["usu_dni"]);

            break;

            case "update_imagen_articulo":
                $usuario->update_imagen_articulo($_POST["idx"],$_POST["thumb"]);
                break;
                

          


    }
?>