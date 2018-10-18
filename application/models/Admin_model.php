<?php
    class Admin_model extends CI_model{

        public function nuevo_empleado($empleado,$usuario,$id){
            $this->db->insert('empleados',$empleados,$id);
            //$this->db->insert('usuarios',$usuarios);
        }

    }
?>