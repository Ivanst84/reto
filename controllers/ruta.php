<?php
    /*TODO: Llamando a cadena de Conexion */
    require_once("../config/conexion.php");
    /*TODO: Llamando a la clase */
    require_once("../models/Ruta.php");
    /*TODO: Inicializando Clase */
    $ruta= new Ruta();

    /*TODO: Opcion de solicitud de controller */
    switch($_GET["op"]){

        /*TODO: MicroServicio para poder mostrar el listado de cursos de un usuario con certificado */
        /*TODO: Guardar y editar cuando se tenga el ID */
        case "guardaryeditar":
            if(empty($_POST["idRuta"])){
                $ruta->insert_ruta($_POST["nombreRuta"],$_POST["coordinador"],$_POST["turno"]);
                  }else{
                $ruta->update_ruta($_POST["idRuta"],$_POST["nombreRuta"],$_POST["coordinador"],$_POST["turno"]);
               
            }
            
            break;
        /*TODO: Eliminar segun ID */
        case "eliminar":
            $ruta->delete_ruta($_POST["idRuta"]);
            break;
        /*TODO:  Listar toda la informacion segun formato de datatable */
       
        case "listar_ruta":
            $datos=$ruta->get_ruta();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["nombreRuta"];
                $sub_array[] = $row["coordinador"];
               $sub_array[] = $row["turno"];     
             $sub_array[] = '<button type="button" onClick="eliminar('.$row["idRuta"].');"  id="'.$row["idRuta"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-close"></i></div></button>';
            $sub_array[] = '<button type="button" onClick="editar('.$row["idRuta"].');"  id="'.$row["idRuta"].'" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-edit"></i></div></button>';
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
                    $datos = $ruta->get_ruta_id($_POST["idRuta"]);
                    if(is_array($datos)==true and count($datos)<>0){
                        foreach($datos as $row){
                            $output["idRuta"] = $row["idRuta"];
        
                            $output["nombreRuta"] = $row["nombreRuta"];
                            
                            $output["coordinador"] = $row["coordinador"];
                            $output["turno"] = $row["turno"];
                                                      
                            
                        }
                        echo json_encode($output);
        /*TODO: Listar todos los usuarios pertenecientes a un curso */
    
    }
 
 
     break;
     case "combo":
        $datos=$ruta->get_ruta();
        if(is_array($datos)==true and count($datos)>0){
            $html= " <option label='Seleccione'></option>";
            foreach($datos as $row){
                $html.= "<option value='".$row['idRuta']."'>".$row['nombreRuta']."</option>";
            }
            echo $html;
        }
        break;
        case "insert_oferente_ruta":
            $datos = explode(',', $_POST['id_o']);
            /*TODO: Registrar tantos usuarios vengan de la vista */
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $idx=$ruta->insert_oferente_ruta($_POST["idRuta"],$row);
                $sub_array[] = $idx;
                $data[] = $sub_array;
            }
             echo json_encode($data);

             break;

             case "eliminar_ruta_oferente":
                $ruta->delete_ruta_oferente($_POST["ru_of_id"]);
                break;
    }
?>