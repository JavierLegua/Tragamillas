<?php

    class Usuarios extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->usuarioModelo = $this->modelo('Usuario');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }

        public function obtenerrol(){
            $roles = $this->usuarioModelo->obtenerRoles();
            $this->vistaApi($roles);
        }

        public function index($pagina = 0){
            //Obtenemos los usuarios y paginamos

            $registrosPorPagina = 4;
            $pagina = intval($pagina + 1);
            $numUsuarios = $this->usuarioModelo->contarUsuarios();


            $numPagTotal = ceil($numUsuarios / $registrosPorPagina);

            $min = ($registrosPorPagina * $pagina) - ($registrosPorPagina);
            

            $usuarios = $this->usuarioModelo->obtenerUsuarios($min, $registrosPorPagina);

            $this->datos['usuario'] = $usuarios;
            $this->numPaginas = $numPagTotal;

            $this->vista('usuarios/inicio',$this->datos, $this->numPaginas);
        }


        public function agregar(){
            $this->datos['rolesPermitidos'] = [1];      // Definimos los roles que tendran acceso

            //prueba de cifrado de contraseña

            $pass = $_POST['clave'];

            $passCifrada = password_hash($pass, PASSWORD_BCRYPT);

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/usuarios');
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $usuarioNuevo = [
                    'apellidoUsuario' => trim($_POST['nombre']),
                    'dniUsuario' => trim($_POST['dni']),
                    'cc' => trim($_POST['cc']),
                    'fecha_nac' => trim($_POST['fecha_nac']),
                    'email' => trim($_POST['email']),
                    'clave' => trim($passCifrada),
                    'telefono' => trim($_POST['telefono']),
                    'activado' => trim(1),
                    'idRol' => trim($_POST['rol']),
                ];

                if ($this->usuarioModelo->agregarUsuario($usuarioNuevo)){
                    redireccionar('/usuarios');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['usuario'] = (object) [
                    'apellidoUsuario' => '',
                    'dniUsuario' => '',
                    'cc' => '',
                    'fecha_nac' => '',
                    'email' => '',
                    'clave' => '',
                    'telefono' => '',
                    'activado' => '',
                    'idRol' => ''
                ];

                $this->datos['listaRoles'] = $this->usuarioModelo->obtenerRoles();

                $this->vista('usuarios/inicio',$this->datos);
            }
        }


        public function editar($id){
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso
            
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/usuarios');
            }

            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $usuarioModificado = [
                    'id_usuario' => $id,
                    'apellidoUsuario' => trim($_POST['nombre']),
                    'dniUsuario' => trim($_POST['dni']),
                    'cc' => trim($_POST['cc']),
                    'fecha_nac' => trim($_POST['fecha_nac']),
                    'email' => trim($_POST['email']),
                    'telefono' => trim($_POST['telefono']),
                    'activado' => trim(1),

                ];

                

                if ($this->usuarioModelo->actualizarUsuario($usuarioModificado)){
                    redireccionar('/usuarios');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                
                //obtenemos información del usuario y el listado de roles desde del modelo
                $this->datos['usuario'] = $this->usuarioModelo->obtenerUsuarioId($id);
                $this->datos['listaRoles'] = $this->usuarioModelo->obtenerRoles();
                $this->vista('usuarios/agregar_editar',$this->datos);
               
            }
        }

        public function actualizar($id){
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso
            
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/usuarios');
            }

            $pass = $_POST['clave'];
            //$salt = mcrypt_create_iv(22, MCRYPT_DEV_URANDOM);

            $passCifrada = password_hash($pass, PASSWORD_BCRYPT);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $passModificada = [
                    'clave' => trim($passCifrada),
                    'id_usuario' => $id
                ];

                

                if ($this->usuarioModelo->actualizar($passModificada)){
                    redireccionar('/usuarios');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                
                //obtenemos información del usuario y el listado de roles desde del modelo
                $this->datos['usuario'] = $this->usuarioModelo->obtenerUsuarioId($id);
                $this->datos['listaRoles'] = $this->usuarioModelo->obtenerRoles();
                $this->vista('usuarios/actualizar',$this->datos);
               
            }
        }

        public function subirFoto($id){

            if($_SERVER['REQUEST_METHOD'] =='POST'){
    
                $dir="/var/www/html/Tragamillas/mvc_completo/public/img/datosBBDD/";
    
    
                move_uploaded_file($_FILES['imagenLicAdmin']['tmp_name'], $dir.$_FILES['imagenLicAdmin']['name']);

                //$id = $this->datos['usuarioSesion']->id_usuario;
    
                $fotoNueva = [
                    'imagen' => $_FILES['imagen']['name']
                ];

                if($this->usuarioModelo->agregarFoto($fotoNueva)){
                    // print_r($licenciaNueva);exit();
                    redireccionar('/perfiles');
                }else{
                    die('Algo ha fallado!!');
                }
        }


        public function borrar($id){
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->usuarioModelo->borrarUsuario($id)){
                    redireccionar('/usuarios');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                //obtenemos información del usuario desde del modelo
                $this->datos['usuario'] = $this->usuarioModelo->obtenerUsuarioId($id);

                $this->vista('usuarios/borrar',$this->datos);
            }
        }

        
        public function sesiones($id_usuario){
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                exit();
            }

            // En __construct() verificamos que se haya iniciado la sesion
            $sesiones = $this->usuarioModelo->obtenerSesionesUsuario($id_usuario);
            $usuario = $this->usuarioModelo->obtenerUsuarioId($id_usuario);

            // utilizamos $datos en lugar de $this->datos ya que no necesitamos los datos del usuario de sesion
            $datos['sesiones'] = $sesiones;
            $datos['usuario'] = $usuario;

            $this->vistaApi($datos);
        }


        public function cerrarSesion(){
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                exit();
            }
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id_sesion = $_POST['id_sesion'];
                
                $resultado = $this->usuarioModelo->cerrarSesion($id_sesion);

                unlink(session_save_path().'\\sess_'.$id_sesion);
                $this->vistaApi($resultado);
            }
        }
    }
