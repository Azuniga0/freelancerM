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
                                <?php echo $value->nombre_empleado.' '.$value->apaterno_empleado.' '.$value->amaterno_empleado;
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
                            <label for="" style="margin-right: 15px;">Foto actual:</label>
                            <?php
                                switch ($value->rol) {
                                    case '2':
                                       echo '<img class="imagen_edicion recetas" src="../../img/perfiles/cm/'.$value->imagen.'">';
                                    break;
                                    case '3':
                                       echo '<img class="imagen_edicion recetas" src="../../img/perfiles/designer/'.$value->imagen.'">';
                                    break;
                                    case '4':
                                       echo '<img class="imagen_edicion recetas" src="../../img/perfiles/gc/'.$value->imagen.'">';
                                    break;                                    
                                    default:
                                        # code...
                                        break;
                                }                                
                            ?>
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
                                                $rol=$value->rol;  
                                                echo "<input type='hidden' name='id_usuario' value='$id' required='required'  id='id_usuario' >";  
                                                echo "<input type='hidden' name='tipo_usuario' value='$rol' required='required'  id='tipo_usuario' >";  
                                            
                                                $name=$value->nombre_empleado;  
                                                echo "<input type='text' name='nombre_empleado' value='$name' required='required' class='form-control' id='nombre' aria-describedby='nombre_empleado'>";    
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
                                                echo "<input type='text' name='apaterno_empleado' value='$apaterno' required='required' class='form-control' id='apaterno_empleado' aria-describedby='apaterno_empleado'>";    
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
                                                echo "<input type='text' name='amaterno_empleado' value='$amaterno' required='required' class='form-control' id='amaterno_empleado' aria-describedby='amaterno_empleado'>";    
                                            ?> 
                                            <div class="invalid-tooltip">
                                                Por favor, inserte un apellido válido
                                            </div>
                                        </div>
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
                                                echo "<input type='text' name='direccion_empleado' value='$direccion' required='required' class='form-control' id='direccion_empleado' aria-describedby='direccion_empleado'>";    
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
                                                echo "<input type='text' name='correo_empleado' value='$correo' required='required' class='form-control' id='correo_empleado' aria-describedby='correo_empleado'>";
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
                                                echo "<input type='text' name='telefono_empleado' value='$telefono' required='required' class='form-control' id='telefono_empleado' aria-describedby='telefono_empleado'>";    
                                            ?>
                                            <div class="invalid-tooltip">
                                                Por favor, inserte un teléfono válido
                                            </div>
                                        </div>
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
                                                echo "<input type='text' name='username' value='$usuario' required='required' class='form-control' id='username' aria-describedby='usuario_empleado'>";    
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
                                                echo "<input type='text' name='password' value='$pass' required='required' class='form-control' id='password' aria-describedby='password_emleado' readonly>";
                                            ?>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="form-row">
                                    <div class="col-2">
                                        <div class="input-group">
                                            <a class="btn-info btn" onclick="myFunction()">Generar contraseña</a>
                                        </div>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-6">
                                        <div class="input-group">
                                            <?php
                                                $database=mysqli_connect("localhost", "root","","freelancer");

                                                $query = "SELECT id_estado, id_estado_us, estado FROM usuarios u join estado_usuario eu on u.id_estado_us = eu.id_estado where id_usuario = $value->id_usuario";
                                                $result = mysqli_query($database,$query) or die("no se encontraron datos");

                                                //I assume the 2nd entry in the database is the value name and the 3th is the button value
                                                /*while ($row = mysqli_fetch_array($result)) {
                                                    echo '<input type="radio" name="'.$row['estado'].'" value="'.$row['id_estado'].'" />'.$row['estado'];
                                                }*/
                                            ?>
                                            <!--div>
                                                <label for="" style="margin-right: 15px;">Estado: </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                                                <label class="form-check-label" for="inlineRadio1">Activo</label>
                                            </div><div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                                <label class="form-check-label" for="inlineRadio2">Inactivo</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3" >
                                                <label class="form-check-label" for="inlineRadio3">Despedido</label>
                                            </div-->
                                        </div>
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
