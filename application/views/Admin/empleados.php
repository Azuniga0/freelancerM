<?php   

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
            <a style="margin:5px;" class="btn btn-primary" href="<?php echo base_url('index.php/cm_controller/vista_nuevo_empleado');?>">Nueva campaña</a>
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
                          <th scope="col">Empleado</th>
                          <th scope="col">Correo electrónico</th>
                          <th scope="col">Teléfono</th>                          
                          <th scope="col">Rol</th>                          
                          <th scope="col">Fecha de alta</th>
                          <th scope="col">Estado</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                          <tr>  
                            <form action="editar_empleado" method="post">
                              <td>
                                <?php
                                
                                switch ($value->rol) {
                                  case '2':
                                    echo '<img class="imagen_receta recetas" src="../../img/perfiles/cm/'.$value->imagen.'">';
                                  break;
                                  case '3':
                                    echo '<img class="imagen_receta recetas" src="../../img/perfiles/designer/'.$value->imagen.'">';
                                  break;
                                  case '4':
                                    echo '<img class="imagen_receta recetas" src="../../img/perfiles/gc/'.$value->imagen.'">';
                                  break;                                  
                                  default:
                                    # code...
                                    break;
                                }
                                //echo $value->imagen;                                 
                                $id= $value->id_usuario;
                                  echo "<input type='hidden' name='id_usuario' value='$id'>";
                                ?>
                              </td>
                              <td>
                                <?php echo $value->nombre_empleado.' '.$value->apaterno_empleado; ?>
                              </td>
                              <td>
                                <?php echo $value->correo_empleado; ?>
                              </td>
                              <td>
                                <?php echo $value->telefono_empleado ?>
                              </td>
                              <td>
                                <?php echo $value->n_tipo_usuario ?>
                              </td>
                              <td>
                                <?php 
                                  $fecha=$value->fecha_creacion; 
                                  $myDateTime = DateTime::createFromFormat('Y-m-d', $fecha);
                                  $formato_fecha = $myDateTime->format('d-m-Y');
                                  echo $formato_fecha;
                                ?>
                              </td>
                              <td>
                                <?php echo $value->estado; ?>
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