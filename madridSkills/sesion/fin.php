<?php

session_start();
require_once('../models/usuario.php');
$tipo = $_SESSION['usuario_tipo'];
$id = $_SESSION['usuario_id'];
if($tipo == 'cliente'){
    require_once('../models/pedido.php');
    require_once('../ddbb/connection.php');
    $pedido = new Pedido($_SESSION['id_pedido'],$id,date('Y-m-d'),"Incompleto",$_SESSION['productos']);
    Pedido::update($pedido);
}
session_destroy();
header('Location: ../index.php');

?>