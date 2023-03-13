<?php

    class Pedido{
        
        public $id;
        public $id_us;
        public $fecha;
        public $precio;
        public $estado;
        //Los productos esat separados por / y la cantida del producto separados por -
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
            require_once('producto.php');
            $total = 0;
            if($productos != ""){
                $precio = explode('/', $productos);
                if($precio[count($precio)-1] == ""){
                    $fin = count($precio)-1;
                }else{
                    $fin = count($precio);
                }
                for($i = 0; $i < $fin; $i++){
                    $precio[$i] = explode('-', $precio[$i]);
                    $precio[$i][1] = Producto::getByNombre($precio[$i][1]);
                    $total = $total + ($precio[$i][0] * $precio[$i][1]['precio']);
                }
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
            $update=$db->prepare('UPDATE pedido SET id_us=:id_us, fecha=:fecha, precio=:precio, estado=:estado, productos=:productos where id=:id');
            $update->bindValue('id', $pedido->id);
            $update->bindValue('id_us', $pedido->id_us);
            $update->bindValue('fecha', $pedido->fecha);
            $update->bindValue('precio', $pedido->precio);
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
            $select=$db->prepare('SELECT * FROM pedido WHERE id=:id');
            $select->bindValue('id',$id);
            $select->execute();
            $productoDb=$select->fetch();
            if($productoDb){
                $producto= new Pedido($productoDb['id'],$productoDb['id_us'],$productoDb['fecha'], $productoDb['estado'], $productoDb['productos']);
                return $producto;
            }else{
                return false;
            }
        }

        public static function getById_us($id_us){
            //buscar
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM pedido WHERE id_us=:id_us');
            $select->bindValue('id_us',$id_us);
            $select->execute();
            $pedidos = array();
            foreach($select->fetchAll() as $fila){
                array_push($pedidos,new Pedido($fila['id'], $fila['id_us'],$fila['fecha'],$fila['estado'],$fila['productos']));
            }
            return $pedidos;
        }

        public static function getByFecha($fecha){
            //buscar
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM pedido WHERE fecha=:fecha');
            $select->bindValue('fecha',$fecha);
            $select->execute();
            $pedidos = array();
            foreach($select->fetchAll() as $fila){
                array_push($pedidos,new Pedido($fila['id'], $fila['id_us'],$fila['fecha'],$fila['estado'],$fila['productos']));
            }
            return $pedidos;
        }

        public static function getIncompleto($id_us){
            //buscar
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM pedido WHERE id_us=:id_us and estado="Incompleto"');
            $select->bindValue('id_us',$id_us);
            $select->execute();
            $productoDb=$select->fetch();
            if($productoDb){
                $producto= new Pedido($productoDb['id'],$productoDb['id_us'],$productoDb['fecha'], $productoDb['estado'], $productoDb['productos']);
                return $producto;
            }else{
                return false;
            }
        }
    }




?>