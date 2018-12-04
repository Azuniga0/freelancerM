<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <!-- Count item widget-->
      <div class=" col-md-9 col-8">
        <div class="wrapper count-title d-flex text-center">
          <div class="name"><strong class="text-uppercase">Publicaciones pendientes</strong>
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
                <div class="table-wrapper-scroll-y">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Nombre campaña</th>
                          <th scope="col">Nombre Publicación</th>
                          <th scope="col">Fecha a publicar</th>
                          <th scope="col">Revisar</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($pendientes as $row) { ?>                          
                        <tr>
                          <th scope="row"><?= $row->nombre_camp ?></th>
                          <td><?= $row->nombre ?></td>
                          <td><?= date('d/m/Y H:i:s', strtotime($row->fecha_final)); ?></td>
                          <td><a class="btn btn-info " margin-right="100 px";  href="<?php echo base_url('index.php/cm_controller/publication/'.$row->id_publicaciones);?>">Ir a la publicación</a>
                          <a class="btn btn-info"  margin-right="100 px"; href="<?php echo base_url('index.php/cm_controller/tarea/'.$row->id_publicaciones);?>">Asignar tarea</a></td>
                        </tr>
                      <?php } ?>                      
                      </tbody>
                    </table> 
                 </div>
                <!-- pedientes realizados -->
                <section class="dashboard-counts section-padding">
                  <div class="container-fluid">
                    <div class="row">
                      <!-- Count item widget-->
                      <div class=" col-md-9 col-8">
                        <div class="wrapper count-title d-flex text-center">
                          <div class="name"><strong class="text-uppercase">Publicaciones aprobadas</strong>
                          </div>
                        </div>
                      </div>
                    </div>  
                  </section>
                <div class="table-wrapper-scroll-y">
                    <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                          <th scope="col">Nombre campaña</th>
                          <th scope="col">Nombre Publicación</th>
                          <th scope="col">Fecha a publicar</th>
                          <th scope="col">Revisar</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($pendientes2 as $row) { ?>                          
                        <tr>
                          <th scope="row"><?= $row->nombre_camp ?></th>
                          <td><?= $row->nombre ?></td>
                          <td><?= date('d/m/Y H:i:s', strtotime($row->fecha_final)); ?></td>
                          <td><a class="btn btn-info " margin-right="100 px";  href="<?php echo base_url('index.php/cm_controller/publication/'.$row->id_publicaciones);?>">Ir a la publicación</a></td>
                        </tr>
                      <?php } ?>                      
                      </tbody>
                    </table> 
                 </div>

          </div>
        </div>
      </section>
     
