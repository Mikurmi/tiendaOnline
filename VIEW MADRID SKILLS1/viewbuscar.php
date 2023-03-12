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

 <div align="center" id="tabla">

    <h2>CONSULTA</h2>
    <table style="width:60%" class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Categoria</th>
        <th>Nombre</th>
        <th>Stock</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>john@example.com</td>

      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td>july@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
        <td>july@example.com</td>
      </tr>

    </tbody>
  </table>
</div>
  </div>

</body>
</html>