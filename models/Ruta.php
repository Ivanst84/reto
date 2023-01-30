<?php
    class Ruta extends Conectar{
   
      
    

        public function insert_ruta($nombreRuta,$coordinador,$turno){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO ruta
            (idRuta,nombreRuta,coordinador,turno) VALUES (NULL,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombreRuta);
            $sql->bindValue(2, $coordinador);
            $sql->bindValue(3, $turno);
            
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Funcion para actualizar usuario */
        public function update_ruta($idRuta,$nombreRuta,$coordinador,$turno){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE ruta
                SET
                    nombreRuta= ?,
                    coordinador = ?,
                    turno = ?
                   
                WHERE
                    idRuta= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombreRuta);
           
            $sql->bindValue(2, $coordinador);
            $sql->bindValue(3, $turno);

            $sql->bindValue(4, $idRuta);

            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Eliminar cambiar de estado a la categoria */
        public function delete_ruta($idRuta){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE  FROM ruta
               
                WHERE
                    idRuta= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$idRuta);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Listar todas las categorias */
        public function get_ruta(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT *FROM ruta";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
            print_r($resultado);
        }


        public function get_ruta_id($idRuta){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM ruta WHERE idRuta=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idRuta);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Listar todas las categorias */
       
        public function insert_oferente_ruta($id_o,$idRuta){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO oferente_ruta (ru_of_id,id_o,idRuta,fech_crea,est) VALUES (NULL,?,?,now(),1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(2, $id_o);
            $sql->bindValue(1, $idRuta);
            $sql->execute();

            $sql1="select last_insert_id() as 'ru_of_id'";
            $sql1=$conectar->prepare($sql1);
            $sql1->execute();
            return $resultado=$sql1->fetch(pdo::FETCH_ASSOC);
        }


        public function delete_ruta_oferente($ru_of_id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE oferente_ruta
                SET
                    est = 0
                WHERE
                    ru_of_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $ru_of_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>