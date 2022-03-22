<?php
    class Inscripciones extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [3];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->inscripcionModelo = $this->modelo('Inscripcion');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }

        public function index(){
            //Obtenemos los grupos
            $inscripcion = $this->inscripcionModelo->obtenerGrupos($this->datos['usuarioSesion']->id_usuario);
            
            //print_r($inscripcion);exit;

            $grupos = [];
            
            
            for ($i=0; $i < count($inscripcion); $i++) { 
                $grupos[$i]=$inscripcion[$i]->idGrupo;
            }
            $ids = (string) '';
            foreach ($grupos as $id_grupo) {
                $ids .= $id_grupo.',';
            }
            $ids = trim($ids, ',');
            if ($ids == '') {
                $inscripciones = $this->inscripcionModelo->obtenerTodosGrupos();
            } else{
                 $inscripciones = $this->inscripcionModelo->obtenerGruposFinal($ids);
            }    
            $this->datos['inscripcion'] = $inscripciones;
            
            
            $this->vista('inscripciones/inicio',$this->datos);

            
        }
        
        public function agregarInscripcion($id){
            $this->datos['rolesPermitidos'] = [3];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/inscripciones');
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
                    //print_r($this->datos);exit();
                    $this->vista('socios/inicio',$this->datos);
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

                $this->vista('socios',$this->datos);
            }

        }
    }
?>