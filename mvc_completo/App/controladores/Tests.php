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
            $tests = $this->testModelo->crearTest();

            $this->datos['test'] = $tests;

            $this->vista('test_inicio/inicio',$this->datos);
        }

        public function crearTest(){
            $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/entrenadores');
            }
            // print_r($this->datos);exit();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $inscripcionNueva = [
                    'aceptado' => 0,
                    'activo' => $this->datos['usuarioSesion']->activado,
                    'idGrupo' => $id,
                    'idUsuario' => $this->datos['usuarioSesion']->id_usuario,                    
                ];
                if ($this->inscripcionModelo->agregarInscripcion($inscripcionNueva)){
                    redireccionar('/inscripciones');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['inscripcion'] = (object) [
                    'fecha_inscrip' => '',
                    'aceptado' => 0,
                    'activado' => '',
                    'idGrupo' => '',
                    'idUsuario' => '',
                    
                ];
                $this->datos['listagrupos'] = $this->inscripcionModelo->obtenerGrupos();

                $this->vista('inscripciones/inicio',$this->datos);
            }

        }

    }
?>
