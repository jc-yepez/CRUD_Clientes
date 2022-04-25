<?php require_once('Connections/conexion_clientes.php'); ?>
<?php
$grupoBotones = "cedula";
if (isset($_GET['GrupoOpciones1'])) {
  $grupoBotones = $_GET['GrupoOpciones1'];
}
$parametro_rsBuscarParametro = "-1";
if (isset($_GET['parametro'])) {
  $parametro_rsBuscarParametro = (get_magic_quotes_gpc()) ? $_GET['parametro'] : addslashes($_GET['parametro']);
}
mysql_select_db($database_conexion_clientes, $conexion_clientes);
$query_rsBuscarParametro = sprintf("SELECT * FROM cliente WHERE %s like '%%%s%%'", $grupoBotones, $parametro_rsBuscarParametro);
$rsBuscarParametro = mysql_query($query_rsBuscarParametro, $conexion_clientes) or die(mysql_error());
$row_rsBuscarParametro = mysql_fetch_assoc($rsBuscarParametro);
$totalRows_rsBuscarParametro = mysql_num_rows($rsBuscarParametro);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Buscar</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<style type="text/css">
<!--
.Estilo2 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
	font-weight: bold;
	font-style: italic;
}
.Estilo6 {color: #00AE2C; font-weight: bold; }
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
<form id="form1" name="form1" method="get" action="buscar_cedula.php?$parametro=parametro&amp;$GrupoOpciones1=GrupoOpciones1">
  <blockquote>
    <blockquote>
      <blockquote>
        <blockquote>
          <blockquote>
            <blockquote>
              <blockquote>
                <p><span class="Estilo2">Buscar un  Cliente</span></p>
              </blockquote>
            </blockquote>
          </blockquote>
        </blockquote>
      </blockquote>
    </blockquote>
  </blockquote>
  <table width="429" border="0" align="center">
    <tr>
      <td width="200"><table width="200">
        <tr>
          <td><span class="Estilo6">
            <label>
<input name="GrupoOpciones1" type="radio" value="cedula" checked="checked" /> 
C&eacute;dula</label>
          </span></td>
        </tr>
        <tr>
          <td><span class="Estilo6">
            <label>
            <input type="radio" name="GrupoOpciones1" value="nombre" />
            Nombre</label>
          </span></td>
        </tr>
      </table>      </td>
      <td width="155" valign="middle"><label>
        <input name="parametro" type="text" id="parametro" />
      </label></td>
      <td width="60" valign="middle"><label>
        <input name="Submit" type="submit" class="boton" value="Buscar" />
      </label></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table border="0" align="center" cellspacing="10">
    <tr bgcolor="#D5FFAA">
      <td><strong>ID Cliente </strong></td>
      <td><strong>C&eacute;dula</strong></td>
      <td><strong>Nombre</strong></td>
      <td><strong>Apellido</strong></td>
      <td><strong>Direcci&oacute;n</strong></td>
      <td><strong>Tel&eacute;fono</strong></td>
      <td><strong>Email</strong></td>
      <td>&nbsp;</td>
    </tr>
    <?php do { ?>
      <tr>
        <td><?php echo $row_rsBuscarParametro['id_cliente']; ?></td>
        <td><?php echo $row_rsBuscarParametro['cedula']; ?></td>
        <td><?php echo $row_rsBuscarParametro['nombre']; ?></td>
        <td><?php echo $row_rsBuscarParametro['apellido']; ?></td>
        <td><?php echo $row_rsBuscarParametro['direccion']; ?></td>
        <td><?php echo $row_rsBuscarParametro['telefono']; ?></td>
        <td><?php echo $row_rsBuscarParametro['email']; ?></td>
        <td><a href="modificar_eliminar.php?cedula=<?php echo $row_rsBuscarParametro['cedula']; ?>">Seleccionar</a></td>
      </tr>
      <?php } while ($row_rsBuscarParametro = mysql_fetch_assoc($rsBuscarParametro)); ?>
  </table>
  </label>
  <p align="center"><a href="index.php" class="boton">Nuevo</a> <a href="lista_clientes.php" class="boton">Todos</a> </p>
</form>
<!-- InstanceEndEditable -->
<p align="center"><img src="imagenes/pie_d_pagina.png" width="1181" height="66" /></p>
<p align="center">&nbsp;</p>
</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsBuscarParametro);
?>
