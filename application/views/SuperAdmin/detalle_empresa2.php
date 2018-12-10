
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
                        <form class="col-md-12" method="post" action="actualizar_empresa"  enctype="multipart/form-data" role="form">                        
                            <div class="form-row">
                                <div class="col-md-9 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="nombre_empleado">Razón social:</span>
                                        </div> 
                                        <?php
                                           echo " <input type='hidden' name='id_empresa' value='$id'    required='required'  id='id_usuario' >
                                            '<input type='hidden' name='id_usuario' value='$id_usuario' required='required'  id='tipo_usuario' > ";  
                                            
                                            ?>
                                              
                                            <input type="text" name="razon_social" value="<?=set_value('razon_social')?>"  class="form-control" id="nombre" aria-describedby="nombre_empleado">
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un nombre válido
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3 col-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="rfc">RFC:</span>
                                        </div> 
                                        <input type="text" name="rfc" value="<?=set_value('rfc')?>" class="form-control" id="rfc" aria-describedby="rfc">
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un apellido válido
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="input-group mb-3 col-3">
                                    <div class="custom-file">
                                    <input type="hidden" name="imagen" value="$img" class="form-control" id="imagen">
                                    
                                    <input type="file" name="picture" class="custom-file-input" id="inputGroupFile01" aria-describedby="direccion_empleado">
                                
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
                                        <input type="text" name="nombre_cliente" value="<?=set_value('nombre_cliente')?>" class="form-control" id="username" aria-describedby="usuario_empleado">
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
                                        <input type="text" name="apaterno_cliente" value="<?=set_value('apaterno_cliente')?>" class="form-control" id="username" aria-describedby="usuario_empleado">
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
                                        <input type="text" name="amaterno_cliente" value="<?=set_value('amaterno_cliente')?>"  class="form-control" id="username" aria-describedby="usuario_empleado">
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
                                        <input type="text" name="telefono_cliente" value="$tel_cliente" class="form-control" value="<?=set_value('telefono_cliente')?>" aria-describedby="usuario_empleado">
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
                                        <input type="text" name="correo_cliente" value="<?=set_value('correo_cliente')?>"  class="form-control" id="username" aria-describedby="usuario_empleado">
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
                                        <input type="text" name="username" value="<?=set_value('username')?>" class="form-control" id="username" aria-describedby="usuario_empleado">
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un usuario válido
                                        </div>
                                    </div>
                                </div> 
                            </div>                        
                            <div class="form-row"> 
                                <div class="col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="password_empleado">Contraseña:</span>
                                        </div><input type="text" name="password" value="<?=set_value('password')?>" class="form-control" id="password" aria-describedby="password_empleado" >
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
                                        </div><input type="text" name="contacto" value="<?=set_value('contacto')?>" class="form-control" id="username" aria-describedby="usuario_empleado">
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
                                        </div><input type="text" name="direccion_contacto" value="<?=set_value('direccion_contacto')?>" class="form-control" id="username" aria-describedby="usuario_empleado">
                                        <div class="invalid-tooltip">
                                            Por favor, inserte una dirección válida
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="estado_empleado">Correo:</span>
                                        </div> <input type="text" name="correo_contacto" value="<?=set_value('correo_contacto')?>" class="form-control" id="username" aria-describedby="usuario_empleado">
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
                                        <input type="text" name="telefono_contacto" value="<?=set_value('telefono_contacto')?>" class="form-control" id="username" aria-describedby="usuario_empleado">
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un teléfono válido
                                        </div>
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

