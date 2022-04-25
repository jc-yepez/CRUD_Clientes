<?php require_once('Connections/conexion_clientes.php'); ?>
<?php
mysql_select_db($database_conexion_clientes, $conexion_clientes);
$query_listar_todos = "SELECT cedula, nombre, apellido, direccion, telefono, email FROM cliente";
$listar_todos = mysql_query($query_listar_todos, $conexion_clientes) or die(mysql_error());
$row_listar_todos = mysql_fetch_assoc($listar_todos);
$totalRows_listar_todos = mysql_num_rows($listar_todos);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Todos los Clientes</title>
<style type="text/css">
<!--
.Estilo1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #00AE2C;
}
.Estilo2 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
	font-weight: bold;
	font-style: italic;
}
-->
</style>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div align="center"><img src="imagenes/encabezado.png" width="1181" height="75" />
</div>
<h1 align="center"><span class="Estilo1">ADMINISTRAR CLIENTES</span></h1>
<hr />
<blockquote>
  <blockquote>
    <blockquote>
      <blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <p align="left"><span class="Estilo2">Todos los  Clientes</span></p>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </blockquote>
    </blockquote>
  </blockquote>
</blockquote>
<p align="center">&nbsp;</p>
<table border="0" align="center" cellspacing="10">
  <tr>
    <td bgcolor="#D5FFAA"><strong>C&eacute;dula</strong></td>
    <td bgcolor="#D5FFAA"><strong>Nombre</strong></td>
    <td bgcolor="#D5FFAA"><strong>Apellido</strong></td>
    <td bgcolor="#D5FFAA"><strong>Direccion</strong></td>
    <td bgcolor="#D5FFAA"><strong>Telefono</strong></td>
    <td bgcolor="#D5FFAA"><strong>Email</strong></td>
  </tr>
  <?php do { ?>
  <tr>
    <td><?php echo $row_listar_todos['cedula']; ?></td>
    <td><?php echo $row_listar_todos['nombre']; ?></td>
    <td><?php echo $row_listar_todos['apellido']; ?></td>
    <td><?php echo $row_listar_todos['direccion']; ?></td>
    <td><?php echo $row_listar_todos['telefono']; ?></td>
    <td><?php echo $row_listar_todos['email']; ?></td>
  </tr>
  <?php } while ($row_listar_todos = mysql_fetch_assoc($listar_todos)); ?>
</table>
<p align="center">&nbsp;</p>
<p align="center"><a href="index.php" class="boton">Nuevo</a> <a href="buscar_cedula.php" class="boton">Buscar</a> </p>
<p align="center"><img src="imagenes/pie_d_pagina.png" width="1181" height="66" /></p>
</body>
</html>
<?php
mysql_free_result($listar_todos);
?>
