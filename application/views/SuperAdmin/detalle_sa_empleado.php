

<section class="mt-30px mb-30px">
    <div class="container-fluid">
        <div class="row">            
           <div class="div_centrado">
                <!-- Count item widget-->
                <?php foreach ($data as $key => $value) { ?>
                    <div class=" col-12">
                        <div class="row">
                            <div class="wrapper count-title d-flex text-center">
                                <div class="name"><strong class="text-uppercase centrado">
                                <?php echo $value->nombre_empleado.' '.$value->apaterno_empleado.' '.$value->amaterno_empleado;
                                
                                echo $content;
                                ?></strong><br><br>
                                </div>
                            </div> 
                        </div>
                        <div class="row">

                            <?php /*echo $this->session->flashdata('success_msg');*/ ?>
                            <?php /*echo $this->session->flashdata('error_msg');*/ ?>
                        </div>
                        <div class="row">   
                            <form class="col-md-12" method="post" action="actualizar_empleado"  enctype="multipart/form-data" role="form">
                                <div class="form-row" style="margin-top: 15px;">
                                    <label style="color:"><b>Datos personales:</b></label>
                                    <br><br>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="nombre_empleado">Nombre:</span>
                                            </div>
                                            <?php  
                                                $id=$value->id_usuario;  
                                                echo "<input type='hidden' name='id_usuario' value='$id'   id='id_usuario' >"; $name=$value->nombre_empleado;  
                                            ?>                                        
                                            <div class="invalid-tooltip">
                                                Por favor, inserte un nombre válido
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="apaterno_empleado">A. Paterno:</span>
                                            </div>
                                            <?php     
                                                $apaterno=$value->apaterno_empleado;  
                                                echo "<input type='text' name='apaterno_empleado' value='$apaterno'  class='form-control' id='apaterno_empleado' aria-describedby='apaterno_empleado'>";    
                                            ?> 
                                            <div class="invalid-tooltip">
                                                Por favor, inserte un apellido válido
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="amaterno_empleado">A. Materno:</span>
                                            </div>
                                            <?php     
                                                $amaterno=$value->amaterno_empleado;  
                                                echo "<input type='text' name='amaterno_empleado' value='$amaterno'  class='form-control' id='amaterno_empleado' aria-describedby='amaterno_empleado'>";    
                                            ?> 
                                            <div class="invalid-tooltip">
                                                Por favor, inserte un apellido válido
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <?php echo form_error('nombre_empleado'); ?>
                                    </div>
                                    <div class="col">
                                        <?php echo form_error('apaterno_empleado'); ?>
                                    </div>
                                    <div class="col">
                                        <?php echo form_error('amaterno_empleado'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-5">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="direccion_empleado">Dirección:</span>
                                            </div>
                                            <?php     
                                                $direccion=$value->direccion_empleado;  
                                                echo "<input type='text' name='direccion_empleado' value='$direccion'  class='form-control' id='direccion_empleado' aria-describedby='direccion_empleado'>";    
                                            ?> 
                                            <div class="invalid-tooltip">
                                                Por favor, inserte una dirección válida
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="estado_empleado">Correo:</span>
                                            </div> 
                                            <?php     
                                                $correo=$value->correo_empleado;  
                                                echo "<input type='text' name='correo_empleado' value='$correo'  class='form-control' id='correo_empleado' aria-describedby='correo_empleado' readonly>";
                                            ?>
                                            <div class="invalid-tooltip">
                                                Por favor, inserte un correo válido
                                            </div>
                                        </div>                                    
                                    </div>                                
                                    <div class="form-group col-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="telefono_empleado">Teléfono:</span>
                                            </div>
                                            <?php     
                                                $telefono=$value->telefono_empleado;  
                                                echo "<input type='text' name='telefono_empleado' value='$telefono'  class='form-control' id='telefono_empleado' aria-describedby='telefono_empleado'>";    
                                            ?>
                                            <div class="invalid-tooltip">
                                                Por favor, inserte un teléfono válido
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="form-row">
                                    <div class="col-5">
                                        <?php echo form_error('direccion_empleado'); ?>
                                    </div>
                                    <div class="col-4">
                                        <?php echo form_error('correo_empleado'); ?>
                                    </div>
                                    <div class="col-3">
                                        <?php echo form_error('telefono_empleado'); ?>
                                    </div>
                                </div>                          
                                <div class="form-row">
                                    <div class="input-group mb-3 col-3">
                                        <div class="custom-file">
                                            <?php     
                                                $img=$value->imagen;  
                                                echo "<input type='hidden' name='imagen' value='$img' class='form-control' id='imagen'>";

                                                echo "<input type='file' name='picture' class='custom-file-input' id='inputGroupFile01' aria-describedby='direccion_empleado'>";    
                                            ?>
                                            <!--input type="file" class="custom-file-input" id="inputGroupFile01" name="picture" value=""-->
                                            <label class="custom-file-label" for="inputGroupFile01"></label>
                                        </div>
                                    </div>
                                </div>        
                                <div class="form-row" style="margin-top: 15px;">
                                    <label style="color:"><b>Datos de acceso:</b></label>
                                    <br><br>
                                </div>                    
                                <div class="form-row">                            
                                    <div class="form-group col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="usuario_empleado">Usuario:</span>
                                            </div>
                                            <?php     
                                                $usuario=$value->username;  
                                                echo "<input type='text' name='username' value='$usuario'  class='form-control' id='username' aria-describedby='usuario_empleado' readonly>";    
                                            ?>
                                            <div class="invalid-tooltip">
                                                Por favor, inserte un usuario válido
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="password_empleado">Contraseña:</span>
                                            </div>
                                            <?php     
                                                $pass=$value->pass_decrypt;  
                                                echo "<input type='hidden' name='password_original' value='$pass'  class='form-control' id='password' aria-describedby='password_emleado' readonly>";
                                                echo "<input type='text' name='password' value  class='form-control' id='password' aria-describedby='password_emleado' >";
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="rol_empleado">Estado:</span>
                                            </div>        
                                            <?php
                                                $database=mysqli_connect("localhost", "root","","freelancer");
                                                //$query = "SELECT id_estado, estado FROM estado_usuario where id_estado != 4 ORDER BY id_estado ASC";
                                                $query = "SELECT id_estado_us FROM usuarios where id_usuario = $id";
                                                $result = mysqli_query($database,$query) or die("no se encontraron datos");
                                                mysqli_set_charset($database,"utf8");
                                            ?>

                                                <select class="form-control" id="estado_us" aria-describedby="rol_empleado" name="tipo_usuario"  >                                            
                                                    <?php     
                                                       while ($row = mysqli_fetch_array($result)){
                                                            //echo "<option value='" . $row['id_estado'] . "'>" . $row['estado'] . "</option>";
                                                            $estado_us = $row['id_estado_us'];
                                                        }
                                                    ?>
                                                    <option <?php if ($estado_us == 1 ) echo 'selected' ; ?> value="1">Activo</option>
                                                    <option <?php if ($estado_us == 2 ) echo 'selected' ; ?> value="2">Inactivc</option>
                                                    <option <?php if ($estado_us == 3 ) echo 'selected' ; ?> value="3">Despedido</option> 
                                                </select>
                                        </div>    
                                    </div>                                    
                                </div>
                                <div class="form-row">
                                    <div class="col-4">
                                        <?php echo form_error('username'); ?>
                                    </div>
                                    <div class="col-4">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                </div>
                                
                                <div class="form-row float-right ">                                
                                    <!--button type="submit" class="btn btn-danger " style="margin-top:15px;">Cancelar</button--> 
                                    <!--button type="submit" class="btn btn-primary " style="margin-top:15px;">Guardar</button-->  
                                    <input class="btn-primary btn" style=" margin-top: 15px;" type="submit" id="actualizar" name="actualizar" value="Actualizar">
                                </div>
                            </form>
                        </div>
                    </div> 
                <?php } ?>  
            </div>
        </div>
    </div>  
</section>

 <script>
    function createRandomString( length ) {
        
        var str = "";
        for ( ; str.length < length; str += Math.random().toString( 36 ).substr( 2 ) );
        return str.substr( 0, length );
    }

    document.addEventListener( "DOMContentLoaded", function() {
        var button = document.querySelector( "#create" ),
            output = document.querySelector( "#output" );
        button.addEventListener( "click", function() {
            var str = createRandomString( 6 );
            output.innerHTML = str;
        }, false)  
    });

    function myFunction() {
        document.getElementById("password").value = createRandomString( 6 );
        //document.getElementById('guardar').style.display='block';
    }
 </script>   
