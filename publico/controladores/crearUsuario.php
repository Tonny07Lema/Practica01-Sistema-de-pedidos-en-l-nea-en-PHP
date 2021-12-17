<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Cliente</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <a href></a>
    <?php
    //incluir conexión a la base de datos
    include '../../Restaurantes/Controlador/conexion.php';
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null;
    $apellido = isset($_POST["apellido"]) ? trim($_POST["apellido"]) : null;
    $direccion = isset($_POST["direccion"]) ? trim($_POST["direccion"]) : null;
    $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]) : null;
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    //$busqueda_cod_usu= "SELECT MAX(usu_codigo) FROM usuario ";
    $busqueda_cod_usu= "SELECT * FROM usuario ";
    $variableUno=$conn->query($busqueda_cod_usu);
    //$foranea=(int)($variableUno);
    $max=0;
    foreach ($variableUno as $u){
       if((int)($u['usu_id']) >$max){
           $max =(int)($u['usu_id']);
       }
    }
    echo $max;
    $sql = "INSERT INTO cliente VALUES (0, '$cedula', '$nombre','$apellido','$direccion','$telefono','$correo',MD5('$contrasena'), $max)";
   
    if ($conn->query($sql) === TRUE) {
        echo "<h1>Usuario Creado</h1>";
    } else {
        if ($conn->errno == 1062) {
            echo "<p class='error'>La persona con la cedula $correo ya esta registrada en el sistema </p>";
        } else {
            echo "<p class='error'>Hola: " . mysqli_error($conn) . "</p>";
        }
    }
    //cerrar la base de datos
    $conn->close();
    echo "<a href='../vista/Principal.php'>Regresar</a>";

    ?>
</body>

</html>