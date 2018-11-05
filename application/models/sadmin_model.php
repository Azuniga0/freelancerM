<?php
    class sadmin_model extends CI_model{

        public function nuevo_usuario($usuarios){
            $insert = $this->db->insert('usuarios',$usuarios);
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

        /*public function get_data($datos){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $this->db->where('id_estado_us',1);
            $where = "rol = 1 OR rol = 6 AND id_estado_us = 1";
            $this->db->where($where);
            $this->db->order_by('id_usuario','asc');
            $query = $this->db->get();
            return $query->result();
        }*/

        public function get_data($datos){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('empleados','usuarios.id_usuario = empleados.id_usuario_empleado');
            //$this->db->join('empresas','empleados.id_usuario_empleado = empresas.administrador');
            $this->db->join('estado_usuario','usuarios.id_estado_us = estado_usuario.id_estado');
            $where = "rol = 1";
            $this->db->where($where);
            $this->db->order_by('usuarios.fecha_creacion','desc');
            $query = $this->db->get();
            return $query->result();
        }

        public function busca_datos_admin($admin){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('empleados','usuarios.id_usuario = empleados.id_usuario_empleado');
            $this->db->join('estado_usuario','usuarios.id_estado_us = estado_usuario.id_estado');
            $this->db->where('id_usuario',$admin);
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