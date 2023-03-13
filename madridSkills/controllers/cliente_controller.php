<?php

//esqueleto de UsuarioController, después rellenaremos las funciones de CRUD
class ClienteController
	{	
		public function __construct(){}

        //Para llamar a las vistas

        public function index(){
            require_once('producto/mostrar.php');
        }

        public function datos(){
            require_once('datos/mostrar.php');
        }

        public function actualizar(){
            require_once('datos/actualizar.php');
        }

		public function update($cliente){
            Cliente::update($cliente);
		}

        public function delete($id){
            Cliente::delete($id);
            require_once('../models/usuario.php');
            Usuario::delete($id);
		}
		public function error(){
			require('views/producto/error.php');
		}
	}



	if(isset($_POST['action'])){
		$clienteController = new ClienteController();
		require_once('../models/cliente.php');
		require_once('../ddbb/connection.php');

        switch ($_POST['action']) {
            case 'actualizar':
                $cliente = new Cliente($_POST['id_us'],$_POST['apellidos'],$_POST['genero'], $_POST['fecha_nac'], $_POST['telefono'], $_POST['email'], $_POST['direccion'], $_POST['tipo_ident'], $_POST['identificador']);
                $clienteController->update($cliente);
                echo "<script>alert('Datos actualziados correctamente'); window.location.href='../views/cliente/index.php'; </script>";
                break;

            default:
                require_once('views/usuario/error.php');
                break;
        }
		
	}else if(isset($_GET['action'])){
        $clienteController = new ClienteController();
		require_once('../models/cliente.php');
		require_once('../ddbb/connection.php');
        switch($_GET['action']){
            case 'borrar':
                session_start();
                $clienteController->delete($_SESSION['usuario']->id);
                header('../index');
                break;
        }
    }
?>