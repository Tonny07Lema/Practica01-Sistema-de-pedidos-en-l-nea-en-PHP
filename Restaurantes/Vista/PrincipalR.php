<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
    <link rel="stylesheet" href="../../publico/vista/bootstrap.css" />
</head>

<body>
    <header class="site-header sticky-top py-1">
        <nav class="navbar navbar-expand-lg navbar-dark bg-prymary">
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="Principal.html"><img class="imgSingIngP" src="../../Imagenes/Logo.png" href="Principal.html" alt="" width="80" height="40"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../publico/vista/Principal.php">Salir</a>
                </li>
            </ul>
        </nav>
    </header>
    <?php

    //inicio de productos 
    $txtCodigo = (isset($_POST['txtCodigo'])) ? $_POST['txtCodigo'] : "";
    $txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
    $txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
    $txtPresio = (isset($_POST['txtPresio'])) ? $_POST['txtPresio'] : "";
    $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
    $precio = doubleval($txtPresio);
    $c = (int)($_GET["codigo"]);
    echo $txtCodigo;
    include '../Controlador/conexion.php';
    switch ($accion) {
        case 'Agregar':
            $sentenciaSQL = "INSERT INTO producto VALUES (0,'$txtNombre','$txtDescripcion','$precio',$c)";
            if ($conn->query($sentenciaSQL) == true) {
            } else {
                echo "No Vale" . mysqli_error($conn);
            }
            header('Locatio:platillos.php');
            break;
        case 'Selecionar':
            $sentenciaSQL = "SELECT * FROM producto WHERE pro_id=$txtCodigo ";
            $Seleccionado = $conn->query($sentenciaSQL);
            foreach ($Seleccionado as $productoss) {
                $txtNombre = $productoss['pro_nombre'];
                $txtDescripcion = $productoss['pro_descripcion'];
                $txtPresio = $productoss['pro_precio'];
                $txtCodigo = $productoss['pro_id'];
            }
            break;
        case 'Modificar':
            echo "hola".$txtCodigo;
            $sentenciaSQL = "UPDATE producto SET pro_nombre ='$txtNombre', pro_descripcion ='$txtDescripcion', pro_precio = $txtPresio WHERE pro_id= $txtCodigo ";
            echo $sentenciaSQL;
            $Seleccionado = $conn->query($sentenciaSQL);
            break;
        case 'Cancelar':
            break;

        case 'Borrar':
            $sentenciaSQL = "DELETE  FROM producto WHERE pro_id=$txtCodigo ";
            $Seleccionado = $conn->query($sentenciaSQL);
            break;
    }

    $sentenciaSQL = "SELECT * FROM producto WHERE res_id=$c";
    $listado = $conn->query($sentenciaSQL);
    ?>
    <section class="producto">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h1>Ingrese el Producto</h1>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="txtNombre" value="<?php echo $txtNombre; ?>" placeholder="Nombre">
                                <label for="floatingInput">Nombre</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="txtDescripcion" value="<?php echo $txtDescripcion; ?>" placeholder="Descripcion">
                                <label for="floatingInput">Descripcion</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="txtPresio" value="<?php echo $txtPresio; ?>" placeholder="Precio">
                                <label for="floatingInput">Presio</label>
                            </div>
                        </div>
                        <div class="btn-group" role="group" aria-label="">
                            <button type="submit" name="accion" <?php echo ($accion == 'Selecionar') ? 'disabled' : ''; ?> value="Agregar" class="btn btn-success">Agregar</button>
                        </div>
                        <button type="submit" name="accion" <?php echo ($accion == 'Modificar') ? 'disabled' : ''; ?> value="Modificar" class="btn btn-warning">Modificar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="col-md-7">
        <table class="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>Seleccionar/Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listado as $producto) { ?>
                    <tr>
                        <td><?php echo $producto['pro_id']; ?></td>
                        <td><?php echo $producto['pro_nombre']; ?></td>
                        <td><?php echo $producto['pro_descripcion']; ?></td>
                        <td><?php echo $producto['pro_precio']; ?></td>
                        <td>
                            <form method="POST">
                                <input type="hidden" name="txtCodigo" id="Codigo" value="<?php echo $producto['pro_id']; ?>">
                                <input type="submit" name="accion" value="Selecionar" class="btn btn-success">
                                <input type="submit" name="accion" value="Borrar" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</body>

</html>