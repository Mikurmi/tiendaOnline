<?php

//esqueleto de UsuarioController, después rellenaremos las funciones de CRUD
class UsuarioController
	{	
		public function __construct(){}

		public function index(){
			echo "Productos";
		}

		public function inicio(){
            //Función que require la vista para iniciar sesion
			require_once('views/usuarios/inicio_sesion.php');
		}

		public function registro(){
			require_once('views/usuarios/registrar.php');
		}

		public function save($usuario){
			Usuario::save($usuario);
			header('Location: ../index.php');
		}

		public function update($usuario){
			Usuario::update($usuario);
			header('Location: ../index.php');
		}

		public function delete($id){
			require_once('../models/usuario.php');
			$usuario = Usuario::getById($id);
			if($usuario->tipo == 'cliente'){
				Usuario::delete($id);
				header('Location: ../index.php');
			}else{
				echo "No tienes permiso para borrar un administrador";
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
			/*
			if($usuario->tipo == 'cliente'){
				Creamos objeto cliente y lo guardamos
			}else{
				Creamos el objeto administrador y lo guardamos
			}
			*/
		}elseif($_POST['action'] == 'inicio'){
			$usuario = Usuario::getUsuarioBD($_POST['nombre'], $_POST['contra']);
			/*
			if($usuario->tipo == 'cliente'){
				$extra = Cliente::getById($usuario->id);
			}else{
				$extra = Administrador::getById($usuario->id);
			}
			*/
			require_once('../sesion/inicio.php');
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