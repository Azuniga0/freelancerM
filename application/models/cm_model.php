<?php
    class cm_model extends CI_model{

        public function lista_camp($datos){
            $id=$_SESSION['id_usuario'];
            $this->db->select('*');
            $this->db->from('campain');
            $this->db->join('usuarios','usuarios.id_usuario = campain.id_community');
            $this->db->join('empresas','empresas.id_empresa = campain.id_empresa_camp');
            $this->db->join('empleados','empleados.id_usuario_empleado = campain.id_community');
            $this->db->where('id_community',$id);
            $this->db->order_by('fecha_creacion_camp','desc');
            $query = $this->db->get();
            return $query->result();
        }
    }
?>