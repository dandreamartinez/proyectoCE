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
    $grupo_id_id      = "all";

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $first_name = $_POST['first_name'];
        $last_name  = $_POST['last_name'];
        $lv_id      = $_POST['lv_id'];
        $grupo_id_id  = $_POST['grupo_id_id'];

        if (!$first_name && !$last_name && $lv_id == 'all' && $grupo_id_id == 'all') {
            $query = "SELECT * FROM test_students WHERE first_name like '%$first_name%'";
        } 
        //busca solo por nombre
        if ($first_name && !$last_name && $lv_id == 'all' && $grupo_id_id == 'all') {
            $query = "SELECT * FROM test_students WHERE first_name like '%$first_name%'";
        } 
        //busca solo por apellido
        if (!$first_name && $last_name && $lv_id == 'all' && $grupo_id_id == 'all') {
            $query = "SELECT * FROM test_students WHERE last_name like '%$last_name%'";
        } 

        //busca solo por grado
        if (!$first_name && !$last_name && $lv_id !== 'all' && $grupo_id_id == 'all') {
            $query = "SELECT * FROM test_students WHERE lv_id = '$lv_id'";
        } 

        //busca solo por grupo
        if (!$first_name && !$last_name && $lv_id == 'all' && $grupo_id_id !== 'all') {
            $query = "SELECT * FROM test_students WHERE `group` = '$grupo_id_id'";
        } 

        //busca nombre y apellido
        if ($first_name && $last_name && $lv_id == 'all' && $grupo_id_id == 'all') {
            $query = "SELECT * FROM test_students WHERE first_name like '%$first_name%' AND last_name like '%$last_name%'";
        } 
        //busca nombre apellido y grado
        if ($first_name && $last_name && $lv_id !== 'all' && $grupo_id_id !== 'all') {
            $query = "SELECT * FROM test_students WHERE first_name like '%$first_name%' AND last_name like '%$last_name%' AND lv_id = '$lv_id'";
        } 

        //busca nombre apellido grado y grupo
        if ($_POST['first_name'] && $_POST['last_name'] && $_POST['lv_id'] !== 'all' && $_POST['grupo_id_id'] !== 'all') {
            $query = "SELECT * FROM test_students WHERE first_name like '%$first_name%' AND last_name like '%$last_name%' AND lv_id = '$lv_id' AND `group` = '$grupo_id_id'";
        } 

        //captura lso errores en las consultas
        if(mysqli_query($db, $query)) {
            $resultado = mysqli_query($db, $query);
            mysqli_close($db);
        }else{
            echo "Error en la consulta" . $query . "-" . mysqli_error($db);
        }
        
    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="src/css/style.css">
        <link rel="stylesheet" href="src/css/botones.css">
        <link rel="stylesheet" href="src/css/estudiantes.css">
        <link rel="stylesheet" href="src/css/navegacion.css">
        <link rel="stylesheet" href="src/css/utilidades.css">
        <link rel="stylesheet" href="src/css/normalize.css">
        <link rel="icon" href="src/img/favicon.ico">
        <title>Ciudad Educativa</title>
    </head>
    <body>
        <header class="header">
            <div class="contenedor">
                <div class="barra">
                    <a href="index.php">
                        <img src="src/img/logo.png" alt="logotipo de bienes raíces"">
                    </a>   
                    <div class="derecha">
                        <form class="navegacion" method="POST" action="index.php" enctype="multipart/form-data">
                            <div class="campo campo-input">
                                <label for="nombre">Nombres</label>
                                <input type="text" placeholder="Nombres" id="nombre" name='first_name' value="<?php echo $first_name?>">
                            </div>
                            <div class="campo campo-input">
                                <label for="apellido">Apellidos</label>
                                <input type="text" placeholder="Apellidos" id="apellido" name="last_name" value="<?php echo $last_name ?>">
                            </div>
                            <div class="campo campo-input">
                                <label for="opciones">Grado</label>
                                <select id="opciones" name="lv_id">
                                    <option  value="all">Todos</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                </select>
                            </div>
                            <div class="campo campo-input">
                                <label for="opciones">Grupo</label>
                                <select id="opciones" name="grupo_id_id">
                                    <option value="all">Todos</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                            </div>
                            <div class="campo">
                                <input type="submit" value="Buscar" class="boton boton-alerta">
                            </div>
                        </form>
                    </div>
                </div> <!--Cierre de la barra-->
            </div>
        </header>
        <!-- listado de estudiantes     -->
        <div class="contenedor-estudiante">
            <div class="estudiante">
                <div class="estudiante-titulo id">id</div>
                <div class="estudiante-titulo nombres">Nombres</div>
                <div class="estudiante-titulo apellidos">Apellidos</div>
                <div class="estudiante-titulo grado">Grado</div>
                <div class="estudiante-titulo grupo">Grupo</div>
                <div class="estudiante-titulo estado">Estado</div>
            </div>
        </div>
        <?php while ($estudiantes = mysqli_fetch_assoc($resultado)):?>
                <div class="estudiante estudianteClic">
                    <div class="centrar id"><?php echo $estudiantes['s_id'];?></div>
                    <div class="nombres"><?php echo $estudiantes['first_name'];?></div>
                    <div class="apellidos"><?php echo $estudiantes['last_name'];?></div>
                    <div class="centrar grado"><?php echo $estudiantes['lv_id'];?></div>
                    <div class="centrar grupo"><?php echo $estudiantes['group'];?></div>
                    <div class="centrar estado">
                        <?php 
                            if ($estudiantes['status'] == 1) {
                                echo 'Activo';
                            } else {
                                echo 'Inactivo';
                            }
                        ?>
                    </div>
                </div>
                <div class="estudiante-actualizar">
                    <div class="centrar titulo-actualizar pestaña pestañaClic actualizar pestañaColor">Actualizar</div>
                    <div class="centrar titulo-actualizar pestaña pestañaClic curso">Cursos</div>
                </div>
            <?php endwhile; ?>
        <script src="src/js/app.js"></script>
    </body>
</html>