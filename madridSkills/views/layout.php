<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Adan Criado">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrada</title>
    <link rel="stylesheet" href="assets/estiloInicio.css">
    
</head>
<body>
    <div class="header">
        <h1>Musitron</h1>
        <p>Bien venidos a la tienda de música</p>
    </div>

    <div class="topnav">
        <!-- Le pasamos al controller usuario porque es el generico ya que no sabemos si es cliente o administrador-->
        <a href="index.php">Inicio</a>
        <a href="?controller=usuario&action=inicio">Inicia Sesión</a>
        <a href="?controller=usuario&action=registro">Registrarse</a>
        <!--
        <form action="" method="post">
            <input type="submit" name="submit" value="Buscar" style="float:right">
            <input type="text" name="busqueda" placeholder="busqueda" style="float:right">
        </form>
        -->
    </div>

    <div class="row">
        <?php require('routes.php') ?>
    </div>

</body>
</html>