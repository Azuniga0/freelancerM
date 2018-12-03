<?php  
 session_start();
 $connect = mysqli_connect("localhost", "root","","freelancer");
 $connect->set_charset("utf8"); 

 $output = '';  
 $message = '';

 // insertar nodos
if(isset($_POST['padre'])) {  
     
     $query = "INSERT INTO `nodos`(`id_red`, `nombre`, `nodo_padre`, `hoja`, color) VALUES ('$_POST[campana]', '$_POST[hijo]', '$_POST[padre]', '1', '#bada55');";
     $query2 = "UPDATE nodos set hoja = 0, color = '#ffdab9' where id_nodo = $_POST[padre]";  

         
     if ($connect->query($query) === TRUE) {
          $result = mysqli_query($connect,$query2);

          /*if($padre!=0){
               //medio
               $query3 = "UPDATE nodos set color = '#ffdab9' where id_nodo = $_POST[padre]";
               $result2= mysqli_query($connect, $query3); 
          }*/

          $results1 = mysqli_query($connect, "SELECT * FROM nodos where id_red = $_POST[campana]");

          $output .= ' <select name="padre" id="padre" class="form-control cc-name valid">';  
          while($row = mysqli_fetch_array($results1)) {  
               $output .=' <option value ="'.$row["id_nodo"].'">'.$row["nombre"].' </option>';
          }
          $output .=' </select>';  
     }else {
          echo json_encode("Ocurrio un error, intente mas tarde");  
     }
     echo ($output);

}else{

     $query = "INSERT INTO `nodos`(`id_red`, `nombre`, `nodo_padre`,`hoja`, color) VALUES ('$_POST[campana]', '$_POST[hijo]', '0', '1','#34a99a');";  
       
        
     if ($connect->query($query) === TRUE) {
          $results1 = mysqli_query($connect, "SELECT * FROM nodos where id_red = $_POST[campana]");

          $output .= ' <select name="padre" id="padre" class="form-control cc-name valid">';  
          while($row = mysqli_fetch_array($results1)) {  
               $output .=' <option value ="'.$row["id_nodo"].'"> '.$row["nombre"].' </option> ';
          }
          $output .=' </select> ';  
     }else {
           echo json_encode("Ocurrio un error, intente mas tarde");  
     }
     echo ($output);

}

 ?>
 
