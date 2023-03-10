<?php

//esqueleto de UsuarioController, después rellenaremos las funciones de CRUD
class UsuarioController
	{	
		public function __construct(){}

		public function index(){
			require_once('views/producto/mostrar.php');
		}

		public function inicio(){
            //Función que require la vista para iniciar sesion
			require_once('views/usuarios/inicio_sesion.php');
		}

		public function registro(){
			require_once('views/usuarios/registrar.php');
		}

		public function save($usuario){
			if(Usuario::getUsuarioBD($usuario->nombre, $usuario->contra) == false){
				Usuario::save($usuario);
				if($usuario->tipo == 'cliente'){
					//Creamos objeto cliente y lo guardamos
					require_once('../models/cliente.php');
					$id_us = Usuario::getUsuarioBD($usuario->nombre, $usuario->contra)->id;
					$cliente = new Cliente($id_us, $_POST['apellidos'], $_POST['genero'], $_POST['fecha_nac'], $_POST['telefono'], $_POST['email'], $_POST['direccion'], $_POST['tipo_ident'], $_POST['identificador']);
					Cliente::save($cliente);
				}else{
					//Creamos el objeto administrador y lo guardamos
					require_once('../models/administrador.php');
					$id_us = Usuario::getUsuarioBD($usuario->nombre, $usuario->contra)->id;
					$admin = new Administrador($id_us,$_POST['cod_admin']);
					Administrador::save($admin);
				}
			}else{
				echo "<script>alert('Usuario ya registrado');</script>";
			}
		}

		public function update($usuario){
			Usuario::update($usuario);
			header('Location: ../index.php');
		}

		public function delete($id){
			require_once('../models/usuario.php');
			$usuario = Usuario::getById($id);
			if($usuario->tipo == 'cliente'){
				require_once('../models/cliente.php');
				Usuario::delete($id);
				Cliente::delete($id);
				header('Location: ../index.php');
			}else{
				echo "<script> alert('No tienes permiso para borrar un administrador'); </script>";
			}
			
		}

		public function error(){
			require('views/usuarios/error.php');
		}
	}

	if(isset($_POST['action'])){
		$usuarioController = new UsuarioController();
		require_once('../models/usuario.php');
		require_once('../ddbb/connection.php');

		if($_POST['action'] == 'registro'){
			$usuario = new Usuario(null, $_POST['nombre'], $_POST['contra'], $_POST['tipo']);
			$usuarioController->save($usuario);
			header('Location: ../index.php?controller=usuario&action=inicio');
		}elseif($_POST['action'] == 'inicio'){
			$usuario = Usuario::getUsuarioBD($_POST['nombre'], $_POST['contra']);
			//Si el usuario existe comprobamos si es cliente o admin
			if($usuario){
				//Requimos el model correspondiente
				require_once('../models/'.$usuario->tipo.'.php');
				if($usuario->tipo == 'cliente'){
					$extra = Cliente::getById($usuario->id);
				}else{
					$extra = Administrador::getById($usuario->id);
				}
				if($extra){
					require_once('../sesion/inicio.php');
					header('Location: ../views/'.$usuario->tipo.'/index.php');
				}else{
					echo "<script> alert('No existe'); window.location.href='../index.php';</script>";
				}
			}else{
				echo "<script> alert('No existe'); window.location.href='../index.php'; </script>";
			}
		}
	}


	if(isset($_GET['action'])){
		if($_GET['action'] != 'registro' & $_GET['action'] != 'inicio'){
			require_once('../ddbb/connection.php');
			$usuarioController=new UsuarioController();
			if ($_GET['action']=='delete') {		
				$usuarioController->delete($_GET['id']);
			}
		}
	}
?>