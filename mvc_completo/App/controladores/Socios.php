<?php

    class Socios extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [4];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->socioModelo = $this->modelo('Socio');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            //Obtenemos los usuarios
            $socios = $this->socioModelo->obtenerSocios();

            $this->datos['socio'] = $socios;

            $this->vista('socios/gestionSocios',$this->datos);
        }

        public function marcarRopa($id){

            $this->datos['rolesPermitidos'] = [4];

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/tienda');
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $equipacionNueva = [
                    'talla' => trim($_POST['talla']),
                    // 'fechaPeticion' => trim($_POST['fechaPeticion']),
                    'idUsuario' => $id,
                    // 'idIngresoCuotas' => trim($_POST['idIngresoCuotas']),
                    //'idOtrosGastos' => trim($_POST['idOtrosGastos']),
                    'idTienda' => $this->datos['usuarioSesion']->id_usuario,
                ];

                if ($this->socioModelo->marcarRopa($equipacionNueva)){
                    redireccionar('/socios');
                    
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['tienda'] = (object) [
                    'talla' => '',
                    'fechaPeticion' => '',
                    'idUsuario' => $id,
                    'idIngresoCuotas' => '',
                    'idOtrosGastos' => '',
                    'idTienda' => $this->datos['usuarioSesion']->id_usuario,
                ];

                

                $this->vista('socios/equipaciones',$this->datos);
            }
        }

    }
?>
