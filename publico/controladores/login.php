<?php
 session_start();
 include '../../Restaurantes/Controlador/conexion.php';
 $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
 $sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_contrasenia = MD5('$contrasena')";
 $sqlU = "SELECT * FROM usuario";
 $sqlUs = $conn->query($sqlU);
 foreach ($sqlUs as $usuarios){
     if( ($usuarios['usu_correo']==$usuario) && ($usuarios['usu_contrasenia'] == md5($contrasena)) && ($usuarios['usu_rol']=='R')){
        header("Location: ../../Restaurantes/Vista/PrincipalR.html");
     }elseif( ($usuarios['usu_correo']==$usuario) && ($usuarios['usu_contrasenia'] == md5($contrasena)) && ($usuarios['usu_rol']=='C')){
        header("Location: ../../Cliente/vista/PrincipalCliente.html");
        echo"<p>Cliente</p>";
     }
     else{
         echo "<p>No funciono</p>";
     }    
 }
 
 $conn->close();
?>
