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
                          <th scope="col">Fecha de inicio</th>                          
                          <th scope="col">Fecha de término</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                          <tr>  
                            <form action="editar_camp" method="post">
                              <td>
                                <?php
                                  echo '<img class="imagen_receta recetas" src="'.base_url(). '/img/perfiles/camp/'.$value->imagen_camp.'">';
                                //echo $value->imagen;                                 
                                $id= $value->id_camp;
                                  echo "<input type='hidden' name='id_camp' value='$id'>";
                                ?>
                              </td>
                              <td>
                                <?php echo $value->razon_social ?>
                              </td>
                              <td>
                                <?php echo $value->nombre_camp ?>
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

                              <td>
                                <a  href="<?php echo base_url(); ?>index.php/cm_controller/vista_red/?id_camp=<?php echo $id; ?>" id="c-guardar"  class="btn btn-md" style="background-color:#272c33; color:white;   font-size: 15px;" >
                                                   Red semántica
                                </a>
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