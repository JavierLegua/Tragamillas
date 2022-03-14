<?php
    class Licencias extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [1,3];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
            $this->licenciaModelo = $this->modelo('Licencia');
        }

        public function index(){

            
            if ($this->datos['usuarioSesion']->idRol == 1) {
                $this->datos['licencia'] = $this->licenciaModelo->obtenerLicencias();
                $this->vista('licencias/verLicencias',$this->datos);
            }elseif($this->datos['usuarioSesion']->idRol == 3){
                $this->vista('licencias/inicio',$this->datos);
            }
        }

        public function nueva_licencia(){
            

            // $this->datos['rolesPermitidos'] = [3];
            // if (!tienePrivilegios($this->datos['usuarioSesion']->id_rol, $this->datos['rolesPermitidos'])) {
            //     redireccionar('/usuarios');
            // }
    
            if($_SERVER['REQUEST_METHOD'] =='POST'){
    
                $dir="/var/www/html/Tragamillas/mvc_completo/public/img/datosBBDD/";
    
    
                move_uploaded_file($_FILES['imagenLicAdmin']['tmp_name'], $dir.$_FILES['imagenLicAdmin']['name']);

                $id = $this->datos['usuarioSesion']->id_usuario;
    
                $licenciaNueva = [
                    'id' => trim($id),
                    'num_lic' => trim($_POST['numlic']),
                    'tipo' => trim($_POST['tipo']),
                    'dorsal' => trim($_POST['dorsal']),
                    'fechaCad' => trim($_POST['fecha_cad']),
                    'imagenLicAdmin' => $_FILES['imagenLicAdmin']['name']
                ];

                
    
                if($this->licenciaModelo->agregarLicencia($licenciaNueva)){
                    // print_r($licenciaNueva);exit();
                    redireccionar('/licencias/inicio');
                }else{
                    die('Algo ha fallado!!');
                }
    
            }else{
    
                $this->vista('licencias/inicio',$this->datos);
            }
        }
        
        public function verLicencias(){
            $this->datos['licencia'] = $this->licenciaModelo->obtenerLicencias();
            $this->vista('licencias/verLicencias',$this->datos);

        }

        public function editar($num){
            // $this->datos['rolesPermitidos'] = [1];
            // if (!tienePrivilegios($this->datos['usuarioSesion']->id_rol, $this->datos['rolesPermitidos'])) {
            //     redireccionar('/licencias/verLicencias');
            // }

            if($_SERVER['REQUEST_METHOD'] =='POST'){
    
                $dir="/var/www/html/Tragamillas/mvc_completo/public/img/datosBBDD/";
    
    
                // move_uploaded_file($_FILES['imagenLic']['tmp_name'], $dir.$_FILES['imagenLic']['name']);

                $id = $this->datos['usuarioSesion']->id_usuario;
    
                $licenciaEditada = [
                    'tipo' => trim($_POST['tipo']),
                    'dorsal' => trim($_POST['dorsal']),
                    'fechaCad' => trim($_POST['fecha_cad']),
                    // 'imagenLicSocio' => $_FILES['imagenLic']['name']
                ];

                // print_r($licenciaEditada);exit();

                if($this->licenciaModelo->editarLicencia($licenciaEditada)){
                    redireccionar('/licencias');
                }else{
                    die('Algo ha fallado!!');
                }
    
            }else{
    
                $this->vista('licencias/verLicencias',$this->datos);
            }

        }

        public function borrar($num){

            if ($_SERVER['REQUEST_METHOD'] =='POST') {
                if ($this->licenciaModelo->borrarLicencia($num)) {
                    redireccionar('/licencias/verLicencias');
                }else{
                    die('Algo ha fallado');
                }
            }
        }
    }
?>
