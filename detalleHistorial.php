<?php require_once('Connections/conexion.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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
}


$id=$_GET["id"];
mysql_select_db($database_conexion, $conexion);
$query_hist = "SELECT * FROM historial where cod_hist=$id";
$hist = mysql_query($query_hist, $conexion) or die(mysql_error());
$row_hist = mysql_fetch_assoc($hist);
$totalRows_hist = mysql_num_rows($hist);

mysql_select_db($database_conexion, $conexion);
$query_alum = "SELECT * FROM alumno where cedula='$row_hist[id_alumno]'";
$alum = mysql_query($query_alum, $conexion) or die(mysql_error());
$row_alum = mysql_fetch_assoc($alum);
$totalRows_alum = mysql_num_rows($alum);

mysql_select_db($database_conexion, $conexion);
$query_notasET = "SELECT * FROM notas_educ_trab where cod_hist='$row_hist[cod_hist]'";
$notasET = mysql_query($query_notasET, $conexion) or die(mysql_error());
$row_notasET = mysql_fetch_assoc($notasET);
$totalRows_notasET = mysql_num_rows($notasET);



$maxRows_notas = 15;
$pageNum_notas = 0;
if (isset($_GET['pageNum_notas'])) {
  $pageNum_notas = $_GET['pageNum_notas'];
}
$startRow_notas = $pageNum_notas * $maxRows_notas;

mysql_select_db($database_conexion, $conexion);
$query_notas = "SELECT * FROM notas_materias where cod_hist='$row_hist[cod_hist]'";
$query_limit_notas = sprintf("%s LIMIT %d, %d", $query_notas, $startRow_notas, $maxRows_notas);
$notas = mysql_query($query_limit_notas, $conexion) or die(mysql_error());
$row_notas = mysql_fetch_assoc($notas);

if (isset($_GET['totalRows_notas'])) {
  $totalRows_notas = $_GET['totalRows_notas'];
} else {
  $all_notas = mysql_query($query_notas);
  $totalRows_notas = mysql_num_rows($all_notas);
}
$totalPages_notas = ceil($totalRows_notas/$maxRows_notas)-1;







?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo1 {
font-size: 12px;
}
.Estilo2 {
	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="480"   border="1" cellpadding="1" cellspacing="0" bordercolor="#000000" class="border">
  <tr>
    <th colspan="3" bgcolor="#b50f0f" class="Estilo2" scope="col">Datos del Alumno: <?php echo $row_alum['cedula']; ?> <?php echo $row_alum['nombre']; ?> <?php echo $row_alum['apellido']; ?></th>
  </tr>
  <tr>
    <td><span class="Estilo1">Periodo Academico: <?php echo $row_hist['ano_escolar']; ?></span></td>
    <td colspan="2"><span class="Estilo1">Seccion: <?php echo $row_hist['seccion']; ?></span></td>
  </tr>
  <?php
//verificamos si el alumno tiene notas registradas 
if($row_notas["cod_NM"]!=""){ ?>
  <tr>
    <td colspan="3" bgcolor="#b50f0f">&nbsp;</td>
  </tr>
  <tr>
    <td width="261"><div align="center" class="Estilo1">Materia</div></td>
    <td colspan="2"><div align="center" class="Estilo1">Definitiva</div></td>
  </tr>
  <?php do { 
  mysql_select_db($database_conexion, $conexion);
$query_materias = "SELECT * FROM materia where id_materia='$row_notas[id_materia]'";
$materias = mysql_query($query_materias, $conexion) or die(mysql_error());
$row_materias = mysql_fetch_assoc($materias);
$totalRows_materias = mysql_num_rows($materias);

mysql_select_db($database_conexion, $conexion);
$query_educT = "SELECT * FROM educ_trabajo where id_eduT='$row_notasET[id_eduT]'";
$educT = mysql_query($query_educT, $conexion) or die(mysql_error());
$row_educT = mysql_fetch_assoc($educT);
$totalRows_educT = mysql_num_rows($educT);

//observciones
mysql_select_db($database_conexion, $conexion);
$query_observacion = "SELECT * FROM observaciones where cod_hist=$id";
$observacion = mysql_query($query_observacion, $conexion) or die(mysql_error());
$row_observacion = mysql_fetch_assoc($observacion);
$totalRows_observacion = mysql_num_rows($observacion);
?>
  <tr>
    <td><div align="center" class="Estilo1"><?php echo $row_materias['nombre']; ?></div></td>
    <td colspan="2"><div align="center" class="Estilo1"><?php echo $row_notas['definitiva']; ?></div></td>
  </tr>
  <?php } while ($row_notas = mysql_fetch_assoc($notas)); 
	}//fin de la verificacion
	?>
    <tr>
    <td colspan="3" bgcolor="#b50f0f" align="center" class="Estilo2">Observaciones</td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%" border="0">
      <tr>
        <th scope="col">Lapso I</th>
        <th scope="col">Lapso II</th>
        <th scope="col">Lapso III</th>
      </tr>
      <tr>
        <td scope="col"><span ><?php echo $row_observacion['primero']; ?></span></td>
        <td scope="col"><span ><?php echo $row_observacion['segundo']; ?></span></td>
        <td scope="col"><span ><?php echo $row_observacion['tercero']; ?></span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#b50f0f"><div align="center"><a href="Principal.php?link=link52&validar=1&cedula=<?php echo $_GET["cedula"]; ?>">
      <input name="Submit" type="button" class="Estilo1" value="Regresar" />
    </a></div></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>

