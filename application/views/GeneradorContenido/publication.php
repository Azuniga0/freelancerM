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
    <!-- apartado para subir imagene -->
        <center>
          <form action="<? echo base_url();?>Designer_controller/subirimgen" method="POST" enctype="multipart/from-data">
            <table class="table">
              <tr>
                <td>Contenido</td>
                <td>
                  <textarea name="contenido"  cols="140" rows="10"></textarea>
                </td>
              </tr>
              <tr>
                <td>Imagen</td>
                <td>
                  <input type="file" name="img" class="form-control">
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                <a class="btn btn-primary" style="float:right;" href="<?php  //echo base_url('index.php/Designer_controller/') ?>">Guardar</a>
                </td>
              </tr>
            </table>
            <!-- Area de comentarios-->
            <h3>Comentarios</h3>
                  <textarea name="comentario" cols="100" rows="2"></textarea><br>
                  <a class="btn btn-primary" href="<?php  //echo base_url('index.php/Designer_controller/') ?>">Comentar</a>
          </form>
        </center>
      </div>  
    </div>
  </div>
</section>
