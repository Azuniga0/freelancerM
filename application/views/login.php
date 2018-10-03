<?php
include 'header.php';
?>
 <div class="login" style="background: url('img/inicio-fondo.jpg'); ">
   <div class="container">   
    <div class="row ">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div-- class="card-body">
            <h4 class="card-title text-center">Inicia sesión</h4>
            <hr class="my-4">
            <form class="form-signin" role="form" method="post" action="<?php echo base_url('index.php/plataforma/login_user'); ?>"> 
              <div class="d-flex  justify-content-center">
                <fieldset>
                  <!--div class="form-group"  >
                    <input class="form-control" placeholder="Usuario" name="username" type="text" autofocus required>
                  </div-->                  
                  <div class="form-label-group">
                    <label>Usuario</label>
                    <input type="text" name="username" class="form-control" placeholder="Usuario" required autofocus>  
                    <br>              
                  </div>

                  <!--div class="form-group">
                    <input class="form-control" placeholder="******" name="password" type="password" value="" required>
                  </div-->

                  <div class="form-label-group">
                    <label>Contraseña</label>
                    <input type="password" name="password" class="form-control" placeholder="********" required>        
                  </div>
                  
                  <!--input class="primary-btn d-inline-flex align-items-center" style="color:white;" type="submit" value="Entrar" name="login" -->

                  <div class="form-label-group">
                    <br><br>
                    <button class="btn btn-lg btn-secondary btn-block text-uppercase" type="submit" name="login">Iniciar sesión</button>
                    <?php 
                      echo $this->session->flashdata("error");
                    ?>
                  </div> 
                  

                  <div class="form-label-group" style="text-align: justify">
                    <!--a href="<?php echo site_url('index.php/plataforma/login_admin') ?>" >Administrador</a-->  

                  </div>                                  
                </fieldset>
              </div>
            </form>             
          </div>
        </div>
      </div>
    </div>
  </div>   
</div>
<?php
include 'footer.php';
?>