<?php   
  //print_r($empleado_activo);
  /*print_r($empleado_inactivo);
  print_r($empleado_despedido);*/
  //$result = json_decode($empleado_activo, true);
  $i=0;
	/*while($row = mysqli_fetch_array( $empleado_activo, MYSQLI_FETCH_ASSOC)) {
        $datos1[$i] = $row;
        $i++;
  } */
  //$datos_empleado->empleado_activo();
?>

<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <!-- Count item widget-->
      <div class=" col-md-9 col-8">
        <div class="wrapper count-title d-flex text-center">
          <div class="name"><strong class="text-uppercase">Empleados</strong>
          </div>
        </div>
      </div>
      <div class=" col-md-3 col-4">
    <div class="wrapper count-title d-flex text-center">
      <div class="name">
        <a style="margin:5px;" class="btn btn-primary" href="<?php echo base_url('index.php/admin_controller/vista_nuevo_empleado');?>">Nuevo empleado</a>
      </div>
      <div class="name">
        <!--a style="margin:5px;" class="btn btn-primary" href="<?php echo base_url('index.php/sadmin_controller/vista_existente_sa_empleado');?>">Empleado existente</a-->
      </div>
    </div>
  </div>
    </div>
  </div>  
</section>

<!-- Empleados -->
      <section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <!-- Recent Updates Widget          -->
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><a data-toggle="collapse" data-parent="#new-updates" href="#updates-box" aria-expanded="true" aria-controls="updates-box">Activos</a></h2><a data-toggle="collapse" data-parent="#new-updates" href="#updates-box" aria-expanded="true" aria-controls="updates-box"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-box" role="tabpanel" class="collapse show">
                  <div class="" style="padding:15px">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Rol</th>
                          <th scope="col">Correo electrónico</th>
                          <th scope="col">Fecha de alta</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                          <tr>
                            <form action="detalle_empleado" method="post"> 
                              <td>
                                <?php 

                                  $id=$value->id_usuario;
                                  echo "<input type='hidden' name='id' value='$id' class='input' readonly>";
                                  //echo $name;

                                  $img=$value->imagen; 
                                  echo '<img class="imagen_receta recetas" src="../../img/perfiles/'.$value->imagen.'">';
                                ?>
                              </td>
                              <td>
                                <?php 
                                  $name=$value->nombre;
                                  echo "<input type='hidden' name='nombre' value='$name' class='input' readonly>";
                                  echo $name;        
                                ?>
                              </td>
                              <td>
                                <?php 
                                  $n_tipo=$value->n_tipo_usuario;
                                  echo "<input type='hidden' name='n_tipo' value='$n_tipo' class='input' readonly>";
                                  echo $n_tipo;
                                 ?>
                              </td>
                              <td>
                                <?php 
                                  $correo=$value->correo;
                                  echo "<input type='hidden' name='correo' value='$correo' class='input' readonly>";
                                  echo $correo;
                                ?>
                              </td>
                              <td>
                                <?php 
                                  $fecha=$value->fecha_alta;
                                  echo "<input type='hidden' name='fecha' value='$fecha' class='input' readonly>";
                                  echo $fecha;
                                ?>
                              </td>
                              <td>
                                <!--a href="<?php //echo base_url('index.php/admin_controller/detalle_cliente'); ?>" class="btn btn-info"> Detalles </a--> 
                                <button class="btn btn-info" type="submit" name="detalle" >Ver más</button>
                              </td>
                            </form> 
                          </tr>
                        <?php } ?>                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Recent Updates Widget End-->
            </div>            
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-6">
              <!-- Daily Feed Widget-->
              <div id="daily-feeds" class="card updates daily-feeds">
                <div id="feeds-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true" aria-controls="feeds-box">Inactivos </a></h2>
                  <div class="right-column">
                    <div class="badge badge-primary"></div><a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true" aria-controls="feeds-box"><i class="fa fa-angle-down"></i></a>
                  </div>
                </div>
                <div id="feeds-box" role="tabpanel" class="collapse ">
                  <div class="feed-box">
                  <div class="tablas" style="padding:15px">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Rol</th>
                          <th scope="col">Correo electrónico</th>
                          <th scope="col">Fecha de alta</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data2 as $key => $value) { ?>
                          <tr>  
                            <td>
                              <?php 
                              //echo $value->imagen; 
                              echo '<img class="imagen_receta recetas" src="../../img/perfiles/'.$value->imagen.'">';
                              ?>
                            </td>
                            <td>
                              <?php echo $value->nombre; ?>
                            </td>
                            <td>
                              <?php echo $value->n_tipo_usuario; ?>
                            </td>
                            <td>
                              <?php echo $value->correo; ?>
                            </td>
                            <td>
                              <?php echo $value->fecha_alta; ?>
                            </td>
                            <td>
                              <a href="<?php echo base_url('index.php/admin_controller/detalle_cliente'); ?>" class="btn btn-info"> Detalles </a> 
                            </td>
                          </tr>
                        <?php } ?>                        
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
              </div>
              <!-- Daily Feed Widget End-->
            </div>
          </div>
          <div class="row">            
            <div class="col-lg-12 col-md-6">
              <!-- Recent Activities Widget      -->
              <div id="recent-activities-wrapper" class="card updates activities">
                <div id="activites-header" class="card-header d-flex justify-content-between align-items-center">
                  <h2 class="h5 display"><a data-toggle="collapse" data-parent="#recent-activities-wrapper" href="#activities-box" aria-expanded="true" aria-controls="activities-box">No laborales</a></h2><a data-toggle="collapse" data-parent="#recent-activities-wrapper" href="#activities-box" aria-expanded="true" aria-controls="activities-box"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="activities-box" role="tabpanel" class="collapse">
                  <div class="tablas" style="padding:15px">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Rol</th>
                          <th scope="col">Correo electrónico</th>
                          <th scope="col">Fecha de alta</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data3 as $key => $value) { ?>
                          <tr>  
                            <td>
                              <?php 
                              //echo $value->imagen; 
                              echo '<img class="imagen_receta recetas" src="../../img/perfiles/'.$value->imagen.'">';
                              ?>
                            </td>
                            <td>
                              <?php echo $value->nombre; ?>
                            </td>
                            <td>
                              <?php echo $value->n_tipo_usuario; ?>
                            </td>
                            <td>
                              <?php echo $value->correo; ?>
                            </td>
                            <td>
                              <?php echo $value->fecha_alta; ?>
                            </td>
                            <td>
                              <a href="<?php echo base_url('index.php/admin_controller/detalle_cliente'); ?>" class="btn btn-info"> Detalles </a> 
                            </td>
                          </tr>
                        <?php } ?>                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     
