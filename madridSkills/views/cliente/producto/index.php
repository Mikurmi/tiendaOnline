<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Adan Criado">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrada</title>
    <link rel="stylesheet" href="../../../assets/estiloInicio.css">
    <style>
        .button {
            background-color: #1c87c9;
            border: none;
            color: white;
            padding: 20px 34px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Musitron</h1>
        <p>Bien venidos a la tienda de música</p>
    </div>

    <div class="topnav">
        <a onclick="window.location.href='../../../sesion/fin.php'">Salir</a>
        <a onclick="window.location.href='../pedido/index.php'">Carrito</a>
        <a onclick="window.location.href='../index.php'">Porductos</a>
        <form action="" method="post">
            <input type="submit" name="buscar" value="Buscar" style="float:right">
            <input type="text" name="busqueda" placeholder="busqueda" style="float:right">
            <select name="tipo" style="float:right">
                <option value="producto">Producto</option>
                <option value="categoria">Categoria</option>
            </select>
        </form>
    </div>
    <?php
    require_once('../../../models/producto.php');
    require_once('../../../ddbb/connection.php');
    $producto = Producto::getByNombre($_GET['nombre']);
    ?>
    <div class="row">
        <div class="column-left">
            <div class="card" >
                <h1><?php echo $producto['nombre']; ?></h1>
            </div>
        </div>
        <div class="column-left">
            <div style="aling-content:center;">
                <form action="../../../controllers/pedido_controller.php" method="post">
                    <input type='hidden' name='action' value='anadirProducto'>
                    <input type='hidden' name='producto' value=<?php echo $producto['nombre'];?>>
                    <input type="submit" name="submit" value="Añadir al carrito" style="float:right">
                    <input type="number" name="unidades" placeholder="Catindad" style="float:right">
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column-left">
        <div class="card">
            <h3>Categorias</h3>
            <?php
            $categorias = explode(',',$producto['categoria']);
            echo "<ul>";
            for($i = 0; $i < count($categorias); $i++){
                echo "<li>". $categorias[$i] ."</li>";
            }
            echo "</ul>";
            ?>
            </div>
        </div>
        <div class="column-left">
            <div class="card">
                <h3>Unidades totales:</h3>
                <?php
                echo "
                <h2>". $producto['unidades'] ."</h2>
                <h3>Precio:</h3>
                <h2>". $producto['precio'] ."€</h2>
                ";
                ?>
            </div>
        </div>
    </div>

</body>
</html>