<?php
    class Oferente extends Conectar{
   
      
        public function get_oferente_id($id_o){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM oferente WHERE id_o=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_o);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }


        public function insert_oferente($nombre_o,$apellidoP_o,$apellidoM_o,$calle_o,$colonia_o,$numero_o,$sexo_o,$correo_o,$telefono_o){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO 
            oferente 
            (id_o,nombre_o,apellidoP_o,apellidoM_o,calle_o,colonia_o,numero_o,
            sexo_o,correo_o,telefono_o,est) VALUES (NULL,?,?,?,?,?,?,?,?,?,'1');";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_o);
            $sql->bindValue(2, $apellidoP_o);
            $sql->bindValue(3, $apellidoM_o);
            $sql->bindValue(4, $calle_o);
            $sql->bindValue(5, $colonia_o);
            $sql->bindValue(6, $numero_o);
            $sql->bindValue(7, $sexo_o);
            $sql->bindValue(8, $correo_o);
            $sql->bindValue(9, $telefono_o);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Funcion para actualizar usuario */
        public function update_oferente($id_o,$nombre_o,$apellidoP_o,$apellidoM_o,$calle_o,$colonia_o,$numero_o,$sexo_o,$correo_o,$telefono_o){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE oferente
                SET
                    nombre_o= ?,
                    apellidoP_o = ?,
                    apellidoM_o = ?,
                    calle_o = ?,
                    colonia_o = ?,
                    numero_o  = ?,
                    sexo_o = ?,
                    correo_o = ?,
                    telefono_o= ?
                WHERE
                    id_o= ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre_o);
           
            $sql->bindValue(2, $apellidoP_o);
            $sql->bindValue(3, $apellidoM_o);
            $sql->bindValue(4, $calle_o);
            $sql->bindValue(5, $colonia_o);
            $sql->bindValue(6, $numero_o);
            $sql->bindValue(7, $sexo_o);
            $sql->bindValue(8, $correo_o);
            $sql->bindValue(9, $telefono_o);
            $sql->bindValue(10, $id_o);

            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Eliminar cambiar de estado a la categoria */
        public function delete_oferente($id_o){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE oferente
                SET
                    est = 0
                WHERE
                    id_o = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id_o);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Listar todas las categorias */
        public function get_oferente(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT *FROM oferente WHERE est='1'"  ;
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Listar todas las categorias */
       

        public function get_oferente_modal($idRuta){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM oferente
                WHERE est = 1
                AND id_o not in (select id_o from oferente_ruta WHERE idRuta=?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$idRuta);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    

    }
?>