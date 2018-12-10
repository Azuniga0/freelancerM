<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <!-- Count item widget-->
      <div class=" col-md-9 col-8">
        <div class="wrapper count-title d-flex text-center">
          <div class="name"><strong class="text-uppercase">Asignar tarea: <?= $at->nombrep ?> </strong></div>
        </div>
      </div>
  </div> 
</section>


<section class="mt-30px mb-30px">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
      <?php if(isset($error)): ?>
	      <p class="alert alert-danger"><?= $error1 ?></p>
	    <?php endif; ?>
    <!-- apartado para subir imagene -->
        
        <div class="col-lg-6 col-md-6" style=" float:left;">
            <p class="font-weight-bold cmptitulo">Contenido</p>
            <p class="font-weight-normal cmptxt"><?= $at->contenido ?></p>
        </div>
        <div class="col-lg-6 col-md-6" style=" float:right;">
            <p class="font-weight-bold cmptitulo">Imagen Actual</p>
            <?= $at->imagen != "" ? '<img src="'.base_url('assets/img/img_des/').$at->imagenp.'" height="200px">' : "[No hay imagen]" ?>
        </div>        
      </div>  
    </div>
  </div>
</section>

<section class="mt-30px mb-30px">
    <div class="container-fluid">
        <div class="row">            
           <div class="div_centrado">
               <!-- Count item widget-->
                <div class=" col-12">
                    <div class="row">
                        <div class="wrapper count-title d-flex text-center">
                            <div class="name"><strong class="text-uppercase centrado">Tarea</strong><br><br>
                            </div>
                        </div> 
                    </div>
                    <div class="row">  
                        <form class="col-12" action="<?php  echo base_url('index.php/cm_controller/asignarTarea/'.$at->id_publicaciones) ?>" method="post">
                            <!-- <div class="form-row">                                
                                <div class="form-group col-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="cm_id">Respopnsable:</span>
                                        </div>
                                        <?php
                                        $database=mysqli_connect("localhost", "root","","freelancer");
                                        $query = "SELECT un.id_usuario, e.nombre_empleado, e.apaterno_empleado, e.amaterno_empleado, tu.n_tipo_usuario
                                                    FROM publicaciones as p join nodos as n on p.id_nodo = n.id_nodo join usuarios_nodo as un on n.id_nodo = un.id_nodo
                                                    join usuarios as u on u.id_usuario = un.id_usuario join empleados as e on e.id_usuario_empleado = u.id_usuario 
                                                    join tipo_usuario as tu on u.rol = tu.id_tipo_usuario
                                                    WHERE p.id_publicaciones = $at->id_publicaciones ORDER BY id_usuario ASC";
                                        $result = mysqli_query($database,$query);
                                        mysqli_set_charset($database,"utf8");
                                        ?>
                                        <select class="form-control" aria-describedby="usuario_id" name="id_usuario" required>                                            
                                            <?php     
                                                while ($row = mysqli_fetch_array($result)){
                                                    echo "<option value='" . $row['id_usuario'] . "'>" . $row['nombre_empleado'].' '.$row['apaterno_empleado'].' '.$row['amaterno_empleado'].' '.$row['n_tipo_usuario']. "</option>";
                                                }
                                            ?>        
                                        </select>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-row">                                
                                <div class="form-group col-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="cm_id">Respopnsable:</span>
                                        </div>
                                        <select class="form-control" aria-describedby="usuario_id" name="id_usuario" required>                                            
                                                <?php foreach ($ur as $row ) { ?>
                                                   <option value="<?=  $row->id_usuario?>"><?= $row->nombre_empleado ?> <?= $row->apaterno_empleado ?> <?= $row->amaterno_empleado ?> <?= $row->n_tipo_usuario ?></option>
                                               <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >Titulo de la tarea</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="" name="titulo">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">Fecha de final:</span>
                                        </div>
                                        <input type="date" class="form-control" id="validationTooltipUsername" placeholder="" name="date" aria-describedby="validationTooltipUsernamePrepend" required min="<?php echo  date('Y-m-d'); ?>">
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un usuario válido
                                        </div>
                                    </div>
                                </div>                                   
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >Descripción</span>
                                        </div>
                                        <textarea name="des"  cols="192" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-success" style=" margin-top: 15px; float:right;" type="submit" value="Asignar" >
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>