<?php

session_start();
$_SESSION['usuario'] = $usuario;
//Guardamos la infromacion extra independiente de si es cliente o administrador
$_SESSION['extra'] = $extra


?>