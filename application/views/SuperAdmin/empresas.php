<script type="text/javascript">
  function confirma(){
    if (confirm("¿Realmente desea eliminarlo?")){ 
      //alert("El usuario ha sido eliminado.") 
    }else { 
        return false
    }
  }

  // remueve los parametros enviados a través de la URL y deja solo la especificada
  if(typeof window.history.pushState == 'function') {
    window.history.pushState({}, "Hide", "<?php echo base_url(); ?>index.php/sadmin_controller/empresas");
  }

</script>

<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <!-- Count item widget-->
      <div class=" col-md-9 col-8">
        <div class="wrapper count-title d-flex text-center">
          <div class="name"><strong class="text-uppercase">Empresas</strong>
          </div>
        </div>
      </div>
      <div class=" col-md-3 col-4">
    <div class="wrapper count-title d-flex text-center">
      <div class="name">
        <a class="btn btn-primary" href="<?php echo base_url('index.php/sadmin_controller/vista_nueva_empresa');?>">Nueva empresa</a>
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
                          <th scope="col">Razón social</th>
                          <th scope="col">Administrador</th>
                          <th scope="col">Cliente</th>
                          <th scope="col">Correo del cliente</th>                          
                          <th scope="col">Responsable</th>                          
                          <th scope="col">Correo del responsable</th>
                          <th scope="col">Fecha de alta</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($data as $key => $value) { ?>
                          <tr>  
                            <form action="editar_empresa" method="post">
                              <td>
                                <?php
                                  echo '<img class="imagen_receta recetas" src="../../img/perfiles/empresas/'.$value->imagen_empresa.'">';
                                //echo $value->imagen;                                 
                                  $id= $value->id_empresa;
                                  echo "<input type='hidden' name='id_empresa' value='$id'>";
                                ?>
                              </td>
                              <td>
                                <?php echo $value->razon_social ?>
                              </td>
                              <td>
                                <?php echo $value->nombre_empleado.' '.$value->apaterno_empleado ?>
                              </td>
                              <td>
                                <?php echo $value->nombre_cliente.' '.$value->apaterno_cliente ?>
                              </td>
                              <td>
                                <?php echo $value->correo_cliente ?>
                              </td>
                              <td>
                                <?php echo $value->contacto ?>
                              </td>
                              <td>
                                <?php echo $value->correo_contacto ?>
                              </td>
                              <!--td>
                                <?php //echo $value->nombre_empleado.' '.$value->apaterno_empleado ?>
                              </td-->
                              <td>
                                <?php 
                                  $fecha=$value->fecha_alta; 
                                  $myDateTime = DateTime::createFromFormat('Y-m-d', $fecha);
                                  $formato_fecha = $myDateTime->format('d-m-Y');
                                  echo $formato_fecha;
                                ?>
                              </td>
                              <td>
                                <button type="submit" name="ver" id="ver" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                              </td>
                              <td>
                                <a style="color:#fff;" class="btn-danger btn" onclick="if(confirma() == false) return false" href="<?php echo site_url('index.php/sadmin_controller/eliminar_empresa/'.$id); ?>" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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