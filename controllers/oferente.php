<?php
    /*TODO: Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*TODO: Llamando a la clase */
    require_once("../models/Oferente.php");
    /*TODO: Inicializando Clase */
    $oferente= new Oferente();

    /*TODO: Opcion de solicitud de controller */
    switch($_GET["op"]){

        /*TODO: MicroServicio para poder mostrar el listado de cursos de un usuario con certificado */
        /*TODO: Guardar y editar cuando se tenga el ID */
        case "guardaryeditar":
            if(empty($_POST["id_o"])){
                $oferente->insert_oferente(
                $_POST["nombre_o"],
                $_POST["apellidoP_o"],
                $_POST["apellidoM_o"],
                $_POST["calle_o"],
                $_POST["colonia_o"],
                $_POST["numero_o"],
                $_POST["sexo_o"],
                $_POST["correo_o"],
                $_POST["telefono_o"]);
            }else{
                $oferente->update_oferente($_POST["id_o"],
                $_POST["nombre_o"],
                $_POST["apellidoP_o"],
                $_POST["apellidoM_o"],
                $_POST["calle_o"],
                $_POST["colonia_o"],
                $_POST["numero_o"],
                $_POST["sexo_o"],
                $_POST["correo_o"],
                $_POST["telefono_o"]); 
            }
            
            break;
        /*TODO: Eliminar segun ID */
        case "eliminar":
            $oferente->delete_oferente($_POST["id_o"]);
            break;
        /*TODO:  Listar toda la informacion segun formato de datatable */
       
        case "listar_oferente":
                $datos=$oferente->get_oferente();
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    $sub_array[] = $row["nombre_o"];
                    $sub_array[] = $row["apellidoP_o"];
                    $sub_array[] = $row["apellidoM_o"];
                    $sub_array[] = $row["sexo_o"];
                    $sub_array[] = $row["calle_o"];
                    $sub_array[] = $row["colonia_o"];   
                    $sub_array[] = $row["numero_o"]; 
                   $sub_array[] = $row["telefono_o"];  
                    $sub_array[] = $row["correo_o"];    

                    $sub_array[] = '<button type="button" onClick="eliminar('.$row["id_o"].');"  id="'.$row["id_o"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
                    $sub_array[] = '<button type="button" onClick="editar('.$row["id_o"].');"  id="'.$row["id_o"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-edit"></i></div></button>';
                    $data[] = $sub_array;
                }

                $results = array(
                    "sEcho"=>1,
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data);
                echo json_encode($results);
                break;

                case "mostrar":
                    $datos = $oferente->get_oferente_id($_POST["id_o"]);
                    if(is_array($datos)==true and count($datos)<>0){
                        foreach($datos as $row){
                            $output["id_o"] = $row["id_o"];
        
                            $output["nombre_o"] = $row["nombre_o"];
                            
                            $output["apellidoP_o"] = $row["apellidoP_o"];
                            $output["apellidoM_o"] = $row["apellidoM_o"];
                            $output["calle_o"] = $row["calle_o"];
                            $output["colonia_o"] = $row["colonia_o"];
                            $output["numero_o"] = $row["numero_o"];
                            $output["sexo_o"] = $row["sexo_o"];
                            $output["correo_o"] = $row["correo_o"];
                            $output["telefono_o"] = $row["telefono_o"];



                           
                            
                        }
                        echo json_encode($output);
        /*TODO: Listar todos los usuarios pertenecientes a un curso */
    
    }
    break;

    case "listar_detalle_oferente":
        $datos=$oferente->get_oferente_modal($_POST["idRuta"]);
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

        
}
?>