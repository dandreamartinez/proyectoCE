<?php
    require_once '../../includes/database.php';
    $conexion = conexion::getInstance();
    $db       = $conexion->conectarDB();

    $id       = $_POST['id'];
    $c_id     = $_POST['c_id'];

    $query      = "DELETE FROM test_courses_x_student WHERE s_id = '{$id}' and c_id = '{$c_id}';";

    //obtener resultados
    $resultado  = mysqli_query($db, $query);