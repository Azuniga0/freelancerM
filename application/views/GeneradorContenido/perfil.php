<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <!-- Count item widget-->
      <div class=" col-md-9 col-8">
        <div class="wrapper count-title d-flex text-center">
          <div class="name"><strong class="text-uppercase">Mi perfil</strong></div>
        </div>
      </div>
  </div>  
</section>

<section>
    <div class="container-fluid">
        <div class="row">
        
            <form action="<? echo base_url();?>Designer_controller/"  method="POST" enctype="multipart/from-data">
            <center>
                <table class="table">            
                  <tr>
                    <td>Imagen</td>
                    <td>
                      <input type="file" name="img" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Contraseña</td>
                    <td>
                      <input type="text" name="contraseña_nueva" class="form-control">
                    </td>
                  </tr>
                  <tr>
                    <td>Confirmar contraseña</td>
                    <td>
                      <input type="text" name="contraseña_confirmar" class="form-control">
                    </td>
                  </tr>     
                </table>
                </center>
                <a class="btn btn-primary" href="<?php  echo base_url('index.php/Designer_controller/publication') ?>">Guardar</a>
            </form>
        </div>
    </div>
</section>