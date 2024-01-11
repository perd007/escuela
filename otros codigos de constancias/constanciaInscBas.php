<?php require_once('Connections/conexion.php'); ?>
<?php
mysql_select_db($database_conexion, $conexion);
$query_estudiante = "SELECT * FROM alumno";
$estudiante = mysql_query($query_estudiante, $conexion) or die(mysql_error());
$row_estudiante = mysql_fetch_assoc($estudiante);
$totalRows_estudiante = mysql_num_rows($estudiante);

mysql_select_db($database_conexion, $conexion);
$query_historial = "SELECT * FROM historial";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.interliniado {
	line-height: 0px;

}

-->
</style>
</head>

<body>
<table width="719" border="0" align="center">
  <tr>
    <td><div class="interliniado" >
      <p align="center" >&nbsp;</p>
      <p align="center" >&nbsp;</p>
      <p align="center" >&nbsp;</p>
      <p align="center" >&nbsp;</p>
      <p align="center" >&nbsp;</p>
      <p align="center" >&nbsp;</p>
      <p align="center" >&nbsp;</p>
      <p align="center" >&nbsp;</p>
      <p align="center" >&nbsp;</p>
      <p align="center" ><em>Rep&uacute;blica  Bolivariana de Venezuela </em></p>
      <p align="center"  ><em>Ministerio  del Poder Popular para la Educaci&oacute;n
        </em></p>
      <p align="center"  ><em>Vicariato  Apost&oacute;lico de Puerto Ayacucho </em></p>
      <p align="center"  ><em>U.E.I.B  &ldquo;San Jos&eacute; de Mirabal&rdquo;</em></p>
      <p align="center"  ><em> C&Oacute;DIGO:  PD-00140203 </em></p>
    </div></td>
  </tr>
  <tr>
    <td><p align="center">&nbsp;</p>
      <p align="center">&nbsp;</p>
      <p align="center"><strong><u>CONSTANCIA  DE INSCRIPCI&Oacute;N</u></strong></p>
      <p align="justify">&nbsp;Quien suscribe, <strong>Pbro. Lic. F&eacute;lix Alexis Brito Mu&ntilde;oz</strong>,  titular de la C&eacute;dula de Identidad N&ordm; V- <strong>6.307.017</strong>,  venezolano mayor de edad, Director de la Unidad Educativa Intercultural  Biling&uuml;e &ldquo;San Jos&eacute; de Mirabal&rdquo;,&nbsp;  hace&nbsp; constar&nbsp; por&nbsp;  medio&nbsp; de&nbsp; la&nbsp;  presente&nbsp; que&nbsp; el&nbsp;  (a):&nbsp; <strong><u><?php echo $row_estudiante["nombre"]; ?>, <?php echo $row_estudiante["apellido"]; ?></u></strong>, titular&nbsp; de&nbsp;  la&nbsp; C&eacute;dula&nbsp; Escolar &nbsp;&nbsp;N&ordm; &nbsp;<strong><u><?php echo $row_estudiante["cedula"]; ?></u></strong> ha sido inscrito (a)  para cursar <strong><u>6&ordm; GRADO</u>&nbsp;&nbsp; </strong>secci&oacute;n:<strong> &ldquo;U&rdquo; </strong>de Educaci&oacute;n primaria&nbsp;  en nuestro plantel para el a&ntilde;o escolar&nbsp;&nbsp;&nbsp;&nbsp; <strong><u>2010  &ndash; 2011</u></strong>. </p>
    <p align="justify">Constancia que se  expide a petici&oacute;n de la parte interesada para fines legales en Mirabal el&nbsp; <strong><u>31</u></strong> d&iacute;as del mes de&nbsp; <strong><u>MARZO </u></strong>&nbsp;del a&ntilde;o <strong><u>2011. </u></strong></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p align="center">________________________________<br />
        <strong>Pbro. Lic. F&eacute;lix Alexis Brito Mu&ntilde;oz</strong><br />
    Director</p>    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($estudiante);

mysql_free_result($historial);
?>
