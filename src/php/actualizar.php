<?php
    //importar bd o conexión a bd
    require_once '../../includes/database.php';
    $conexion = conexion::getInstance();
    $db         = $conexion->conectarDB();

    $errores        = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $verificador = $_POST['verificador'];
        if ($verificador === '0') {
            $nombre     = mysqli_real_escape_string( $db, $_POST['nombre']);
            $apellido   = mysqli_real_escape_string( $db, $_POST['apellido']);
            $email      = mysqli_real_escape_string( $db, $_POST['email']);
            $telefono   = mysqli_real_escape_string( $db, $_POST['telefono']);
            $lv_id      = $_POST['grado'];
            $grupo      = $_POST['grupo'];
            $estado     = $_POST['estado'];
            $id         = $_POST['id'];

            if (!$nombre) {
                $errores[] = "Debes incluir el nombre del estudiante";
            }
            if (!$apellido) {
                $errores[] = "Debes incluir el apellido del estudiante";
            }

            //revisar que el arreglo este sin errores
            if (empty($errores)) {
                $query = "UPDATE test_students SET first_name = '{$nombre}', last_name = '{$apellido}',lv_id = '{$lv_id}',`group` = '{$grupo}',email = '{$email}', phone_number= '{$telefono}', `status` = '{$estado}'  WHERE s_id = '{$id}'";

                $resultado = mysqli_query($db, $query);

            }
        }
    }