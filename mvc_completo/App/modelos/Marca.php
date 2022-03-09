<?php

    class Marca{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerMarcas(){
            $this->db->query("SELECT m.fecha, m.marca, u.apellidoUsuario, p.nombre_prueba, t.nombreTest FROM socio_prueba as m, usuario as u, prueba as p, test as t WHERE u.id_usuario = m.idUsuario AND p.idPrueba = m.idPrueba AND t.idTest = m.idTest");

            return $this->db->registros();
        }

        public function obtenerGruposEntrenador($id){
            $this->db->query("SELECT g.idGrupo, g.nombre, g.abierto FROM `grupo` as g, entrenador_grupo as eg WHERE eg.idGrupo = g.idGrupo AND eg.idUsuario = $id");

            return $this->db->registros();
        }

        public function obtenerAlumnosGrupo($id){
            $this->db->query("SELECT gs.idUsuario, u.apellidoUsuario FROM `grupo_socio` as gs, usuario as u WHERE gs.idGrupo = $id AND gs.idUsuario = u.id_usuario");

            return $this->db->registros();
        }
    }
?>