<?php
    class MarcasEventos extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [2];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
            $this->marcaEventoModelo = $this->modelo('MarcaEvento');

        }

        public function index(){
                 
            $marcas = $this->marcaEventoModelo->obtenerEventos();
                
            $this->datos['marca'] = $marcas;

            $this->vista('marcas/evento',$this->datos);
 
        }

        public function verParticipantes($id){
                 
            $participantes = $this->marcaEventoModelo->verParticipantes($id);
            $participantesExt = $this->marcaEventoModelo->verParticipantesExternos($id);  
            $this->datos['participante'] = $participantes;
            $this->datos['participanteExt'] = $participantesExt;

            $this->vista('marcas/eventoParticipantes',$this->datos);
 
        }

        public function agregarMarca($id){
            $this->datos['rolesPermitidos'] = [2];      // Definimos los roles que tendran acceso


            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/entrenadores');
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $marcaNueva = [
                    'marca' => trim($_POST['marca']),
                    'idEvento' => trim($_POST['idEvento']),
                    'idUsuario' => $id,
                ];
                //print_r($marcaNueva);exit;
                if ($this->marcaEventoModelo->agregarMarca($marcaNueva)){
                    redireccionar('/entrenadores');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['usuario'] = (object) [
                    'marca' => '',
                ];

                echo "ERROR";exit;

                //$this->datos['listaRoles'] = $this->usuarioModelo->obtenerRoles();

                //$this->vista('usuarios/inicio',$this->datos);
            }
        }

        public function agregarMarcaExt($dni){
            $this->datos['rolesPermitidos'] = [2];      // Definimos los roles que tendran acceso


            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/entrenadores');
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $marcaNueva = [
                    'marca' => trim($_POST['marca']),
                    'idEvento' => trim($_POST['idEvento']),
                    'dni' => $dni,
                ];
                //print_r($marcaNueva);exit;
                if ($this->marcaEventoModelo->agregarMarcaExt($marcaNueva)){
                    redireccionar('/entrenadores');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['usuario'] = (object) [
                    'marca' => '',
                ];

                echo "ERROR";exit;

                //$this->datos['listaRoles'] = $this->usuarioModelo->obtenerRoles();

                //$this->vista('usuarios/inicio',$this->datos);
            }
        }
    }
?>