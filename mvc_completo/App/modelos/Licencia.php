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
    }

?>