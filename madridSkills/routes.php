<?php 
/*
función que llama al controlador y su respectiva acción, que son pasados como parámetros.
En el array $controllers van todos los controladores que necesitemos, en este ejemplo, 
solo hay usuario. Las acciones de cada controlador van en $action: mostrar registros (index),
insertar registro (register) y así para todos los métodos CRUD.
*/	
function call($controller, $action){
    //importa el controlador desde la carpeta Controllers (usuario_controller.php lo crearemos después)
    require_once('controllers/' . $controller . '_controller.php');
    //crea el controlador
    switch($controller){ //se añadirían los demás controladores al switch, por el momento solo tenemos el controlador de usuario, iremos añadiendo según aumentemos el código
        case 'usuario':
            require_once('models/usuario.php'); //en este archivo configuraremos el acceso a la base de datos y funciones CRUD de usuario
            $controller= new UsuarioController(); //instancia de UsuarioController (de usuario_controller.php)
            break; 
    }
    //llama a la acción del controlador (método)
    $controller->{$action }();
}
/*
array con los controladores y sus respectivas acciones.
De moemento solo tenemos las de usuario, según se amplie el código vamos a ir implementando los controllers y sus acciones
*/
$controllers= array(
    'usuario'=>['inicio','registro','index']
    );
/*
verifica si la variable $controller que viene desde index.php se encuentra en el array 
$controllers, si la encuentra, verifica con la función in_array que exista la acción dentro
 del array (esta acción puede ser index, register, etc..). Verifica que el controlador enviado
  desde index.php esté dentro del array controllers
*/

if (array_key_exists($controller, $controllers)) {
    
    if (in_array($action, $controllers[$controller])) {
        //llama  la función call y le pasa el controlador y la acción (método) que está dentro del controlador
        call($controller, $action);
    }else{
        call('usuario', 'error');
    }
}else{// le pasa el nombre del controlador y la pagina de error
    call('usuario', 'error');
}
?>