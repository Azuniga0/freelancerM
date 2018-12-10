<?php  
 session_start();
 $connect = mysqli_connect("localhost", "root","","freelancer");
 $connect->set_charset("utf8"); 


 // insertar nodos
if(isset($_POST['padre'])) {  
     
     $query1 = "INSERT INTO usuarios_nodo (id_nodo, id_usuario, id_campana) VALUES ('$_POST[padre]', '$_POST[generador]', '$_POST[campana]')";
     $query2 = "INSERT INTO usuarios_nodo (id_nodo, id_usuario, id_campana) VALUES ('$_POST[padre]', '$_POST[designer]', '$_POST[campana]')";
           
         $result1 = mysqli_query($connect, $query1);
         $result = mysqli_query($connect, $query2);
          

          
     
     echo ("hola");

}else{
     
    echo "hola";
}

 ?>
 