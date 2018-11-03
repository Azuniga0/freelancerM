<?php
    class Admin_model extends CI_model{

        // funcion para nuevo empleado
        public function nuevo_empleado($usuarios){
            $insert = $this->db->insert('usuarios',$usuarios);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;    
            }
        }

        // funcion para nueva empresa
        public function nueva_empresa($usuarios){
            $insert = $this->db->insert('usuarios',$usuarios);
            $this->db->insert('clientes',$usuario_c);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;    
            }
        }

        // funcion para nueva campaña
        public function nueva_camp($camp){
            $this->db->insert('campain',$camp);
        }

        // funcion para usuario activo
        public function get_data($datos){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $this->db->where('id_estado_us',1);
            $where = "rol != 1 AND rol != 6 AND rol !=5 AND id_estado_us = 1";
            $this->db->where($where);
            $this->db->order_by('fecha_alta','desc');
            $query = $this->db->get();
            return $query->result();
        }

        // funcion para usuario inactivo
         public function get_data2($datos2){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $this->db->where('id_estado_us',2);
            $where = "rol != 1 AND rol != 6 AND rol !=5 AND id_estado_us = 2";
            $this->db->where($where);
            $this->db->order_by('fecha_alta','desc');
            $query = $this->db->get();
            return $query->result();
        }

        // funcion para usuario despedido
         public function get_data3($datos3){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $this->db->where('id_estado_us',3);
            $where = "rol != 1 AND rol != 6 AND rol !=5 AND id_estado_us = 3";
            $this->db->where($where);
            $this->db->order_by('fecha_alta','desc');
            $query = $this->db->get();
            return $query->result();
        }

        //funcion para campaña activa
        public function get_act_camp($datos){
            $this->db->select('*');
            $this->db->from('campain');
            $this->db->join('usuarios','usuarios.id_usuario = campain.id_community');
            $this->db->join('clientes as c','c.id_usuario = campain.id_cliente');
            $this->db->where('id_estado_c',1);
            $this->db->order_by('id_camp','asc');
            $query = $this->db->get();
            return $query->result();
        }

        // funcion para campaña inactiva
        public function get_inact_camp($datos){
            $this->db->select('*');
            $this->db->from('campain');
            $this->db->join('usuarios','usuarios.id_usuario = campain.id_community');
            $this->db->join('clientes as c','c.id_usuario = campain.id_cliente');
            $this->db->where('id_estado_c',2);
            $this->db->order_by('id_camp','asc');
            $query = $this->db->get();
            return $query->result();
        }
        
        // funcion para traer cliente activa
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

        // funcion para traer cliente inactiva
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

        //funcion para traer datos de usuario
        public function get_usuario($datos){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $this->db->join('estado_rep','usuarios.estado_rep = estado_rep.id_estado_rep');
            $this->db->where('id_usuario',$datos);
            $query = $this->db->get();
            return $query->result();
        }
        
    }
?>