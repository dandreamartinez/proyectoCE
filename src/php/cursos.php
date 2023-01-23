<?php
    require_once '../../includes/database.php';
    $conexion = conexion::getInstance();
    $db       = $conexion->conectarDB();

    $id       = $_POST['id'];

    $query      = "SELECT * FROM test_courses_x_student AS e INNER JOIN test_courses AS c ON e.c_id = c.c_id WHERE e.s_id = '{$id}';";

    //obtener resultados
    $resultado  = mysqli_query($db, $query);
    $ar_cursos  = [];
    while ($cursos     = mysqli_fetch_assoc($resultado)): 
        $ar_cursos[] = json_encode($cursos);  
    endwhile;

    echo json_encode($ar_cursos);