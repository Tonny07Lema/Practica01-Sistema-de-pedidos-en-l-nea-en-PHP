<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>IniciarSesion</title>
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
    $sql = "SELECT * FROM usuario";
    $usuarios = $conn->query($sql);
    foreach ($usuarios as $usu) {
        echo $usu["usu_correo"] . "<br>";
        echo $usu["usu_contrasenia"] . "<br>";
        if ($usu["usu_correo"] == $correo && $usu["usu_contrasenia"] == Md5($contrasena) && $usu["usu_rol"] == 'R') {
            $cod = $usu['usu_codigo'];
            echo "<p>Hola</p>".$cod;
            $newSql = "SELECT * FROM restaurante WHERE usu_id =$cod";
            $datosRestaurante = $conn->query($newSql);
            foreach ($datosRestaurante as $res) {
                $nombreRestaurante = $res["res_nombre"];
            }
            header("Location:../../Restaurantes/Vista/PrincipalR.php?nombres=$nombreRestaurante");
            echo "<p>restautante</p>";
        } else if ($usu["usu_correo"] == $correo && $usu["usu_contrasenia"] == Md5($contrasena) && $usu["usu_rol"] == 'C') {
            $cod = $usu['usu_codigo'];
            echo "<p>Hola</p>".$cod;
            $newSql = "SELECT * FROM restaurante WHERE usu_id =$cod";
            $datosRestaurante = $conn->query($newSql);
            foreach ($datosRestaurante as $res) {
                $nombreRestaurante = $res["res_nombre"];
            }
            header("Location:../../Cliente/vista/PrincipalCliente.html?nombres=$nombreRestaurante");
            echo "<p>restautante</p>";
        }
    }
    //cerrar la base de datos
    $conn->close();

    ?>
</body>

</html>