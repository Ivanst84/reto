<?php
    /*TODO: Inicializando la sesion del usuario */
    session_start();

    /*TODO: Iniciamos Clase Conectar */
    class Conectar{
        public $dbh;

        /*TODO: Funcion Protegida de la cadena de Conexion */
        public function Conexion(){
            try {
                /*TODO: Cadena de Conexion QA*/
				$conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=urc","root","");
                /*TODO: Cadena de Conexion Produccion*/
				//$conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=andercode_diplomas","diploma1","@ndercode");
				return $conectar;
			} catch (Exception $e) {
                /*TODO: En Caso hubiera un error en la cadena de conexion */
				print "¡Error BD!: " . $e->getMessage() . "<br/>";
				die();
			}
        }

        /*TODO: Para impedir que tengamos problemas con las ñ o tildes */
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        /*TODO: Ruta principal del proyecto */
        public static function ruta(){
            //QA
            return "http://localhost/URC1.0/";
            //Produccion
        }

    }

    $blog_config = array(

        'post_por_pagina'=> '3',
    
        'carpeta_imagenes' => 'imagenes/'
    
    );
    
    
    
    $blog_admin = array(
    
        'usuario' => 'Ivan',
    
        'password' => '123'
    
    );
    $bd_config = array(

        'basedatos' => 'localhost',
    
        'usuario' => 'root',
    
        'pass' => ''
    );
    
?>