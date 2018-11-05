<?php
    class Designer_model extends CI_model{

        public function getPendientes($id)
        {
            $this->db->select('*');
            $this->db->from('tareas');
            $this->db->where('id_usuario',$id);
            $this->db->where('id_estado', 1);
            $this->db->order_by('fecha_entrega','asc');
            $query = $this->db->get();
            return $query->result();
        }
        
        public function getpublicacion($id)
        {
            $this->db->select('*');
            $this->db->from('publicaciones');
            $this->db->where('id_publicaciones',$id);
            $query = $this->db->get();
            return $query->row();
        }

        public function subirimgen($img, $id)
        {
            $this->db->where('id_publicaciones',$id);
            $this->db->set('imagen', $img);
            $this->db->set('id_estado', 2);
            $this->db->update('publicaciones');
        }
        
    }
?>