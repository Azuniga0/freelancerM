<?php
    class Designer_model extends CI_model{

        public function getslope($id)
        {
            $this->db->select("campaña.nombre as cnombre, Publicaciones.nombre as pnombre, tareas.contenido, tareas.fecha_entrega as fecha, tareas.id_usuario")
                     ->from("campaña")
                     ->join("Detalle_CP","campaña.id_campaña=Detalle_CP.id_campaña")
                     ->join("Publicaciones","Publicaciones.id_publicaciones=Detalle_CP.id_publicaciones")
                     ->join("tareas","Publicaciones.id_publicaciones=tareas.id_publicaciones")
                     ->where("id_usuario", $id)
                     ->get()
                     ->result();
        }

        
    }
?>