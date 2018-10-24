<section class="mt-30px mb-30px">
    <div class="container-fluid">
        <div class="row">            
           <div class="div_centrado">
               <!-- Count item widget-->
                <div class=" col-12">
                    <div class="row">
                        <div class="wrapper count-title d-flex text-center">
                            <div class="name"><strong class="text-uppercase centrado">Nueva campaña</strong><br><br>
                            </div>
                        </div> 
                    </div>
                    <div class="row">   
                        <form class="col-md-12" method="POST" action="nueva_camp">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">Nombre de campaña:</span>
                                        </div>
                                        <input type="text" class="form-control" id="validationTooltipUsername" placeholder="" name=" nombre" aria-describedby="validationTooltipUsernamePrepend" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un nombre válido
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="cm_id">Community Manager:</span>
                                        </div>        

                                        <?php
                                            $database=mysqli_connect("localhost", "root","","freelancer");

                                            $query = "SELECT * FROM usuarios WHERE rol = 2 and id_estado_us = 1 ORDER BY id_usuario ASC";
                                            $result = mysqli_query($database,$query) or die("no se encontraron datos");
                                            mysqli_set_charset($database,"utf8");
                                            ?>

                                            <select class="form-control" id="rol" aria-describedby="cm_id" name="id_community" required>                                            
                                                <?php     
                                                    while ($row = mysqli_fetch_array($result)){
                                                        echo "<option value='" . $row['id_usuario'] . "'>" . $row['nombre'] . "</option>";
                                                    }
                                                ?>        
                                            </select>
                                        <div class="invalid-tooltip">
                                            Por favor, seleccione un rol válido
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="cm_id">Empresa:</span>
                                        </div>        

                                        <?php
                                            $database=mysqli_connect("localhost", "root","","freelancer");

                                            $query = "SELECT * FROM usuarios WHERE rol = 5  and id_estado_us = 1 ORDER BY id_usuario ASC";
                                            $result = mysqli_query($database,$query) or die("no se encontraron datos");
                                            mysqli_set_charset($database,"utf8");
                                            ?>

                                            <select class="form-control" id="rol" aria-describedby="cm_id" name="id_cliente" required>                                            
                                                <?php     
                                                    while ($row = mysqli_fetch_array($result)){
                                                        echo "<option value='" . $row['id_usuario'] . "'>" . $row['nombre'] . "</option>";
                                                    }
                                                ?>        
                                            </select>
                                        <div class="invalid-tooltip">
                                            Por favor, seleccione un rol válido
                                        </div>
                                    </div>  
                                </div>
                            </div>                            
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">Fecha de inicio:</span>
                                        </div>
                                        <input type="date" class="form-control" id="validationTooltipUsername" placeholder="" name="fecha_creacion" aria-describedby="validationTooltipUsernamePrepend" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un usuario válido
                                        </div>
                                    </div>                                   
                                </div>
                                <div class="form-group col-6">
                                    <div class="input-group">
                                        <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">Fecha de término:</span>
                                        </div>
                                        <input type="date" class="form-control" id="validationTooltipUsername" placeholder="" name="fecha_termino" aria-describedby="validationTooltipUsernamePrepend" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un usuario válido
                                        </div>
                                    </div>   
                                    </div>
                                </div>
                                <br><br>
                            </div>                  
                            <div class="form-row">                            
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">Objetivo:</span>
                                        </div>
                                        <textarea  class="form-control" rows="3" id="validationTooltipUsername" placeholder="Objetivo de la campaña..." name="objetivo" aria-describedby="validationTooltipUsernamePrepend"  required></textarea>
                                    </div>
                                </div>                                
                            </div>
                            <input class="primary-btn btn" style=" margin-top: 15px; float:right;" type="submit" value="Guardar" name="register" >
                        </form>
                    </div>
                </div>   
            </div>
        </div>
    </div>  
</section>

     
