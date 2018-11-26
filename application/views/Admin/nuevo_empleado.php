
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
                        <?php /*echo $this->session->flashdata('success_msg');*/ ?>
                        <?php /*echo $this->session->flashdata('error_msg');*/ ?>
                        <div id="error_msg"></div>
                    </div>
                    <div class="row">   
                        <form class="col-md-12" method="post" action="add"  enctype="multipart/form-data" role="form" accept-charset="UTF-8">
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
                                        <input type="text" class="form-control" id="nombre_empleado" placeholder="" aria-describedby="nombre_empleado" name="nombre_empleado"   >
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
                                        <input type="text" class="form-control" id="apaterno_empleado" placeholder="" aria-describedby="apaterno_empleado" name="apaterno_empleado"   >
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
                                        <input type="text" class="form-control" id="amaterno_empleado" placeholder="" aria-describedby="rfc_empleado" name="amaterno_empleado" >
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
                                        <input type="text" class="form-control" id="direccion" placeholder="" aria-describedby="direccion_empleado" name="direccion_empleado"  >
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
                                        <input type="text" class="form-control" id="correo_empleado" placeholder="" aria-describedby="correo_empleado" name="correo_empleado"  >
                                        <div class="invalid-tooltip">
                                            <span id="email_result"></span> 
                                        </div>
                                    </div>                                    
                                </div>                                
                                <div class="form-group col-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="telefono_empleado">Teléfono:</span>
                                        </div>
                                        <input type="text" class="form-control" id="cp" placeholder="" aria-describedby="telefono_empleado" name="telefono_empleado"   >
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un teléfono válido
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="form-row">
                                <div class="input-group mb-3 col-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="picture" >
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
                                        <input type="text" class="form-control" id="username" placeholder="" aria-describedby="usuario_empleado" name="username"  >
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
                                        <input type="text" class="form-control" id="password" placeholder="********************" aria-describedby="password_empleado" name="password"   readonly value="" >
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="rol_empleado">Rol:</span>
                                        </div>        

                                        <?php
                                            $database=mysqli_connect("localhost", "root","","freelancer");

                                            $query = "SELECT id_tipo_usuario, n_tipo_usuario FROM tipo_usuario where id_tipo_usuario != 1 && id_tipo_usuario != 6 && id_tipo_usuario != 5 ORDER BY id_tipo_usuario ASC";
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
                            <a class="btn-info btn" onclick="myFunction()">Generar contraseña</a>
                            <div class="form-row float-right ">                                
                                <!--button type="submit" class="btn btn-danger " style="margin-top:15px;">Cancelar</button--> 
                                <!--button type="submit" class="btn btn-primary " style="margin-top:15px;">Guardar</button-->  
                                <button class="btn-primary btn" style=" margin-top: 15px;" type="submit" id="guardar" name="register" value="">Guardar</button>
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
