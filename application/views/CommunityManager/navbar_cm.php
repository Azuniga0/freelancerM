    <!-- Side Navbar -->
    <?php 
    //print_r( $_SESSION); 
    //echo '<img class="imagen_receta recetas" src="../../img/comida/default.jpg">';
    $id=$_SESSION['id_usuario'];
    /**/$database=mysqli_connect("localhost", "root","","freelancer");

    $query = "SELECT imagen FROM usuarios where id_usuario = $id";
    $result = mysqli_query($database,$query);
    mysqli_set_charset($database,"utf8");
    
    ?>
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center">  
            <?php 

              while ($row = $result->fetch_assoc()) {
                echo '<img class="img-fluid rounded-circle" src="'.base_url(). '/img/perfiles/cm/'.$row['imagen'].'">';
              }

            ?> 
            <h2 class="h5" style="margin-top:15px;"><?php echo $_SESSION['nombre_empleado'].' '.$_SESSION['apaterno_empleado']; ?></h2><span><?php echo $_SESSION['n_tipo_usuario']; ?></span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="#" class="brand-small text-center"> <strong>M</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Menú</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="<?php echo site_url('index.php/cm_controller/home') ?>"> <i class="icon-home"></i>Inicio                                </a></li>
            <li><a href="<?php echo site_url('index.php/cm_controller/pendientes') ?>"> <i class="fa fa-check-square-o" aria-hidden="true"></i>Pendientes                            </a></li>
            <li><a href="<?php echo site_url('index.php/cm_controller/crearPublicacion') ?>"> <i class="fa fa-tasks" aria-hidden="true"></i>Crear Publicación</a></li>
            <!--li><a href="#"> <i class="fa fa-area-chart" aria-hidden="true"></i> Dashboard                          </a></li-->
            <li><a href="<?php echo site_url('index.php/cm_controller/camp') ?>"> <i class="fa fa-archive" aria-hidden="true"></i> Campañas
                </a></li>            
          </ul>
        </div>
      </div>
    </nav>