<?php

    class Tiendas extends Controlador{

        public function __construct(){
            Sesion::iniciarSesion($this->datos);
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/');
            }

            $this->tiendaModelo = $this->modelo('Tienda');

            $this->datos['menuActivo'] = 1;         // Definimos el menu que sera destacado en la vista
            
        }


        public function index(){
            //Obtenemos los usuarios
            $tiendas = $this->tiendaModelo->obtenerTiendas();

            $this->datos['tienda'] = $tiendas;

            $this->vista('tiendas/gestionTiendas',$this->datos);
        }


        public function agregarTienda(){
            
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso

            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/tiendas');
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $tiendaNuevo = [
                    'nombreUsuario' => trim($_POST['nombre']),
                    'apellidoUsuario' => trim($_POST['apellido']),
                    'dniUsuario' => trim($_POST['dni']),
                    'cc' => trim($_POST['cc']),
                    'fecha_nac' => trim($_POST['fecha_nac']),
                    'email' => trim($_POST['email']),
                    'clave' => trim($_POST['clave']),
                    'telefono' => trim($_POST['telefono']),
                    'activado' => 1,
                    'idRol' => 4,
                ];

                if ($this->tiendaModelo->agregarTienda($tiendaNuevo)){
                    redireccionar('/tiendas');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                $this->datos['tienda'] = (object) [
                    'nombreUsuario' => '',
                    'apellidoUsuario' => '',
                    'dniUsuario' => '',
                    'cc' => '',
                    'fecha_nac' => '',
                    'email' => '',
                    'clave' => '',
                    'telefono' => '',
                    'activado' => 1,
                    'idRol' => 4
                ];

                $this->datos['listaRoles'] = $this->tiendaModelo->obtenerRoles();

                $this->vista('tiendas/agregar_editar',$this->datos);
            }
        }


        public function editarTienda($id){
            
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso
            
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/tiendas');
            }
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $tiendaModificado = [
                    'id_usuario' => $id,
                    'nombreUsuario' => trim($_POST['nombre']),
                    'apellidoUsuario' => trim($_POST['apellido']),
                    'dniUsuario' => trim($_POST['dni']),
                    'cc' => trim($_POST['cc']),
                    'fecha_nac' => trim($_POST['fecha_nac']),
                    'email' => trim($_POST['email']),
                    'clave' => trim($_POST['clave']),
                    'telefono' => trim($_POST['telefono']),
                    'activado' => 1,
                    'idRol' => 4,
                ];

                

                if ($this->tiendaModelo->actualizarTienda($tiendaModificado)){
                    redireccionar('/tiendas');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                
                //obtenemos información del usuario y el listado de roles desde del modelo
                $this->datos['tienda'] = $this->tiendaModelo->obtenerTiendaId($id);
                $this->datos['listaRoles'] = $this->tiendaModelo->obtenerRoles();
                $this->vista('tiendas/agregar_editar',$this->datos);
               
            }
        }


        public function borrarTienda($id){
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if ($this->tiendaModelo->borrarTienda($id)){
                    redireccionar('/tiendas');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                //obtenemos información del usuario desde del modelo
                $this->datos['tienda'] = $this->tiendaModelo->obtenerTiendaId($id);

                $this->vista('tiendas/borrar',$this->datos);
            }
        }

        public function actualizarT($id){
            $this->datos['rolesPermitidos'] = [1];          // Definimos los roles que tendran acceso
            
            if (!tienePrivilegios($this->datos['usuarioSesion']->idRol,$this->datos['rolesPermitidos'])) {
                redireccionar('/tiendas');
            }

            $pass = $_POST['clave'];

            $passCifrada = password_hash($pass, PASSWORD_BCRYPT);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                $passModificada = [
                    'clave' => trim($passCifrada),
                    'id_usuario' => $id
                ];

                

                if ($this->tiendaModelo->actualizarT($passModificada)){
                    redireccionar('/tiendas');
                } else {
                    die('Algo ha fallado!!!');
                }
            } else {
                
                //obtenemos información del usuario y el listado de roles desde del modelo
                $this->vista('tiendas/gestionTiendas',$this->datos);
               
            }
        }

    }
