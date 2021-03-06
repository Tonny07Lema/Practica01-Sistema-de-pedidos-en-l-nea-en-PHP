<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Product example · Bootstrap v5.1</title>
    <link href="bootstrap.css" rel="stylesheet">
</head>

<body class="PrincipalP">
    <header class="site-header sticky-top py-1">
        <nav class="navbar navbar-expand-lg navbar-dark bg-prymary">
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="Principal.html"><img class="imgSingIngP" src="../../Imagenes/Logo.png" href="Principal.html" alt="" width="80" height="40"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="SingIn.html">Iniciar Secion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="crearUsuarioP.html">Crear</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">

        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 fw-normal">PAGINA WEB DE PADIDOS EN LINEA</h1>
            <p class="lead fw-normal">BIENVENIDOS A LA PAGINA WEB EN LA QUE PORDRA ENCONTRAR PRODUCTOS DE DIFENTES RESTAURANTES </p>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>
    <br>
    <h1 class="display-4 fw-normal">Lista de Productos</h1>
    <!DOCTYPE html>
    <html>
    <table style="width:100%" class="listado">
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Restaurante</th>
        </tr>
        <?php
        include '../../Restaurantes/Controlador/conexion.php';
        $sql = "SELECT * FROM producto";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row["pro_nombre"] . "</td>";
                echo " <td>" . $row['pro_descripcion'] . "</td>";
                echo " <td>" . $row['pro_precio'] . "</td>";
                echo " <td>" . $row['res_id'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen Productos registradas en el sistema </td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </table>
    </html>
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