<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Eliminar datos de producto</title>
</head>

<body>
    <?php
    include 'conexion.php';
    $codigo = $_GET["codigo"];
    $sql = "DELETE FROM producto WHERE pro_id= $codigo ";
        $result = $conn->query($sql);
    $conn->close();
    ?>
</body