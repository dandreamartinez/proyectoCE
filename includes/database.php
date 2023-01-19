<?php 

function conectarDB() : mysqli {
    $db = mysqli_connect('localhost', 'root', 'Achuachugripa1', 'prueba_tecnica');
    
    if(!$db) {
        echo 'Error no se pudo conectar';
        exit;
    } 

    return $db;
}