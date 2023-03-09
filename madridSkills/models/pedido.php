<?php

    class Pedido{
        
        public $id;
        public $id_us;
        public $fecha;
        public $precio;
        public $estado;
        public $productos;

        function __construct($id, $id_us, $fecha, $estado, $productos){
            $this->id = $id;
            $this->id_us = $id_us;
            $this->fecha = $fecha;
            $this->precio = Pedido::getPrecio($productos);
            $this->estado = $estado;
            $this->productos = $productos;
        }

        public static function getPrecio($productos){
            require_once('productos.php');
            $total = 0;
            $precio = explode('/', $productos);
            for($i = 0; $i < count($precio); $i++){
                $precio[$i] = explode('-', $precio[$i]);
                $precio[$i][1]= Producto::getByNombre($precio[$i][1])->precio;
                $total = $total + ($precio[$i][0] * $precio[$i][1]);
            }
            return $total;
        }


        public static function save($pedido){
            $db=Db::getConnect();
            $insert=$db->prepare('INSERT INTO pedido VALUES(null, :id_us, :fecha, :precio, :estado, :productos)');
            $insert->bindValue('id_us', $pedido->id_us);
            $insert->bindValue('fecha', $pedido->fecha);
            $insert->bindValue('precio', $pedido->precio);
            $insert->bindValue('estado', $pedido->estado);
            $insert->bindValue('productos', $pedido->productos);
            $insert->execute();
        }

        public static function update($pedido){
            $db=Db::getConnect();
            $update=$db->prepare('UPDATE pedido SET id_us=:id_us, fecha=:fecha, precio=:precio, estado=:estado, productos=:productos)');
            $update->bindValue('id_us', $pedido->id_us);
            $update->bindValue('fecha', $pedido->fecha);
            $update->bindValue('pedido', $pedido->precio);
            $update->bindValue('estado', $pedido->estado);
            $update->bindValue('productos', $pedido->productos);
            $update->execute();
        }

        public static function delete($id){
            $db=Db::getConnect();
            $delete=$db->prepare('DELETE FrOM pedido where id=:id');
            $delete->bindValue('id', $id);
            $delete->execute();
        }

        public static function getById($id){
            //buscar
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM producto WHERE id=:id');
            $select->bindValue('id',$id);
            $select->execute();
            //asignarlo al objeto usuario
            if($select->fetchColumn()){
                //asignarlo al objeto usuario
                $productoDb=$select->fetch();
                $producto= new Producto($productoDb['id'],$productoDb['id_us'],$productoDb['fecha'], $productoDb['estado'], $productoDb['productos']);
                return $producto;
            }else{
                echo "Producto no encontrado";
            }
        }

        public static function getById_us($id_us){
            //buscar
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM producto WHERE id_us=:id_us');
            $select->bindValue('id_us',$id_us);
            $select->execute();
            //asignarlo al objeto usuario
            if($select->fetchColumn()){
                //asignarlo al objeto usuario
                $productoDb=$select->fetch();
                $producto= new Producto($productoDb['id'],$productoDb['id_us'],$productoDb['fecha'], $productoDb['estado'], $productoDb['productos']);
                return $producto;
            }else{
                echo "Producto no encontrado";
            }
        }

        public static function getByFecha($fecha){
            //buscar
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM producto WHERE fecha=:fecha');
            $select->bindValue('fecha',$fecha);
            $select->execute();
            //asignarlo al objeto usuario
            if($select->fetchColumn()){
                //asignarlo al objeto usuario
                $productoDb=$select->fetch();
                $producto= new Producto($productoDb['id'],$productoDb['id_us'],$productoDb['fecha'], $productoDb['estado'], $productoDb['productos']);
                return $producto;
            }else{
                echo "Producto no encontrado";
            }
        }
    }




?>