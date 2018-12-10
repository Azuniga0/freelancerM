
<?php 
    $fecha=date("Y/m/d") ;
    //echo $fecha;action="nuevo_empleado" 
?>

<section class="mt-30px mb-30px">
    <div class="container-fluid">
        <div class="row">            
           <div class="div_centrado">
               <!-- Count item widget-->
                <div class=" col-12">
                    <div class="row">
                        <div class="wrapper count-title d-flex text-center">
                            <div class="name"><strong class="text-uppercase centrado">Nuevo usuario</strong><br><br>
                            </div>
                        </div> 
                    </div>
                    <div class="row">
                        <?php echo $this->session->flashdata('success_msg'); ?>
                        <?php echo $this->session->flashdata('error_msg'); ?>
                        <?php //echo validation_errors(); ?>
                    </div>
                    <div class="row">   
                        <form class="col-md-12" method="post" action="add"  enctype="multipart/form-data" role="form">
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
                                        <input type="text" class="form-control" id="nombre" placeholder="" aria-describedby="nombre_empleado" name="nombre_empleado"  value="<?=set_value('nombre_empleado')?>" >
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
                                        <input type="text" class="form-control" id="aparerno_empleado" placeholder="" aria-describedby="apaterno_empleado" name="apaterno_empleado" value="<?=set_value('apaterno_empleado')?>">
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
                                        <input type="text" class="form-control" id="amaterno_empleado" placeholder="" aria-describedby="rfc_empleado" name="amaterno_empleado" value="<?=set_value('amaterno_empleado')?>">
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
                                        <input type="text" class="form-control" id="direccion" placeholder="" aria-describedby="direccion_empleado" name="direccion_empleado" value="<?=set_value('direccion_empleado')?>">
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
                                        <input type="text" class="form-control" id="correo_empleado" placeholder="" aria-describedby="correo_empleado" name="correo_empleado"  value="<?=set_value('correo_empleado')?>">
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
                                        <input type="text" class="form-control" id="cp" placeholder="" aria-describedby="telefono_empleado" name="telefono_empleado" value="<?=set_value('telefono_empleado')?>">
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
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="picture" >
                                        <label class="custom-file-label" for="inputGroupFile01"></label>        
                                    </div>
                                </div>
                                <div class="input-group mb-3 col-3">
                                    <div class="input-group">
                                        <p id="namepicture"></p>
                                        <!--label for="" id="namepicture" class="form-control"></label-->
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
                                        <input type="text" class="form-control" id="usuario" placeholder="" aria-describedby="usuario_empleado" name="username" value="<?=set_value('username')?>">
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
                                        //echo "<input type='text' class='form-control' id='password' placeholder='********************' aria-describedby='password_empleado' name='password'   disabled value=''>";
                                        
                                        ?>
                                        <input type="text" class="form-control" id="password" placeholder aria-describedby="password_empleado" name="password" value="<?=set_value('password')?>" >
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="rol_empleado">Rol:</span>
                                        </div>        

                                        <?php
                                            $database=mysqli_connect("localhost", "root","","freelancer");

                                            $query = "SELECT id_tipo_usuario, n_tipo_usuario FROM tipo_usuario where id_tipo_usuario = 1 || id_tipo_usuario = 6  ORDER BY id_tipo_usuario ASC";
                                            $result = mysqli_query($database,$query) or die("no se encontraron datos");
                                            mysqli_set_charset($database,"utf8");
                                        ?>

                                            <select class="form-control" id="rol" aria-describedby="rol_empleado" name="tipo_usuario"  >                                            
                                                <?php     
                                                    while ($row = mysqli_fetch_array($result)){
                                                        echo "<option value='" . $row['id_tipo_usuario'] . "'>" . $row['n_tipo_usuario'] . "</option>";
                                                    }
                                                ?>        
                                            </select>

                                        <div class="invalid-tooltip">
                                            Por favor, seleccione un rol válido
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <!--p><a class="btn btn-primary" id="create">Create random string</a></p>
                                    <div class="form-control" id="output" readonly-->
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
                            <!--a class="btn-info btn" onclick="myFunction()">Generar contraseña</a-->
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

    // crea la cadena random
    function createRandomString( length ) {        
        var str = "";
        for ( ; str.length < length; str += Math.random().toString( 36 ).substr( 2 ) );
        return str.substr( 0, length );
    }

    // crea una cadena de 6 caracteres alfanumerica aleatoria
    document.addEventListener( "DOMContentLoaded", function() {
        var button = document.querySelector( "#create" ),
            output = document.querySelector( "#output" );
        button.addEventListener( "click", function() {
            var str = createRandomString( 6 );
            output.innerHTML = str;
        }, false)  
    });

    // toma el nombre del archivo a subir y lo muestra en un label
    document.getElementById('inputGroupFile01').onchange = function (e) {
        var fileName = e.target.files[0].name;
        //alert('The file "' + fileName +  '" has been selected.');
        
        document.getElementById('namepicture').innerHTML = fileName;
        
    };

    /*
    // manda a llamar la funcion que crea la cadena aleatoria y muestra el boton para guardar
    function myFunction() {
        document.getElementById("password").value = createRandomString( 6 );
        document.getElementById('guardar').style.display='block';
    }*/
 </script>   
