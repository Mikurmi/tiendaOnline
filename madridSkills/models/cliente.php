<?php

class Cliente{
    
    public $id_us;
    public $apellidos;
    public $genero;
    public $fecha_nac;
    public $telefono;
    public $email;
    public $direccion;
    public $tipo_ident;
    public $identificador;

    function __construct($id_us,$apellidos,$genero, $fecha_nac, $telefono, $email, $direccion, $tipo_ident ,$identificador){
        $this->id_us = $id_us;
        $this->apellidos = $apellidos;
        $this->genero = $genero;
        $this->fecha_nac = $fecha_nac;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->direccion = $direccion ;
        $this->tipo_ident = $tipo_ident ;
        $this->identificador = $identificador ;
    }

    public static function save($cliente){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO cliente VALUES(:id_us, :apellidos, :genero, :fecha_nac, :telefono, :email, :direccion, :tipo_ident, :identificador)');
        $insert->bindVAlue('id_us',$cliente->id_us);
        $insert->bindVAlue('apellidos',$cliente->apellidos);
        $insert->bindVAlue('genero',$cliente->genero);
        $insert->bindVAlue('fecha_nac',$cliente->fecha_nac);
        $insert->bindVAlue('telefono',$cliente->telefono);
        $insert->bindValue('email',$cliente->email);
        $insert->bindVAlue('direccion',$cliente->direccion);
        $insert->bindVAlue('tipo_ident',$cliente->tipo_ident);
        $insert->bindVAlue('identificador',$cliente->identificador);
        $insert->execute();
    }

    public static function update($cliente){
        $db=Db::getConnect();
        $insert=$db->prepare('UPDATE cliente apellidos=:apellidos, apellidos=:genero, fecha_nac=:fecha_nac, telefono=:telefono, email=:email, direccion=:direccion, tipo_ident=:tipo_ident, identificador=:identificador where id_us=:id_us');
        $insert->bindVAlue('id_us',$cliente->id_us);
        $insert->bindVAlue('apellidos',$cliente->apellidos);
        $insert->bindVAlue('genero',$cliente->genero);
        $insert->bindVAlue('fecha_nac',$cliente->fecha_nac);
        $insert->bindVAlue('telefono',$cliente->telefono);
        $insert->bindValue('email',$cliente->email);
        $insert->bindVAlue('direccion',$cliente->direccion);
        $insert->bindVAlue('tipo_ident',$cliente->tipo_ident);
        $insert->bindVAlue('identificador',$cliente->identificador);
        $insert->execute();
    }

    public static function delete($id_us){
        $db=DB::getConnect();
        $insert=$db->prepare('DELETE FROM clientes where id_us:id_us');
        $insert->bindValue('id_us',$id_us);
        $insert->execute();
    }


    //la función para obtener un usuario por el id
	public static function getById($id_us){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM cliente WHERE id_us=:id_us');
		$select->bindValue('id_us',$id_us);
		$select->execute();
		//asignarlo al objeto usuario
		if($select->fetchColumn()){
            //asignarlo al objeto usuario
            $clienteDb=$select->fetch();
            $cliente= new Cliente($clienteDb['id_us'],$clienteDb['apellidos'],$clienteDb['genero'],$clienteDb['fecha_nac'],$clienteDb['telefono'],$clienteDb['email'],$clienteDb['direccion'],$clienteDb['tipo_ident'], $clienteDb['identificador']);
            return $cliente;
        }else{
            return false;
        }
	}

}




?>