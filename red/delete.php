<?php
    $connect = mysqli_connect("localhost", "root","","freelancer");
    $connect->set_charset("utf8"); 


    if($_POST["action"] == "delete"){
        $query = "DELETE FROM nodos WHERE id_nodo= '".$_POST["id_nodo_delete"]."'";    
        if(mysqli_query($connect, $query)){
            //echo 'Node Deleted from Database';
            echo 'refresh';
        }
    }
?>