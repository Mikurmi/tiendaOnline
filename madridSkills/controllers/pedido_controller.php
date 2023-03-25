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
            $id = $_SESSION['usuario_id'];
            $pedido = new Pedido(null,$id,date('Y-m-d'),"Incompleto","");
            Pedido::save($pedido);
            $pedido = Pedido::getIncompleto($id);
            $_SESSION['id_pedido'] = $pedido->id;
            $_SESSION['productos'] = $pedido->productos;
            echo "<script> alert('El pedido se ha realizado exito'); window.location.href='../index.php'; </script>";
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
                if($_SESSION['productos'] == ''){
                    $_SESSION['productos'] .=   $_POST['unidades'] . "-" . $_POST['producto'];
                }else{
                    $_SESSION['productos'] .=  "/" . $_POST['unidades'] . "-" . $_POST['producto'];
                }
                
                echo "<script>alert('Producto añadido con exito'); window.location.href='../views/cliente/index.php' </script>";
                break;

            case 'realizar':
                session_start();
                $pedido = new Pedido($_SESSION['id_pedido'],$_SESSION['usuario_id'],date('Y-m-d'),"Solicitado",$_SESSION['productos']);
                //Quitar unidades de los productos
                $precio = explode('/', $_SESSION['productos']);
                if($precio[count($precio)-1] == ""){
                    $fin = count($precio)-1;
                }else{
                    $fin = count($precio);
                }
                for($i = 0; $i < $fin; $i++){
                    $precio[$i] = explode('-', $precio[$i]);
                    Producto::quitarUnidades($precio[$i][1],$precio[$i][0]);
                }
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
		
	}else if(isset($_GET['action'])){
        $pedidoController = new PedidoController();
		require_once('../../models/pedido.php');
		require_once('../../ddbb/connection.php');
        switch($_GET['action']){
        case 'borrarProducto':
            session_start();
            //Producto a borrar
            $borrar = "/" . $_GET['unidades'] . "-" . $_GET['producto'];
            $longitud = strlen($borrar);
            //Si existe en entre los productos lo borramos del string
            $encontrado = strpos($_SESSION['productos'], $borrar);
            if($encontrado != false){
                $contenido;
                if($encontrado == 0){
                    $contenido = substr($_SESSION['productos'],$longitud);
                }else if($encontrado == (strlen($_SESSION['productos']) - $longitud)){
                    $contenido = substr($_SESSION['productos'], 0, (strlen($_SESSION['productos']) - $longitud));
                }else{
                    $contenido = substr($_SESSION['productos'], 0, (strlen($_SESSION['productos']) - $longitud));
                    $contenido .= substr($_SESSION['productos'], $encontrado+$longitud);
                }
                $_SESSION['productos']=$contenido;
                echo "<script>alert('Producto borrado con exito');
                alert('". $_SESSION['productos'] ."');
                window.location.href='../views/cliente/pedido/index.php' </script>";
            }else{
                echo "<script>alert('ERROR');</script>";
            }
            break;
        }
    }
?>