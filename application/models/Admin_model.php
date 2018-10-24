<?php
    class Admin_model extends CI_model{

        public function nuevo_empleado($usuarios){
            $this->db->insert('usuarios',$usuarios);
            //$this->db->insert('usuarios',$usuarios);
        }

        public function nueva_empresa($usuarios){
            $this->db->insert('usuarios',$usuarios);
            //$this->db->insert('usuarios',$usuarios);
        }

        public function nueva_camp($camp){
            $this->db->insert('campain',$camp);
        }

        public function empleado_activo(){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('id_estado_us',1);
            $query = $this->db->get();
            return $query->result();
        }

        public function empleado_inactivo(){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('id_estado_us',2);
            $query = $this->db->get();
            return $query->result();
        }

        public function empleado_despedido(){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('id_estado_us',3);
            $query = $this->db->get();
            return $query->result();
        }
        
    }
?>