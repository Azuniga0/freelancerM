<?php
    class Plataforma_model extends CI_model{

        //funcion para iniciar sesion
        public function login_user($username,$password){
            $this->db->select('*');
            $this->db->from('usuarios');
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