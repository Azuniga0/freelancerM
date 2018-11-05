<?php// print_r($data); ?>

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
                <div id="updates-box" role="tabpanel" class="collapse show">
                  <div class="" style="padding:15px">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">Empresa</th>
                          <th scope="col">Campaña</th>
                          <th scope="col">Community M.</th>                          
                          <th scope="col">Fecha de inicio</th>                          
                          <th scope="col">Fecha de término</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                          <tr>  
                            <form action="editar_camp" method="post">
                              <td>
                                <?php
                                  echo '<img class="imagen_receta recetas" src="../../img/perfiles/camp/'.$value->imagen_camp.'">';
                                //echo $value->imagen;                                 
                                $id= $value->id_camp;
                                  echo "<input type='hidden' name='id_usuario' value='$id'>";
                                ?>
                              </td>
                              <td>
                                <?php echo $value->razon_social ?>
                              </td>
                              <td>
                                <?php echo $value->nombre_camp ?>
                              </td>
                              <td>
                                <?php echo $value->nombre_empleado.' '.$value->apaterno_empleado ?>
                              </td>
                              <td>
                                <?php 
                                  $fecha=$value->fecha_inicio; 
                                  $myDateTime = DateTime::createFromFormat('Y-m-d', $fecha);
                                  $formato_fecha = $myDateTime->format('d-m-Y');
                                  echo $formato_fecha;
                                ?>
                              </td>
                              <td>
                                <?php 
                                  $fecha=$value->fecha_termino; 
                                  $myDateTime = DateTime::createFromFormat('Y-m-d', $fecha);
                                  $formato_fecha = $myDateTime->format('d-m-Y');
                                  echo $formato_fecha;
                                ?>
                              </td>
                              <td>
                                <!--button type="submit" name="ver" id="ver" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button-->
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
        </div>
      </section>