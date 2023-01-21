<?php 

class conexion {
    private static $instancia;

    public static function getInstance(){
        if (!self::$instancia instanceof self){
            self::$instancia = new self;
        }
        return self::$instancia;
    }
    function conectarDB() : mysqli {
        $db = mysqli_connect('localhost', 'root', 'Achuachugripa1', 'prueba_tecnica');
        
        if(!$db) {
            echo 'Error no se pudo conectar';
            exit;
        } 
        return $db;
    }    
}