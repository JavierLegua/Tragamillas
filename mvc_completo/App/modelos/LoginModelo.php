<?php

    class LoginModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }


        public function obtenerPass($clave){
            $this->db->query("SELECT clave FROM usuario");
            $this->db->bind(':clave',$clave);

            return $this->db->registro();
        }

        public function loginEmail($email){
            $this->db->query("SELECT * FROM usuario WHERE email = :email");
            $this->db->bind(':email',$email);

            return $this->db->registro();
        }


        public function registroSesion($id_usuario){
            $this->db->query("INSERT INTO sesiones (id_sesion, id_usuario, fecha_inicio) 
                                        VALUES (:id_sesion, :id_usuario, NOW())");

            $this->db->bind(':id_sesion',session_id());
            $this->db->bind(':id_usuario',$id_usuario);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }


        public function registroFinSesion($id_usuario){
            $this->db->query("UPDATE sesiones SET fecha_fin = NOW()  
                                    WHERE id_usuario = :id_usuario AND id_sesion = :id_sesion");

            $this->db->bind(':id_sesion',session_id());
            $this->db->bind(':id_usuario',$id_usuario);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function agregarUsuario($datos){
       

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
            $this->db->bind(':idRol',$datos['idRol']);

            if($id = $this->db->executeInsert()){
                if ($datos['idRol'] == 2) {
                    $this->db->query("INSERT INTO entrenador (idUsuario, sueldo) VALUES (:idUsuario, :sueldo)");
                    $this->db->bind(':idUsuario',$id);
                    $this->db->bind(':sueldo',NULL);
                    if($this->db->execute()){
                        return true;
                    } else {
                        return false;
                    }
                }
                return true;
            } else {
                return false;
            }

            //ejecutamos
            
        }
    }
