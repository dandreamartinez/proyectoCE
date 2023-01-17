<div class="pestaña-actualizar">
                    <form class="formActualizar" method="POST" action="index.php" enctype="multipart/form-data">
                        <div class="campo campo-input">
                            <label for="nombre">Nombres</label>
                            <input type="text" placeholder="<?php echo $first_name?>" id="nombre" name='first_name'>
                        </div>
                        <div class="campo campo-input">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" placeholder="Apellidos" id="apellido" name='last_name'>
                        </div>
                        <div class="campo campo-input">
                            <label for="email">Email</label>
                            <input type="text" placeholder="Email" id="email" name='email'>
                        </div>
                        <div class="campo campo-input">
                            <label for="tel">Teléfono</label>
                            <input type="text" placeholder="Teléfono" id="telefono" name='phone_number'>
                        </div>
                        <div class="campo campo-input">
                            <label for="lv_id">Grado</label>
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
                            <label for="grupo">Grupo</label>
                            <select id="opciones" name="grupo">
                                <option value="all">Todos</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                        <div class="campo campo-input">
                            <label for="nombre">Estado</label>
                            <select id="opciones" name="estado">
                                <option value="0">Inactivo</option>
                                <option value="1">Activo</option>
                            </select>
                        </div>
                    </form>
                </div>