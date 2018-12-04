<?php 
$id = $_SESSION['id_usuario'];
$db = mysqli_connect("localhost", "root","","freelancer");

//Consulta para obtener ultimos administradores añadidos en los 30 dias recientes
$last_users= "SELECT * FROM usuarios WHERE creador = $id AND rol = 1 AND (fecha_creacion BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW());";
if($result = mysqli_query($db,$last_users)){
  $rowcount=mysqli_num_rows($result);
  //printf("Result set has %d rows.\n",$rowcount);
  //echo $id;
  // Free result set
  mysqli_free_result($result);
}

//Consulta para saber los ultimos superadministradores añadidos en los 30 dias recientes
$last_susers= "SELECT * FROM usuarios WHERE creador = $id AND rol = 6 AND (fecha_creacion BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW());";
if($result2 = mysqli_query($db,$last_susers)){
  $sucount=mysqli_num_rows($result2);
  //printf("Result set has %d rows.\n",$rowcount);
  //echo $id;
  // Free result set
  mysqli_free_result($result2);
}

//Consulta para saber los ultimos administradores empresariales en los 30 dias recientes
$last_susers= "SELECT * FROM usuarios WHERE creador = $id AND rol = 7 AND (fecha_creacion BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW());";
if($result3 = mysqli_query($db,$last_susers)){
  $account=mysqli_num_rows($result3);
  //printf("Result set has %d rows.\n",$rowcount);
  // Free result set
  mysqli_free_result($result3);
}

//Consulta para saber las últimas empresas en los 30 dias recientes
$last_emp= "SELECT * FROM empresas WHERE creador_empresa = $id AND (fecha_alta BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW());";
if($result4 = mysqli_query($db,$last_emp)){
  $empcount=mysqli_num_rows($result4);
  //printf("Result set has %d rows.\n",$rowcount);
  // Free result set
  mysqli_free_result($result4);
}
?>
  
      <!-- Counts Section -->      
      <section class="dashboard-counts section-padding">
        <div class="">
          <h1 style="margin: 25px;" class="display h1">Nuevos usuarios creados:</h1>
        </div>
        <div class="container-fluid">
          <div class="row">
            <!-- Count item widget-->
            <div class="col-xl-3 col-md-3 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">S. Administrador</strong><span>Últimos 30 días</span>
                  <div class="count-number"><?php echo $sucount; ?></div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-3 col-md-3 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">Administrador</strong><span>Últimos 30 días</span>
                  <div class="count-number"><?php echo $rowcount; ?></div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-3 col-md-3 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-user"></i></div>
                <div class="name"><strong class="text-uppercase">A. empresarial</strong><span>Últimos 30 días</span>
                  <div class="count-number"><?php echo $account; ?></div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-xl-3 col-md-3 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="fa fa-building-o" aria-hidden="true"></i></div>
                <div class="name"><strong class="text-uppercase">Empresas</strong><span>Últimos 30 días</span>
                  <div class="count-number"><?php echo $empcount; ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Header Section-->
      <!--section class="dashboard-header section-padding">
        <div class="container-fluid">
          <div class="row d-flex align-items-md-stretch"-->
            <!-- To Do List-->
            <!--div class="col-lg-3 col-md-6">
              <div class="card to-do">
                <h2 class="display h4">To do List</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <ul class="check-lists list-unstyled">
                  <li class="d-flex align-items-center"> 
                    <input type="checkbox" id="list-1" name="list-1" class="form-control-custom">
                    <label for="list-1">Similique sunt in culpa qui officia</label>
                  </li>
                  <li class="d-flex align-items-center"> 
                    <input type="checkbox" id="list-2" name="list-2" class="form-control-custom">
                    <label for="list-2">Ed ut perspiciatis unde omnis iste</label>
                  </li>
                  <li class="d-flex align-items-center"> 
                    <input type="checkbox" id="list-3" name="list-3" class="form-control-custom">
                    <label for="list-3">At vero eos et accusamus et iusto </label>
                  </li>
                  <li class="d-flex align-items-center"> 
                    <input type="checkbox" id="list-4" name="list-4" class="form-control-custom">
                    <label for="list-4">Explicabo Nemo ipsam voluptatem</label>
                  </li>
                  <li class="d-flex align-items-center"> 
                    <input type="checkbox" id="list-5" name="list-5" class="form-control-custom">
                    <label for="list-5">Similique sunt in culpa qui officia</label>
                  </li>
                  <li class="d-flex align-items-center"> 
                    <input type="checkbox" id="list-6" name="list-6" class="form-control-custom">
                    <label for="list-6">At vero eos et accusamus et iusto </label>
                  </li>
                  <li class="d-flex align-items-center"> 
                    <input type="checkbox" id="list-7" name="list-7" class="form-control-custom">
                    <label for="list-7">Similique sunt in culpa qui officia</label>
                  </li>
                  <li class="d-flex align-items-center"> 
                    <input type="checkbox" id="list-8" name="list-8" class="form-control-custom">
                    <label for="list-8">Ed ut perspiciatis unde omnis iste</label>
                  </li>
                </ul>
              </div>
            </div-->
            <!-- Pie Chart-->
            <!--div class="col-lg-3 col-md-6">
              <div class="card project-progress">
                <h2 class="display h4">Project Beta progress</h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <div class="pie-chart">
                  <canvas id="pieChart" width="300" height="300"> </canvas>
                </div>
              </div>
            </div-->
            <!-- Line Chart -->
            <!--div class="col-lg-6 col-md-12 flex-lg-last flex-md-first align-self-baseline">
              <div class="card sales-report">
                <h2 class="display h4">Sales marketing report</h2>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor amet officiis</p>
                <div class="line-chart">
                  <canvas id="lineCahrt"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section-->