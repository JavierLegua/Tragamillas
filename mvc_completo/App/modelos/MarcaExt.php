<?php

    class MarcaExt{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerTodosEventos(){
            
            $this->db->query("SELECT * FROM evento;");
            return $this->db->registros();

        }

        public function obtenerMarcasExt($id){
            
            $this->db->query("SELECT * FROM evento_inscripcion_ext WHERE idEvento = $id;");

            return $this->db->registros();

        }

        public function obtenerMarcas($id){
            
            $this->db->query("SELECT ei.marca, u.nombreUsuario, u.apellidoUsuario, u.dniUsuario FROM evento_inscripcion as ei, usuario as u WHERE ei.idEvento = $id AND ei.idUsuario = u.id_usuario;");
 
            return $this->db->registros();

        }

    }

?>