<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    include '../../Restaurantes/Controlador/conexion.php';
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $rol = isset($_POST["rol"]) ? trim($_POST["rol"]) : null;
    $sql = "INSERT INTO usuario VALUES (0, '$correo', MD5('$contrasena'),'$rol')";
    $sql = $conn->query($sql);
    $sqlU = "SELECT * FROM usuario";
    $sqlUs = $conn->query($sqlU);
    foreach ($sqlUs as $usuarios){
        if( ($usuarios['usu_correo']==$correo) && ($usuarios['usu_contrasenia'] == md5($contrasena)) && ($usuarios['usu_rol']=='R')){
            header("Location: ../vista/crearRestaurante.html");
        }elseif( ($usuarios['usu_correo']==$correo) && ($usuarios['usu_contrasenia'] == md5($contrasena)) && ($usuarios['usu_rol']=='C')){
            header("Location: ../vista/Crear.html");
        }
        else{
            echo "<p>No funciono</p>";
        }    
    }
    //cerrar la base de datos
    $conn->close();
    echo "<a href='../vista/Principal.php'>Regresar</a>";

    ?>
</body>
</html>