<?php

session_start();
$_SESSION['usuario_id'] = $usuario->id;
$_SESSION['usuario_nombre'] = $usuario->nombre;
$_SESSION['usuario_tipo'] = $usuario->tipo;

//Guardamos la infromacion extra independiente de si es cliente o administrador


if($usuario->tipo == 'cliente'){
    require_once('../models/pedido.php');
    $pedido=Pedido::getIncompleto($usuario->id);
    if($pedido){
        $_SESSION['id_pedido'] = $pedido->id;
        $_SESSION['productos'] = $pedido->productos;
    }else{
        $pedido = new Pedido(null,$usuario->id,date('Y-m-d'),"Incompleto",null);
        Pedido::save($pedido);
        $pedido = Pedido::getIncompleto($usuario->id);
        $_SESSION['id_pedido'] = $pedido->id;
        $_SESSION['productos'] = $pedido->productos;
    }
}


?>