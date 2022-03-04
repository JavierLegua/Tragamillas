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

        public function realizarTest($datos){

            $this->db->query("INSERT INTO socio_prueba (fecha, marca, idUsuario, idPrueba, idTest) 
            VALUES (NOW(), :marca, :idUsuario, :idPrueba, :idTest)");
    
            // //vinculamos los valores
            $this->db->bind(':marca',$datos['marca']);
            $this->db->bind(':idUsuario',$datos['idUsuario']);
            $this->db->bind(':idPrueba',$datos['idPrueba']);
            $this->db->bind(':idTest',$datos['idTest']);
    
            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
            
        }

    }

?>