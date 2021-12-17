<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de Productos</title>
    <link href="../../publico/vista/bootstrap.css" rel="stylesheet">
</head>

<body>
    <table style="width:100%">
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Precio</th>
        </tr>
        <?php
        include 'conexion.php';
        $sql = "SELECT * FROM producto";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row["pro_nombre"] . "</td>";
                echo " <td>" . $row['pro_descripcion'] . "</td>";
                echo " <td>" . $row['pro_precio'] . "</td>";
                echo " <td> <a href='eliminarP.php?codigo=" . $row['pro_id'] . "'>Eliminar</a> </td>";
                echo " <td> <a href='modificarP.php?codigo=" . $row['pro_id'] . "'>Modificar</a> </td>";
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
    <a class="nav-link" href="../Vista/crearP.html"><button type="button" class="btn btn-primary btn-lg">Regresar</button></a>
    
</body>

</html>