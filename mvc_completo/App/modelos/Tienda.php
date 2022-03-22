<?php

    class Tienda{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerTiendas(){
            $this->db->query("SELECT * FROM usuario WHERE idRol = '4'");

            return $this->db->registros();
        }

        public function obtenerRoles(){
            $this->db->query("SELECT * FROM rol");

            return $this->db->registros();
        }

        public function obtenerTiendaId($id){
            $this->db->query("SELECT * FROM usuario WHERE id_usuario = :id");
            $this->db->bind(':id',$id);

            return $this->db->registro();
        }

        public function agregarTienda($datos){
            $this->db->query("INSERT INTO usuario (nombreUsuario, apellidoUsuario, dniUsuario, cc, fecha_nac, email, clave, telefono, activado, idRol) 
                                        VALUES (:nombreUsuario, :apellidoUsuario, :dniUsuario, :cc, :fecha_nac, :email, :clave, :telefono, :activado, :idRol)");

            //vinculamos los valores
            $this->db->bind(':nombreUsuario',$datos['nombreUsuario']);
            $this->db->bind(':apellidoUsuario',$datos['apellidoUsuario']);
            $this->db->bind(':dniUsuario',$datos['dniUsuario']);
            $this->db->bind(':cc',$datos['cc']);
            $this->db->bind(':fecha_nac',$datos['fecha_nac']);
            $this->db->bind(':email',$datos['email']);
            $this->db->bind(':clave',$datos['clave']);
            $this->db->bind(':telefono',$datos['telefono']);
            $this->db->bind(':activado',1);
            $this->db->bind(':idRol',4);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function actualizarTienda($datos){
            $this->db->query("UPDATE usuario SET apellidoUsuario=:apellidoUsuario, nombreUsuario=:nombreUsuario, dniUsuario=:dniUsuario, cc=:cc, fecha_nac=:fecha_nac, email=:email, clave=:clave,telefono=:telefono, activado=:activado, idRol=:idRol WHERE id_usuario = :id AND idRol = 4");

            //vinculamos los valores
            $this->db->bind(':id',$datos['id_usuario']);
            $this->db->bind(':nombreUsuario',$datos['nombreUsuario']);
            $this->db->bind(':apellidoUsuario',$datos['apellidoUsuario']);
            $this->db->bind(':dniUsuario',$datos['dniUsuario']);
            $this->db->bind(':cc',$datos['cc']);
            $this->db->bind(':fecha_nac',$datos['fecha_nac']);
            $this->db->bind(':email',$datos['email']);
            $this->db->bind(':clave',$datos['clave']);
            $this->db->bind(':telefono',$datos['telefono']);
            $this->db->bind(':activado',1);
            $this->db->bind(':idRol',4);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function actualizarT($datos){
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

        public function borrarTienda($id){
            $this->db->query("DELETE FROM usuario WHERE id_usuario = :id");
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }

?>