<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="../../publico/vista/bootstrap.css" rel="stylesheet">
</head>

<body>
  <header class="site-header sticky-top py-1">
    <nav class="navbar navbar-expand-lg navbar-dark bg-prymary">
      <ul class="nav navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="Principal.html"><img class="imgSingIngP" src="../../Imagenes/Logo.png" href="Principal.html" alt="" width="80" height="40"></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="PrincipalR.php">Pagian Principal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../publico/vista/Principal.php">Salir</a>
        </li>
      </ul>
    </nav>
  </header>
  <form id="formulario01" method="POST" action="../Controlador/producto.php">
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          Datos Productos
        </div>
        <div class="card-body">
          <form method="GET" enctype="multipart/form-data">
            <div class="form-group">
              <label for="txtNombre">Nombre:</label>
              <input type="text" class="form-control" name="nombre" id="txtDescripcion" placeholder="Nombre">
            </div>

            <div class="form-group">
              <label for="txtDescripcion">Descripcion:</label>
              <input type="text" class="form-control" name="descripcion" id="txtDescripcion" placeholder="Ingrese la Descripcion del producto">
            </div>

            <div class="form-group">
              <label for="txtPrecio">Precio:</label>
              <input type="text" class="form-control" name="precio" id="txtPrecio" placeholder="`Ingrese el Precio">
            </div>
            <button type="submit" class="btn btn-primaryC">Continuar</button>
          </form>
        </div>
      </div>
  </form>
  <form action="../Controlador/index.php" method="POST">
    <a class="nav-link" href="../Controlador/index.php">Lista de productos</a>
  </form>
</body>

</html>