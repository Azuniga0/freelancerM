<?php
    class Plataforma_model extends CI_model{

        //funcion para iniciar sesion
        public function login_user($username,$password){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $this->db->join('empleados','usuarios.id_usuario = empleados.id_usuario_empleado');
            $this->db->where('username',$username);
            $this->db->where('password',$password);

            if($query=$this->db->get()){
                return $query->row_array();
            } else{
                return false;
            }
        } 

        // selecciona los ultimos usuarios en los ultimos 30 dias
        public function ultimos_usuarios(){
            //SELECT * FROM usuarios WHERE fecha_creacion BETWEEN DATE_SUB(NOW(), INTERVAL 390 DAY) AND NOW();
            $this->db->select('*');
            $this->db->from('usuarios');
            $where = "fecha_creacion BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()";
            $this->db->where($where);
            $this->db->order_by('fecha_creacion','desc');
            $query = $this->db->get();
            return $query->result();
        }        

    }
?>