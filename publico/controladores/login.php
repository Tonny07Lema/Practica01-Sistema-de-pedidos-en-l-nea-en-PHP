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
            $cod = $usu['usu_id'];
            $newSql = "SELECT * FROM restaurante WHERE usu_id =$cod";
            $datosRestaurante = $conn->query($newSql);
            foreach ($datosRestaurante as $res) {
                $nombreRestaurante = $res["res_id"];
                $nombreRes = $res["res_nombre"];
            }
            header("Location:../../Restaurantes/Vista/PrincipalR.php?codigo=$nombreRestaurante&nombre=$nombreRes");
            echo "<p>restautante</p>";
        } else if ($usu["usu_correo"] == $correo && $usu["usu_contrasenia"] == Md5($contrasena) && $usu["usu_rol"] == 'C') {
            $codC = $usu['usu_id'];
            $newSql = "SELECT * FROM cliente WHERE cli_usu  =$codC";
            $datosRestaurante = $conn->query($newSql);
            foreach ($datosRestaurante as $res) {
                $nombreCliente = $res["cli_id"];
                $nombreCli = $res["cli_nombre"];
            }
            header("Location:../../Cliente/vista/PrincipalCliente.php?codigo=$nombreCliente&nombre=$nombreCli");
            echo "<p>Cliente</p>";
        }
    }
    //cerrar la base de datos
    $conn->close();
    ?>
</body>

</html>