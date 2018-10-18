<?php
    class Admin_model extends CI_model{

        public function nuevo_empleado($empleado){
            $this->db->insert('empleados',$empleado);
            //$this->db->insert('usuarios',$usuarios);
        }

        public function email_check($email){
            $this->db->select('*');
            $this->db->from('empleado');
            $this->db->where('correo',$email);
            $query=$this->db->get();


            if($query->num_rows()>0){
                return false;
            }else{
                return true;
            }
        }

    }
?>