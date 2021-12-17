<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar Producto </title>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    include 'conexion.php';
    $codigo = $_POST["codigo"];
    $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null;
    $descripcion = isset($_POST["descripcion"]) ? mb_strtoupper(trim($_POST["descripcion"]), 'UTF-8') : null;
    $precio = isset($_POST["precio"]) ? trim($_POST["precio"]) : null;
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s', time());
    $sql = " UPDATE producto " .
        #"pro_nombre = '$nombre', " .
        "pro_descripcion = '$descripcion', " .
        "pro_precio = '$precio', " .
        "WHERE pro_id = $codigo";
    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado los datos personales correctamemte!!!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
    $conn->close();
    ?>
</body>

</html>