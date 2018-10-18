<?php
    class Designer_model extends CI_model{

        public function getslope()
        {
            $this->db->query("SELECT c.nombre, t.titulo, t.contenido, t.fecha_entrega, t.id_usuario FROM campaña as c join tareas as t on c.id_campaña = t.id_campaña")->result();
        }

        
    }
?>