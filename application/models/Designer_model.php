<?php
    class Designer_model extends CI_model{

        public function getslope()
        {
            $this->db->select()
                     ->from("campaña")
                     ->join("Detalle_CP","campaña.id_campaña=Detalle_CP.id_campaña")
                     ->join("Publicaciones","Publicaciones.id_publicaciones=Detalle_CP.id_publicaciones")
                     ->join("tareas","Publicaciones.id_publicaciones=tareas.id_publicaciones")
                     ->get()
                     ->result();
        }

        
    }
?>