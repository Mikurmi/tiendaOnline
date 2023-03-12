<?php

//esqueleto de UsuarioController, después rellenaremos las funciones de CRUD
class PedidoController
	{	
		public function __construct(){}

        //Para llamar a las vistas
        public function index(){
            require_once('pedido/index.php');
        }

        public function buscarFecha(){
            require_once('pedido/buscarFecha.php');
        }

        public function buscarIdus(){
            require_once('pedido/buscarIdus.php');
        }

        public function cambiar(){
            require_once('pedido/cambiar.php');
        }

        //Funciones para hacer con los objetos
		public function save($pedido){
            Pedido::update($pedido);
            session_start();
            $usuario = $_SESSION['usuario'];
            $pedido = new Pedido(null,$usuario->id,date('Y-m-d'),"incompleto","");
            Pedido::save($pedido);
            $pedido = Pedido::getIncompleto($usuario->id);
            $_SESSION['id_pedido'] = $pedido->id;
            $_SESSION['productos'] = $pedido->productos;
            echo "<script> alert('El pedido se ha realizado exito'); </script>";
		}

		public function update($pedido){
            Pedido::update($pedido);
            echo "<script> alert('El cambio se ha realizado con exito');window.location.href='../views/administrador/index.php'; </script>";
		}

		public function error(){
			require('views/producto/error.php');
		}
	}



	if(isset($_POST['action'])){
		$pedidoController = new PedidoController();
		require_once('../models/pedido.php');
		require_once('../ddbb/connection.php');
        switch ($_POST['action']) {

            case 'anadirProducto':
                session_start();
                $_SESSION['productos'] .= "/" . $_POST['unidades'] . "-" . $_POST['producto'];
                break;

            case 'borrarProducto':
                session_start();
                //Producto a borrar
                $borrar = "/" . $_POST['unidades'] . "-" . $_POST['producto'];
                $longitud = strlen($borrar);
                //Si existe en entre los productos lo borramos del string
                if(array_search($borrar,$_SESSION['productos'])){
                    //1-String de donde borramos, 2-Texto nuevo, 3-Inicio a borrar, 4-Longitud
                    substr_replace($_SESSION['productos'],"",strpos($_SESSION['productos'],$borrar),$longitud);
                }
                break;

            case 'realizar':
                session_start();
                $pedido = new Pedido($_SESSION['id_pedido'],$_SESSION['usuario']->id,date('Y-m-d'),"Solicitado",$_SESSION['productos']);
                $pedidoController->save($pedido);
                break;

            case 'cambiar':
                $pedido = Pedido::getById($_POST['id']);
                if($pedido){
                    $pedido->estado=$_POST['estado'];
                    $pedidoController->update($pedido);
                }else{
                    echo "<script> alert('Ese pedido no existe'); </script>";
                }
                break;
            default:
                require_once('../views/usuarios/error.php');
                break;
        }
		
	}
?>