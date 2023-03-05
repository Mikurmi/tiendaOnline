<?php 
	 require_once('ddbb/connection.php'); //conexión a la base de datos
	// la variable controller guarda el nombre del controlador y action guarda la acción que se vaya a realizar(por ejemplo registrar) 

	//si la variable controller y action son pasadas por la url desde layout.php entran en el if
	if (isset($_GET['controller'])&&isset($_GET['action'])) {
		$controller=$_GET['controller'];//variable para el controlador
		$action=$_GET['action'];//variable para la acción
	}else{
		$controller = 'usuario';
		$action = 'index';
	}

	//carga la vista layout.php
		require_once('views/layout.php');
?>