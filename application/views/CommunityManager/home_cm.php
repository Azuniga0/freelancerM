
<?php 
$id = $_SESSION['id_usuario'];
$db = mysqli_connect("localhost", "root","","freelancer");
$last_users= "SELECT * FROM campain as c join nodos as n on c.id_camp = n.id_nodo join publicaciones as p on p.id_nodo = n.id_nodo WHERE id_community = $id AND id_estado = 2;";
if($result = mysqli_query($db,$last_users)){
  $rowcount=mysqli_num_rows($result);
  //printf("Result set has %d rows.\n",$rowcount);
  // Free result set
  mysqli_free_result($result);
}

$last_susers= "SELECT * FROM campain WHERE id_community = $id;";
if($result2 = mysqli_query($db,$last_susers)){
  $sucount=mysqli_num_rows($result2);
  //printf("Result set has %d rows.\n",$rowcount);
  // Free result set
  mysqli_free_result($result2);
}
?>
<section class="dashboard-counts section-padding">
        <div class="">
          <h1 style="margin: 25px;" class="display h1">campañas administrando:</h1>
        </div>
        <div class="container-fluid">
          <div class="row">
            <!-- Count item widget-->
            <div class="col-xl-4 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="fa fa-archive" aria-hidden="true"></i></div>
                <div class="name"><strong class="text-uppercase">Número</strong>
                  <div class="count-number"><?php echo $sucount; ?></div>
                </div>
              </div>
            </div>
</section>
<section class="dashboard-counts section-padding" >
        <div class="">
          <h1 style="margin: 25px;" class="display h1">Pendientes:</h1>
        </div>
        <div class="container-fluid">
          <div class="row">
            <!-- Count item widget-->
            <div class="col-xl-4 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="fa fa-check-square-o" aria-hidden="true"></i></div>
                <div class="name"><strong class="text-uppercase">Número</strong>
                  <div class="count-number"><?php echo $rowcount; ?></div>
                </div>
              </div>
            </div>
            </section>