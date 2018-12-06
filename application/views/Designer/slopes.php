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
<div><? $rol ?></div>
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
                          <th scope="col">Tarea</th>
                          <th scope="col">Descripción</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($data1 as $row) { ?>                          
                        <tr>
                          <th scope="row"><?= $row->titulo ?></th>
                          <td><?= $row->contenido ?></td>
                          <td><?= date('d/m/Y H:i:s', strtotime($row->fecha_entrega)); ?></td>
                          <td><a class="btn btn-info " margin-right="100 px";  href="<?php echo base_url('index.php/Designer_controller/publication/'.$row->id_publicaciones);?>">Ir a la publicación</a>
                          <a class="btn btn-primary" href="<?php echo base_url('index.php/Designer_controller/tareaRealizada/'.$row->id_tarea);?>">Tarea terminada</a></td>
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
                          <div class="name"><strong class="text-uppercase">Pendientes Terminados</strong>
                          </div>
                        </div>
                      </div>
                    </div>  
                  </section>
                <div class="table-wrapper-scroll-y">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th scope="col">Tarea</th>
                          <th scope="col">Descripción</th>
                          <th scope="col">Fecha</th>
                          <th scope="col">Ir a la publicación</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach ($data2 as $row) { ?>                          
                        <tr>
                          <th scope="row"><?= $row->titulo ?></th>
                          <td><?= $row->contenido ?></td>
                          <td><?= date('d/m/Y H:i:s', strtotime($row->fecha_entrega)); ?></td>
                          <td><a class="btn btn-primary" href="<?php echo base_url('index.php/Designer_controller/publication/'.$row->id_publicaciones);?>">Ir</a></td>
                        </tr>
                      <?php } ?>                      
                      </tbody>
                    </table> 
                 </div>
          </div>
        </div>
      </section>
     
