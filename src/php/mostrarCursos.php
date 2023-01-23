<?php
    require_once '../../includes/database.php';
    $conexion = conexion::getInstance();
    $db       = $conexion->conectarDB();

    $id       = $_POST['id'];

    $query      = "SELECT * FROM test_courses WHERE c_id NOT IN (SELECT c.c_id FROM test_courses_x_student AS e INNER JOIN test_courses AS c ON e.c_id = c.c_id WHERE e.s_id = '{$id}')";

    //obtener resultados
    $resultado  = mysqli_query($db, $query);
    $ar_cursosN  = [];
    while ($cursosN     = mysqli_fetch_assoc($resultado)): 
        $ar_cursosN[] = json_encode($cursosN);  
    endwhile;

    echo json_encode($ar_cursosN);
    mysqli_close($db);
