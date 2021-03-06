<?php
    class InscripcionesEventosExt extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [2,5];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->inscripcionEventoExtModelo = $this->modelo('InscripcionEventoExt');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }

        public function index(){
            //Obtenemos los grupos

            $inscripcionesEventoExt = $this->inscripcionEventoExtModelo->obtenerTodosEventos();
            $fecha_actual = getdate();
            $fecha_actual = date("Y-m-d");
            $cont = 0;
            foreach ($inscripcionesEventoExt as $evt) {
                
                if ($evt->fecha_ini_even > $fecha_actual) {
                    $ins_evt[$cont] = $evt;
                }
                $cont++;
            }
            $this->datos['inscripcionEvento'] = $ins_evt;
            //print_r($ins_evt);exit;
                
            $this->vista('inscripciones/eventos_invitado',$this->datos);

        }
        
        public function agregarInscripcion($id){
            $this->datos['rolesPermitidos'] = [5];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inscripcionesEventoExt');
            }
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $inscripcionNueva = [
                    'apellidoUsuario' => trim($_POST['apellidoUsuario']),
                    'dni' => trim($_POST['dni']),
                    'cc' => trim($_POST['cc']),
                    'fecha_nac' => trim($_POST['fecha_nac']),
                    'email' => trim($_POST['email']),
                    'telefono' => trim($_POST['telefono']),
                    'idEvento' => $id,                     
                ];
                //print_r($inscripcionNueva);exit();
                if ($this->inscripcionEventoExtModelo->agregarInscripcion($inscripcionNueva)){
                    //$this->vista('inscripciones/inicio',$this->datos);
                    redireccionar('/inscripciones');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['inscripcion'] = (object) [
                    'apellidoUsuario' => '',
                    'dni' => '',
                    'cc' => '',
                    'fecha_nac' => '',
                    'email' => '',
                    'telefono' => '',
                    'idEvento' => $id,                     
                ];
                $this->vista('inscripciones/inicio_ext',$this->datos);
            }

        }

        // public function aceptarEvento($id, $idUsuario){
        //     $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

        //     if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
        //         redireccionar('/inscripcionesEvento');
        //     }
        //     // print_r($this->datos);exit();
        //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //         $inscripcion = [
        //             'idUsuario' => $idUsuario,
        //             'idEvento' => $id,
        //             'aceptado' => 1,                      
        //         ];
        //         if ($this->inscripcionEventoModelo->aceptarEvento($inscripcion)){
        //             //$this->vista('inscripciones/inicio',$this->datos);
        //             redireccionar('/inscripcionesEventos');
        //         } else {
        //             die('Algo ha fallado!!!');
        //         }
        //     } else {
        //         $this->datos['inscripcion'] = (object) [
        //             'idUsuario' => '',
        //             'idEvento' => '',
        //         ];
        //         $this->vista('inscripciones/inicio',$this->datos);
        //     }

        // }

        // public function cancelarEvento($id, $idUsuario){
        //     $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

        //     if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
        //         redireccionar('/inscripcionesEvento');
        //     }
        //     // print_r($this->datos);exit();
        //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //         $inscripcion = [
        //             'idUsuario' => $idUsuario,
        //             'idEvento' => $id,
        //             'aceptado' => 0,                      
        //         ];
        //         if ($this->inscripcionEventoModelo->aceptarEvento($inscripcion)){
        //             //$this->vista('inscripciones/inicio',$this->datos);
        //             redireccionar('/inscripcionesEventos');
        //         } else {
        //             die('Algo ha fallado!!!');
        //         }
        //     } else {
        //         $this->datos['inscripcion'] = (object) [
        //             'idUsuario' => '',
        //             'idEvento' => '',
        //         ];
        //         $this->vista('inscripciones/inicio',$this->datos);
        //     }

        // }

    }
?>