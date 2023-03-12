<?php

//esqueleto de UsuarioController, después rellenaremos las funciones de CRUD
class CategoriaController
	{	
		public function __construct(){}

        public function index(){
            require_once('categoria/index.php');
        }

        public function registrar(){
            require_once('categoria/anadir.php');
        }

        public function borrar(){
            require_once('categoria/borrar.php');
        }

		public function save($categoria){
            Categoria::save($categoria);
            echo "<script> alert('El categoria" . $categoria->nombre . " se ha subido con exito'); window.location.href='../views/administrador/index.php'; </script>";
		}

		public function delete($id){
            Categoria::delete($id);
            echo "<script> alert('El Categoria a sido eliminado con exito'); window.location.href='../views/administrador/index.php';</script>";
		}

		public function error(){
			require('views/producto/error.php');
		}
	}



	if(isset($_POST['action'])){
		$categoriaController = new CategoriaController();
		require_once('../models/categoria.php');
		require_once('../ddbb/connection.php');

        switch ($_POST['action']) {
            case 'registrar':
                if(Categoria::getByNombre($_POST['nombre']) == false){
                    $Categoria = new Categoria(null, $_POST['nombre']);
                    $categoriaController->save($Categoria);
                }else{
                    echo "<script> alert('La categoria ya existe'); window.location.href='../views/administrador/index.php';</script>";
                }
                break;

            case 'borrar':
                if(Categoria::getById($_POST['id'])){
                    $categoriaController->delete($_POST['id']);
                }else{
                    echo "<script> alert('La categoria no existe'); window.location.href='../views/administrador/index.php';</script>";
                }
                break;

            default:
                require_once('views/usuario/error.php');
                break;
        }
		
	}
?>