<?php

    class Pedido{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }
        public function vistaPrincipal(){
            $this->db->query("SELECT * FROM usuario");

            return $this->db->registros();
        }
    }
?>