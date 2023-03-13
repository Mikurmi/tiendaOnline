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
    require_once('../../../models/cliente.php');
    require_once('../../../ddbb/connection.php');
    session_start();
    $cliente = Cliente::getById($_SESSION['usuario_id']);
    ?>
    <div class="row">
        <div class="column-left">
            <div class="card" >
                <h1>Nombre: <?php echo $_SESSION['usuario_nombre']; ?></h1>
                <h1>Apellidos: <?php echo $cliente->apellidos; ?></h1>
                <h2>Genero: <?php echo $cliente->genero; ?></h2>
                <h2>Telefono: <?php echo $cliente->telefono; ?></h2>
            </div>
        </div>
        <div class="column-left">
            <div class="card">
                <h2>Email: <?php echo $cliente->email; ?></h2>
                <h2>Direccion: <?php echo $cliente->direccion; ?></h2>
                <h2><?php echo $cliente->tipo_ident . ": " . $cliente->identificador; ?></h2>
                <button onclick="window.location.href='cambiar.php'">Cambiar datos</button>
                <button onclick="window.location.href='../../../controllers/cliente-controller.php?action=borrar'">Darse de baja</button>
            </div>
        </div>
    </div>

</body>
</html>