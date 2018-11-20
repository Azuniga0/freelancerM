<?php
    class Admin_model extends CI_model{

        // funcion para nuevo empleado
        public function nuevo_usuario($usuarios){
            $insert = $this->db->insert('usuarios',$usuarios);
            //$this->db->insert('usuarios',$usuarios);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;    
            }
        }

        public function nuevo_cliente($clientes){
           $insert = $this->db->insert('clientes',$clientes);
            //$this->db->insert('usuarios',$usuarios);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;    
            } 
        }

        public function nuevo_empleado($usuarios){
            $insert = $this->db->insert('empleados',$usuarios);
            //$this->db->insert('usuarios',$usuarios);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;    
            }
        }

        // funcion para nueva campaña
        public function nueva_camp($camp){
             $insert = $this->db->insert('campain',$camp);
             if($insert){
                return $this->db->insert_id();
            }else{
                return false;    
            }
        }

        // funcion para usuario activo
        public function get_data($datos){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('empleados','usuarios.id_usuario = empleados.id_usuario_empleado');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $this->db->join('estado_usuario','usuarios.id_estado_us = estado_usuario.id_estado');
            $where = "rol != 1 AND rol !=6";
            $this->db->where($where);
            $this->db->order_by('usuarios.fecha_creacion','desc');
            $query = $this->db->get();
            return $query->result();
        }

        //funcion para campaña activa
        public function lista_camp($datos){
            $this->db->select('*');
            $this->db->from('campain');
            $this->db->join('usuarios','usuarios.id_usuario = campain.id_community');
            $this->db->join('empresas','empresas.id_empresa = campain.id_empresa_camp');
            $this->db->join('empleados','empleados.id_usuario_empleado = campain.id_community');
            $this->db->order_by('fecha_creacion_camp','desc');
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

        public function busca_datos_empleado($emp){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('empleados','usuarios.id_usuario = empleados.id_usuario_empleado');
            $this->db->join('estado_usuario','usuarios.id_estado_us = estado_usuario.id_estado');
            $this->db->where('id_usuario',$emp);
            $query = $this->db->get();
            return $query->result();
        }

        public function actualizar_user($id, $user){
            $this->db->where('id_usuario',$id);
            $this->db->update('usuarios',$user);
        }

        public function actualizar_emp($id, $emp){
            $this->db->where('id_usuario_empleado',$id);
            $this->db->update('empleados',$emp);
        }         
        
    }
?>