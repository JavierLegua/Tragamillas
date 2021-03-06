<?php

    class Alumnos extends Controlador{
        
        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->alumnoModelo = $this->modelo('Alumno');

            $this->testModelo = $this->modelo('Test');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }
        public function index(){
            //Obtenemos los usuarios
            $alumnos = $this->alumnoModelo->obtenerAlumnos($this->datos['usuarioSesion']->id_usuario);

            $this->datos['alumno'] = $alumnos;

            $this->vista('alumnos/inicio',$this->datos);
            
        }

        public function realizarTest($id){

            $this->datos['rolesPermitidos'] = [2];

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/entrenadores');
            }

            //print_r($this->datos);exit;

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $testCompleto = [
                    'idTest' => trim($_POST['testSelecionado']),
                    'idPrueba' => trim($_POST['idPrueba']),
                    // 'fechaPeticion' => trim($_POST['fechaPeticion']),
                    'idUsuario' => $id,
                    // 'idIngresoCuotas' => trim($_POST['idIngresoCuotas']),
                    // 'fecha' => trim($_POST['fecha']),
                    'marca' => trim($_POST['marca']),
                ];

                if ($this->alumnoModelo->realizarTest($testCompleto)){
                    redireccionar('/alumnos/inicio');
                    
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                
                $this->datos['test'] = (object) [
                    'idTest' => '',
                    'idPrueba' => '',
                    // 'fechaPeticion' => trim($_POST['fechaPeticion']),
                    'idUsuario' => $id,
                    // 'idIngresoCuotas' => trim($_POST['idIngresoCuotas']),
                    'fecha' => '',
                    'marca' => '',
                ];
                $test = $this->testModelo->obtenerTests();

                $this->datos['test'] = $test;
                //print_r($this->datos['test'][0]->idTest);exit;
                $this->datos['idSeleccionado'] = $id;
                $this->vista('alumnos/test_inicio',$this->datos);
            }
        }

        public function verPruebas($id){

            $this->datos['rolesPermitidos'] = [2];

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/entrenadores');
            }

            //print_r($this->datos['usuarioSesion']);exit;

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $test = [
                    'idTest' => trim($_POST['idTest']),
                ];
                
                
                if ($this->testModelo->obtenerPruebasTest($test['idTest'])){
                    $this->datos['pruebas'] = $this->testModelo->obtenerPruebasTest($test['idTest']);
                    $this->datos['idSeleccionado'] = $id;
                    $this->datos['testSeleccionado'] = $test['idTest'];

                    $this->vista('alumnos/test',$this->datos);
                    
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                
                echo"error";exit;

            }
        }
    }    
?>
