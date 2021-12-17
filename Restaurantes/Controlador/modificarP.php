<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar Producto</title>
    <link href="../../publico/vista/bootstrap.css" rel="stylesheet">
</head>

<body>
    <?php
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM producto where pro_id =$codigo";
    include 'conexion.php';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
    ?>
            <form id="formulario01" method="POST" action="modificar.php">
                <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                <label for="nombre">Nombre (*)</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $row["pro_nombre"]; ?>" required placeholder="Ingrese el nombre del Producto ..." />
                <br>
                <label for="descripcion">Descripcion (*)</label>
                <input type="text" id="descripcion" name="descripcion" value="<?php echo $row["pro_descripcion"]; ?>" required placeholder="Ingrese la Descripcion del Producto..." />
                <br>
                <label for="precio">Precio (*)</label>
                <input type="text" id="precio" name="precio" value="<?php echo $row["pro_precio"]; ?>" required placeholder="Ingrese los dos apellidos ..." />

                <input type="submit" id="modificar" name="modificar" value="Modificar" />
                <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
            </form>
    <?php
        }
    } else {
        echo "<p>Ha ocurrido un error inesperado !</p>";
        echo "<p>" . mysqli_error($conn) . "</p>";
    }
    $conn->close();
    ?>
</body>

</html>