<section class="dashboard-counts section-padding">
  <div class="container-fluid">
    <div class="row">
      <!-- Count item widget-->
      <div class=" col-md-9 col-8">
        <div class="wrapper count-title d-flex text-center">
          <div class="name"><strong class="text-uppercase">Crear Publicación</strong></div>
        </div>
      </div>
  </div> 
</section>

<section class="mt-30px mb-30px">
    <div class="container-fluid">
        <div class="row">            
          <div class="div_centrado">
               <!-- Count item widget-->
                <div class=" col-12">
                    <div class="row">
                        <div class="wrapper count-title d-flex text-center">
                            <div class="name"><strong class="text-uppercase centrado">Crear publicación</strong><br><br>
                            </div>
                        </div> 
                    </div>
                    <div class="row"> 
                      <form class="col-12" action="<?php  echo base_url('index.php/cm_controller/crearPubli') ?>" method="post">
                      <div class="form-row">                                
                                <div class="form-group col-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="cm_id">Campapña:</span>
                                        </div>
                                        
                                        <select class="form-control" aria-describedby="campaña_id" name="id_camp" required>                                            
                                        <?php foreach ($camp as $row) { ?>                          
                                            <option value="<?= $row->id_camp ?>"> <?= $row->nombre_camp ?> </option>
                                          <?php } ?> 
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="cm_id">Nodo:</span>
                                        </div>
                                        
                                        <select class="form-control" aria-describedby="campaña_id" name="id_nodo" required>                                            
                                        <?php foreach ($nodos as $row) { ?>                          
                                            <option value="<?= $row->id_nodo ?>"> <?= $row->nombre ?> </option>
                                          <?php } ?> 
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >Titulo de la publicación</span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="" name="titulo">
                                    </div>
                                </div>                                  
                            </div>
                            <div class="form-row">                            
                             <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">Fecha de inicio:</span>
                                        </div>
                                        <input type="date" class="form-control" id="validationTooltipUsername" placeholder="" name="datein" aria-describedby="validationTooltipUsernamePrepend" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un usuario válido
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="validationTooltipUsernamePrepend">Fecha de final:</span>
                                        </div>
                                        <input type="date" class="form-control" id="validationTooltipUsername" placeholder="" name="datefin" aria-describedby="validationTooltipUsernamePrepend" required>
                                        <div class="invalid-tooltip">
                                            Por favor, inserte un usuario válido
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input class="btn btn-success" style=" margin-top: 15px; float:right;" type="submit" value="Crear" >
                      </form>
                    </div>
                </div>
          </div>
        </div>
    </div> 
</section>