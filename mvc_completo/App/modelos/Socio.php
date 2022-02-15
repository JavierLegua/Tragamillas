<?php

    class Socio{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerSocios(){
            $this->db->query("SELECT * FROM usuario WHERE idRol = '3'");

            return $this->db->registros();
        }

        public function obtenerRoles(){
            $this->db->query("SELECT * FROM rol");

            return $this->db->registros();
        }

        public function marcarRopa($datos){

            $this->db->query("INSERT INTO equipacion (talla, fechaPeticion, idUsuario, idOtrosGastos) 
            VALUES (:talla, NOW(), :idUsuario, :idOtrosGastos)");

            // //vinculamos los valores
            $this->db->bind(':talla',$datos['talla']);
            // $this->db->bind(':fechaPeticion', NOW());
            $this->db->bind(':idUsuario',$datos['idUsuario']);
            $this->db->bind(':idOtrosGastos',null);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
            
        }

        public function obtenerSocioId($id){
            $this->db->query("SELECT * FROM usuario WHERE id_usuario = :id");
            $this->db->bind(':id',$id);

            return $this->db->registro();
        }

        public function agregarSocio($datos){
            $this->db->query("INSERT INTO usuario (apellidoUsuario, dniUsuario, cc, fecha_nac, email, clave, telefono, activado, idRol) 
                                        VALUES (:apellidoUsuario, :dniUsuario, :cc, :fecha_nac, :email, :clave, :telefono, :activado, :idRol)");

            //vinculamos los valores
            $this->db->bind(':apellidoUsuario',$datos['apellidoUsuario']);
            $this->db->bind(':dniUsuario',$datos['dniUsuario']);
            $this->db->bind(':cc',$datos['cc']);
            $this->db->bind(':fecha_nac',$datos['fecha_nac']);
            $this->db->bind(':email',$datos['email']);
            $this->db->bind(':clave',$datos['clave']);
            $this->db->bind(':telefono',$datos['telefono']);
            $this->db->bind(':activado',$datos['activado']);
            $this->db->bind(':idRol',3);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function actualizarSocio($datos){
            $this->db->query("UPDATE usuario SET apellidoUsuario=:apellidoUsuario, dniUsuario=:dniUsuario, cc=:cc, fecha_nac=:fecha_nac, email=:email, clave=:clave,telefono=:telefono, activado=:activado, idRol=:idRol WHERE id_usuario = :id AND idRol = 4");

            //vinculamos los valores
            $this->db->bind(':id',$datos['id_usuario']);
            $this->db->bind(':apellidoUsuario',$datos['apellidoUsuario']);
            $this->db->bind(':dniUsuario',$datos['dniUsuario']);
            $this->db->bind(':cc',$datos['cc']);
            $this->db->bind(':fecha_nac',$datos['fecha_nac']);
            $this->db->bind(':email',$datos['email']);
            $this->db->bind(':clave',$datos['clave']);
            $this->db->bind(':telefono',$datos['telefono']);
            $this->db->bind(':activado',$datos['activado']);
            $this->db->bind(':idRol',3);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function borrarSocio($id){
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