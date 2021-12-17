<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Eliminar datos de producto</title>
</head>

<body>
    <?php
    include 'conexion.php';
    $co = $_GET["codigo"];
    $sql = "DELETE FROM producto WHERE pro_id= $co ";
        $result = $conn->query($sql);
    $conn->close();
    header("Location:../Vista/PrincipalR.php?codigo=$co");
    echo "<a href='../Vista/PrincipalR.php?codigo=$co'>Regresar</a>";
    ?>
</body>