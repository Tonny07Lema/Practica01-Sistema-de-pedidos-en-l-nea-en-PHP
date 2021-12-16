<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
        .error{
        color: red;
        }
    </style>
</head>
<body>
    <?php
        //incluir conexión a la base de datos
        include '../../Restaurantes/Controlador/conexion.php';
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
        $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
        $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
        $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
        $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
        $rol = isset($_POST["rol"]) ? trim($_POST["rol"]) : null;
        $sql = "INSERT INTO cliente VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono', '$correo', MD5('$contrasena'),'$rol')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
            } else {
                if($conn->errno == 1062){
                    echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
                }else{
                    echo "<p class='error'>Hola: " . mysqli_error($conn) . "</p>";
                }
            }
    	//cerrar la base de datos
        $conn->close();
        echo "<a href='../vista/Principal.html'>Regresar</a>";

    ?>
</body>
</html>