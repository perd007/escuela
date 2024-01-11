<?php require_once('Connections/conexion.php'); ?>
<?php

$grado=$_GET["grado"];
$seccion=$_GET["seccion"];
$periodo=$_GET["periodo"];
$mencion=$_GET["mencion"];

if($mencion!=""){
$parche=" and mencion='$mencion'";
}else{
$parche=" ";
}

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_historial = 30;
$pageNum_historial = 0;
if (isset($_GET['pageNum_historial'])) {
  $pageNum_historial = $_GET['pageNum_historial'];
}
$startRow_historial = $pageNum_historial * $maxRows_historial;

mysql_select_db($database_conexion, $conexion);
$query_historial = "SELECT * FROM historial where grado=$grado and seccion='$seccion' and ano_escolar='$periodo' ".$parche." order by id_alumno asc";
$query_limit_historial = sprintf("%s LIMIT %d, %d", $query_historial, $startRow_historial, $maxRows_historial);
$historial = mysql_query($query_limit_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);

if (isset($_GET['totalRows_historial'])) {
  $totalRows_historial = $_GET['totalRows_historial'];
} else {
  $all_historial = mysql_query($query_historial);
  $totalRows_historial = mysql_num_rows($all_historial);
}
$totalPages_historial = ceil($totalRows_historial/$maxRows_historial)-1;



$queryString_historial = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_historial") == false && 
        stristr($param, "totalRows_historial") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_historial = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_historial = sprintf("&totalRows_historial=%d%s", $totalRows_historial, $queryString_historial);

if($totalRows_historial<=0){
echo "<script type=\"text/javascript\">alert ('No Existen Alumnos Registrados para esta seccion, grado y periodo'); location.href='principal.php?link=link1113' </script>";
exit;
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="estilos.css" rel="stylesheet" type="text/css">

<style type="text/css">
<!--

.Estilo3 {font-size: small}
.Estilo4 {
	font-size: 12px;
	color: #FFFFFF;
}
.Estilo5 {
	font-size: 12px;
	font-weight: bold;
}
.Estilo6 {font-size: 12px; }
-->
</style>
</head>

<body>
<p align="center">&nbsp;</p>
<table class="border" width="410" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <th colspan="6" bgcolor="#b50f0f" scope="col"><span class="Estilo4">Consulta por Seccion, Grado y Periodo Academico </span></th>
  </tr>
  <tr>
    <th colspan="5" scope="col"><div align="right" class="Estilo5">GRADO:</div></th>
    <td width="221" scope="col"><div align="left" class="Estilo6"><?php echo $row_historial['grado']; ?><strong>&ordm;</strong> </div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="right" class="Estilo6"><strong>SECCION:</strong></div></td>
    <td><div align="left" class="Estilo6"><?php echo $row_historial['seccion']; ?></div></td>
  </tr>
  <tr>
    <td colspan="5"><div align="right" class="Estilo6"><strong>PERIODO ACADEMICO:</strong> </div></td>
    <td><span class="Estilo6"><?php echo $row_historial['ano_escolar']; ?></span></td>
  </tr>
  
  <tr>
    <td width="138" bgcolor="#b50f0f" class="Estilo4"><div align="center" class="Estilo3"><strong>C.I.N&ordm; V-</strong></div></td>
    <td colspan="5" bgcolor="#b50f0f" class="Estilo4"><div align="center" class="Estilo3"><strong>NOMBRES Y APELLIDOS </strong></div></td>
  </tr>
  <?php do {
  
  mysql_select_db($database_conexion, $conexion);
$query_alumnos = "SELECT * FROM alumno where cedula='$row_historial[id_alumno]'";
$alumnos = mysql_query($query_alumnos, $conexion) or die(mysql_error());
$row_alumnos = mysql_fetch_assoc($alumnos);
$totalRows_alumnos = mysql_num_rows($alumnos);
  
   ?>
    <tr>
      <td class="Estilo6"><div align="center" class="Estilo3"><?php echo $row_historial['id_alumno']; ?></div></td>
      <td colspan="5" class="Estilo6"><div align="center" class="Estilo3"><?php echo $row_alumnos['nombre']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row_alumnos['apellido']; ?></div></td>
    </tr>
    <?php } while ($row_historial = mysql_fetch_assoc($historial)); ?>
</table>

<table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center"><?php if ($pageNum_historial > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_historial=%d%s", $currentPage, 0, $queryString_historial); ?>">Primero</a>
          <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center"><?php if ($pageNum_historial > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_historial=%d%s", $currentPage, max(0, $pageNum_historial - 1), $queryString_historial); ?>">Anterior</a>
          <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_historial < $totalPages_historial) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_historial=%d%s", $currentPage, min($totalPages_historial, $pageNum_historial + 1), $queryString_historial); ?>">Siguiente</a>
          <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_historial < $totalPages_historial) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_historial=%d%s", $currentPage, $totalPages_historial, $queryString_historial); ?>">&Uacute;ltimo</a>
          <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
<table width="100" border="0" align="center" cellpadding="2" cellspacing="2">
  <tr>
    <th scope="col"><label><a href="Principal.php?link=link1113">
    <input name="Submit" type="button" class="Estilo6" value="Regresar" />
    </a></label></th>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($historial);

mysql_free_result($alumnos);
?>
