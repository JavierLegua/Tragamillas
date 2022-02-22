<?php

    class Alumno{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerAlumnos($id){
            $this->db->query("SELECT u.id_usuario, u.apellidoUsuario, gs.idGrupo, g.nombre FROM grupo_socio as gs, usuario as u, entrenador_grupo as eg, grupo as g WHERE gs.idUsuario = u.id_usuario AND eg.idUsuario = $id AND eg.idGrupo = gs.idGrupo AND g.idGrupo = gs.idGrupo AND gs.aceptado = 1");

            return $this->db->registros();
        }

    }

?>