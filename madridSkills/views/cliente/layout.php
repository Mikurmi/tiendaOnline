<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Adan Criado">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrada</title>
    <link rel="stylesheet" href="../../assets/estiloInicio.css">
</head>
<body>
    <div class="header">
        <h1>Musitron</h1>
        <p>Bien venidos a la tienda de música</p>
    </div>

    <div class="topnav">
      <a onclick="window.location.href='../../sesion/fin.php'">Salir</a>
      <a onclick="window.location.href='pedido/index.php'">Carrito</a>
      <a onclick="window.location.href='datos/mostrar.php'">Datos</a>
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
      <?php
        require_once('../../routes.php');
      ?>
    </div>

</body>
</html>