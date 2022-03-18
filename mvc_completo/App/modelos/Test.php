<?php

    class Test{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function obtenerPruebas(){
            $this->db->query("SELECT * FROM prueba");
            return $this->db->registros();
        }

        public function obtenerTests(){
            $this->db->query("SELECT * FROM test");
            return $this->db->registros();
        }

        public function obtenerPruebasTest($id){
            $this->db->query("SELECT p.* FROM test_prueba as tp, prueba as p WHERE tp.idTest = $id AND tp.idPrueba = p.idPrueba");
            return $this->db->registros();
        }

        public function crearTest($datos){
            $this->db->query("INSERT INTO test (nombreTest) VALUES (:nombreTest)");

            // //vinculamos los valores
            $this->db->bind(':nombreTest',$datos['nombreTest']);
            
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
            //ejecutamos

            // if($id = $this->db->executeInsert()){
            //     $this->db->query("INSERT INTO test_prueba (idTest, idPrueba, detalles) VALUES (:idTest, :idPrueba, :detalles)");
                
            //     //vinculamos los valores
            //     $this->db->bind(':idTest',$id);
            //     $this->db->bind(':idPrueba',$datos['idPrueba']);
            //     $this->db->bind(':detalles',$datos['detalles']);

            //     //ejecutamos
            //     if($this->db->execute()){
            //         return true;
            //     } else {
            //         return false;
            //     }
            // } else {
            //     return false;
            // }
        }

        public function agregarPruebaTest($datos){
            $this->db->query("INSERT INTO test_prueba (idTest, idPrueba, detalles) VALUES (:idTest, :idPrueba, :detalles)");
            //vinculamos los valores
            $this->db->bind(':idTest',$datos['idTest']);
            $this->db->bind(':idPrueba',$datos['idPrueba']);
            $this->db->bind(':detalles',$datos['detalles']);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

    }
?>