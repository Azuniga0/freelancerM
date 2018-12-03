<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <!-- Count item widget-->
      <div class=" col-md-9 col-8">
        <div class="wrapper count-title d-flex text-center">
          <div class="name"><strong class="text-uppercase">Publicación: <?= $publi->nombre ?></strong></div>
        </div>
      </div>
  </div> 
    <?php if($publi->id_estado != 3): ?>
    <a class="btn btn-primary" style=" margin: 15px; float:right;" href="<?php echo base_url('index.php/cm_controller/aprobar/'.$publi->id_publicaciones);?>">Aprobar</a>
    <a class="btn btn-info" style=" margin: 15px; float:right;" href="<?php echo base_url('index.php/cm_controller/tarea/'.$publi->id_publicaciones);?>">Asignar tarea</a>
	<?php endif; ?>
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
            <p class="font-weight-normal cmptxt"><?=$publi->contenido ?></p>
            <p class="font-weight-bold cmptitulo">Imagen Actual</p>
            <?= $publi->imagen != "" ? '<img src="'.base_url('assets/img/img_des/').$publi->imagen.'" height="200px">' : "[No hay imagen]" ?>
            <br><br><br>
 <!-- Area de comentarios-->
          <form action="<?php  echo base_url('index.php/cm_controller/comentar/'.$publi->id_publicaciones) ?>" method="post">
            <?php if(isset($error1)): ?>
	            <p class="alert alert-danger col-8"><?= $error1 ?></p>
	          <?php endif; ?>
            <h3>Comentarios</h3>
                  <textarea name="comentario" cols="100" rows="2"></textarea>
                  <?php if($publi->id_estado != 3): ?>
                    <input class="btn btn-info " style=" margin-top: 15px; float:right;" type="submit" value="Comentar" >
                  <?php endif; ?>
          </form>
          <br>
          <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Usuario</th>
                          <th scope="col">Comentario</th>
                          <th scope="col">Fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($come as $row) { ?>                          
                        <tr>
                          <th scope="row"><?= $row->username ?></th>
                          <td><?= $row->contenido ?></td>
                          <td><?= date('d/m/Y', strtotime($row->fecha)); ?></td>
                          </tr>
                      <?php } ?>                      
                      </tbody>
                    </table> 
        </center>
      </div>  
    </div>
  </div>
</section>
