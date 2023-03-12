<?php


    class Producto{
        
        public $id;
        public $nombre;
        public $precio;
        //Categorias separadas por comas , para poder buscar luego sus categorias
        public $categoria;
        public $unidades;
        
        function __construct($id, $nombre, $precio, $categoria, $unidades){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->categoria = $categoria;
            $this->unidades = $unidades;
        
        }

        public static function save($producto){
            $db=Db::getConnect();
            $insert=$db->prepare('INSERT INTO producto values(Null, :nombre, :precio, :categoria, :unidades)');
            $insert->bindValue('nombre', $producto->nombre);
            $insert->bindValue('precio', $producto->precio);
            $insert->bindValue('categoria', $producto->categoria);
            $insert->bindValue('unidades', $producto->unidades);
            $insert->execute();
        }

        public static function update($producto){
            $db=Db::getConnect();
            $update=$db->prepare('UPDATE producto SET nombre=:nombre, precio=:precio, categoria=:categoria, unidades=:unidades where id=:id');
            $update->bindValue('id', $producto->id);
            $update->bindValue('nombre', $producto->nombre);
            $update->bindValue('precio', $producto->precio);
            $update->bindValue('categoria', $producto->categoria);
            $update->bindValue('unidades', $producto->unidades);
            $update->execute();
        }

        public static function delete($id){
            $db=Db::getConnect();
            $delete=$db->prepare('DELETE from producto where id=:id');
            $delete->bindValue('id',$id);
            $delete->execute();
        }

        public static function getById($id){
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM producto WHERE id=:id');
            $select->bindValue('id',$id);
            $select->execute();
            $productoDb=$select->fetch();
            //asignarlo al objeto usuario
            if($productoDb){
                $producto= new Producto($productoDb['id'],$productoDb['nombre'],$productoDb['precio'],$productoDb['categoria'],$productoDb['unidades']);
                return $producto;
            }else{
                return false;
            }
        }

        public static function getByNombre($nombre){
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM producto WHERE nombre=:nombre');
            $select->bindValue('nombre',$nombre);
            $select->execute();
            $productoDb=$select->fetch();
            //asignarlo al objeto usuario
            if($productoDb){
                //$producto= new Producto($productoDb['id'],$productoDb['nombre'],$productoDb['precio'],$productoDb['categoria'],$productoDb['unidades']);
                return $productoDb;
            }else{
                return false;
            }
        }

        public static function getLikeNombre($nombre){
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM producto WHERE nombre like :nombre');
            $select->bindValue('nombre','%'.$nombre.'%');
            $select->execute();
            $productos = array();
            foreach($select->fetchAll() as $fila){
                array_push($productos,new Producto($fila['id'], $fila['nombre'],$fila['precio'],$fila['categoria'],$fila['unidades']));
            }
            return $productos;
        }

        //Devuelve un array con todos los productos
        public static function getAll(){
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM producto');
            $select->execute();
            $productos = array();
            foreach($select->fetchAll() as $fila){
                array_push($productos,new Producto($fila['id'], $fila['nombre'],$fila['precio'],$fila['categoria'],$fila['unidades']));
            }
            return $productos;
        }

        //Devuelve un array de los productos por la categoria
        public static function getByCategoria($categoria){
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM producto where find_in_set(:categoria, categoria)>=1');
            $select->bindValue('categoria',$categoria);
            $select->execute();
            $productos = array();
            foreach($select->fetchAll() as $fila){
                array_push($productos,new Producto($fila['id'], $fila['nombre'],$fila['precio'],$fila['categoria'],$fila['unidades']));
            }
            return $productos;
        }
    }


?>