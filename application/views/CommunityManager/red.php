<script src="<?php echo base_url(); ?>js/vis.min.js"></script>

<?php

$db = mysqli_connect("localhost", "root","","freelancer");

foreach ($data_camp as $key => $value) {
    $camp = $value->id_camp;
}
$nd1 = array();
$nd2 = array();

$nodos =  mysqli_query($db, "SELECT id_nodo as `id` , nombre as `label`, color FROM nodos where id_red = $camp");

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
//print_r($nodos_red);
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
                                    <button class="btn-primary btn" style=" margin-top: 10px;" type="submit" id="guardar" name="register" value="">Guardar</button>
                                </div>
                                <div class="form-group col-2">
                                    <br>                                  
                                    <!--input  class="btn btn-primary "  name="guardar"  type="submit" value="Guardar" id="guardar"/-->
                                    <a class="btn-info btn" style="color:#fff; margin-top: 10px;" href="<?php echo base_url(); ?>index.php/cm_controller/asignacion_nodos/?id_camp=<?php echo $id_campana; ?>" id="" name="" >Asignar usuarios</a>       
                                </div>
                                <div class="form-group col-1">
                                    <br>                                  
                                    <!--input  class="btn btn-primary "  name="guardar"  type="submit" value="Guardar" id="guardar"/-->
                                    <input type='hidden' class='form-control nodo_eliminar' id='nodo_eliminar' name='nodo_eliminar' value=''>
                                    <!--a class="btn-danger btn trash" style="color:#fff; margin-top: 10px;" href="<?php echo base_url(); ?>index.php/cm_controller/eliminar_nodo/?id_nodo=<?php echo $id_campana; ?>/?id_camp=<?php echo $camp; ?>" id="trash" name="trash" >Eliminar</a-->   
                                    <!--button type="button" class="btn btn-danger delbtn" id="myBtn" onclick="delenquiry()">Delete this Enquiry</button--> 
                                    <button type="button" name="delete" style="color:#fff; margin-top: 10px;" class="btn btn-danger  delete" id="">Eliminar</button>   
                                </div>
                            </div>
                        <hr> 
                    </form>
                    
                    <!-- Inicia desplazador -->
                    <p class="float-right">
                    <!--a class="btn btn-warning" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Editar <i class="fa fa-chevron-down" aria-hidden="true"></i></a-->
                    <!--button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Eliminar <i class="fa fa-chevron-down" aria-hidden="true"></i></button-->
                    </p>
                    <div class="row">
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                            <form id="form-edit" method="post">                               
                                <div class="form-group col">
                                    <label  class=" form-control-label">Nodo:</label>
                                    <select id="editar_nodo" name="editar_nodo" class="form-control cc-name valid">
                                        <?php 
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
                                <div class="form-group col">   
                                    <label >Nuevo nombre:</label>
                                    <input type="text" class="form-control" id="nuevo_nombre" name ="nuevo_nombre" required>
                                </div>  
                                <div class="form-group col">     
                                    <br>                                  
                                    <!--input  class="btn btn-primary "  name="guardar"  type="submit" value="Guardar" id="guardar"/-->
                                    <button class="btn-warning btn" style=" margin-top: 15px;" type="submit" id="actualizar" name="actualizar" value="">Actualizar</button>
                                </div> 
                                <hr>
                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <div class="card card-body">
                            <form id="delete-form" method="post">                               
                                <div class="form-group col">
                                    <label  class=" form-control-label">Nodo:</label>
                                    <select name="padre_delete" id="padre_delete" class="form-control cc-name valid">
                                        <?php 
                                            foreach ($nodos_red as $key => $value) {           
                                        ?>
                                        <option value = "<?php echo($value->id_nodo)?>" >
                                            <?php echo($value->nombre) ?>
                                        </option>
                                        
                                    </select>
                                </div>  
                                <div class="form-group col">     
                                    <br>                                  
                                    <!--input  class="btn btn-primary "  name="guardar"  type="submit" value="Guardar" id="guardar"/-->
                                    <button class="btn-danger btn" style=" margin-top: 15px;" type="submit" id="<?php echo $value->id_nodo ?>" name="eliminar" value="">Eliminar <?php echo $value->id_nodo?></button>
                                    <?php
                                            }               
                                        ?>
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
                url: '<?php echo base_url(); ?>/red/i-red.php',
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
            height: '450px'
        };
        var network = new vis.Network(container, data, options);        
        
$(document).ready(function() {
          $('#insert_form').on("submit", function(event){  
          event.preventDefault();  
                if(estado==0){
                        $.ajax({  
                            url:"insert.php",  
                            method:"POST",  
                            data:$('#insert_form').serialize(),  
                            beforeSend:function(){  
                                $('#insert').val("Guardando");  
                            },  
                            success:function(data){  
                                
                                $('#insert_form')[0].reset();  
                                $('#add_data_Modal').modal('hide');
                                $("#campaña_table").html(data);  
                                $('#bootstrap-data-table').DataTable({ 
                                    "destroy": true, //use for reinitialize datatable
                                });                        
                            },error: function(xhr, textStatus, errorThrown){
                            alert('Ocurrió un error, intente más tarde');
                        } 
                    }); 
                }
            
      
      });
    });

    network.on('click', function (properties) {
         var nodeID = properties.nodes[0];
         if(nodeID){
            alert(nodeID);
            var clickedNode = this.body.nodes[nodeID];  //trae los nodos
            console.log('nodeID',clickedNode.options.id);//el nodo que seleccionaste
            document.getElementById("nodo_eliminar").value = nodeID;
            //var x = document.getElementById("myBtn").value = nodeID;
            
         }
    }); 

    $(document).on('click', '.delete', function(){
        //var id_nodo_delete = nodeID; //var id_nodo_delete = $(this).attr("id");    $('#image_id').val($(this).attr("id"));
        var nodo_example = document.getElementById("nodo_eliminar").value;
        var id_nodo_delete = nodo_example;
        alert (id_nodo_delete);
        var action = "delete";
        if(confirm("Are you sure you want to remove this node from database?")){
            $.ajax({
                url:"<?php echo base_url(); ?>/red/delete.php",
                method:"POST",
                data:{id_nodo_delete:id_nodo_delete, action:action},
                success:function(data){
                    //alert(data);
                    if (data == "refresh"){
                        window.location.reload(); // This is not jQuery but simple plain ol' JS
                    }
                    //fetch_data();
                }
            })
        }else{
            return false;
        }
    });
    
</script>