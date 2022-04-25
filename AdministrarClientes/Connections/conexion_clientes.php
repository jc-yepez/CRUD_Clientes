<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexion_clientes = "localhost";
$database_conexion_clientes = "administrar_clientes";
$username_conexion_clientes = "root";
$password_conexion_clientes = "";
$conexion_clientes = mysql_pconnect($hostname_conexion_clientes, $username_conexion_clientes, $password_conexion_clientes) or trigger_error(mysql_error(),E_USER_ERROR); 
?>