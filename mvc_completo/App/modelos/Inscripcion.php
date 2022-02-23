
<?php

class Inscripcion{
    private $db;

    public function __construct(){
        $this->db = new Base;
    }

    // public function obtenerSocios(){
    //     $this->db->query("SELECT * FROM usuario WHERE idRol = '3'");

    //     return $this->db->registros();
    // }

    public function obtenerGrupos($id){
        
        $this->db->query("SELECT grupo.idGrupo FROM grupo JOIN grupo_socio ON grupo.idGrupo = grupo_socio.idGrupo WHERE idUsuario = $id;");
        return $this->db->registros();

    }

    public function obtenerGruposFinal($ids){
  
        $this->db->query("SELECT * FROM grupo WHERE NOT (grupo.idGrupo IN ($ids));");
        return $this->db->registros();

    }


    public function obtenerInscripciones($id){
        $this->db->query("SELECT gs.aceptado, gs.activo, gs.idGrupo, gs.idUsuario, u.apellidoUsuario, g.nombre, g.abierto FROM grupo_socio as gs, usuario as u, entrenador_grupo as eg, grupo as g WHERE gs.idUsuario = u.id_usuario AND eg.idUsuario = $id AND eg.idGrupo = gs.idGrupo AND g.idGrupo = gs.idGrupo");

        return $this->db->registros();
    }

    public function confirmarInscripcion($id, $idGrupo, $datos){
        $this->db->query("UPDATE grupo_socio SET aceptado=:aceptado WHERE idUsuario = $id AND idGrupo = $idGrupo");

        $this->db->bind(':aceptado',1);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function cancelarInscripcion($id, $idGrupo, $datos){
        $this->db->query("UPDATE grupo_socio SET aceptado=:aceptado WHERE idUsuario = $id AND idGrupo = $idGrupo");

        $this->db->bind(':aceptado',0);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    // public function marcarRopa($datos){

    //     $this->db->query("INSERT INTO equipacion (talla, fechaPeticion, idUsuario, idOtrosGastos, idTienda) 
    //     VALUES (:talla, NOW(), :idUsuario, :idOtrosGastos, :idTienda)");

    //     // //vinculamos los valores
    //     $this->db->bind(':talla',$datos['talla']);
    //     // $this->db->bind(':fechaPeticion', NOW());
    //     $this->db->bind(':idUsuario',$datos['idUsuario']);
    //     $this->db->bind(':idOtrosGastos',null);
    //     $this->db->bind(':idTienda',$datos['idTienda']);

    //     //ejecutamos
    //     if($this->db->execute()){
    //         return true;
    //     } else {
    //         return false;
    //     }
        
    // }

    // public function obtenerSocioId($id){
    //     $this->db->query("SELECT * FROM usuario WHERE id_usuario = :id");
    //     $this->db->bind(':id',$id);

    //     return $this->db->registro();
    // }

    public function agregarInscripcion($datos){
        $this->db->query("INSERT INTO grupo_socio (fecha_inscrip, aceptado, activo, idGrupo, idUsuario) 
                                    VALUES (NOW(), :aceptado, :activo, :idGrupo, :idUsuario)");

        //vinculamos los valores
        $this->db->bind(':aceptado',0);
        $this->db->bind(':activo',$datos['activo']);
        $this->db->bind(':idGrupo',$datos['idGrupo']);
        $this->db->bind(':idUsuario',$datos['idUsuario']);

        //ejecutamos
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

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