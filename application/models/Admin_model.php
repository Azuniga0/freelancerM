<?php
    class Admin_model extends CI_model{

        public function nuevo_empleado($empleado){
            $this->db->insert('empleados',$empleado);
            //$this->db->insert('usuarios',$usuarios);
        }
        
    }
?>