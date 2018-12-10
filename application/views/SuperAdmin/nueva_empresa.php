
<section class="mt-30px mb-30px">
    <div class="container-fluid">
        <div class="row">            
           <div class="div_centrado">
               <!-- Count item widget-->
                <div class=" col-12">
                    <div class="row">
                        <div class="wrapper count-title d-flex text-center">
                            <div class="name"><strong class="text-uppercase centrado">Nueva empresa</strong><br><br>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <?php /*echo $this->session->flashdata('success_msg');*/ ?>
                        <?php /*echo $this->session->flashdata('error_msg');*/ ?>
                    </div>
                    <div class="row">   
                        <form class="col-md-12" method="post" action="nueva_empresa"  enctype="multipart/form-data" role="form" accept-charset="UTF-8">                            
                            <div class="form-row">
                                <div class="col-md-9 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="nombre_empleado">Razón social:</span>
                                        </div>
                                        <input type="text" class="form-control" id="nombre" placeholder="" aria-describedby="nombre_empleado" name="razon_social" value="<?=set_value('razon_social')?>" >
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un nombre válido
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="rfc">RFC:</span>
                                        </div>
                                        <input type="text" class="form-control" id="rfc" placeholder="" aria-describedby="rfc" name="rfc" value="<?=set_value('rfc')?>" >
                                        <div class="invalid-tooltip" value="<?=set_value('rfc')?>">
                                            Por favor, inserte un nombre válido
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-9">
                                    <?php echo form_error('razon_social'); ?>
                                </div>
                                <div class="col">
                                    <?php echo form_error('rfc'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="rol_empleado">Administrador:</span>
                                        </div> 
                                        <?php
                                            $database=mysqli_connect("localhost", "root","","freelancer");

                                            $query = "SELECT * FROM usuarios join empleados on empleados.id_usuario_empleado = usuarios.id_usuario where rol = 1 and id_estado_us = 1 ORDER BY id_usuario ASC";
                                            $result = mysqli_query($database,$query) or die("no se encontraron datos");
                                            mysqli_set_charset($database,"utf8");
                                        ?>

                                            <select class="form-control" id="rol" aria-describedby="rol_empleado" name="admin" >                                            
                                                <?php     
                                                    while ($row = mysqli_fetch_array($result)){
                                                        echo "<option value='" . $row['id_usuario'] . "'>" . $row['nombre_empleado'].' ' . $row['apaterno_empleado']."</option>";
                                                    }
                                                ?>        
                                            </select>
                                    </div>
                                </div>
                                <div class="input-group mb-3 col-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="picture" >
                                        <label class="custom-file-label" for="inputGroupFile01"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top: 15px;">
                                <label style="color:"><b>Datos del cliente:</b></label>
                                <br><br>
                            </div>                    
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="nombre_empleado">Nombre:</span>
                                        </div>
                                        <input type="text" class="form-control" id="nombre_cliente" placeholder="" aria-describedby="nombre_empleado" name="nombre_cliente" value="<?=set_value('nombre_cliente')?>" >
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
                                        <input type="text" class="form-control" id="apaterno_cliente" placeholder="" aria-describedby="nombre_empleado" name="apaterno_cliente" value="<?=set_value('apaterno_cliente')?>" >
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un nombre válido
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="amaterno_cliente">A. materno:</span>
                                        </div>
                                        <input type="text" class="form-control" id="amaterno_cliente" placeholder="" aria-describedby="nombre_empleado" name="amaterno_cliente" value="<?=set_value('amaterno_cliente')?>">
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un nombre válido
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                            <div class="form-row">
                                <div class="col-md-6">
                                    <?php echo form_error('nombre_cliente'); ?>
                                </div>
                                <div class="col-3">
                                    <?php echo form_error('apaterno_cliente'); ?>
                                </div>
                                <div class="col-3">
                                    <?php echo form_error('amaterno_cliente'); ?>
                                </div>
                            </div>  
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="usuario_empleado">Teléfono:</span>
                                        </div>
                                        <input type="text" class="form-control" id="usuario" placeholder="" aria-describedby="usuario_empleado" name="telefono_cliente" value="<?=set_value('telefono_cliente')?>" >
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un usuario válido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="usuario_empleado">Correo:</span>
                                        </div>
                                        <input type="text" class="form-control" id="usuario" placeholder="" aria-describedby="usuario_empleado" name="correo_cliente" value="<?=set_value('correo_cliente')?>" >
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un usuario válido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="usuario_empleado">Usuario:</span>
                                        </div>
                                        <input type="text" class="form-control" id="usuario" placeholder="" aria-describedby="usuario_empleado" name="username" value="<?=set_value('username')?>">
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un usuario válido
                                        </div>
                                    </div>
                                </div> 
                            </div> 
                            <div class="form-row">
                                <div class="col-md-4">
                                    <?php echo form_error('telefono_cliente'); ?>
                                </div>
                                <div class="col-4">
                                    <?php echo form_error('correo_cliente'); ?>
                                </div>
                                <div class="col-4">
                                    <?php echo form_error('username'); ?>
                                </div>
                            </div>                        
                            <div class="form-row"> 
                                <div class="col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="password_empleado">Contraseña:</span>
                                        </div>
                                        <input type="text" class="form-control" id="password"  aria-describedby="password_empleado" name="password"   value="<?=set_value('password')?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div> 
                            <div class="form-row" style="margin-top: 15px;">
                                <label style="color:"><b>Datos del contacto:</b></label>
                                <br><br>
                            </div>
                            <div class="form-row">                                
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="contacto">Nombre:</span>
                                        </div>
                                        <input type="text" class="form-control" id="contacto" placeholder="" aria-describedby="apaterno_empleado" name="contacto" value="<?=set_value('contacto')?>" >
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un apellido válido
                                        </div>
                                    </div>
                                </div>  
                        </div>
                        <div class="form-row">
                                <div class="col-md-12">
                                    <?php echo form_error('contacto'); ?>
                                </div>
                            </div> 
                        <div class="form-row">
                            <div class="form-group col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="direccion_empleado">Dirección:</span>
                                        </div>
                                        <input type="text" class="form-control" id="direccion" placeholder="" aria-describedby="direccion_empleado" name="direccion_contacto" value="<?=set_value('direccion_contacto')?>" >
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
                                        <input type="text" class="form-control" id="correo_empleado" placeholder="" aria-describedby="correo_empleado" name="correo_contacto" value="<?=set_value('correo_contacto')?>" >
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un correo válido
                                        </div>
                                    </div>                                    
                                </div>                                
                                <div class="form-group col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="telefono_empleado">Teléfono:</span>
                                        </div>
                                        <input type="text" class="form-control" id="cp" placeholder="" aria-describedby="telefono_empleado" name="telefono_contacto" value="<?=set_value('teledono_contacto')?>" >
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un teléfono válido
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="form-row">
                                <div class="col-md-4">
                                    <?php echo form_error('direccion_contacto'); ?>
                                </div>
                                <div class="col-4">
                                    <?php echo form_error('correo_contacto'); ?>
                                </div>
                                <div class="col-4">
                                    <?php echo form_error('telefono_contacto'); ?>
                                </div>
                            </div>                      
                            <div class="form-row float-right ">                                
                                <!--button type="submit" class="btn btn-danger " style="margin-top:15px;">Cancelar</button--> 
                                <!--button type="submit" class="btn btn-primary " style="margin-top:15px;">Guardar</button-->  
                                <input class="btn-primary btn" style=" margin-top: 15px;" type="submit" id="guardar" name="register" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>   
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
        document.getElementById('guardar').style.display='block';
    }
 </script>   
