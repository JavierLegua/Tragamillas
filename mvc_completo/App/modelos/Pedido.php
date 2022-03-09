<?php

    class Pedido{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function contarPedidos($idTienda){
            $this->db->query("SELECT equipacion.idEquipacion, equipacion.talla, equipacion.idUsuario, usuario.apellidoUsuario, equipacion.entregado FROM equipacion, usuario WHERE equipacion.idUsuario = usuario.id_usuario AND equipacion.idTienda = $idTienda");

            return $this->db->rowCount();
        }

        public function obtenerPedidos($idTienda, $min = -1, $registrosPorPagina = 0){
            
            if ($min == -1 && $registrosPorPagina == 0) {
                $this->db->query("SELECT equipacion.idEquipacion, equipacion.talla, equipacion.idUsuario, usuario.apellidoUsuario, equipacion.entregado FROM equipacion, usuario WHERE equipacion.idUsuario = usuario.id_usuario AND equipacion.idTienda = $idTienda");
            }else{
                $this->db->query("SELECT equipacion.idEquipacion, equipacion.talla, equipacion.idUsuario, usuario.apellidoUsuario, equipacion.entregado FROM equipacion, usuario WHERE equipacion.idUsuario = usuario.id_usuario AND equipacion.idTienda = $idTienda LIMIT $min, $registrosPorPagina");
            }    

            return $this->db->registros();
        }

        public function obtenerPedidoId($id){
            $this->db->query("SELECT * FROM equipacion WHERE idEquipacion = :id");
            $this->db->bind(':id',$id);

            return $this->db->registro();
        }

        public function confirmarPedido($datos){
            $this->db->query("UPDATE equipacion SET talla=:talla, idUsuario=:idUsuario, entregado=:entregado WHERE idEquipacion = :id");

            //vinculamos los valores
            $this->db->bind(':id',$datos['idEquipacion']);
            $this->db->bind(':talla',$datos['talla']);
            $this->db->bind(':idUsuario',$datos['idUsuario']);
            $this->db->bind(':entregado',1);

            //ejecutamos
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function borrarPedido($id){
            $this->db->query("DELETE FROM equipacion WHERE idEquipacion = :id");
            $this->db->bind(':id',$id);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }
    ?>