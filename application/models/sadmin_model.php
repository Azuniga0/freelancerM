<?php
    class sadmin_model extends CI_model{        

        //agrega un nuevo usuario a la db
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

        // agrega un nuevo empleado a la db
        public function nuevo_empleado($usuarios){
            $insert = $this->db->insert('empleados',$usuarios);
            //$this->db->insert('usuarios',$usuarios);
            if($insert){
                return $this->db->insert_id();
            }else{
                return false;    
            }
        }

        // agrega un nuevo cliente a la db
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
            $where = " creador = $id and id_estado_us !=4";
            $this->db->where($where);
            $this->db->order_by('usuarios.fecha_creacion','desc');
            $query = $this->db->get();
            return $query->result();
        }

        // 
        public function busca_datos_admin($admin){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('empleados','usuarios.id_usuario = empleados.id_usuario_empleado');
            $this->db->join('estado_usuario','usuarios.id_estado_us = estado_usuario.id_estado');
            $this->db->where('id_usuario',$admin);
            $query = $this->db->get();
            return $query->result();
        } 
        
        // actualiza los usuarios
        public function actualizar_user($id, $user){
            $this->db->where('id_usuario',$id);
            $this->db->update('usuarios',$user);
        }

        // actualzia los empleados
        public function actualizar_emp($id, $emp){
            $this->db->where('id_usuario_empleado',$id);
            $this->db->update('empleados',$emp);
        }         
        
        // selecciona todas las empresas por creador
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
        
        // trae los datos de una empresa
        public function busca_datos_empresa($emp){
            $this->db->select('*');
            $this->db->from('empresas');
            $this->db->join('clientes','clientes.id_empresa_cliente = empresas.id_empresa');
            $this->db->join('usuarios','usuarios.id_usuario = clientes.id_usuario_cliente');
            $this->db->where('id_empresa',$emp);
            $query = $this->db->get();
            return $query->result();
        }

        // actualiza los datos de la empresa
        public function actualizar_empresa($id, $emp){
            $this->db->where('id_empresa',$id);
            $this->db->update('empresas',$emp);
        } 

        // actualiza los datos del cliente
        public function actualizar_cliente($id, $emp){
            $this->db->where('id_usuario_cliente',$id);
            $this->db->update('clientes',$emp);
        } 

        // consulta si el email ya esta en la db
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

        // consulta si el username ya esta en la db
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

        //function para eliminar el usuario, pero cambiando el estado del mismo
        function eliminar_empleado($id,$edo){
            $this->db->where('id_usuario',$id);
            //return $this->db->delete('usuarios');
            $this->db->update('usuarios',$edo);
        }

        // consulta el tipo de usuario
        function tipo_usuario($id){
            $this->db->select('rol');
            $this->db->from('usuarios');
            $this->db->where('id_usuario',$id);
            $query = $this->db->get();
            return $query->result();
        }

        //obtiene true si el sadmin tiene empresas activas
        function activos_sadmin_e ($check){
            $this->db->select('*');
            $this->db->from('empresas');
            $where="estado_empresa = 1 and creador_empresa = $check";
            $this->db->where($where);
            $query=$this->db->get();
            if($query->num_rows()>0){
                return false;
            }else{
                return true;
            }
        }

        //obtiene true si el sadmin tiene usuarios activos
        function activos_sadmin_u ($check){
            $this->db->select('*');
            $this->db->from('usuarios');
            $where="id_estado_us = 1 and creador = $check";
            $this->db->where($where);
            $query=$this->db->get();
            if($query->num_rows()>0){
                return false;
            }else{
                return true;
            }
        }

        // obtiene todos los sadmin que esten activos
        function get_sadmin (){
            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('empleados','empleados.id_usuario_empleado = usuarios.id_usuario');
            $this->db->where('rol = 6 and id_estado_us = 1');
            $query = $this->db->get();
            return $query->result();
        }

        // obtiene el sadmin con menor id
        function get_min_sadmin (){
            //SELECT * FROM usuarios where id_usuario = (select min(id_usuario) from usuarios where rol = 6) 
            $this->db->select('id_usuario');
            $this->db->from('usuarios');
            $where="id_usuario = (select min(id_usuario) from usuarios where rol = 6)";
            $this->db->where($where);
            $query = $this->db->get();
            return $query->result();
        }
        
    }
?>