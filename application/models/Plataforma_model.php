<?php
    class Plataforma_model extends CI_model{

        //funcion para iniciar sesion
        public function login_user($username,$password){
            $this->db->select('id_usuario, username, password, rol, n_tipo_usuario, nombre, id_estado_us');
            $this->db->from('usuarios');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $this->db->where('username',$username);
            $this->db->where('password',$password);

            if($query=$this->db->get()){
                return $query->row_array();
            } else{
                return false;
            }
        }        

    }
?>