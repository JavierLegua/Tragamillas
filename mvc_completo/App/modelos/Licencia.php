<?php

    class Licencia{
        
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerLicencias(){
            $this->db->query("SELECT * FROM licencia");
            return $this->db->registros();
        }

        public function agregarLicencia($licenciaNueva){

            $this->db->query("INSERT INTO licencia (idUsuario, tipo ,num_licencia,dorsal,fecha_cad_licen,img) VALUES 
            (:id , :tipo , :num_lic, :dorsal, :fechaCad , :imagenLicAdmin)");
    
            $this->db->bind(':id', $licenciaNueva['id']);
            $this->db->bind(':tipo', $licenciaNueva['tipo']);
            $this->db->bind(':num_lic',$licenciaNueva['num_lic']);
    
            if ($licenciaNueva['dorsal']=="") {
                $this->db->bind(':dorsal', NULL);
            }else {
                $this->db->bind(':dorsal', $licenciaNueva['dorsal']);
            }
    
            if ($licenciaNueva['fechaCad']=="") {
                $this->db->bind(':fechaCad', NULL);
            }else {
                $this->db->bind(':fechaCad', $licenciaNueva['fechaCad']);
            }
    
            if ($licenciaNueva['imagenLicAdmin']=="") {
                $this->db->bind(':imagenLicAdmin',NULL);
            }else {
                $this->db->bind(':imagenLicAdmin',$licenciaNueva['imagenLicAdmin']);
            }
    
    
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
    
        }

        public function editarLicencia($datos){

            //print_r($datos);exit();
            $this->db->query("UPDATE licencia SET img=:imagen, fecha_cad_licen=:fechaCad, dorsal=:dorsal, tipo=:tipo");

             //vinculamos los valores
             $this->db->bind(':imagen',$datos['imagenLicSocio']);
             $this->db->bind(':fechaCad',$datos['fechaCad']);
             $this->db->bind(':dorsal',$datos['dorsal']);
             $this->db->bind(':tipo',$datos['tipo']);

 
             //ejecutamos
             if($this->db->execute()){
                 return true;
             } else {
                 return false;
             }
        }

        public function borrarLicencia($num){
            $this->db->query("DELETE FROM licencia WHERE num_licencia = :num");
            $this->db->bind(':num', $num);

            if ($this->db->execute()) {
                return true;
            }else{
                return false;
            }
        }
    }

?>