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
            $insert = $this->db->insert('usuarios',$usuarios);
            $this->db->insert('clientes',$usuarios);
            //$this->db->insert('usuarios',$usuarios);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;    
            }
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

        public function get_act_camp($datos){
            $this->db->select('*');
            $this->db->from('campain');
            $this->db->join('usuarios','usuarios.id_usuario = campain.id_cliente');
            $this->db->where('id_estado_c',1);
            $this->db->order_by('id_camp','asc');
            $query = $this->db->get();
            return $query->result();
        }

        public function get_inact_camp($datos){
            $this->db->select('*');
            $this->db->from('campain');
            $this->db->join('usuarios','usuarios.id_usuario = campain.id_cliente');
            $this->db->where('id_estado_c',2);
            $this->db->order_by('id_camp','asc');
            $query = $this->db->get();
            return $query->result();
        }
        
         public function c_act($datos){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $this->db->where('id_estado_us',1);
            $where = "rol = 5 AND id_estado_us = 1";
            $this->db->where($where);
            $this->db->order_by('id_usuario','asc');
            $query = $this->db->get();
            return $query->result();
        }

         public function c_inac($datos){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $this->db->where('id_estado_us',2);
            $where = "rol = 5 AND id_estado_us = 2";
            $this->db->where($where);
            $this->db->order_by('id_usuario','asc');
            $query = $this->db->get();
            return $query->result();
        }
        
    }
?>