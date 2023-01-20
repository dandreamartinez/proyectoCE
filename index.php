<?php
    //importar bd o conexión a bd
    require 'src/php/buscador.php';
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
                                    <?php for ($i = 0; $i <=11; $i++) { 
                                        ?>
                                        <option value="<?php echo $i ?>" 
                                            <?php 
                                            if ($i == $lv_id) {
                                                echo 'selected';
                                            } else {
                                                echo '';
                                            }
                                            ?>
                                        >
                                        <?php 
                                            if ($i == 0) {
                                                echo "Todos";
                                            } else {
                                                echo $i;
                                            }
                                        ?>
                                    </option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="campo campo-input">
                                <label for="opciones">Grupo</label>
                                <select id="opciones" name="grupo_id">
                                    <option value="all">Todos</option>
                                    <option value="A" <?php if ($grupo_id == 'A') {echo 'selected';} else {echo '';}?>>A</option>
                                    <option value="B" <?php if ($grupo_id == 'B') {echo 'selected';} else {echo '';}?>>B</option>
                                    <option value="C" <?php if ($grupo_id == 'C') {echo 'selected';} else {echo '';}?>>C</option>
                                    <option value="D" <?php if ($grupo_id == 'D') {echo 'selected';} else {echo '';}?>>D</option>
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
                <div id='<?php echo $estudiantes['s_id']; ?>' class="estudiante eclic estudianteClic<?php echo $estudiantes['s_id'];?>">
                    <div class="centrar id" id='<?php echo $estudiantes['s_id']; ?>' data-value='<?php echo $estudiantes['s_id'];?>'><?php echo $estudiantes['s_id'];?></div>
                    <div class="nombres" id='<?php echo $estudiantes['s_id']; ?>'><?php echo $estudiantes['first_name'];?></div>
                    <div class="apellidos" id='<?php echo $estudiantes['s_id']; ?>'><?php echo $estudiantes['last_name'];?></div>
                    <div class="centrar grado" id='<?php echo $estudiantes['s_id']; ?>'><?php echo $estudiantes['lv_id'];?></div>
                    <div class="centrar grupo" id='<?php echo $estudiantes['s_id']; ?>'><?php echo $estudiantes['group'];?></div>
                    <div class="centrar estado" id='<?php echo $estudiantes['s_id']; ?>'>
                        <?php 
                            if ($estudiantes['status'] == 1) { 
                                echo 'Activo';
                            } else { 
                        ?>
                        <span class="cancelado">
                        <?php
                            echo 'Inactivo';
                        }
                        ?>
                        </span>  
                    </div>
                </div>
                <div class="estudiante-actualizar<?php echo $estudiantes['s_id'];?> estudiante-actualizar">
                    <div class="centrar titulo-actualizar pestaña pestañaClic actualizar pestañaColor">Actualizar</div>
                    <div class="centrar titulo-actualizar pestaña pestañaClic curso">Cursos</div>
                </div>
                <div class="pestaña-actualizar<?php echo $estudiantes['s_id'];?> pestaña-actualizar">
                    <form class="formActualizar" method="POST" action="index.php" enctype="multipart/form-data">
                        <div class="campo campo-input">
                            <label for="nombre">Nombres</label>
                            <input type="text" placeholder="<?php echo $estudiantes['first_name'];?>" id="nombre" name='ac_first_name' value="<?php echo $estudiantes['first_name'];?>">
                        </div>
                        <div class="campo campo-input">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" placeholder="Apellidos" id="apellido" name='ac_last_name' value="<?php echo $estudiantes['last_name'];?>">
                        </div>
                        <div class="campo campo-input">
                            <label for="email">Email</label>
                            <input type="text" placeholder="Email" id="email" name='ac_email' value="<?php echo $estudiantes['email'];?>">
                        </div>
                        <div class="campo campo-input">
                            <label for="tel">Teléfono</label>
                            <input type="text" placeholder="Teléfono" id="telefono" name='ac_phone_number' value="<?php echo $estudiantes['phone_number'];?>">
                        </div>
                        <div class="campo campo-input">
                            <label for="ac_lv_id">Grado</label>
                            <select id="opciones" name="lv_id">
                                <?php for ($i = 0; $i <=11; $i++) {
                                    ?>
                                    <option value="<?php echo $i ?>"
                                            <?php
                                            if ($i == $estudiantes['lv_id']) {
                                                echo 'selected';
                                            } else {
                                                echo '';
                                            }
                                            ?>
                                        >
                                    <?php
                                        if ($i == 0) {
                                            echo "Todos";
                                        } else {
                                            echo $i;
                                        }
                                    ?>
                                </option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="campo campo-input">
                            <label for="grupo">Grupo</label>
                            <select id="opciones" name="grupo">
                                <option value="A" <?php if ($estudiantes['group'] == 'A') {echo 'selected';} else {echo '';}?>>A</option>
                                <option value="B" <?php if ($estudiantes['group'] == 'B') {echo 'selected';} else {echo '';}?>>B</option>
                                <option value="C" <?php if ($estudiantes['group'] == 'C') {echo 'selected';} else {echo '';}?>>C</option>
                                <option value="D" <?php if ($estudiantes['group'] == 'D') {echo 'selected';} else {echo '';}?>>D</option>
                            </select>
                        </div>
                        <div class="campo campo-input">
                            <label for="nombre">Estado</label>
                            <select id="opciones" name="estado">
                                <option value="0" <?php if ($estudiantes['status'] == '0') {echo 'selected';} else {echo '';}?>>Inactivo</option>
                                <option value="1" <?php if ($estudiantes['status'] == '1') {echo 'selected';} else {echo '';}?>>Activo</option>
                            </select>
                        </div>
                        <div class="campo campo-input">
                            <input type="submit" value="Actualizar" class="boton boton-alerta">
                        </div>
                    </form>
                </div>
            <?php endwhile; ?>
        <script src="src/js/app.js"></script>
    </body>
</html>