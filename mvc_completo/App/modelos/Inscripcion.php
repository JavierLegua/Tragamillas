
<?php

class Inscripcion{
    private $db;

    public function __construct(){
        $this->db = new Base;
    }

    public function obtenerTodosGrupos(){
        
        $this->db->query("SELECT * FROM grupo;");
        return $this->db->registros();

    }

    public function obtenerGrupos($id){
        
        $this->db->query("SELECT grupo.idGrupo FROM grupo JOIN grupo_socio ON grupo.idGrupo = grupo_socio.idGrupo WHERE idUsuario = $id;");
        return $this->db->registros();

    }

    public function obtenerGruposFinal($ids){
  
        $this->db->query("SELECT * FROM grupo WHERE NOT (idGrupo IN ($ids))");
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
}

?>