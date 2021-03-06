<?php

class InscripcionEventoExt{
    private $db;

    public function __construct(){
        $this->db = new Base;
    }

    public function obtenerTodosEventos(){
        
        $this->db->query("SELECT * FROM evento;");
        return $this->db->registros();

    }

    public function agregarInscripcion($datos){
        //print_r($datos);exit;
        $this->db->query("INSERT INTO evento_inscripcion_ext (apellidoUsuario, dni, cc, fecha_nac, email, telefono, idEvento) 
                                    VALUES (:apellidoUsuario, :dni, :cc, :fecha_nac, :email, :telefono, :idEvento)");

         //vinculamos los valores
        $this->db->bind(':apellidoUsuario',$datos['apellidoUsuario']);
        $this->db->bind(':dni',$datos['dni']);
        $this->db->bind(':cc',$datos['cc']);
        $this->db->bind(':fecha_nac',$datos['fecha_nac']);
        $this->db->bind(':email',$datos['email']);
        $this->db->bind(':telefono',$datos['telefono']);
        $this->db->bind(':idEvento',$datos['idEvento']);

         //ejecutamos

        
        if($this->db->execute()){
             return true;
        } else {
            return false;
        }
    }

    // public function obtenerTodasInscripciones(){
    //     $this->db->query("SELECT e.nombre_evento, u.apellidoUsuario, ei.aceptado, e.idEvento, u.id_usuario FROM evento_inscripcion as ei, evento as e, usuario as u WHERE ei.idEvento =  e.idEvento AND ei.idUsuario = u.id_usuario");

    //     return $this->db->registros();
    // }

    // public function aceptarEvento($datos){

    //     // print_r($datos);exit;
        
    //     $this->db->query("UPDATE evento_inscripcion SET aceptado=:aceptado WHERE idUsuario=:idUsuario AND idEvento=:idEvento");

    //     $this->db->bind(':aceptado',$datos['aceptado']);
    //     $this->db->bind(':idUsuario',$datos['idUsuario']);
    //     $this->db->bind(':idEvento',$datos['idEvento']);

    //     if($this->db->execute()){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function obtenerInscripciones($id){
    //     $this->db->query("SELECT DISTINCT e.nombre_evento, u.apellidoUsuario, ei.aceptado, e.idEvento, u.id_usuario FROM evento_inscripcion as ei, evento as e, usuario as u, grupo_socio as gs, entrenador_grupo as eg, grupo as g WHERE gs.idUsuario = u.id_usuario AND eg.idUsuario = $id AND eg.idGrupo = gs.idGrupo AND g.idGrupo = gs.idGrupo AND u.id_usuario = ei.idUsuario AND e.idEvento = ei.idEvento");

    //     return $this->db->registros();
    // }

    // public function cancelarEvento($datos){

    //     // print_r($datos);exit;
        
    //     $this->db->query("UPDATE evento_inscripcion SET aceptado=:aceptado WHERE idUsuario=:idUsuario AND idEvento=:idEvento");

    //     $this->db->bind(':aceptado',$datos['aceptado']);
    //     $this->db->bind(':idUsuario',$datos['idUsuario']);
    //     $this->db->bind(':idEvento',$datos['idEvento']);

    //     if($this->db->execute()){
    //         return true;
    //     } else {
    //         return false;
    //     }
}