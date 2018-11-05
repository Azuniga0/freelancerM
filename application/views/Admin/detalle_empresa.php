<?php //print_r($data); 
/*date_default_timezone_set('America/Mexico_City');
$date = date('d/m/Y h:i:s a', time());
$timezone = date_default_timezone_get();
echo "The current server timezone is: " . $timezone;
*/
?>

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
                                <?php echo $value->razon_social;
                                ?></strong><br><br>
                                </div>
                            </div> 
                        </div>
                        <div class="row">
                            <?php /*echo $this->session->flashdata('success_msg');*/ ?>
                            <?php /*echo $this->session->flashdata('error_msg');*/ ?>
                        </div>
                        <div class="row">   
                        <form class="col-md-12" method="post" action="actualizar_empresa"  enctype="multipart/form-data" role="form">    
                        <!--label for="" style="margin-right: 15px;">Foto actual:</label-->
                            <?php
                                //echo '<img class="imagen_edicion recetas" src="../../img/perfiles/empresas/'.$value->imagen_empresa.'">';
                            ?>                        
                            <div class="form-row">
                                <div class="col-md-9 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="nombre_empleado">Razón social:</span>
                                        </div>
                                        <?php  
                                            $id=$value->id_empresa;  
                                            $rol=$value->rol;  
                                            echo "<input type='hidden' name='id_usuario' value='$id' required='required'  id='id_usuario' >";  
                                            echo "<input type='hidden' name='tipo_usuario' value='$rol' required='required'  id='tipo_usuario' >";  
                                            
                                            $name=$value->razon_social;  
                                            echo "<input type='text' name='razon_social' value='$name' required='required' class='form-control' id='nombre' aria-describedby='nombre_empleado'>";    
                                        ?>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un nombre válido
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3 col-3">
                                    <div class="custom-file">
                                        <?php 
                                            $img=$value->imagen_empresa;  
                                            echo "<input type='hidden' name='imagen' value='$img' class='form-control' id='imagen'>";

                                            echo "<input type='file' name='picture' class='custom-file-input' id='inputGroupFile01' aria-describedby='direccion_empleado'>"; 
                                        ?>
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="picture" >
                                        <label class="custom-file-label" for="inputGroupFile01"></label>
                                    </div>
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
                                        <?php 
                                            $contacto=$value->contacto;  
                                            echo "<input type='text' name='contacto' value='$contacto' required='required' class='form-control' id='username' aria-describedby='usuario_empleado'>"; 
                                        ?>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un apellido válido
                                        </div>
                                    </div>
                                </div>                            
                                
                        </div>
                        <div class="form-row">
                            <div class="form-group col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="direccion_empleado">Dirección:</span>
                                        </div>
                                        <?php 
                                            $dir=$value->direccion_contacto;  
                                            echo "<input type='text' name='direccion_contacto' value='$dir' required='required' class='form-control' id='username' aria-describedby='usuario_empleado'>"; 
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
                                            $correo=$value->correo_contacto;  
                                            echo "<input type='text' name='correo_contacto' value='$correo' required='required' class='form-control' id='username' aria-describedby='usuario_empleado'>"; 
                                        ?>
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
                                        <?php 
                                            $tel=$value->telefono_empresa;  
                                            echo "<input type='text' name='telefono_contacto' value='$tel' required='required' class='form-control' id='username' aria-describedby='usuario_empleado'>"; 
                                        ?>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un teléfono válido
                                        </div>
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
                                        <?php 
                                            $cliente=$value->nombre_cliente;  
                                            echo "<input type='text' name='nombre_cliente' value='$cliente' required='required' class='form-control' id='username' aria-describedby='usuario_empleado'>"; 
                                        ?>
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
                                        <?php 
                                            $apaterno=$value->apaterno_cliente;  
                                            echo "<input type='text' name='apaterno_cliente' value='$apaterno' required='required' class='form-control' id='username' aria-describedby='usuario_empleado'>"; 
                                        ?>
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
                                        <?php 
                                            $amaterno=$value->amaterno_cliente;  
                                            echo "<input type='text' name='amaterno_clinete' value='$amaterno' required='required' class='form-control' id='username' aria-describedby='usuario_empleado'>"; 
                                        ?>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un nombre válido
                                        </div>
                                    </div>
                                </div> 
                            </div>   
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="usuario_empleado">Teléfono:</span>
                                        </div>
                                        <?php 
                                            $tel_cliente=$value->telefono_cliente;  
                                            echo "<input type='text' name='telefono_cliente' value='$tel_cliente' required='required' class='form-control' id='username' aria-describedby='usuario_empleado'>"; 
                                        ?>
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
                                        <?php 
                                            $correo_c=$value->correo_cliente;  
                                            echo "<input type='text' name='correo_cliente' value='$correo_c' required='required' class='form-control' id='username' aria-describedby='usuario_empleado'>"; 
                                        ?>
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
                                        <?php 
                                            $usuario=$value->username;  
                                            echo "<input type='text' name='username' value='$usuario' required='required' class='form-control' id='username' aria-describedby='usuario_empleado'>"; 
                                        ?>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un usuario válido
                                        </div>
                                    </div>
                                </div> 
                            </div>                        
                            <div class="form-row"> 
                                <div class="col-2">
                                    <div class="input-group">
                                        <a class="btn-info btn" onclick="myFunction()">Generar contraseña</a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="password_empleado">Contraseña:</span>
                                        </div>
                                        <?php
                                            $pass=$value->pass_decrypt;  
                                            echo "<input type='text' name='password' value='$pass' required='required' class='form-control' id='password' aria-describedby='password_emleado' readonly>";
                                        ?>
                                    </div>
                                </div>
                            </div>                            
                            <div class="form-row float-right ">                                
                                <!--button type="submit" class="btn btn-danger " style="margin-top:15px;">Cancelar</button--> 
                                <!--button type="submit" class="btn btn-primary " style="margin-top:15px;">Guardar</button-->  
                                <input class="btn-primary btn" style=" margin-top: 15px;" type="submit" id="guardar" name="register" value="Guardar">
                            </div>
                        </form>
                        <?php } ?>
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
        //document.getElementById('guardar').style.display='block';
    }
 </script>   