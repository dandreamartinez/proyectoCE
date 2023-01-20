<?php
    //importar bd o conexión a bd
    require 'includes/database.php';
    $db         = conectarDB();

    //consultar datos

    $query      = "SELECT * FROM test_students";

    //obtener resultados
    $resultado  = mysqli_query($db, $query);

    //Buscador
    $first_name = "";
    $last_name  = "";
    $lv_id      = "all";
    $grupo_id   = "all";

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $first_name = $_POST['first_name'];
        $last_name  = $_POST['last_name'];
        $lv_id      = $_POST['lv_id'];
        $grupo_id  = $_POST['grupo_id'];

        if (!$first_name && !$last_name && $lv_id == '0' && $grupo_id == 'all') {
            $query = "SELECT * FROM test_students WHERE first_name like '%$first_name%'";
        } 
        //busca solo por nombre
        if ($first_name && !$last_name && $lv_id == '0' && $grupo_id == 'all') {
            $query = "SELECT * FROM test_students WHERE first_name like '%$first_name%'";
        } 
        //busca solo por apellido
        if (!$first_name && $last_name && $lv_id == '0' && $grupo_id == 'all') {
            $query = "SELECT * FROM test_students WHERE last_name like '%$last_name%'";
        } 

        //busca solo por grado
        if (!$first_name && !$last_name && $lv_id !== '0' && $grupo_id == 'all') {
            $query = "SELECT * FROM test_students WHERE lv_id = '$lv_id'";
        } 

        //busca solo por grupo
        if (!$first_name && !$last_name && $lv_id == '0' && $_POST['grupo_id'] !== 'all') {
            $query = "SELECT * FROM test_students WHERE `group` = '$grupo_id'";
        } 

        //busca nombre y apellido
        if ($first_name && $last_name && $_POST['lv_id'] == '0' && $grupo_id == 'all') {
            $query = "SELECT * FROM test_students WHERE first_name like '%$first_name%' AND last_name like '%$last_name%'";
        } 

        //busca nombre y grado
        if ($first_name && !$last_name && $_POST['lv_id'] !== 'all' && $grupo_id == 'all') {
            $query = "SELECT * FROM test_students WHERE first_name like '%$first_name%' AND lv_id = '$lv_id'";
        } 

        //busca nombre y grupo
        if ($first_name && !$last_name && $_POST['lv_id'] == '0' && $_POST['grupo_id'] !== 'all') {
            $query = "SELECT * FROM test_students WHERE first_name like '%$first_name%' AND `group` = '$grupo_id'";
        } 

        //busca apellido y grado
        if (!$first_name && $last_name && $_POST['lv_id'] !== '0' && $grupo_id == 'all') {
            $query = "SELECT * FROM test_students WHERE last_name like '%$last_name%' AND lv_id = '$lv_id'";
        } 

        //busca apellido y grupo
        if (!$first_name && $last_name && $_POST['lv_id'] == '0' && $_POST['grupo_id'] !== 'all') {
            $query = "SELECT * FROM test_students WHERE last_name like '%$last_name%' AND `group` = '$grupo_id'";
        } 

        //busca nombre apellido y grado
        if ($first_name && $last_name && $lv_id !== '0' && $grupo_id !== 'all') {
            $query = "SELECT * FROM test_students WHERE first_name like '%$first_name%' AND last_name like '%$last_name%' AND lv_id = '$lv_id'";
        } 

        //busca nombre apellido grado y grupo
        if ($_POST['first_name'] && $_POST['last_name'] && $_POST['lv_id'] !== '0' && $_POST['grupo_id'] !== 'all') {
            $query = "SELECT * FROM test_students WHERE first_name like '%$first_name%' AND last_name like '%$last_name%' AND lv_id = '$lv_id' AND `group` = '$grupo_id'";
        } 

        //busca grado y grupo

        if (!$_POST['first_name'] && !$_POST['last_name'] && $_POST['lv_id'] !== '0' && $_POST['grupo_id'] !== 'all') {
            $query = "SELECT * FROM test_students WHERE lv_id = '$lv_id' AND `group` = '$grupo_id'";
        } 
        //captura lso errores en las consultas
        if(mysqli_query($db, $query)) {
            $resultado = mysqli_query($db, $query);
            mysqli_close($db);
        }else{
            echo "Error en la consulta" . $query . "-" . mysqli_error($db);
        }
        
    } 