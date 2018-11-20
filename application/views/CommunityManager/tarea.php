<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <!-- Count item widget-->
      <div class=" col-md-9 col-8">
        <div class="wrapper count-title d-flex text-center">
          <div class="name"><strong class="text-uppercase">Asignar tarea</strong></div>
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
        <center>
            <p class="font-weight-bold cmptitulo">Contenido</p>
            <p class="font-weight-normal cmptxt"><?=$at->contenido ?></p>
            <p class="font-weight-bold cmptitulo">Imagen Actual</p>
            <?= $at->imagen != "" ? '<img src="'.base_url('assets/img/img_des/').$at->imagenp.'" height="200px">' : "[No hay imagen]" ?>
            <br><br><br><br>
        </center>
      </div>  
    </div>
  </div>
  <div class="container-fluid">
                <div class="row">
                    <div>
                        <form class="col-12" action="<?php  echo base_url('index.php/cm_controller/asignarTarea/'.$at->id_publicaciones) ?>" method="post">
                                <center>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >Nombre de la tarea</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="" name=" nombre">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" >¿A quién asignar?</span>
                                                </div>
                                                    <select class="form-control" id="rol" aria-describedby="cm_id" name="id_community" required>                                            
                                                        <?php foreach ($at as $row) { ?>
                                                            <option value="<?php $row->id_usuario ?>"> <?php $row->username?>-<?php $row->rol?> </option>
                                                        <?php } ?>        
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
                                </center>
                        </form>
                    </div>
                </div>
            </div>
</section>
