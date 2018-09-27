<?php
  require('header.php');
?>
 <div class="login" style="background: url('img/inicio-fondo.jpg'); ">
   <div class="container">   
    <div class="row ">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Inicia sesión</h5>
            <form class="form-signin" method="post" action="index.php/plataforma/login_user" id="login">
              <div class="form-label-group">
                <label>Usuario</label>
                <input type="text" id="username" class="form-control" placeholder="Usuario" required autofocus>  
                <br>              
              </div>
              <div class="form-label-group">
                <label>Contraseña</label>
                <input type="password" id="password" class="form-control" placeholder="********" required>                
              </div>
              <div class="form-label-group">
                <br><br>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="inicio" name="login">Iniciar sesión</button>
              </div>    
              <hr class="my-4">
              <div class="form-label-group">
                <a href="">¿Eres cliente? Haz click aquí</a>
              </div>          
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>   
</div>
<?php
  require('footer.php');
?>