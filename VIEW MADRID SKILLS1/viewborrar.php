<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="assets/estiloInicio.css">
</head>
<body>

  <div class="header">
        <h1>ADMINISTRACION DE LA TIENDA</h1>
        
    </div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">OPCIONES DE ADMINISTRADOR</a>
    </div>
    <ul class="nav navbar-nav">
       <li class="active"><a href="viewanadir.php">Añadir</a></li>
        <li><a href="viewborrar.php">Borrar</a></li>
        <li><a href="viewmodificar.php">Modificar</a></li>
        
   
    </ul>
    <form class="navbar-form navbar-right" action="viewbuscar.php" method="post">
      <div class="form-group">
        <select name="tipo"  width="20px" width="10%" class="form-control" >
                    <option value="categoria">Categoria</option>
                    <option value="nombre">Nombre</option>
                </select>
      </div>
      <button type="submit" class="btn btn-default">Buscar</button>
    </form>
  </div>
</nav>

 <div style="text-align: center">

      <form action="" method="post">
        <input type='hidden' name='action' value='registro'>
            
                
                    <h2>Borrar Productos</h2>
                

                <div class="productos" >
                    
                    <input type="text" name="categoria" placeholder="Categoria">
                    <br>
                    <br>
                    <input type="text" name="Nombre" placeholder="Nombre">
                    <br>
                    <br>
                    <input type="text" name="precio" placeholder="Precio">
                    <br>
                    <br>
                    <input type="text" name="stock" placeholder="Stock">
                    <br>
                    <br>
                    
                </div>
                <div class="botones">
                <input type="submit" name="submit" value="Borrar">
                <input type="reset" name="reset" value="Restablecer">
                
                  
          
            
        </form>
    <div>

</body>
</html>