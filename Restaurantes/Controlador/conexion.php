<?php
 
 $db_servername = "localhost";
 $db_username = "root";
 $db_password = "";
 $db_name = "practica01"; 
 
 $conn = new mysqli($db_servername, $db_username, $db_password, $db_name);
 $conn->set_charset("utf8");
 
?>