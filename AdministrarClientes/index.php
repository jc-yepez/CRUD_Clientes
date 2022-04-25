<?php require_once('Connections/conexion_clientes.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO cliente (cedula, nombre, apellido, direccion, telefono, email) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['cedula'], "text"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido'], "text"),
                       GetSQLValueString($_POST['direccion'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['email'], "text"));

  mysql_select_db($database_conexion_clientes, $conexion_clientes);
  $Result1 = mysql_query($insertSQL, $conexion_clientes) or die(mysql_error());
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrar Clientes</title>
<style type="text/css">
<!--
.Estilo1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #00AE2C;
}
.Estilo2 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
	font-weight: bold;
	font-style: italic;
}
.Estilo5 {color: #00AE2C; font-weight: bold; }
-->
</style>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
</head>

<body>
<h1 align="center" class="Estilo1"><img src="imagenes/encabezado.png" width="1181" height="75" /></h1>
<h1 align="center" class="Estilo1">ADMINISTRAR CLIENTES</h1>
<hr />
<blockquote>
  <blockquote>
    <blockquote>
      <blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <p align="left" class="Estilo2">Ingresar un Nuevo Cliente </p>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </blockquote>
    </blockquote>
  </blockquote>
</blockquote>
<p>&nbsp;</p>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table width="323" align="center">
    <tr valign="baseline">
      <td width="61" align="right" nowrap><div align="left" class="Estilo5">C&eacute;dula:</div></td>
      <td width="250"><input type="text" name="cedula" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><div align="left" class="Estilo5">Nombre:</div></td>
      <td><input type="text" name="nombre" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><div align="left" class="Estilo5">Apellido:</div></td>
      <td><input type="text" name="apellido" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><div align="left" class="Estilo5">Direcci&oacute;n:</div></td>
      <td><input type="text" name="direccion" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><div align="left" class="Estilo5">Tel&eacute;fono:</div></td>
      <td><input type="text" name="telefono" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td height="40" align="right" nowrap><div align="left" class="Estilo5">Email:</div></td>
      <td><input type="text" name="email" value="" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap><input name="submit" type="submit" class="boton" value="Insertar" />
      <label><span class="botonNoActivo">Modificar</span> <span class="botonNoActivo">Eliminar</span> <a href="buscar_cedula.php"  class="boton">Buscar</a> <a href="lista_clientes.php" class="boton">Todos</a><a href="lista_clientes.php">        </a> </label></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
<p align="center"><img src="imagenes/pie_d_pagina.png" width="1181" height="66" /></p>
</body>
</html>
