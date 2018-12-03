<script src="<?php echo base_url(); ?>js/vis.min.js"></script>
<style>
.vertical-line{   
    border:         none;
    border-left:    1px solid hsla(200, 10%, 50%,100);
    height:         10vh;
    width:          1px;       
}
</style>
<?php
// obtiene el numero de campaña que se esta consultando
//$id_campana = $_GET['id_c']; 
/*$results1 = mysqli_query($db, "SELECT * FROM red_semantica where id_campana = $id_campana");
$results2 = mysqli_query($db, "SELECT nombre FROM tbl_campana where id_campaña = $id_campana");
$rows2 = mysqli_fetch_array($results2);

$result1 =  mysqli_query($db, "SELECT id, label FROM red_semantica where id_campana = $id_campana");
$nd1 = array();
   while($row1 = mysqli_fetch_assoc($result1))
    {
        $nd1[] = $row1;
    }

    //print_r($nd1);

$result2 =  mysqli_query($db, "SELECT `from`, id as `to` FROM red_semantica where id_campana = $id_campana");
$nd2 = array();
while($row2 = mysqli_fetch_assoc($result2))
{
    $nd2[] = $row2;
}
$nodo= mysqli_query($db, "SELECT * FROM  red_semantica  where f_empresa = $id_campana and estatus=0");
*/
$db = mysqli_connect("localhost", "root","","freelancer");

foreach ($data_camp as $key => $value) {
    $camp = $value->id_camp;
}
$nd1 = array();
$nd2 = array();

$nodos =  mysqli_query($db, "SELECT id_nodo as `id` , nombre as `label` FROM nodos where id_red = $camp");

while($row = mysqli_fetch_assoc($nodos)){
    $nd1[] = $row;
}

$aristas =  mysqli_query($db, "SELECT nodo_padre as `from`, id_nodo as `to` FROM nodos where id_red = $camp");

while($row2 = mysqli_fetch_assoc($aristas)){
    $nd2[] = $row2;
}
//print_r($nd1);
//print_r($rsemantica);
//echo "<br><br>";
//print_r($data_camp);
//print_r($nd2);
$padre_n = $nodo_padre->id_nodo;
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
                            Red semántica de la campaña 
                            <b><i><?php echo $value->nombre_camp; ?></i></b>
                        </h3> 
                        <hr> 
                    </div>
                    <form id="form-red" method="POST"  accept-charset="UTF-8" >
                            <div class="row">
                                    <input type="hidden" value="<?php echo $value->id_camp ?>" class="form-control" id="campana" name="campana"  >
                                <?php 
                                    $id_campana = $value->id_camp;
                                    } 
                                ?> 
                                <div class="form-group col-4">
                                    <label  class=" form-control-label">Nodo padre</label>
                                    <select name="padre" id="padre" class="form-control cc-name valid">
                                        <?php 
                                            //while ($row1 = mysqli_fetch_array($results1)) {
                                            foreach ($rsemantica as $key => $value) {           
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
                                    <label >Nodo hijo</label>
                                    <input type="text" class="form-control" name="hijo" id=hijo required>
                                </div>  
                                <div class="form-group col-1">     
                                    <br>                                  
                                    <!--input  class="btn btn-primary "  name="guardar"  type="submit" value="Guardar" id="guardar"/-->
                                    <button class="btn-primary btn" style=" margin-top: 15px;" type="submit" id="guardar" name="register" value="">Guardar</button>
                                </div>
                            </div>
                        <hr> 
                    </form>
                    
                    <!-- Inicia desplazador -->
                    <p class="float-right">
                    <a class="btn btn-warning" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Editar</a>
                    <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Eliminar</button>
                    </p>
                    <div class="row">
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                            <form action="eliminar_nodo" method="post">                               
                                <div class="form-group col">
                                    <label  class=" form-control-label">Nodo:</label>
                                    <select id="" name="" class="form-control cc-name valid">
                                        <?php 
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
                                <div class="form-group col">   
                                    <label >Nuevo nombre:</label>
                                    <input type="text" class="form-control"  required>
                                </div>  
                                <div class="form-group col">     
                                    <br>                                  
                                    <!--input  class="btn btn-primary "  name="guardar"  type="submit" value="Guardar" id="guardar"/-->
                                    <button class="btn-warning btn" style=" margin-top: 15px;" type="submit" id="guardar" name="register" value="">Actualizar</button>
                                </div> 
                                <hr>
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <div class="card card-body">
                            <form action="eliminar_nodo" method="post">                               
                                <div class="form-group col">
                                    <label  class=" form-control-label">Nodo:</label>
                                    <select name="" id="" class="form-control cc-name valid">
                                        <?php 
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
                                <div class="form-group col">     
                                    <br>                                  
                                    <!--input  class="btn btn-primary "  name="guardar"  type="submit" value="Guardar" id="guardar"/-->
                                    <button class="btn-danger btn" style=" margin-top: 15px;" type="submit" id="eliminar" name="eliminar" value="">Eliminar</button>
                                </div> 
                                <hr>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
                    <!-- termina desplazador -->
                    <div id="mynetwork"></div>
                  </div>
                </div>
              </div>
              <!-- Recent Updates Widget End-->
            </div>            
          </div>
        </div>
      </section>


    
   

<script type="text/javascript">
    
//modal script end
       var nodes= <?php echo json_encode($nd1); ?>;
       var edges= <?php echo json_encode($nd2); ?>;

       //agregar nodo
        $(function () {

            $('form').on('submit', function (e) {

            e.preventDefault();
                //alert ($('form').serialize());
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>/i-red.php',
                data: $('form').serialize(),
                success: function (data) {
                    //somedata = data;
                    //alert("Guardado" );
                   $('#form-red')[0].reset();  
                    $("#padre").html(data);
                    location.reload();
                }, error: function(xhr, status, error) {
                    alert("Error los datos no fueron guardados"); 
                },
                
            });

            });

        });

        //eliminar nodo
        $(function () {

            $('form').on('submit', function (e) {

            e.preventDefault();
                //alert ($('form').serialize());
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>/i-red.php',
                data: $('form').serialize(),
                success: function (data) {
                    //somedata = data;
                    //alert("Guardado" );
                   $('#form-red')[0].reset();  
                    $("#padre").html(data);
                    location.reload();
                }, error: function(xhr, status, error) {
                    alert("Error los datos no fueron guardados"); 
                },
                
            });

            });

        });

        //actualizar nodo
        $(function () {

            $('form').on('submit', function (e) {

            e.preventDefault();
                //alert ($('form').serialize());
            $.ajax({
                type: 'post',
                url: '<?php echo base_url(); ?>/i-red.php',
                data: $('form').serialize(),
                success: function (data) {
                    //somedata = data;
                    //alert("Guardado" );
                   $('#form-red')[0].reset();  
                    $("#padre").html(data);
                    location.reload();
                }, error: function(xhr, status, error) {
                    alert("Error los datos no fueron guardados"); 
                },
                
            });

            });

        });
     
        var container = document.getElementById('mynetwork');
                
        var data = {
            nodes: nodes,
            edges: edges
        };
        var options = {
            autoResize: true,
            height: '450px',
            dataManipulation: true,
            interaction: {
                hover: true
            },
            nodes: {
                color: {
                border: 'black',
                background: '#81F7F3'
            },
                borderWidth: 2                
            }
        };
        var network = new vis.Network(container, data, options);        
        
</script>
