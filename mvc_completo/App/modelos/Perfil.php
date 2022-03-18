<?php

    class Perfil{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerPerfil($id){
            $this->db->query("SELECT * FROM usuario WHERE id_usuario = $id");

            return $this->db->registros();
        }

        public function cambiarClave($datos){
                $this->db->query("UPDATE usuario SET clave=:clave WHERE id_usuario = :id");
    
                //vinculamos los valores
                $this->db->bind(':id',$datos['id_usuario']);
                $this->db->bind(':clave',$datos['clave']);
    
                //ejecutamos
                if($this->db->execute()){
                    return true;
                } else {
                    return false;
                }
        }

    }

?>