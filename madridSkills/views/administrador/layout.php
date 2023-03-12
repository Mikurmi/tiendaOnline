<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="author" content="Adan Criado">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrada</title>
    <link rel="stylesheet" href="../../assets/estiloInicio.css">
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
      <a onclick="window.location.href='../../sesion/fin.php'">Salir</a>
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
      <div class="tablas">
        <a href="?controller=producto&action=index" class="button">Productos</a>
        <a href="?controller=categoria&action=index" class="button">Categorias</a>
        <a href="?controller=pedido&action=index" class="button">Pedidos</a>
      </div>
      <?php
        if(isset($_POST['buscar'])){
          if($_POST['tipo'] == 'producto'){
            require_once('../../models/producto.php');
            $productos = Producto::getLikeNombre($_POST['busqueda']);
            echo "<table>
              <tr>
                <th>ID:</th>
                <th>Nombre:</th>
                <th>Precio:</th>
                <th>Categoria:</th>
                <th>Unidades:</th>
              </tr>";
            for($i = 0; $i < count($productos); $i++){
                
                echo"<tr>
                        <td>".$productos[$i]->id."</td>
                        <td>".$productos[$i]->nombre."</td>
                        <td>".$productos[$i]->precio."</td>
                        <td>".$productos[$i]->categoria."</td>
                        <td>".$productos[$i]->unidades."</td>
                    </tr>";
            }
            echo "</table>";
          }
            
        }
        ?>
    </div>

</body>
</html>