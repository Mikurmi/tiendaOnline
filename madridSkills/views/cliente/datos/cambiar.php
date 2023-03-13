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
        <div class="column">
            <div class="card" id="tipo_C" >
                <form action="../../../controllers/cliente_controller.php" method="post">
                <h2>Datos a cambiar</h2>
                <input type="hidden" name="action" value="actualizar">
                <input type="hidden" name="id_us" value=<?php echo $_SESSION['usuario_id']?>>
                <input type="text" name="apellidos" value=<?php echo $cliente->apellidos?>>
                <select name="genero">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
                <br>
                <label for="fecha_na">Fecha de nacimiento</label>
                <input type="date" id="fecha_nac" name="fecha_nac" value=<?php echo $cliente->fecha_nac?>>
                <br>
                <input type="text" id="telefono" name="telefono" value=<?php echo $cliente->telefono?> maxlength="9" minlenght="9">
                <br>
                <input type="email" id="email" name="email" value=<?php echo $cliente->email?>>
                <br>
                <input type="text" id="direccion" name="direccion" value=<?php echo $cliente->direccion?>>
                <br>
                <select name="tipo_ident">
                    <option value="DNI">DNI</option>
                    <option value="NIF">NIF</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="nº SS">nº SS</option>
                </select>
                <input type="text" id="identificador" name="identificador" value=<?php echo $cliente->identificador?>>
                <br>
                <input type="submit" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>