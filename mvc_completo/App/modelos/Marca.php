<?php

    class Marca{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerMarcas($id){
            $this->db->query("SELECT DISTINCT m.fecha, m.marca, u.apellidoUsuario, p.nombre_prueba, t.nombreTest FROM socio_prueba as m, usuario as u, prueba as p, test as t, entrenador_grupo as eg, grupo as g, grupo_socio as gs WHERE u.id_usuario = m.idUsuario AND p.idPrueba = m.idPrueba AND t.idTest = m.idTest AND $id = eg.idUsuario AND g.idGrupo = eg.idGrupo AND g.idGrupo = gs.idGrupo AND u.id_usuario = gs.idUsuario");

            return $this->db->registros();
        }

        public function obtenerMarcasSocio($id){
            $this->db->query("SELECT DISTINCT m.fecha, m.marca, p.nombre_prueba, t.nombreTest FROM socio_prueba as m, prueba as p, test as t WHERE $id = m.idUsuario AND p.idPrueba = m.idPrueba AND t.idTest = m.idTest");

            return $this->db->registros();
        }

    }
?>