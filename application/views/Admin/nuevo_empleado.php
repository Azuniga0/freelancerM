<section class="mt-30px mb-30px">
    <div class="container-fluid">
        <div class="row">            
           <div class="div_centrado">
               <!-- Count item widget-->
                <div class=" col-md-9 col-8">
                    <div class="row">
                        <div class="wrapper count-title d-flex text-center">
                            <div class="name"><strong class="text-uppercase centrado">Nuevo empleado</strong><br><br>
                            </div>
                        </div> 
                    </div>
                    <div class="row">   
                        <form action="" class="" style="">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <img class="imagen_perfil" src="<?php echo base_url(); ?>img/user.jpg" alt=""><br>
                                    <a href="" style="font-size:12px">Seleccione imagen</a>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Nombre: <small>*</small></label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Nombre completo">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState">Rol de usuario:</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Seleccione un rol</option>
                                        <option value="1">Administrador</option>
                                        <option value="2">Community Manager</option>
                                        <option value="3">Diseñador</option>
                                        <option value="4">Generador de Contenido</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputAddress">Usuario</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="">
                                </div>
                                <div class="form-group col">
                                    <label for="inputAddress2">Contraseña</label> <br>
                                    <a href="" class="btn btn-info">Generar contraseña</a>
                                    <input type="text" class="form-control" id="inputAddress2" placeholder="-------------" disabled>
                                </div>
                            </div>  
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="<?php echo base_url('index.php/admin_controller/empleados');?>" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>   
            </div>
        </div>
    </div>  
</section>

     
