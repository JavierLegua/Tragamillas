<?php

    class Grupo{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerGruposEntrenador($id){
            $this->db->query("SELECT g.idGrupo, g.nombre, g.abierto FROM `grupo` as g, entrenador_grupo as eg WHERE eg.idGrupo = g.idGrupo AND eg.idUsuario = $id");

            return $this->db->registros();
        }

        public function obtenerAlumnosGrupo($id){
            $this->db->query("SELECT gs.idUsuario, u.apellidoUsuario FROM `grupo_socio` as gs, usuario as u WHERE gs.idGrupo = $id AND gs.idUsuario = u.id_usuario");

            return $this->db->registros();
        }

        public function cerrarGrupos($idGrupo, $datos){
            $this->db->query("UPDATE grupo SET abierto=:abierto WHERE idgrupo = $idGrupo");
    
            $this->db->bind(':abierto',0);
    
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function abrirGrupos($idGrupo, $datos){
            $this->db->query("UPDATE grupo SET abierto=:abierto WHERE idgrupo = $idGrupo");
    
            $this->db->bind(':abierto',1);
    
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }

?>