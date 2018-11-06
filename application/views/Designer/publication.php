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
</section>


<section class="mt-30px mb-30px">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
      <?php if(isset($error)): ?>
	      <p class="alert alert-danger"><?= $error ?></p>
	    <?php endif; ?>
    <!-- apartado para subir imagene -->
        <center>
        <?php echo form_open_multipart(base_url("index.php/Designer_controller/subirimgen/$publi->id_publicaciones")); ?>
          <table class="table">
              <tr>
                <td>Subir imagen</td>
                <td>
                  <input type="file" name="archivo" >
                </td>
              </tr>              
              <tr>
                <td>Imagen previa</td>
                <td><?= $publi->imagen != "" ? '<img src="'.base_url('assets/img/img_des/').$publi->imagen.'" height="200px">' : "[No hay imagen]" ?></td>
              </tr>
              <tr>
                <td></td>
                <td><input class="primary-btn btn" style=" margin-top: 15px; float:right;" type="submit" value="Guardar" ></td>
              </tr>
            </table>
          </form>

          <form action="" method="post"></form>
            <!-- Area de comentarios-->
            <form action="<?php  echo base_url('index.php/Designer_controller/comentar/'.$publi->id_publicaciones) ?>" method="post">
            <?php if(isset($error1)): ?>
	            <p class="alert alert-danger col-8"><?= $error1 ?></p>
	          <?php endif; ?>
            <h3>Comentarios</h3>
                  <textarea name="comentario" cols="100" rows="2"></textarea><br>
                  <input class="primary-btn btn" style=" margin-top: 15px; float:right;" type="submit" value="Comentar" >
          </form>
          <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col"> Usuario</th>
                          <th scope="col">Mensaje</th>
                          <th scope="col">Fecha</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($come as $row) { ?>                          
                        <tr>
                          <th scope="row"><?= $row->username ?></th>
                          <td><?= $row->contenido ?></td>
                          <td><?= $row->fecha ?></td>
                          </tr>
                      <?php } ?>                      
                      </tbody>
                    </table> 
        </center>
      </div>  
    </div>
  </div>
</section>

              