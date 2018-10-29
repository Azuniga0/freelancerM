<?php
    class GC_model extends CI_model{

        public function getPendientes()
        {
            $this->db->select('*');
            $this->db->from('tareas');
            $this->db->where('id_usuario',3);;
            $query = $this->db->get();
            return $query->result();
        }

        
    }
?>