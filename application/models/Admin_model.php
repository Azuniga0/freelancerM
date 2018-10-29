<?php
    class Admin_model extends CI_model{

        public function nuevo_empleado($usuarios){
            $insert = $this->db->insert('usuarios',$usuarios);
            //$this->db->insert('usuarios',$usuarios);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;    
            }
        }

        public function nueva_empresa($usuarios){
            $this->db->insert('usuarios',$usuarios);
            //$this->db->insert('usuarios',$usuarios);
        }

        public function nueva_camp($camp){
            $this->db->insert('campain',$camp);
        }

        public function get_data($datos){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $this->db->where('id_estado_us',1);
            $where = "rol != 1 AND rol != 6 AND rol !=5 AND id_estado_us = 1";
            $this->db->where($where);
            $this->db->order_by('id_usuario','asc');
            $query = $this->db->get();
            return $query->result();
        }

         public function get_data2($datos2){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $this->db->where('id_estado_us',2);
            $where = "rol != 1 AND rol != 6 AND rol !=5 AND id_estado_us = 2";
            $this->db->where($where);
            $this->db->order_by('id_usuario','asc');
            $query = $this->db->get();
            return $query->result();
        }

         public function get_data3($datos3){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $this->db->where('id_estado_us',3);
            $where = "rol != 1 AND rol != 6 AND rol !=5 AND id_estado_us = 3";
            $this->db->where($where);
            $this->db->order_by('id_usuario','asc');
            $query = $this->db->get();
            return $query->result();
        }
        
    }
?>