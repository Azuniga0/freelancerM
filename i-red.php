<?php  
 session_start();
 $connect = mysqli_connect("localhost", "root","","freelancer");
 $connect->set_charset("utf8"); 

 $output = '';  
 $message = '';
 if(isset($_POST['padre']))  
 {  
     
      $query = "INSERT INTO `nodos`(`id_red`, `nombre`, `nodo_padre`) VALUES ('$_POST[campana]', '$_POST[hijo]', '$_POST[padre]');";  
       
        
      if ($connect->query($query) === TRUE) {
        $results1 = mysqli_query($connect, "SELECT * FROM nodos where id_red = $_POST[campana]");

        $output .= '  
            <select name="padre" id="padre" class="form-control cc-name valid">';  
            while($row = mysqli_fetch_array($results1)) {  
             $output .='   
             <option value ="'.$row["id_nodo"].'">
                '.$row["nombre"].' </option>
                ';
                }
                $output .=' 
                </select>
                ';  
        }else {
             echo json_encode("Ocurrio un error, intente mas tarde");  
       }
       echo ($output);

}else{

    $query = "INSERT INTO `nodos`(`id_red`, `nombre`, `nodo_padre`) VALUES ('$_POST[campana]', '$_POST[hijo]', '0');";  
       
        
    if ($connect->query($query) === TRUE) {
      $results1 = mysqli_query($connect, "SELECT * FROM nodos where id_red = $_POST[campana]");

      $output .= '  
          <select name="padre" id="padre" class="form-control cc-name valid">';  
          while($row = mysqli_fetch_array($results1)) {  
           $output .='   
           <option value ="'.$row["id_nodo"].'">
              '.$row["nombre"].' </option>
              ';
              }
              $output .=' 
              </select>
              ';  
      }else {
           echo json_encode("Ocurrio un error, intente mas tarde");  
     }
     echo ($output);

}
       

   

 ?>
 
