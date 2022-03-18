<?php

    class MarcaEvento{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerEventos(){
            $this->db->query("SELECT * FROM evento");
            return $this->db->registros();
        }

        public function verParticipantes($id){
            $this->db->query("SELECT ei.idUsuario, u.apellidoUsuario, u.nombreUsuario, ei.idEvento FROM evento_inscripcion as ei, usuario as u WHERE $id = ei.idEvento AND u.id_usuario = ei.idUsuario");
            return $this->db->registros();
        }

        public function verParticipantesExternos($id){
            $this->db->query("SELECT eie.apellidoUsuario, eie.dni, eie.idEvento FROM evento_inscripcion_ext as eie WHERE $id = eie.idEvento");
            return $this->db->registros();
        }
        
        public function agregarMarca($datos){
            //print_r($datos);exit;
            $this->db->query("UPDATE evento_inscripcion SET marca=:marca WHERE idUsuario = :id AND idEvento = :idEvento");

            //vinculamos los valores
            $this->db->bind(':id',$datos['idUsuario']);
            $this->db->bind(':idEvento',$datos['idEvento']);
            $this->db->bind(':marca',$datos['marca']);

            //ejecutamos
            if($this->db->execute()){
                //echo "FUNCIONA";
                return true;
            } else {
                //echo "ERROR";
                return false;
            }
        }

        public function agregarMarcaExt($datos){
            //print_r($datos);exit;
            $this->db->query("UPDATE evento_inscripcion_ext SET marca=:marca WHERE dni = :dni AND idEvento = :idEvento");

            //vinculamos los valores
            $this->db->bind(':dni',$datos['dni']);
            $this->db->bind(':idEvento',$datos['idEvento']);
            $this->db->bind(':marca',$datos['marca']);

            //ejecutamos
            if($this->db->execute()){
                //echo "FUNCIONA";
                return true;
            } else {
                //echo "ERROR";
                return false;
            }
        }

    }
?>