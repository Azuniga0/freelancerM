<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <!-- Count item widget-->
      <div class=" col-md-9 col-8">
        <div class="wrapper count-title d-flex text-center">
          <div class="name"><strong class="text-uppercase">Publicación</strong></div>
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
        <form action="<?php  echo base_url('index.php/GC_controller/subircontenido/'.$publi->id_publicaciones) ?>" method="post">
            <table class="table">
              <tr>
                <td>Contenido</td>
                <td>
                  <textarea name="contenido"  cols="140" rows="10"><?=$publi->contenido ?></textarea>
                </td>
              </tr> 
              <tr>
                <td></td>
                <td><input class="btn btn-success" style=" margin-top: 15px; float:right;" type="submit" value="Guardar" ></td>
              </tr>
              </table>
          </form>
                <?php if(isset($error2)): ?>
	                <p class="alert alert-danger"><?= $error2 ?></p>
	              <?php endif; ?>
              <?php echo form_open_multipart(base_url("index.php/GC_controller/subirimg/$publi->id_publicaciones")); ?>
              <table class="table"> 
              <tr>
                <td>Imagen Actual</td>
                <td><?= $publi->imagen != "" ? '<img src="'.base_url('assets/img/img_des/').$publi->imagen.'" height="200px">' : "[No hay imagen]" ?></td>
              </tr>
              <tr>
                <td>Subir imagen</td>
                <td>
                  <input type="file" name="archivo" >
                </td>
              </tr>                
              <tr>
                <td></td>
                <td><input class="btn btn-success" style=" margin-top: 15px; float:right;" type="submit" value="Guardar" ></td>
              </tr>
            </table>
          </form>
 <!-- Area de comentarios-->
          <form action="<?php  echo base_url('index.php/GC_controller/comentar/'.$publi->id_publicaciones) ?>" method="post">
            <?php if(isset($error1)): ?>
	            <p class="alert alert-danger col-8"><?= $error1 ?></p>
	          <?php endif; ?>
            <h3>Comentarios</h3>
                  <textarea name="comentario" cols="100" rows="2"></textarea>
                  <input class="btn btn-info " style=" margin-top: 15px; float:right;" type="submit" value="Comentar" >
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
