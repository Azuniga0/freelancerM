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

        public function lista_nodos($id){
            $this->db->select('*');
            $this->db->from('campain');
            $this->db->join('nodos','nodos.id_red = campain.id_camp');
            $this->db->where('id_community',$id);
            $this->db->where('hoja', 1);
            $query = $this->db->get();
            return $query->result();
        }

        public function pedientes($id){
            $this->db->select('*');
            $this->db->from('campain');
            $this->db->join('nodos','nodos.id_red = campain.id_camp');
            $this->db->join('publicaciones','nodos.id_nodo = publicaciones.id_nodo');
            $this->db->where('id_community',$id);
            $this->db->where('id_estado', 2);
            $this->db->order_by('fecha_final','desc');
            $query = $this->db->get();
            return $query->result();
        }

        public function pedientes2($id){
            $this->db->select('*');
            $this->db->from('campain');
            $this->db->join('nodos','nodos.id_red = campain.id_camp');
            $this->db->join('publicaciones','nodos.id_nodo = publicaciones.id_nodo');
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

        public function crearPubli($publi){
            $this->db->insert('publicaciones',$publi);
        }

        public function asignarTarea($tarea){
            $this->db->insert('tareas',$tarea);
        }

        public function aprobar($id)
        {
            $this->db->where('id_publicaciones',$id);
            $this->db->set('id_estado', 3);
            $this->db->update('publicaciones');
        }

        public function getpubli($id)
        {
            $this->db->select('*');
            $this->db->from('publicaciones');
            $this->db->where('id_publicaciones',$id);
            $query = $this->db->get();
            return $query->row();
        }

        public function getAT($id)
        {
            $this->db->select('*, publicaciones.imagen as imagenp, publicaciones.nombre as nombrep, usuarios_nodo.id_usuario as usua');
            $this->db->from('publicaciones');
            $this->db->join('nodos','publicaciones.id_nodo = nodos.id_nodo');
            $this->db->join('usuarios_nodo','usuarios_nodo.id_nodo = nodos.id_nodo');
            $this->db->join('usuarios','usuarios_nodo.id_usuario = usuarios.id_usuario');
            $this->db->where('id_publicaciones',$id);
            $query = $this->db->get();
            return $query->row();
        }

        // usuarios con su rol
        public function getUR($id)
        {
            $this->db->select('usuarios_nodo.id_usuario, empleados.nombre_empleado, empleados.apaterno_empleado, empleados.amaterno_empleado, tipo_usuario.n_tipo_usuario');
            $this->db->from('publicaciones');
            $this->db->join('nodos','publicaciones.id_nodo = nodos.id_nodo');
            $this->db->join('usuarios_nodo','usuarios_nodo.id_nodo = nodos.id_nodo');
            $this->db->join('usuarios','usuarios_nodo.id_usuario = usuarios.id_usuario');
            $this->db->join('empleados','empleados.id_usuario_empleado = usuarios.id_usuario');
            $this->db->join('tipo_usuario','tipo_usuario.id_tipo_usuario = usuarios.rol');
            $this->db->where('id_publicaciones',$id);
            $query = $this->db->get();
            return $query->result();
        }

        // todos los nodos
        public function red_semantica($id_camp){
            $this->db->select('*');
            $this->db->from('nodos');
            $this->db->where('id_red',$id_camp);
            $query = $this->db->get();
            return $query->result();
        }

        // trae todas las hojas de la red
        public function nodos_red($id_camp){
            $this->db->select('*');
            $this->db->from('nodos');
            $where=("id_red = $id_camp AND hoja = 1");
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result();
        }

        // trae id del nodo padre
        public function nodo_padre($id_camp){
            $this->db->select('id_nodo');
            $this->db->from('nodos');
            $where=("id_red = $id_camp AND nodo_padre = 0");
            $this->db->where($where);
            $query = $this->db->get();
            return $query->row();
        }

        public function datos_campana($id_camp){
            $this->db->select('*');
            $this->db->from('campain');
            $this->db->where('id_camp', $id_camp);
            $query = $this->db->get();
            return $query->result();
        }

        public function insert_nodos($datos){
            $insert = $this->db->insert('nodos',$datos);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;    
            }
        }

    }
?>