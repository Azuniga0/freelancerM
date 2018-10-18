<section class="mt-30px mb-30px">
    <div class="container-fluid">
        <div class="row">            
           <div class="div_centrado">
               <!-- Count item widget-->
                <div class=" col-12">
                    <div class="row">
                        <div class="wrapper count-title d-flex text-center">
                            <div class="name"><strong class="text-uppercase centrado">Nuevo empleado</strong><br><br>
                            </div>
                        </div> 
                    </div>
                    <div class="row">   
                        <form class="col-md-12" method="post" <?php echo base_url('index.php/admin_controller/nuevo_empleado'); ?>>
                            <div class="form-row" style="margin-top: 15px;">
                                <label style="color:"><b>Datos personales:</b></label>
                                <br><br>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="nombre_empleado">Nombre:</span>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" placeholder="" aria-describedby="nombre_empleado" name="nombre" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un nombre válido
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="nombre_empleado">A. paterno:</span>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" placeholder="" aria-describedby="nombre_empleado" name="apellido_paterno" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un nombre válido
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="nombre_empleado">A. materno:</span>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" placeholder="" aria-describedby="nombre_empleado" name="apellido_materno" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un nombre válido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="rfc_empleado">RFC:</span>
                                        </div>
                                        <input type="text" class="form-control" id="rfc" placeholder="" aria-describedby="rfc_empleado" name="rfc" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un RFC válido
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--div class="form-row">
                                <div class="form-group col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="direccion_empleado">Dirección:</span>
                                        </div>
                                        <input type="text" class="form-control" id="direccion" placeholder="" aria-describedby="direccion_empleado" name="direccion" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte una dirección válida
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="colonia_empleado">Colonia:</span>
                                        </div>
                                        <input type="text" class="form-control" id="colonia" placeholder="" aria-describedby="colonia_empleado" name="colonia" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte una colonia válida
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="ciudad_empleado">Ciudad:</span>
                                        </div>
                                        <input type="text" class="form-control" id="ciudad" placeholder="" aria-describedby="ciudad_empleado" name="ciudad" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte una ciudad válida
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div-- class="form-row">
                                <div class="form-group col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="estado_empleado">Estado:</span>
                                        </div> 

                                        <?php
                                            $database=mysqli_connect("localhost", "root","","freelancer");

                                            $query = "SELECT id_estado_rep, nombre FROM estado_rep ORDER BY id_estado_rep ASC";
                                            $result = mysqli_query($database,$query) or die("no se encontraron datos");
                                            mysqli_set_charset($database,"utf8");
                                            ?>

                                            <select class="form-control" id="estado" aria-describedby="estado_empleado" name="estado_rep"  require>                                            
                                                <?php 
                                                    while ($row = mysqli_fetch_array($result))
                                                    {
                                                        echo "<option value='" . $row['id_estado_rep'] . "'>" . $row['nombre'] . "</option>";
                                                    }
                                                ?>        
                                            </select>

                                        <div class="invalid-tooltip">
                                            Por favor, seleccione un estado válido
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="form-group col-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="codigo_p">CP:</span>
                                        </div>
                                        <input type="text" class="form-control" id="cp" placeholder="" aria-describedby="codigo_p" name="cp" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un código postal válido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="email_empleado">Correo:</span>
                                        </div>
                                        <input type="text" class="form-control" id="email" placeholder="" aria-describedby="email_empleado" name="correo" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un código postal válido
                                        </div>
                                    </div>
                                </div>
                            </div-->        
                            <!--div class="form-row" style="margin-top: 15px;">
                                <label style="color:"><b>Datos de acceso:</b></label>
                                <br><br>
                            </div>                    
                            <div class="form-row">                            
                                <div class="form-group col-md-7">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="usuario_empleado">Usuario:</span>
                                        </div>
                                        <input type="text" class="form-control" id="usuario" placeholder="" aria-describedby="usuario_empleado" name="username" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un usuario válido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-5">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="rol_empleado">Rol:</span>
                                        </div>        

                                        <?php
                                            $database=mysqli_connect("localhost", "root","","freelancer");

                                            $query = "SELECT id_tipo_usuario, tipo_usuario FROM tipo_usuario ORDER BY id_tipo_usuario ASC";
                                            $result = mysqli_query($database,$query) or die("no se encontraron datos");
                                            mysqli_set_charset($database,"utf8");
                                            ?>

                                            <select class="form-control" id="rol" aria-describedby="rol_empleado" name="tipo_usuario" require>                                            
                                                <?php 
                                                    while ($row = mysqli_fetch_array($result))
                                                    {
                                                        echo "<option value='" . $row['id_tipo_usuario'] . "'>" . $row['tipo_usuario'] . "</option>";
                                                    }
                                                ?>        
                                            </select>

                                        <div class="invalid-tooltip">
                                            Por favor, seleccione un rol válido
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <div-- class="form-row">
                                <div class="col-2">
                                    <a href="" class="btn btn-info" disabled>Generar contraseña:</a>
                                </div>
                                <div class="col-4">
                                    <div class="input-group">
                                        <div-- class="input-group-prepend">
                                            <span class="input-group-text" id="password_empleado">Contraseña:</span>
                                        </div-->
                                        <?php
                                        //echo $_SESSION['name'];
                                        //$contra=$default_pass;
                                        $contra="123";
                                        //echo $contra;
                                        echo "<input type='text' class='form-control' id='password' placeholder='********************' aria-describedby='password_empleado' name='password' required disabled value='$contra'>";
                                        
                                        ?>
                                        <!--input type="text" class="form-control" id="password" placeholder="********************" aria-describedby="password_empleado" name="password" required disabled-->
                                        <!--div class="invalid-tooltip">
                                            Por favor, inserte un usuario válido
                                        </div>
                                    </div>
                                </div>
                            </div-->
                            <div class="form-row float-right ">                                
                                <!--button type="submit" class="btn btn-danger " style="margin-top:15px;">Cancelar</button--> 
                                <!--button type="submit" class="btn btn-primary " style="margin-top:15px;">Guardar</button-->  
                                <input class="btn btn-primary" style="margin-top: 15px;" type="submit" value="Guardar" name="register" >
                            </div>
                        </form>
                    </div>
                </div>   
            </div>
        </div>
    </div>  
</section>

    
