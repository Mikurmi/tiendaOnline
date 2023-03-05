<?php

/*
Conexión a la base de datos
*/
class Db
{
	private static $instance=NULL;
	
	private function __construct(){}

	private function __clone(){}
	
	public static function getConnect(){ //devuelve el objeto PDO si no existe conexión. En este caso getConnect es sin parámetros pero podríamos pasarle los parámetros del objeto si tenemos más de una BBDD. 
		if (!isset(self::$instance)) {
			$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION; //Atributo del objeto PDO para lanzar un error
			self::$instance= new PDO('mysql:host=localhost;dbname=tiendaonline','root','',$pdo_options);
		}
		return self::$instance; 
	}
}

?>