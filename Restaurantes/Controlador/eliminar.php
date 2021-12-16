<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Eliminar datos Producto</title>
</head>
<body>
<?php
 //incluir conexión a la base de datos
 include 'conexion.php'; 
 $codigo = $_POST["codigo"]; 
 
 //Si voy a eliminar físicamente el registro de la tabla
 //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
 $sql = "UPDATE producto SET usu_eliminado = 'S', usu_fecha_modificacion = '$fecha' WHERE usu_codigo = $codigo";
 if ($conn->query($sql) === TRUE) { 
 echo "<p>Se ha eliminado los datos correctamemte!!!</p>"; 
 } else { 
 echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
 }
 echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
 $conn->close();
 
?>
</body>
</html>