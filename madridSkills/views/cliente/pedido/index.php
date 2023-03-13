<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Adan Criado">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrada</title>
    <link rel="stylesheet" href="../../../assets/estiloInicio.css">
</head>
<body>
    <div class="header">
        <h1>Musitron</h1>
        <p>Bien venidos a la tienda de música</p>
    </div>

    <div class="topnav">
    <a onclick="window.location.href='../../../sesion/fin.php'">Salir</a>
    <a>Carrito</a>
    <a onclick="window.location.href='../index.php'">Productos</a>
    <form action="" method="post">
        <input type="submit" name="buscar" value="Buscar" style="float:right">
        <input type="text" name="busqueda" placeholder="busqueda" style="float:right">
        <select name="tipo" style="float:right">
            <option value="producto">Producto</option>
            <option value="categoria">Categoria</option>
		</select>
    </form>
    </div>

    <div class="row">
        <div class="column">
            <form action="../../../controllers/pedido_controller.php" method="post">
                <input type='hidden' name='action' value='realizar'>
                <input type="submit" name="submit" value="Realizar pedido">
            </form>
        </div>
        <div class="tablas">
            <?php
                require_once('../../../models/producto.php');
                require_once('../../../ddbb/connection.php');
                session_start();
                $productos = $_SESSION['productos'];
                $carrito = explode('/', $productos);
                if($carrito[count($carrito)-1] == ""){
                    $fin = count($carrito)-1;
                }else{
                    $fin = count($carrito);
                }
                for($i = 0; $i < $fin; $i++){
                    if($i%3 == 0){
                        echo "<div class='producto1'>";
                    }else if($i%3 == 1){
                        echo "<div class='producto2'>";
                    }else{
                        echo "<div class='producto3'>";
                    }
                    $carrito[$i] = explode('-', $carrito[$i]);
                    $producto = Producto::getByNombre($carrito[$i][1]);
                    echo "
                        <h1>" . $producto['nombre'] . "</h1>
                        <h3>" . $producto['precio'] . "€</h3>
                        <p>" . $producto['categoria'] . "</p>
                        <button onclick='window.location.href=`../../../controllers/pedido_controller.php?producto=". $producto['nombre']."&unidades=". $carrito[$i][0]."&action=borrarProducto`'>Eliminar del carrito</button>
                    </div>";
                }
            ?>
        </div>
    </div>

</body>
</html>
