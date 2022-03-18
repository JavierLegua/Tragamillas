
<?php

class InscripcionEvento{
    private $db;

    public function __construct(){
        $this->db = new Base;
    }

    public function obtenerTodosEventos(){
        
        $this->db->query("SELECT * FROM evento;");
        return $this->db->registros();

    }

    public function agregarInscripcion($datos){
        $this->db->query("INSERT INTO evento_inscripcion (idEvento, idUsuario) 
                                    VALUES (:idEvento, :idUsuario)");

        //vinculamos los valores
        $this->db->bind(':idEvento',$datos['idEvento']);
        $this->db->bind(':idUsuario',$datos['idUsuario']);

        //ejecutamos
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function obtenerTodasInscripciones(){
        $this->db->query("SELECT e.nombre_evento, u.apellidoUsuario, ei.aceptado, e.idEvento, u.id_usuario FROM evento_inscripcion as ei, evento as e, usuario as u WHERE ei.idEvento =  e.idEvento AND ei.idUsuario = u.id_usuario");

        return $this->db->registros();
    }

    public function aceptarEvento($datos){

        // print_r($datos);exit;
        
        $this->db->query("UPDATE evento_inscripcion SET aceptado=:aceptado WHERE idUsuario=:idUsuario AND idEvento=:idEvento");

        $this->db->bind(':aceptado',$datos['aceptado']);
        $this->db->bind(':idUsuario',$datos['idUsuario']);
        $this->db->bind(':idEvento',$datos['idEvento']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function obtenerInscripciones($id){
        $this->db->query("SELECT DISTINCT e.nombre_evento, u.apellidoUsuario, ei.aceptado, e.idEvento, u.id_usuario FROM evento_inscripcion as ei, evento as e, usuario as u, grupo_socio as gs, entrenador_grupo as eg, grupo as g WHERE gs.idUsuario = u.id_usuario AND eg.idUsuario = $id AND eg.idGrupo = gs.idGrupo AND g.idGrupo = gs.idGrupo AND u.id_usuario = ei.idUsuario AND e.idEvento = ei.idEvento");

        return $this->db->registros();
    }

    public function cancelarEvento($datos){

        // print_r($datos);exit;
        
        $this->db->query("UPDATE evento_inscripcion SET aceptado=:aceptado WHERE idUsuario=:idUsuario AND idEvento=:idEvento");

        $this->db->bind(':aceptado',$datos['aceptado']);
        $this->db->bind(':idUsuario',$datos['idUsuario']);
        $this->db->bind(':idEvento',$datos['idEvento']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    // public function obtenerInscripciones($id){
    //     $this->db->query("SELECT gs.aceptado, gs.activo, gs.idGrupo, gs.idUsuario, u.apellidoUsuario, g.nombre, g.abierto FROM grupo_socio as gs, usuario as u, entrenador_grupo as eg, grupo as g WHERE gs.idUsuario = u.id_usuario AND eg.idUsuario = $id AND eg.idGrupo = gs.idGrupo AND g.idGrupo = gs.idGrupo");

    //     return $this->db->registros();
    // }

    // public function obtenerGrupos($id){
        
    //     $this->db->query("SELECT grupo.idGrupo FROM grupo JOIN grupo_socio ON grupo.idGrupo = grupo_socio.idGrupo WHERE idUsuario = $id;");
    //     return $this->db->registros();

    // }

    // public function obtenerGruposFinal($ids){
  
    //     $this->db->query("SELECT * FROM grupo WHERE NOT (idGrupo IN ($ids))");
    //     return $this->db->registros();

    // }


    // public function cancelarInscripcion($id, $idGrupo, $datos){
    //     $this->db->query("UPDATE grupo_socio SET aceptado=:aceptado WHERE idUsuario = $id AND idGrupo = $idGrupo");

    //     $this->db->bind(':aceptado',0);

    //     if($this->db->execute()){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // // public function marcarRopa($datos){

    // //     $this->db->query("INSERT INTO equipacion (talla, fechaPeticion, idUsuario, idOtrosGastos, idTienda) 
    // //     VALUES (:talla, NOW(), :idUsuario, :idOtrosGastos, :idTienda)");

    // //     // //vinculamos los valores
    // //     $this->db->bind(':talla',$datos['talla']);
    // //     // $this->db->bind(':fechaPeticion', NOW());
    // //     $this->db->bind(':idUsuario',$datos['idUsuario']);
    // //     $this->db->bind(':idOtrosGastos',null);
    // //     $this->db->bind(':idTienda',$datos['idTienda']);

    // //     //ejecutamos
    // //     if($this->db->execute()){
    // //         return true;
    // //     } else {
    // //         return false;
    // //     }
        
    // // }

    // // public function obtenerSocioId($id){
    // //     $this->db->query("SELECT * FROM usuario WHERE id_usuario = :id");
    // //     $this->db->bind(':id',$id);

    // //     return $this->db->registro();
    // // }


    // public function actualizarSocio($datos){
    //     $this->db->query("UPDATE usuario SET apellidoUsuario=:apellidoUsuario, dniUsuario=:dniUsuario, cc=:cc, fecha_nac=:fecha_nac, email=:email, clave=:clave,telefono=:telefono, activado=:activado, idRol=:idRol WHERE id_usuario = :id AND idRol = 4");

    //     //vinculamos los valores
    //     $this->db->bind(':id',$datos['id_usuario']);
    //     $this->db->bind(':apellidoUsuario',$datos['apellidoUsuario']);
    //     $this->db->bind(':dniUsuario',$datos['dniUsuario']);
    //     $this->db->bind(':cc',$datos['cc']);
    //     $this->db->bind(':fecha_nac',$datos['fecha_nac']);
    //     $this->db->bind(':email',$datos['email']);
    //     $this->db->bind(':clave',$datos['clave']);
    //     $this->db->bind(':telefono',$datos['telefono']);
    //     $this->db->bind(':activado',$datos['activado']);
    //     $this->db->bind(':idRol',3);

    //     //ejecutamos
    //     if($this->db->execute()){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function borrarSocio($id){
    //     $this->db->query("DELETE FROM usuario WHERE id_usuario = :id");
    //     $this->db->bind(':id',$id);

    //     if($this->db->execute()){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}

?>