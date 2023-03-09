<?php

    class Categoria{
        
        public $id;
        public $nombre;

        function __construct($id, $nombre){
            $this->id=$id;
            $this->nombre=$nombre;
        }

        public static function save($categoria){
            $db=Db::getConnect();
            $insert=$db->prepare('INSERT INTO categoria VALUES(null, :nombre');
            $insert->bindValue('nombre',$categoria->nombre);
            $insert->execute();
        }

        public static function delete($id){
            //Llamamos amodel de productos
            require_once('producto.php');
            //Recoegemos la categoria antes de borrarla
            $categoria = Categoria::getById($id);
            //Borrar categoria
            $db=Db::getConnect();
            $delete=$db->prepare('DELETE FROM categoria where id=:id');
            $delete->bindValue('id',$id);
            $delete->execute();
            //Array de productos con la categoria borrada
            $productos = Producto::getByCategoria($categoria->nombre);
            //Variable donde borraremos la categoria
            $cambio;
            //Variable donde se guardan las categorias despues de borrarlas
            $final = "";
            //Bucle para recorrer los productos
            for($j = 0; $j < count($productos); $j++){
                //Transformamos las categorias en un array
                $cambio = $productos[$j]->categoria;
                $cambio = explode(',',$cambio);
                //Borramos la categoria a borrar del array
                unset($cambio[array_search($categoria->nombre,$cambio)]);
                //Generamos la nueva cadena de categorias para el producto
                for($i = 0; $i < count($cambio); $i++){
                    if($i == count($cambio)-1){
                        $final = $final . $cambio[$i];
                    }else{
                        $final = $final . $cambio[$i] . ",";
                    }
                }
                //Guardamos la cadena anterior en el objeto Producto
                $productos[$j]->categoria = $final;
                //Actualizamos el producto en la base de datos
                Producto::update($productos[$j]);
            }
        }

        public static function getById($id){
            //buscar
            $db=Db::getConnect();
            $select=$db->prepare('SELECT * FROM categoria WHERE id=:id');
            $select->bindValue('id',$id);
            $select->execute();
            //asignarlo al objeto usuario
            if($select->fetchColumn()){
                //asignarlo al objeto usuario
                $categoriaDb=$select->fetch();
                $categoria= new Categoria($categoriaDb['id'],$categoriaDb['nombre']);
                return $categoria;
            }else{
                return false;
            }
        }
    }



?>