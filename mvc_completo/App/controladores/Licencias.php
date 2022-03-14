<?php
    class Licencia extends Controlador{

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

            // $usuarios = $this->usuarioModelo->obtenerUsuarios();

            // $this->datos['usuario'] = $usuarios;

            $this->vista('licencias/inicio',$this->datos);

        }

        public function nueva_licencia(){
            $this->datos['rolesPermitidos'] = [3];
            if (!tienePrivilegios($this->datos['usuarioSesion']->id_rol, $this->datos['rolesPermitidos'])) {
                redireccionar('/usuarios');
            }
    
            if($_SERVER['REQUEST_METHOD'] =='POST'){
    
                $dir="/var/www/html/tragamillas/public/img/datosBBDD/";
    
    
                move_uploaded_file($_FILES['imagenLicAdmin']['tmp_name'], $dir.$_FILES['imagenLicAdmin']['name']);
    
                $licenciaNueva = [
                    'num_lic' => trim($_POST['numlic']),
                    'tipo' => trim($_POST['tipo']),
                    'dorsal' => trim($_POST['dorsal']),
                    'fechaCad' => trim($_POST['fecha_cad']),
                    'imagenLicAdmin' => $_FILES['imagenLicAdmin']['name']
                ];
    
                if($this->licenciaModelo->agregarLicencia($licenciaNueva)){
                    redireccionar('/licencias');
                }else{
                    die('Algo ha fallado!!');
                }
    
            }else{
    
                $this->vista('licencias',$this->datos);
            }
        }

?>