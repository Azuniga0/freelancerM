<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <!-- Count item widget-->
      <div class=" col-md-9 col-8">
        <div class="wrapper count-title d-flex text-center">
          <div class="name"><strong class="text-uppercase">Pendientes</strong>
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
                    <!-- <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col"> Campaña</th>
                          <th scope="col">Nombre de publicación</th>
                          <th scope="col">tarea</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Ir a publicación</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Poyoyon</th>
                          <td>promoción del lunes</td>
                          <td>imagen del especial del lunes</td>
                          <td>10/12/2018</td>
                          <td><a class="btn btn-primary" href="<?php echo base_url('index.php/GC_controller/publication');?>">Ir</a>
                          </td>
                        </tr>
                        <tr>
                        <th scope="row">super all man</th>
                          <td>Oferta de fin de semana</td>
                          <td>Distintas ofertas del fin de semana</td>
                          <td>11/12/2018</td>
                          <td><a class="btn btn-primary" href="<?php  echo base_url('index.php/GC_controller/publication') ?>">Ir</a></td>
                        </tr>
                      </tbody>
                    </table> -->

                      <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col"> Titulo</th>
                          <th scope="col">tarea</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Ir a publicación</th>
                        </tr>
                      </thead>
                      <tbody>
                      <? foreach ($data1 as $row) { ?>                          
                        <tr>
                          <th scope="row"><?= $row->titulo ?></th>
                          <td><? $row->contenido ?></td>
                          <td><? $row->fecha_entrega ?></td>
                          <td><a class="btn btn-primary" href="<?php echo base_url('index.php/Designer_controller/publication');?>">Ir</a></td>
                        </tr>
                      <? } ?>                      
                      </tbody>
                    </table>
          </div>
        </div>
      </section>
     
