<?php
    require_once("../config/conexion.php");
    require_once("../models/Solicitud.php");
    $solicitud = new Solicitud();

    switch($_GET["op"]){
        
        case "insert":
            $solicitud->insert_solicitud($_POST["idUsuario"],$_POST["cat_id"],$_POST["soli_titulo"],$_POST["soli_descrip"]);
        break;
    
    
        case "listar_x_usu":
            $datos=$solicitud->listar_solicitud_x_usu($_POST["idUsuario"]);
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["solicitud_id"];
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["soli_titulo"];
                if ($row["soli_estado"]=="ABIERTO"){
                    $sub_array[] = '<span class="badge badge-pill badge-success">Abierto</span>';

                
                }else{
                    $sub_array[] = '<span class="badge badge-pill badge-danger">Cerrado</span>
                    ';
                }
                
                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));
                $sub_array[] = '<button type="button" onClick="ver('.$row["solicitud_id"].');"  id="'.$row["solicitud_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
        

        case "listar":
            $datos=$solicitud->listar_solicitud();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["solicitud_id"];
                $sub_array[] = $row["cat_nom"];
                $sub_array[] = $row["soli_titulo"];

                if ($row["soli_estado"]=="ABIERTO"){
                    $sub_array[] = '<span class="badge badge-pill badge-success">Abierto</span>';

                
                }else{
                    $sub_array[] = '<span class="badge badge-pill badge-danger">Cerrado</span>
                    ';
                }
                
                $sub_array[] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));
                $sub_array[] = '<button type="button" onClick="ver('.$row["solicitud_id"].');"  id="'.$row["solicitud_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><i class="fa fa-eye"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;


        case "listardetalle":
            $datos=$solicitud->listar_ticketdetalle_x_ticket($_POST["solicitud_id"]);
            ?>
                <?php
                    foreach($datos as $row){
                        ?>
                            <article class="activity-line-item box-typical">
                                <div class="activity-line-date">
                                    <?php echo date("d/m/Y", strtotime($row["fech_crea"]));?>
                                </div>
                                <header class="activity-line-item-header">
                                    <div class="activity-line-item-user">
                                        <div class="activity-line-item-user-photo">
                                            <a href="#">
                                                <img src="../../public/<?php echo $row['idRol'] ?>.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="activity-line-item-user-name"><?php echo $row['usuario'].' '.$row['correo'];?></div>
                                        <div class="activity-line-item-user-status">
                                            <?php 
                                                if ($row['idRol']==1){
                                                    echo 'Oferente';
                                                }else{
                                                    echo 'Comite';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </header>
                                <div class="activity-line-action-list">
                                    <section class="activity-line-action">
                                        <div class="time"><?php echo date("H:i:s", strtotime($row["fech_crea"]));?></div>
                                        <div class="cont">
                                            <div class="cont-in">
                                                <p>
                                                    <?php echo $row["tickd_descrip"];?>
                                                </p>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </article>
                        <?php
                    }
                ?>
            <?php
        break;

        case "mostrar";
            $datos=$solicitud->listar_ticket_x_id($_POST["solicitud_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["solicitud_id"] = $row["solicitud_id"];
                    $output["idUsuario"] = $row["idUsuario"];
                    $output["cat_id"] = $row["cat_id"];

                    $output["soli_titulo"] = $row["soli_titulo"];
                    $output["soli_descrip"] = $row["soli_descrip"];

                    if ($row["soli_estado"]=="ABIERTO"){
                        $output["soli_estado"] = '<span class="label label-pill label-success">Abierto</span>';
                    }else{
                        $output["soli_estado"] = '<span class="label label-pill label-danger">Cerrado</span>';
                    }

                    $output["solicitud_estado_texto"] = $row["soli_estado"];

                    $output["fech_crea"] = date("d/m/Y H:i:s", strtotime($row["fech_crea"]));
                    $output["usuario"] = $row["usuario"];
                    $output["correo"] = $row["correo"];
                    $output["cat_nom"] = $row["cat_nom"];
                }
                echo json_encode($output);
            }   
        break;

        case "insertdetalle":
            $solicitud->insert_ticketdetalle($_POST["solicitud_id"],$_POST["idUsuario"],$_POST["tickd_descrip"]);
        break;

        case "update":
            $solicitud->update_solicitud($_POST["solicitud_id"]);
            $solicitud->insert_solicituddetalle_cerrar($_POST["solicitud_id"],$_POST["idUsuario"]);
        break;


        case "total";
            $datos=$solicitud->get_ticket_total();  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["TOTAL"] = $row["TOTAL"];
                }
                echo json_encode($output);
            }
        break;

       
    }
        ?>