<?php

//esqueleto de UsuarioController, después rellenaremos las funciones de CRUD
class ProductoController
	{	
		public function __construct(){}

        //Para llamar a las vistas
        public function index(){
            require_once('producto/index.php');
        }

        public function registrar(){
            require_once('producto/anadir.php');
        }

        public function borrar(){
            require_once('producto/borrar.php');
        }

        public function actualizar(){
            require_once('producto/actualizar.php');
        }

        //Funciones para hacer con los objetos
		public function save($producto){
            Producto::save($producto);
            echo "<script> alert('El producto " . $producto->nombre . " se ha subido con exito'); window.location.href='../views/administrador/index.php';</script>";
		}

		public function update($producto){
            Producto::update($producto);
            echo "<script> alert('El producto " . $producto->nombre . " se ha actualizado con exito');window.location.href='../views/administrador/index.php'; </script>";
		}

		public function delete($id){
            Producto::delete($id);
            echo "<script> alert('El producto a sido eliminado con exito'); window.location.href='../views/administrador/index.php';</script>";
		}

		public function error(){
			require('views/producto/error.php');
		}
	}



	if(isset($_POST['action'])){
		$productoController = new ProductoController();
		require_once('../models/producto.php');
		require_once('../ddbb/connection.php');

        switch ($_POST['action']) {
            case 'actualizar':
                $productoA = Producto::getByNombre($_POST['nombreA']);
                if($productoA){
                    $producto = new Producto($productoA->id, $_POST['nombre'], $_POST['precio'], $_POST['categoria'], $_POST['unidades']);
                    if($_POST['nombre'] == ""){
                        $producto->nombre = $productoA->nombre;
                    }
                    if($_POST['precio'] == ""){
                        $producto->precio = $productoA->precio;
                    }
                    if($_POST['categoria'] == ""){
                        $producto->categoria = $productoA->categoria;
                    }else{
                        $categorias = explode(',',$_POST['categoria']);
                        echo "<script> alert('". $categorias[0]."');</script>";
                        $esta = false;
                        for($i = 0; $i < count($categorias); $i++){
                            require_once("../models/categoria.php");
                            if(Categoria::getByNombre($categorias[$i]) == false){
                                $esta == true;
                                break;
                            }
                        }
                    }
                    if($_POST['unidades'] == ""){
                        $producto->unidades = $productoA->unidades;
                    }
                    if($esta == false){
                        $productoController->update($producto);
                    }else{
                        echo "<script> alert('Alguna categoria no esta registrada'); window.location.href='../views/administrador/index.php';</script>";
                    }
                    
                }else{
                    echo "<script> alert('El producto no existe'); window.location.href='../views/administrador/index.php';</script>";
                }
                break;
            
            case 'registrar':
                if(Producto::getByNombre($_POST['nombre']) == false){
                    $categorias = explode(',',$_POST['categoria']);
                    $esta = false;
                    for($i = 0; $i < count($categorias); $i++){
                        require_once("../models/categoria.php");
                        if(Categoria::getByNombre($categorias[$i]) == false){
                            $esta == true;
                            break;
                        }
                    }
                    if($esta == false){
                        $producto = new Producto(null, $_POST['nombre'], $_POST['precio'], $_POST['categoria'], $_POST['unidades']);
                        $productoController->save($producto);
                    }else{
                        echo "<script> alert('Alguna categoria no esta registrada'); window.location.href='../views/administrador/index.php';</script>";
                    }
                }else{
                    echo "<script> alert('El producto ya existe'); window.location.href='../views/administrador/index.php';</script>";
                }
                break;

            case 'borrar':
                if(Producto::getById($_POST['id'])){
                    $productoController->delete($_POST['id']);
                }else{
                    echo "<script> alert('El producto no existe'); window.location.href='../views/administrador/index.php';</script>";
                }
                break;

            default:
                require_once('views/usuario/error.php');
                break;
        }
		
	}
?>