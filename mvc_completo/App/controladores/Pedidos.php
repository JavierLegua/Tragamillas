<?php
    class Pedidos extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [4];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->pedidoModelo = $this->modelo('Pedido'); 

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }

        public function index(){
            //Obtenemos los usuarios
            $pedidos = $this->pedidoModelo->obtenerPedidos();

            $this->datos['pedido'] = $pedidos;

            $this->vista('pedidos/ver_pedidos',$this->datos);
        }

        public function confirmarPedido($id){
            // echo $_POST['talla'];exit();
            $this->datos['rolesPermitidos'] = [4];          // Definimos los roles que tendran acceso
            
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/pedidos');
            }
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $pedidoConfirmado = [
                    'idEquipacion' => $id,
                    'talla' => trim($_POST['talla']),
                    'idUsuario' => trim($_POST['idUsuario']),
                    'entregado' => trim($_POST['entregado']),
                ];

                // print_r($pedidoConfirmado);exit();

                if ($this->pedidoModelo->confirmarPedido($pedidoConfirmado)){
                    redireccionar('/pedidos');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                
                //obtenemos información del usuario y el listado de roles desde del modelo
                $this->datos['pedido'] = $this->pedidoModelo->obtenerPedidoId($id);
                $this->vista('pedidos/confirmar_pedidos',$this->datos);
               
            }
        }


        public function borrarPedido($id){
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->pedidoModelo->borrarPedido($id)){
                    redireccionar('/pedidos');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                //obtenemos información del usuario desde del modelo
                $this->datos['pedido'] = $this->pedidoModelo->obtenerPedidoId($id);

                $this->vista('pedidos/borrar_pedidos',$this->datos);
            }
        }


    }
?>