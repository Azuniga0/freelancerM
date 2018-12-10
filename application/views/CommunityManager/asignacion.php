
<?php

$db = mysqli_connect("localhost", "root","","freelancer");

foreach ($data_camp as $key => $value) {
    $camp = $value->id_camp;
}
$generadores = array();
$designers = array();

$empresa = mysqli_query($db,"SELECT id_empresa_laboral from empleados where id_usuario_empleado = $_SESSION[id_usuario]");

while ($row = $empresa->fetch_assoc()) {
     $trabaja_en = $row['id_empresa_laboral'];
}
$query = "SELECT * from usuarios join empleados on usuarios.id_usuario = empleados.id_empleado where id_estado_us = 1 and id_empresa_laboral = $trabaja_en and rol = 4";
$generadores = mysqli_query($db,$query) or die("no se encontraron datos");

$consulta = "SELECT * from usuarios join empleados on usuarios.id_usuario = empleados.id_empleado where id_estado_us = 1 and id_empresa_laboral = $trabaja_en and rol = 3";
$designers = mysqli_query($db,$consulta) or die("no se encontraron datos");
//select * from usuarios join empleados on usuarios.id_usuario = empleados.id_usuario_empleado where creador = 2 and id_estado_us = 1 and id_empresa_laboral = 0

mysqli_set_charset($db,"utf8");


?>

<section class="mt-30px mb-30px">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <!-- Recent Updates Widget          -->              
              <div id="new-updates" class="card updates recent-updated">
                <div id="updates-box" role="tabpanel" class="collapse show">                
                  <div class="" style="padding:15px">
                  <?php foreach ($data_camp as $key => $value) {  ?>   
                    <div class="card-title"> 
                        <h3 class="text-center">
                        <a class="btn-info btn" style="float: left; color:#fff;" href="<?php echo base_url(); ?>index.php/cm_controller/vista_red/?id_camp=<?php echo $camp; ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>   Regresar</a>
                            Red semántica de la campaña 
                            <b><i><?php echo $value->nombre_camp; ?></i></b>
                        </h3> 
                        <hr> 
                    </div>
                    <form id="form-nodos" method="POST"  accept-charset="UTF-8" >
                            <div class="row">
                                    <input type="hidden" value="<?php echo $value->id_camp ?>" class="form-control" id="campana" name="campana"  >
                                <?php 
                                    $id_campana = $value->id_camp;
                                    } 
                                ?> 
                                <div class="form-group col-3">
                                    <label  class=" form-control-label">Temática:</label>
                                    <select name="padre" id="padre" class="form-control cc-name valid">
                                        <?php 
                                            //while ($row1 = mysqli_fetch_array($results1)) {
                                            foreach ($nodos_red as $key => $value) {           
                                        ?>
                                        <option value = "<?php echo($value->id_nodo)?>" >
                                            <?php echo($value->nombre) ?>
                                        </option>
                                        <?php
                                            }               
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-4">   
                                    <label >Generadores de contenido:</label>
                                    <select name="generador" id="generador" class="form-control cc-name valid">
                                        <?php 
                                            while ($row = mysqli_fetch_array($generadores)){ 
                                        ?>
                                        <option value = "<?php echo $row['id_usuario']?>" >
                                            <?php echo $row['nombre_empleado'].' '.$row['apaterno_empleado'].' '.$row['amaterno_empleado']?>
                                        </option>
                                        <?php
                                            }               
                                        ?>
                                    </select>
                                </div>                                  
                                <div class="form-group col-4">   
                                    <label >Diseñadores:</label>
                                    <select name="designer" id="designer" class="form-control cc-name valid">
                                        <?php 
                                            while ($row = mysqli_fetch_array($designers)){ 
                                        ?>
                                        <option value = "<?php echo $row['id_usuario']?>" >
                                            <?php echo $row['nombre_empleado'].' '.$row['apaterno_empleado'].' '.$row['amaterno_empleado']?>
                                        </option>
                                        <?php
                                            }               
                                        ?>
                                    </select>
                                </div>                                  
                                <div class="form-group col-1">     
                                    <br>                                  
                                    <!--input  class="btn btn-primary "  name="guardar"  type="submit" value="Guardar" id="guardar"/-->
                                    <button class="btn-primary btn" style=" margin-top: 15px;" type="submit" id="guardar" name="register" value="">Guardar</button>
                                </div>
                            </div>
                        <hr> 
                    </form>
                  </div>
                </div>
              </div>
              <!-- Recent Updates Widget End-->
            </div>            
          </div>
        </div>
      </section>

<script>
    $(function () {

            $('form').on('submit', function (e) {

            e.preventDefault();
                //alert ($('form').serialize());
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>/red/check.php',
                data: $('form').serialize(),
                success: function (data) {
                    //somedata = data;
                    //alert("Guardado" );
                   
                   $('#form-nodos')[0].reset();  
                    $("#padre").html(data);
                    location.reload();
                }, error: function(xhr, status, error) {
                    alert("Error los datos no fueron guardados"); 
                },
                
            });

            });

        });
</script>