<?php
 session_start();
 include '../../Restaurantes/Controlador/conexion.php';
 $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
 $sql = "SELECT * FROM cliente WHERE cli_correo = '$correo' and cli_contrasena = MD5('$contrasena')";
 $result = $conn->query($sql); 
 if ($result->num_rows > 0) { 
 $_SESSION['isLogged'] = TRUE;
 header("Location: ../../Cliente/vista/PrincipalCliente.html");
 } else { 
 header("Location: ../vista/Crear.html");
 }
 $conn->close();
?>
