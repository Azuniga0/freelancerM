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
                      <?php foreach ($data1 as $row) { ?>                          
                        <tr>
                          <th scope="row"><?= $row->titulo ?></th>
                          <td><?= $row->contenido ?></td>
                          <td><?= $row->fecha_entrega ?></td>
                          <td><a class="btn btn-primary" href="<?php echo base_url('index.php/Designer_controller/publication/'.$row->id_publicaciones);?>">Ir</a></td>
                        </tr>
                      <?php } ?>                      
                      </tbody>
                    </table>  
          </div>
        </div>
      </section>
     
