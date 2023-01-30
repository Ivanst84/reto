<?php
    class Solicitud extends Conectar{

        public function insert_solicitud($idUsuario,$cat_id,$soli_titulo,$soli_descrip){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_solicitud(solicitud_id,idUsuario,cat_id,soli_titulo,soli_descrip,soli_estado,fech_crea,est) VALUES (NULL,?,?,?,?,'ABIERTO',now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idUsuario);
            $sql->bindValue(2, $cat_id);
            $sql->bindValue(3, $soli_titulo);
            $sql->bindValue(4, $soli_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        
        }
        public function listar_solicitud_x_usu($idUsuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                tm_solicitud.solicitud_id,
                tm_solicitud.idUsuario,
                tm_solicitud.cat_id,
                tm_solicitud.soli_titulo,
                tm_solicitud.soli_descrip,
                tm_solicitud.soli_estado,
                tm_solicitud.fech_crea,
                usuario.usuario,
                usuario.correo,
                tm_categoria.cat_nom
                FROM 
                tm_solicitud
                INNER join tm_categoria on tm_solicitud.cat_id = tm_categoria.cat_id
                INNER join usuario on tm_solicitud.idUsuario = usuario.idUsuario
                WHERE
                tm_solicitud.est = 1
                AND usuario.idUsuario=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idUsuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        
        public function update_solicitud($solicitud_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="update tm_solicitud 
                set	
                    soli_estado = 'Cerrado'
                where
                    solicitud_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $solicitud_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_solicitud(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                tm_solicitud.solicitud_id,
                tm_solicitud.idUsuario,
                tm_solicitud.cat_id,
                tm_solicitud.soli_titulo,
                tm_solicitud.soli_descrip,
                tm_solicitud.soli_estado, 
                tm_solicitud.fech_crea,
                usuario.usuario,
                usuario.correo,
                tm_categoria.cat_nom
                FROM 
                tm_solicitud
                INNER join tm_categoria on tm_solicitud.cat_id = tm_categoria.cat_id
                INNER join usuario on tm_solicitud.idUsuario = usuario.idUsuario
                WHERE
                tm_solicitud.est = 1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function listar_ticket_x_id($solicitud_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT 
                tm_solicitud.solicitud_id,
                tm_solicitud.idUsuario,
                tm_solicitud.cat_id,
                tm_solicitud.soli_titulo,
                tm_solicitud.soli_descrip,
                tm_solicitud.soli_estado,
                tm_solicitud.fech_crea,
                usuario.usuario,
                usuario.correo,
                tm_categoria.cat_nom
                FROM 
                tm_solicitud
                INNER join tm_categoria on tm_solicitud.cat_id = tm_categoria.cat_id
                INNER join usuario on tm_solicitud.idUsuario = usuario.idUsuario
                WHERE
                tm_solicitud.est = 1
                AND tm_solicitud.solicitud_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$solicitud_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function listar_ticketdetalle_x_ticket($solicitud_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT
                td_ticketdetalle.tickd_id,
                td_ticketdetalle.tickd_descrip,
                td_ticketdetalle.fech_crea,
                usuario.usuario,
                usuario.correo,
                usuario.idRol
                FROM 
                td_ticketdetalle
                INNER join usuario on td_ticketdetalle.idUsuario =usuario.idUsuario
                WHERE 
                solicitud_id =?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$solicitud_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_ticketdetalle($solicitud_id,$idUsuario,$tickd_descrip){
            $conectar= parent::conexion();
            parent::set_names();
                $sql="INSERT INTO td_ticketdetalle (tickd_id,solicitud_id,idUsuario,tickd_descrip,fech_crea,est) VALUES (NULL,?,?,?,now(),'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $solicitud_id);
            $sql->bindValue(2, $idUsuario);
            $sql->bindValue(3, $tickd_descrip);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insert_solicituddetalle_cerrar($solicitud_id,$idUsuario){
            $conectar= parent::conexion();
            parent::set_names();
                $sql="call sp_i_ticketdetalle_01(?,?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $solicitud_id);
            $sql->bindValue(2, $idUsuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }



    }
?>