<?php

    // echo "hola";

    class Evento{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerEventosAdmin(){
            $this->db->query("SELECT * FROM evento");

            return $this->db->registros();
        }

        public function agregarEvento($datos){
            $this->db->query("INSERT INTO evento (nombre_evento, tipo, precio, fecha_ini_even, fecha_fin_even) 
                                        VALUES (:nombre_evento, :tipo, :precio, :fecha_ini_even, :fecha_fin_even)");

            //vinculamos los valores
            $this->db->bind(':nombre_evento',$datos['nombre_evento']);
            $this->db->bind(':tipo',$datos['tipo']);
            $this->db->bind(':precio',$datos['precio']);
            $this->db->bind(':fecha_ini_even',$datos['fecha_ini_even']);
            $this->db->bind(':fecha_fin_even',$datos['fecha_fin_even']);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    //     public function obtenerGruposEntrenador($id){
    //         $this->db->query("SELECT g.idGrupo, g.nombre, g.abierto FROM `grupo` as g, entrenador_grupo as eg WHERE eg.idGrupo = g.idGrupo AND eg.idUsuario = $id");

    //         return $this->db->registros();
    //     }

    //     public function obtenerAlumnosGrupo($id){
    //         $this->db->query("SELECT gs.idUsuario, u.apellidoUsuario FROM `grupo_socio` as gs, usuario as u WHERE gs.idGrupo = $id AND gs.idUsuario = u.id_usuario");

    //         return $this->db->registros();
    //     }

    //     public function cerrarGrupos($idGrupo){
    //         $this->db->query("UPDATE grupo SET abierto=:abierto WHERE idgrupo = $idGrupo");
    
    //         $this->db->bind(':abierto',0);
    
    //         if($this->db->execute()){
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     }

    //     public function abrirGrupos($idGrupo){
    //         $this->db->query("UPDATE grupo SET abierto=:abierto WHERE idgrupo = $idGrupo");
    
    //         $this->db->bind(':abierto',1);
    
    //         if($this->db->execute()){
    //             return true;
    //         } else {
    //             return false;
    //         }
    //     }
    }

?>