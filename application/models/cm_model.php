<?php
    class cm_model extends CI_model{

        public function lista_camp($datos){
            $id=$_SESSION['id_usuario'];
            $this->db->select('*');
            $this->db->from('campain');
            $this->db->join('usuarios','usuarios.id_usuario = campain.id_community');
            $this->db->join('empresas','empresas.id_empresa = campain.id_empresa_camp');
            $this->db->join('empleados','empleados.id_usuario_empleado = campain.id_community');
            $this->db->where('id_community',$id);
            $this->db->order_by('fecha_creacion_camp','desc');
            $query = $this->db->get();
            return $query->result();
        }

        public function pedientes($id){
            $this->db->select('*');
            $this->db->from('campain');
            $this->db->join('detalle_cp','campain.id_camp = detalle_cp.id_camp');
            $this->db->join('publicaciones','detalle_cp.id_publicaciones = publicaciones.id_publicaciones');
            $this->db->where('id_community',$id);
            $this->db->where('id_estado', 2);
            $this->db->order_by('fecha_final','desc');
            $query = $this->db->get();
            return $query->result();
        }

        public function pedientes2($id){
            $this->db->select('*');
            $this->db->from('campain');
            $this->db->join('detalle_cp','detalle_cp.id_camp = campain.id_camp');
            $this->db->join('publicaciones','detalle_cp.id_publicaciones = publicaciones.id_publicaciones');
            $this->db->where('id_community',$id);
            $this->db->where('id_estado', 3);
            $this->db->order_by('fecha_final','desc');
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

        public function aprobar($id)
        {
            $this->db->where('id_publicaciones',$id);
            $this->db->set('id_estado', 3);
            $this->db->update('publicaciones');
        }

        public function getAT($id)
        {
            $this->db->select('*, publicaciones.imagen as imagenp');
            $this->db->from('publicaciones');
            $this->db->join('nodos','publicaciones.id_nodo = nodos.id_nodo');
            $this->db->join('usuarios_nodo','usuarios_nodo.id_nodo = nodos.id_nodo');
            $this->db->join('usuarios','usuarios_nodo.id_usuario = usuarios.id_usuario');
            $this->db->where('id_publicaciones',$id);
            $query = $this->db->get();
            return $query->row();
        }

    }
?>