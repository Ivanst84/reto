<?php
    class Usuario extends Conectar
    {
      
        /*TODO: Funcion para login de acceso del usuario */
        public function login(){
            $conectar=parent::conexion();
            parent::set_names();
            if(isset($_POST["enviar"])){
                $usuario = $_POST["usuario"];
                $pass = $_POST["pass"];
                if(empty($usuario) and empty($pass)){
                    /*TODO: En caso esten vacios correo y contraseña, devolver al index con mensaje = 2 */
                    header("Location:".conectar::ruta()."index.php?m=2");
					exit();
                }else{
                    $sql = "SELECT * FROM usuario WHERE usuario=? and pass=? and est=1";
                    $stmt=$conectar->prepare($sql);
                    $stmt->bindValue(1, $usuario);
                    $stmt->bindValue(2, $pass);
                    $stmt->execute();
                    $resultado = $stmt->fetch();
                    $_SESSION["idUsuario"]=$resultado["idUsuario"];
                    $_SESSION["usuario"]=$resultado["usuario"];
                    $_SESSION["idRol"]=$resultado["idRol"];
                   
                    if (is_array($resultado) and count($resultado)>0 and $resultado['idRol'] =='1' ){
                 
                      
                        /*TODO: Si todo esta correcto indexar en home */
                        header("Location:".Conectar::ruta()."view/adminMntlNoticias/");
                        exit();
                    }
                    if (is_array($resultado) and count($resultado)>0 and $resultado['idRol'] =='3' ){
                 
                      
                        /*TODO: Si todo esta correcto indexar en home */
                        header("Location:".Conectar::ruta()."view/UsuHome/");
                        exit();
                    }else{
                        /*TODO: En caso no coincidan el usuario o la contraseña */
                        header("Location:".conectar::ruta()."index.php?m=1");
                        exit();
                    }
                }
            }
        }
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
 
 
       
        public function get_articulo_id($id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM articulos WHERE id=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function get_usuario_id($idUsuario){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM usuario WHERE idUsuario=?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idUsuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function update_imagen_articulo($id,$thumb){
            $conectar= parent::conexion();
            parent::set_names();
               
            require_once("Usuario.php");
            $curx = new Usuario();
          
            $thumb = '';
                     
            $thumb = $curx->upload_file();


                            
            $sql="UPDATE articulos
                SET
                thumb = ?
                WHERE
                    id =?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$thumb);
            $sql->bindValue(2,$id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
          
        }
        public function upload_file(){
            
            if(isset($_FILES["thumb"])){
                $extension = explode('.', $_FILES['thumb']['name']);
                $new_name = rand() . '.' . $extension[1];
                $destination = '../public/' . $new_name;
                move_uploaded_file($_FILES['thumb']['tmp_name'], $destination);
                return "../../public/".$new_name;
            }
            
        }
        public function insert_comentario($usuario){

            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO comentarios(id,usuario) VALUES (NULL,?);";
            $sql=$conectar->prepare($sql);
           
            $sql->bindValue(1, $usuario);

                       $sql->execute();
            return $resultado=$sql->fetchAll();


        }

        /*TODO: Mostrar los datos del usuario segun el DNI */
        

        /*TODO: Actualizar la informacion del perfil del usuario segun ID */
        public function update_usuario_perfil($idUsuario,$usuario,$correo,$pass,$telefono){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE usuario 
                SET
                    usuario = ?,
                    correo = ?,
                    pass = ?,
                    telefono = ?
                   
                WHERE
                   idUsuario = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $usuario);
            $sql->bindValue(2, $correo);
            $sql->bindValue(3, $pass);
            $sql->bindValue(4, $telefono);
            $sql->bindValue(5, $idUsuario);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Funcion para insertar usuario */
        public function insert_articulo($titulo,$extracto,$texto,$thumb)
        {

          
            $curx = new Usuario();
          
            $thumb = '';
                     
            $thumb = $curx->upload_file();
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO articulos(id,titulo,extracto,fecha,
            texto,thumb) VALUES (NULL,?,?,now(),?,?);";
            $sql=$conectar->prepare($sql);
           
            $sql->bindValue(1, $titulo);
            $sql->bindValue(2, $extracto);
          
            $sql->bindValue(3, $texto);
            $sql->bindValue(4, $thumb);
            
                       $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Funcion para actualizar usuario */
        public function update_articulo($id,$titulo,$extracto,$texto){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE articulos
                SET

                    titulo = ?,
                    extracto = ?,
                     texto = ?
                   
                  
                WHERE
                    id = ?";
            $sql=$conectar->prepare($sql);
           
            $sql->bindValue(1, $titulo);
            $sql->bindValue(2, $extracto);
           
            $sql->bindValue(3, $texto);
            $sql->bindValue(4, $id);
          
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Eliminar cambiar de estado a la categoria */
        public function delete_articulo($id){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE  FROM articulos
                
                WHERE
                    id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Listar todas las categorias */
        public function get_usuario(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM articulos";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        /*TODO: Listar todas las categorias */
       



        // funciones de noticias

        
      

        # Funcion para obtener un post por ID

             # Return: El post, o false si no se encontro ningun post con ese ID.

          function obtener_post_por_id($conexion, $id){

          	$resultado = $conexion->query("SELECT * FROM articulos WHERE id = $id ");

         	$resultado = $resultado->fetchAll();

	        return ($resultado) ? $resultado : false;

}

function obtener_persona_por_id($conexion,$id)

{

$resultado = $conexion->$query("SELECT *FROM persona WHERE id = $id LIMIT 1"); 

 	$resultado = $resultado->fetchAll();

  return($resultado)? $resultado : false;

} 





function id_articulo($id){
    $usuario = new Usuario();
	$conectar= parent::conexion();
            parent::set_names();
   
	return (int)$usuario->limpiarDatos($id);

}





# Funcion para obtener la pagina actual

# Return: El numero de la pagina si esta seteado, sino entonces retorna 1.

function pagina_actual(){

	return isset($_GET['p']) ? (int)$_GET['p']: 1; 

}





# Funcion para obtener los post determinando cuantos queremos traer por pagina.

# Return: Los post dependiendo de la pagina que estemos y cuantos post por pagina establecimos.

function obtener_post($post_por_pagina){
    $usuario = new Usuario();
	$conectar= parent::conexion();
            parent::set_names();
   
       $inicio = ($usuario->pagina_actual() > 1) ? ($usuario->pagina_actual() * $post_por_pagina - $post_por_pagina) : 0;

    $sentencia =$conectar-> prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT {$inicio}, {$post_por_pagina}");



	$sentencia->execute();

	return $sentencia->fetchAll();


}



# Funcion para calcular el numero de paginas que tendra la paginacion.

# Return: El numero de paginas

function numero_paginas($post_por_pagina){
    $conectar= parent::conexion();
    parent::set_names();
	//4.- Calculamos el numero de filas / articulos que nos devuelve nuestra consulta

	$total_post = $conectar->prepare('SELECT FOUND_ROWS() as total');

	$total_post->execute();

	$total_post = $total_post->fetch()['total'];



	//5. Calculamos el numero de paginas que habra en la paginacion

	$numero_paginas = ceil($total_post / $post_por_pagina);

	return $numero_paginas;

}



# Funcion para traducir la fecha de formato timestamp a español.

# Return: La fecha en español.

function fecha($fecha){

	$timestamp = strtotime($fecha);

	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];



	$dia = date('d', $timestamp);



	// -1 porque los meses en la funcion date empiezan desde el 1

	$mes = date('m', $timestamp) - 1;

	$year = date('Y', $timestamp);



	$fecha = $dia . ' de ' . $meses[$mes] . ' del ' . $year;

	return $fecha;

}



# Funcion para comprobar la session del admin

    function comprobarSession(){

	// Comprobamos si la session esta iniciada
 

	}
    public  function get_persona_ruta_x_id($idRuta){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT 
        oferente_ruta.ru_of_id,
        ruta.idRuta,
        ruta.nombreRuta,
        ruta.coordinador,
        ruta.turno,
        
        oferente.id_o,
        oferente.nombre_o,
        oferente.apellidoP_o,
        oferente.apellidoM_o,
        oferente.correo_o,
        oferente.telefono_o
                   
        FROM oferente_ruta INNER JOIN 
        ruta ON oferente_ruta.idRuta = ruta.idRuta INNER JOIN
        oferente ON oferente_ruta.id_o = oferente.id_o 
        WHERE 
       ruta.idRuta =?";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idRuta);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function get_usuario_modal($idRuta){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM oferente
            WHERE est = 1
            AND id_o not in (select id_o from oferente_ruta WHERE idRuta=?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idRuta);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }



}   

?>