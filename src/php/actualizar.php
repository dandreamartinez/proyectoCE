<?php
    //importar bd o conexión a bd
    require '../../includes/database.php';
    $db             = conectarDB();

    //Traer id del estudiante con ajax

    #$estudiante_id  = $_POST["estudianteID"];

    $query          = "SELECT * FROM test_students WHERE s_id = 1";

    $resultado     = $resultado  = mysqli_query($db, $query);

    $estudiantes = mysqli_fetch_assoc($resultado);

    var_dump($estudiantes);