<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
	<meta name="generator" content="Hugo 0.88.1">
	<title>Pagina Cliente</title>
	<link href="../../publico/vista/bootstrap.css" rel="stylesheet">
</head>

<body class="PrincipalP">
	<?php
	include '../../Restaurantes/Controlador/conexion.php';
	$codigoR = intval($_GET["codigo"]);
	$nombreRes = $_GET["nombre"];
	$sqlR = "SELECT * FROM cliente";
	$datos = $conn->query($sqlR);
	foreach ($datos as $uno) {
		if ($uno['cli_id'] == $codigoR && $uno['cli_nombre'] == $nombreRes) {
			echo "Bienvenido Cliente" . $uno['cli_id'] . " " . $uno['cli_nombre'];
		}
	}
	?>
	<header class="site-header sticky-top py-1">
		<nav class="navbar navbar-expand-lg navbar-dark bg-prymary">
			<ul class="nav navbar-nav">
				<li class="nav-item active">
					<img class="imgSingIngP" src="../../Imagenes/Logo.png" alt="" width="80" height="40">
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../../publico/vista/Principal.php">Salir</a>
				</li>
			</ul>
		</nav>
	</header>
	<?php
	//inicio de productos 
	$Codigo = (isset($_POST['Codigo'])) ? $_POST['Codigo'] : "";
	$txtCantidad = (isset($_POST['txtCantidad'])) ? $_POST['txtCantidad'] : "";
	$txtSubTotal = (isset($_POST['txtSubTotal'])) ? $_POST['txtSubTotal'] : "";
	$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";
	$codigoR = (int)($_GET["codigo"]);
	echo $Codigo;
	include '../../Restaurantes/Controlador/conexion.php';
	switch ($accion) {
		case 'Agregar':
			$sentenciaSQL = "INSERT INTO producto VALUES (0,'$txtNombre','$txtDescripcion','$precio',$c)";
			if ($conn->query($sentenciaSQL) == true) {
			} else {
				echo "No Vale" . mysqli_error($conn);
			}
			header('Locatio:platillos.php');
			break;
		case 'Modificar':
			$sentenciaSQL = "UPDATE producto SET pro_nombre='$txtNombre', pro_descripcion='$txtDescripcion', pro_precio='$precio' WHERE pro_codigo='$txtCodigo' ";
			$Seleccionado = $conn->query($sentenciaSQL);
			break;
		case 'Cancelar':
			break;
		case 'Selecionar':
			$sentenciaSQL = "SELECT * FROM producto WHERE pro_id=$Codigo ";
			$Seleccionado = $conn->query($sentenciaSQL);
			foreach ($Seleccionado as $productoss) {
				$txtNombre = $productoss['pro_nombre'];
				$txtDescripcion = $productoss['pro_descripcion'];
				$txtCodigo = $productoss['pro_id'];
			}
			break;
		case 'Borrar':
			$sentenciaSQL = "DELETE  FROM producto WHERE pro_id=$Codigo ";
			echo $sentenciaSQL;
			$Seleccionado = $conn->query($sentenciaSQL);
			break;
	}
	$sentenciaSQL = "SELECT * FROM producto";
	$listado = $conn->query($sentenciaSQL);
	?>
	<section class="producto">
		<div class="col-md-5">

			<div class="card">
				<div class="card-body">
					<h1>Detalles del Pedido</h1>
					<form method="POST" enctype="multipart/form-data">
						<div class="form-group">
						</div>
						<div class="form-group">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" name="txtCantidad" value="<?php echo $txtCantidad; ?>" placeholder="Cantidad">
								<label for="floatingInput">Cantidad</label>
							</div>
							<div class="form-floating mb-3">
								<input type="text" class="form-control" name="txtSubTotal" value="<?php echo $txtSubTotal; ?>" placeholder="SubTotal">
								<label for="floatingInput">SubTotal</label>
							</div>
						</div>
						<div class="btn-group" role="group" aria-label="">
							<button type="submit" name="accion" <?php echo ($accion == 'Selecionar') ? 'disabled' : ''; ?> value="Agregar" class="btn btn-success">Agregar</button>
						</div>
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
                <th>Agregar</th>
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
                            <input type="hidden" name="accion" id="Codigo" value="<?php echo $producto['pro_id']; ?>">
                            <input type="submit" name="accion" value="Selecionar" class="btn btn-success">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
	<footer class="footer-area bg-f">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<h3>About Us</h3>
					<p>Se presenta una pagina en la que el cliente podra escoger productos de restaurantes </p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Horario de Atencion de los Restaurantes</h3>
					<p><span class="text-color">Monday: </span>Closed</p>
					<p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
					<p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
				</div>
				<div class="col-lg-3 col-md-6">
					<h3>Contacto</h3>
					<p class="lead"><a href="#">+593 999999999</a></p>
					<p><a href="#"> info@admin.com</a></p>
				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<p class="company-name">All Rights Reserved. &copy; 2021 <a href="#">Tonny Lema</a>
							Design By :
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>

</html>