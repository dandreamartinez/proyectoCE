<?php
    require_once '../../includes/database.php';
    $conexion   = conexion::getInstance();
    $db         = $conexion->conectarDB();

    $id         = $_POST['id'];
    $c_id       = $_POST['c_id'];

    $query      = "INSERT INTO test_courses_x_student (c_id, s_id) VALUES ('{$c_id}','{$id}')";

    //obtener resultados
    $resultado  = mysqli_query($db, $query);
