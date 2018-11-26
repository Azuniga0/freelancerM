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
        
        // funcion para nueva empresa
        public function nueva_empresa($usuarios){
            $insert = $this->db->insert('empresas',$usuarios);
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

        public function nuevo_cliente($clientes){
           $insert = $this->db->insert('clientes',$clientes);
            //$this->db->insert('usuarios',$usuarios);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;    
            } 
        }

        
        //obtiene los datos de los administradores
        public function get_data($datos){
            $id=$_SESSION['id_usuario'];
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('empleados','usuarios.id_usuario = empleados.id_usuario_empleado');
           //$this->db->join('empresas','usuario.id_usuario = empresas.administrador');
            $this->db->join('estado_usuario','usuarios.id_estado_us = estado_usuario.id_estado');
            $this->db->join('tipo_usuario','usuarios.rol = tipo_usuario.id_tipo_usuario');
            $where = "rol = 1 or rol = 6 or rol = 7 and creador = $id";
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
        
        public function empresas(){
            $admin = $_SESSION['id_usuario'];
            $this->db->select('*');
            $this->db->from('empresas');
            $this->db->join('clientes','clientes.id_empresa_cliente = empresas.id_empresa');
            $this->db->join('usuarios','usuarios.id_usuario = empresas.administrador');
            $this->db->join('empleados','usuarios.id_usuario = empleados.id_usuario_empleado');
            //$where = "administrador = $admin";
            //$this->db->where($where);
            $this->db->order_by('empresas.fecha_alta','desc');
            $query = $this->db->get();
            return $query->result();
        }
        
        public function busca_datos_empresa($emp){
            $this->db->select('*');
            $this->db->from('empresas');
            $this->db->join('clientes','clientes.id_empresa_cliente = empresas.id_empresa');
            $this->db->join('usuarios','usuarios.id_usuario = clientes.id_usuario_cliente');
            $this->db->where('id_empresa',$emp);
            $query = $this->db->get();
            return $query->result();
        }

        public function actualizar_empresa($id, $emp){
            $this->db->where('id_empresa',$id);
            $this->db->update('empresas',$emp);
        } 

        public function actualizar_cliente($id, $emp){
            $this->db->where('id_usuario_cliente',$id);
            $this->db->update('clientes',$emp);
        } 



    
        public function email_check_empleados($email){
            $this->db->select('*');
            $this->db->from('empleados');
            $this->db->where('correo_empleado',$email);
            $query=$this->db->get();

            if($query->num_rows()>0){
                return false;
            }else{
                return true;
            }
        }


        public function username_check_empleados($username){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->where('username',$username);
            $query=$this->db->get();

            if($query->num_rows()>0){
                return false;
            }else{
                return true;
            }
        }
        
    }
?>