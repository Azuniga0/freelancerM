    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="img/avatar-7.jpg" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">Nathan Andrews</h2><span>Web Developer</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Menú</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="<?php echo site_url('index.php/admin_controller/home') ?>"> <i class="icon-home"></i>Inicio                                </a></li>
            <li><a href="<?php echo site_url('index.php/admin_controller/empleados') ?>"> <i class="fa fa-male"></i>Empleados                            </a></li>
            <li><a href="<?php echo site_url('index.php/admin_controller/clientes') ?>"> <i class="fa fa-briefcase"></i>Empresas                       </a></li>
            <li><a href="<?php echo site_url('index.php/admin_controller/camp') ?>"> <i class="fa fa-archive"></i>Campañas                          </a></li>
            <li><a href="<?php echo site_url('index.php/admin_controller/perfil') ?>"> <i class="fa fa-child"></i>Mi perfil
                </a></li>            
          </ul>
        </div>
      </div>
    </nav>