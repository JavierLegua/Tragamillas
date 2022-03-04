<?php

    class Tests extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->testModelo = $this->modelo('Test');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            //Obtenemos los usuarios
            $pruebas = $this->testModelo->obtenerPruebas();

            $this->datos['pruebas'] = $pruebas;

            $this->vista('test_inicio/inicio',$this->datos);
        }

        public function crearTest(){
            $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/entrenadores');
            }
            // print_r($this->datos);exit();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                
                $testNuevo = [
                    'nombreTest' => trim($_POST['nombreTest']),
                    'idPrueba' => trim($_POST['idPrueba']),
                    'detalles' => trim($_POST['detalles']),                   
                ];
                if ($this->testModelo->crearTest($testNuevo)){
                    redireccionar('/entrenadores');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                print_r('falla en el post');exit;
            }

        }

    }
?>
