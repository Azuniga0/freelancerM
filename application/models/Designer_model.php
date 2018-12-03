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

        public function getPendientes2($id)
        {
            $this->db->select('*');
            $this->db->from('tareas');
            $this->db->where('id_usuario', $id);
            $this->db->where('id_estado', 2);
            $this->db->order_by('fecha_entrega','desc');
            $query = $this->db->get();
            return $query->result();
        }

        public function TR($id)
        {
            $this->db->where('id_tarea',$id);
            $this->db->set('id_estado', 2);
            $this->db->update('tareas');
        }
        
        public function getpublicacion($id)
        {
            $this->db->select('*');
            $this->db->from('publicaciones');
            $this->db->where('id_publicaciones',$id);
            $query = $this->db->get();
            return $query->row();
        }

        public function getcomentarios($id)
        {
            $this->db->select('*');
            $this->db->from('comentarios');
            $this->db->join('usuarios','usuarios.id_usuario = comentarios.id_usuario');
            $this->db->where('id_publicacion',$id);
            $this->db->order_by('fecha','desc');
            $query = $this->db->get();
            return $query->result();
        }
         public function comentar($comen){
            $this->db->insert('comentarios',$comen);
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