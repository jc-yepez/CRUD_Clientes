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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE cliente SET cedula=%s, nombre=%s, apellido=%s, direccion=%s, telefono=%s, email=%s WHERE id_cliente=%s",
                       GetSQLValueString($_POST['cedula'], "text"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido'], "text"),
                       GetSQLValueString($_POST['direccion'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['id_cliente'], "int"));

  mysql_select_db($database_conexion_clientes, $conexion_clientes);
  $Result1 = mysql_query($updateSQL, $conexion_clientes) or die(mysql_error());
}

if ((isset($_GET['eliminar'])) && ($_GET['eliminar'] != "")) {
  $deleteSQL = sprintf("DELETE FROM cliente WHERE id_cliente=%s",
                       GetSQLValueString($_GET['eliminar'], "int"));

  mysql_select_db($database_conexion_clientes, $conexion_clientes);
  $Result1 = mysql_query($deleteSQL, $conexion_clientes) or die(mysql_error());

  $deleteGoTo = "lista_clientes.php";
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_rsModificarEliminar = "-1";
if (isset($_GET['cedula'])) {
  $colname_rsModificarEliminar = (get_magic_quotes_gpc()) ? $_GET['cedula'] : addslashes($_GET['cedula']);
}
mysql_select_db($database_conexion_clientes, $conexion_clientes);
$query_rsModificarEliminar = sprintf("SELECT * FROM cliente WHERE cedula = '%s'", $colname_rsModificarEliminar);
$rsModificarEliminar = mysql_query($query_rsModificarEliminar, $conexion_clientes) or die(mysql_error());
$row_rsModificarEliminar = mysql_fetch_assoc($rsModificarEliminar);
$totalRows_rsModificarEliminar = mysql_num_rows($rsModificarEliminar);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="Templates/plantilla.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Modificar Eliminar</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.Estilo2 {
	color: #00AE2C;
	font-weight: bold;
}
.Estilo5 {font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
	font-weight: bold;
	font-style: italic;
}
-->
</style>
<link href="css/estilos.css" rel="stylesheet" type="text/css" />
<!-- InstanceEndEditable -->
<style type="text/css">
<!--
.Estilo1 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #00AE2C;
}
-->
</style>
</head>

<body>
<p align="center"><img src="imagenes/encabezado.png" width="1181" height="75" /></p>
<h1 align="center"><span class="Estilo1">ADMINISTRAR CLIENTES</span></h1>
<hr />
<!-- InstanceBeginEditable name="EditRegion3" -->
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <blockquote>
    <blockquote>
      <blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <p><span class="Estilo5">Modificar/Eliminar un  Cliente</span></p>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </blockquote>
    </blockquote>
  </blockquote>
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right"><div align="left" class="Estilo2">ID Cliente :</div></td>
      <td><?php echo $row_rsModificarEliminar['id_cliente']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><div align="left" class="Estilo2">C&eacute;dula:</div></td>
      <td><input type="text" name="cedula" value="<?php echo $row_rsModificarEliminar['cedula']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><div align="left" class="Estilo2">Nombre:</div></td>
      <td><input type="text" name="nombre" value="<?php echo $row_rsModificarEliminar['nombre']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><div align="left" class="Estilo2">Apellido:</div></td>
      <td><input type="text" name="apellido" value="<?php echo $row_rsModificarEliminar['apellido']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><div align="left" class="Estilo2">Direcci&oacute;n:</div></td>
      <td><input type="text" name="direccion" value="<?php echo $row_rsModificarEliminar['direccion']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><div align="left" class="Estilo2">Tel&eacute;fono:</div></td>
      <td><input type="text" name="telefono" value="<?php echo $row_rsModificarEliminar['telefono']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td height="41" align="right" nowrap><div align="left" class="Estilo2">Email:</div></td>
      <td><input type="text" name="email" value="<?php echo $row_rsModificarEliminar['email']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap><div align="center"><a href="index.php" class="boton">Nuevo</a>
        <input name="submit" type="submit" class="boton" value="Modificar" />
        <a href="modificar_eliminar.php?eliminar=<?php echo $row_rsModificarEliminar['id_cliente']; ?>" class="boton">Eliminar </a><a href="buscar_cedula.php" class="boton"> Buscar</a> <a href="lista_clientes.php" class="boton">Todos</a> </div></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_cliente" value="<?php echo $row_rsModificarEliminar['id_cliente']; ?>" />
</form>
<p>&nbsp;</p>
<!-- InstanceEndEditable -->
<p align="center"><img src="imagenes/pie_d_pagina.png" width="1181" height="66" /></p>
<p align="center">&nbsp;</p>
</body><!-- InstanceEnd --></html>
<?php
mysql_free_result($rsModificarEliminar);
?>
