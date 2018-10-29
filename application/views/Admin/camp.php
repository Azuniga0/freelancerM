

<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <!-- Count item widget-->
      <div class=" col-md-9 col-8">
        <div class="wrapper count-title d-flex text-center">
          <div class="name"><strong class="text-uppercase">Campañas</strong>
          </div>
        </div>
      </div>
      <div class=" col-md-3 col-4">
    <div class="wrapper count-title d-flex text-center">
      <div class="name">
        <a style="margin:5px;" class="btn btn-primary" href="<?php echo base_url('index.php/admin_controller/vista_nueva_camp');?>">Nueva campaña</a>
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
                  <h2 class="h5 display"><a data-toggle="collapse" data-parent="#new-updates" href="#updates-box" aria-expanded="true" aria-controls="updates-box">Activas</a></h2><a data-toggle="collapse" data-parent="#new-updates" href="#updates-box" aria-expanded="true" aria-controls="updates-box"><i class="fa fa-angle-down"></i></a>
                </div>
                <div id="updates-box" role="tabpanel" class="collapse show">
                  <div class="" style="padding:15px">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">Número campaña</th>
                          <th scope="col">Imagen</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Empresa</th>
                          <th scope="col">Comunity Manager</th>
                          <th scope="col">Fecha de alta</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                          <tr>  
                            <td>
                              <?php echo $value->id_usuario; ?>
                            </td>
                            <td>
                              <?php 
                              //echo $value->imagen; 
                              echo '<img class="imagen_receta recetas" src="../../img/perfiles/'.$value->imagen_camp.'">';
                              ?>
                            </td>
                            <td>
                              <?php echo $value->nombre_camp; ?>
                            </td>
                            <td>
                              <?php echo $value->nombre_cliente; ?>
                            </td>
                            <td>
                              <?php echo $value->nombre; ?>
                            </td>
                            <td>
                              <?php echo $value->fecha_creacion; ?>
                            </td>
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
                  <h2 class="h5 display"><a data-toggle="collapse" data-parent="#daily-feeds" href="#feeds-box" aria-expanded="true" aria-controls="feeds-box">Inactivas </a></h2>
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
                          <th scope="col">Número campaña</th>
                          <th scope="col">Imagen</th>
                          <th scope="col">Nombre</th>
                          <th scope="col">Empresa</th>
                          <th scope="col">Comunity Manager</th>
                          <th scope="col">Fecha de alta</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data2 as $key => $value) { ?>
                          <tr>  
                            <td>
                              <?php echo $value->id_usuario; ?>
                            </td>
                            <td>
                              <?php 
                              //echo $value->imagen; 
                              echo '<img class="imagen_receta recetas" src="../../img/perfiles/'.$value->imagen.'">';
                              ?>
                            </td>
                            <td>
                              <?php echo $value->nombre_camp; ?>
                            </td>
                            <td>
                              <?php echo $value->nombre_cliente; ?>
                            </td>
                            <td>
                              <?php echo $value->nombre; ?>
                            </td>
                            <td>
                              <?php echo $value->fecha_alta; ?>
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
        </div>
      </section>
     
