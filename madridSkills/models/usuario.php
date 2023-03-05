<?php 
/*
    Funcionamiento CRUD de los usuarios
*/

class Usuario{

    public $id;
    public $nombre;
    public $contra;
    public $tipo;

    //Contructor de usuarios
    function __construct($id, $nombre, $contra, $tipo){
        $this->id = $id;
        $this->nombre = $nombre;
        //Encriptar contraseña
        $this->contra = $contra;
        $this->tipo = $tipo;
    }

    //la función para registrar un usuario
	public static function save($usuario){
        $db=Db::getConnect();
        $insert=$db->prepare('INSERT INTO USUARIOS VALUES(NULL,:nombre, :contra, :tipo)');
        $insert->bindValue('nombre',$usuario->nombre);
        $insert->bindValue('contra',$usuario->contra);
        $insert->bindValue('tipo',$usuario->tipo);
        $insert->execute();
    }

    //la función para actualizar 
	public static function update($usuario){
		$db=Db::getConnect();
		$update=$db->prepare('UPDATE usuarios SET nombre=:nombre, contra=:contra WHERE id=:id');
		$update->bindValue('id',$usuario->id);
		$update->bindValue('nombre',$usuario->nombre);
		$update->bindValue('contra',$usuario->contra);
		$update->execute();
	}

    // la función para eliminar por el id
	public static function delete($id){
		$db=Db::getConnect();
		$delete=$db->prepare('DELETE FROM usuarios WHERE Id=:id');
		$delete->bindValue('id',$id);
		$delete->execute();
	}

    //la función para obtener un usuario sin id
    public static function getUsuarioBD($nombre, $contra){
        //Encriptar contraseña antes de la sentencia SQL
        //$contra = 
        $db=Db::getConnect();
        $select=$db->prepare('SELECT * FROM usuarios WHERE nombre=:nombre and contra=:contra');
        $select->bindValue('nombre',$nombre);
        $select->bindValue('contra',$contra);
        $select->execute();
        //$select->fetchColumn() Devuelve el numero de columnas afectadas por la ejecución
        if($select->fetchColumn()){
            //asignarlo al objeto usuario
            $usuarioDb=$select->fetch();
            $usuario= new Usuario($usuarioDb['id'],$usuarioDb['nombre'],$usuarioDb['contra'],$usuarioDb['tipo']);
            return $usuario;
        }else{
            echo "Usuario no encontrado";
        }
        
    }

    //la función para obtener un usuario por el id
	public static function getById($id){
		//buscar
		$db=Db::getConnect();
		$select=$db->prepare('SELECT * FROM usuarios WHERE ID=:id');
		$select->bindValue('id',$id);
		$select->execute();
		//asignarlo al objeto usuario
		if($select->fetchColumn()){
            //asignarlo al objeto usuario
            $usuarioDb=$select->fetch();
            $usuario= new Usuario($usuarioDb['id'],$usuarioDb['nombre'],$usuarioDb['contra'],$usuarioDb['tipo']);
            return $usuario;
        }else{
            echo "Usuario no encontrado";
        }
	}



}
?>