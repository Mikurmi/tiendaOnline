<?php

class Administrador{
    
    public $id_us;
    public $cod_admin;

    //Constructor del administrador
    function __construct($id_us, $cod_admin){
        //El id se lo pasamos porque antes de introducirlo hacemos un getId de usuario
        $this->id_us = $id_us;
        $this->cod_admin = $cod_admin;
    }

    //la función para registrar un administrador
	public static function save($administrador){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO administrador VALUES(:id_us,:cod_admin)');
        $insert->bindValue('id_us',$administrador->id_us);
        $insert->bindValue('cod_admin',$administrador->cod_admin);
        $insert->execute();
    }

    //la función para actualizar 
	public static function update($administrador){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE administrador SET cod_admin=:cod_admin WHERE id_us=:id_us');
        $update->bindValue('id_us',$administrador->id_us);
        $update->bindValue('cod_admin',$administrador->cod_admin);
		$update->execute();
	}

    // la función para eliminar por el id
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM administrador WHERE id_us=:id_us');
		$delete->bindValue('id_us',$id);
		$delete->execute();
	}

    //la función para obtener un administrador por el id
	public static function getById($id_us){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM administrador WHERE id_us=:id_us');
		$select->bindValue('id_us',$id_us);
		$select->execute();
        if($select->fetchColumn()){
            //asignarlo al objeto administrador
            $administradorDb=$select->fetch();
            $administrador = new Administrador($administradorDb['id_us'],$administradorDb['cod_admin']);
            return $administrador;
        }else{
            return false;
        }
		
	}

}





?>