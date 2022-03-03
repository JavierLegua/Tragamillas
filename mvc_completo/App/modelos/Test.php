<?php

    class Test{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function crearTest(){
            $this->db->query("INSERT INTO test (nombreTest) 
            VALUES (nombreTest)");

            // //vinculamos los valores
            $this->db->bind(':nombreTest',$datos['nombreTest']);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

    }
?>