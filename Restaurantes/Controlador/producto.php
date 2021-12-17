<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Producto</title>
    <style type="text/css" rel="stylesheet">
        .error{
        color: red;
        }
    </style>
</head>
<body>
    <?php
        //incluir conexión a la base de datos
        include 'conexion.php';
        $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null;
        $descripcion = isset($_POST["descripcion"]) ? mb_strtoupper(trim($_POST["descripcion"]), 'UTF-8') : null;
        $precio = isset($_POST["precio"]) ? trim($_POST["precio"]): null;
        $sql = "INSERT INTO producto VALUES (0, '$nombre', '$descripcion','$precio'),null";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
            echo "<a href='index.php'>Ver lista</a>";
            } else {
                if($conn->errno == 1062){
                    echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
                }else{
                    echo "<p class='error'>Hola: " . mysqli_error($conn) . "</p>";
                }
            }
    	//cerrar la base de datos
        $conn->close();
    ?>
</body>
</html>