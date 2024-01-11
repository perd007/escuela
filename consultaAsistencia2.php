<?php require_once('Connections/conexion.php'); ?>
<?php


//recibimos valores para la consulta
//si son con POST
if($_POST["grado"]!=""){
$periodo=$_POST["periodo"];
$grado=$_POST["grado"];
$seccion=$_POST["seccion"];
$mes=$_POST["mes"];
$lapso=$_POST["lapso"];
$mencion=$_POST["mencion"];
}else{
//si son get
if($_GET["grado"]!=""){
$periodo=$_GET["periodo"];
$grado=$_GET["grado"];
$seccion=$_GET["seccion"];
$mes=$_GET["mes"];
$lapso=$_GET["lapso"];
$mencion=$_GET["mencion"];
}
}//fin de la recepcion de valores


//asignamos nombres a lso mese
switch ($mes) {
case 1:
$meses="Enero";
break;
case 2:
$meses="Febrero";
break;
case 3:
$meses="Marzo";
break;
case 4:
$meses="Abril";
break;
case 5:
$meses="Mayo";
break;
case 6:
$meses="Junio";
break;
case 7:
$meses="Julio";
break;
case 8:
$meses="Agosto";
break;
case 9:
$meses="Septiembre";
break;
case 10:
$meses="Octubre";
break;
case 11:
$meses="Noviembre";
break;
case 12:
$meses="Diciembre";
break;
}



$maxRows_asistencia = 15;
$pageNum_asistencia = 0;
if (isset($_GET['pageNum_asistencia'])) {
  $pageNum_asistencia = $_GET['pageNum_asistencia'];
}
$startRow_asistencia = $pageNum_asistencia * $maxRows_asistencia;

mysql_select_db($database_conexion, $conexion);
$query_asistencia = "SELECT * FROM asistencia where grado=$grado and periodo='$periodo' and lapso='$lapso' and seccion='$seccion' and mes='$meses' ";
$query_limit_asistencia = sprintf("%s LIMIT %d, %d", $query_asistencia, $startRow_asistencia, $maxRows_asistencia);
$asistencia = mysql_query($query_limit_asistencia, $conexion) or die(mysql_error());
$row_asistencia = mysql_fetch_assoc($asistencia);

if (isset($_GET['totalRows_asistencia'])) {
  $totalRows_asistencia = $_GET['totalRows_asistencia'];
} else {
  $all_asistencia = mysql_query($query_asistencia);
  $totalRows_asistencia = mysql_num_rows($all_asistencia);
}
$totalPages_asistencia = ceil($totalRows_asistencia/$maxRows_asistencia)-1;



$queryString_asistencia = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_asistencia") == false && 
        stristr($param, "totalRows_asistencia") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_asistencia = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_asistencia = sprintf("&totalRows_asistencia=%d%s", $totalRows_asistencia, $queryString_asistencia);




//consulta de materias
mysql_select_db($database_conexion, $conexion);
$query_materia = "SELECT * FROM materia where grado=$grado";
$materia = mysql_query($query_materia, $conexion) or die(mysql_error());
$row_materia = mysql_fetch_assoc($materia);
$totalRows_materia = mysql_num_rows($materia);


$codigo=$row_asistencia['id_Asis'];
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo1 {font-size: 12px}
.Estilo2 {
	font-size: 14px;
	color: #FFFFFF;
}
-->
</style>
</head>

<body>
<form method="get" name="form1" action="principal.php">
  <table class="border" align="left">
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#b50f0f"><div align="center" class="Estilo2">Datos de la Asistencia </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap"><span class="Estilo1">Periodo Academico:</span></td>
      <td><span class="Estilo1"><?php echo  $row_asistencia["periodo"]; ?></span></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap"><span class="Estilo1">Grado o A&ntilde;o Escolar:</span></td>
      <td><span class="Estilo1"><?php echo  $row_asistencia["grado"]; ?>&ordm;</span></td>
    </tr>
    <tr valign="baseline">
      <td width="136" align="right" nowrap="nowrap"><span class="Estilo1">Lapso:</span></td>
      <td width="141"><span class="Estilo1"><?php echo  $row_asistencia["lapso"]; ?>&ordm;</span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span class="Estilo1">Mes:</span></td>
      <td><span class="Estilo1"><?php echo  $row_asistencia["mes"]; ?></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span class="Estilo1">Materia:</span></td>
      <td><span class="Estilo1"><?php echo  $row_materia["nombre"]; ?></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span class="Estilo1">Mencion</span></td>
      <td><span class="Estilo1"><?php echo  $row_asistencia["mencion"]; ?></span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span class="Estilo1">Dias Totales de Clase </span></td>
      <td><span class="Estilo1"><?php echo  $row_asistencia["dias_totales"]; ?></span></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table class="border" width="562" border="1" align="center">
    <tr>
      <td width="111" bgcolor="#b50f0f" class="Estilo2" scope="row"><div align="center">C.I.N&ordm;    V-&nbsp;</div></td>
      <td width="304" bgcolor="#b50f0f" class="Estilo2"><div align="center">NOMBRES Y APELLIDOS </div></td>
      <td width="184" bgcolor="#b50f0f" class="Estilo2"><div align="center">DIAS ASISTIDOS </div></td>
    </tr>
    <?php $cont=1; do { 

mysql_select_db($database_conexion, $conexion);
$query_historial = "SELECT * FROM historial where cod_hist='$row_asistencia[cod_hist]'";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);

mysql_select_db($database_conexion, $conexion);
$query_alumno = "SELECT * FROM alumno where cedula='$row_historial[id_alumno]'";
$alumno = mysql_query($query_alumno, $conexion) or die(mysql_error());
$row_alumno = mysql_fetch_assoc($alumno);
$totalRows_alumno = mysql_num_rows($alumno);
	  
	  ?>
    <tr>
  <td class="Estilo1" scope="row"><div align="center"><?php echo $row_alumno['cedula']; ?></div></td>
  <td class="Estilo1"><div align="center"><?php echo $row_alumno['nombre']; ?> <?php echo $row_alumno['apellido']; ?></div></td>
  <td class="Estilo1"><label>
  <div align="center"><?php echo  $row_asistencia["dias_asis"]; ?>  </div>
  </label></td>
      </tr>
  <?php $cont++; } while ($row_asistencia = mysql_fetch_assoc($asistencia)); ?>
    <tr>
      <td colspan="3" scope="row">
        <div align="center" class="Estilo1">
           
            <input name="Submit" type="submit" class="Estilo1" value="Modificar Datos" />
            <a href="Principal.php?link=link93">
            <input name="Submit" type="button" class="Estilo1" id="Submit" value="Regresar" />
            </a>
		    <a href="Principal.php?link=link96&cod=<?php echo  $row_asistencia["cod_asis"]; ?>">
            <input name="Submit2" type="button" class="Estilo1" id="Submit2" value="Eliminar" />
            </a></div>        </td>
    </tr>
  </table>
  <table border="0" width="50%" align="center">
  <tr>
    <td width="23%" align="center"><?php if ($pageNum_asistencia > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_asistencia=%d%s", $currentPage, 0, $queryString_asistencia); ?>">Primero</a>
          <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center"><?php if ($pageNum_asistencia > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_asistencia=%d%s", $currentPage, max(0, $pageNum_asistencia - 1), $queryString_asistencia); ?>">Anterior</a>
          <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_asistencia < $totalPages_asistencia) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_asistencia=%d%s", $currentPage, min($totalPages_asistencia, $pageNum_asistencia + 1), $queryString_asistencia); ?>">Siguiente</a>
          <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center"><?php if ($pageNum_asistencia < $totalPages_asistencia) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_asistencia=%d%s", $currentPage, $totalPages_asistencia, $queryString_asistencia); ?>">&Uacute;ltimo</a>
          <?php } // Show if not last page echo "aqui";?>
    </td>
  </tr>
</table>
  <p></p>
  <p>
  
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="id_Asis" value="<?php echo $codigo; ?>">
	<input type="hidden" name="contador" value="<?php echo $cont; ?>">
	<input type="hidden" name="mes" value="<?php echo $meses; ?>">
	<input type="hidden" name="lapso" value="<?php echo $lapso; ?>">
	<input type="hidden" name="periodo" value="<?php echo $periodo; ?>">
	<input type="hidden" name="grado" value="<?php echo $grado; ?>">
	<input type="hidden" name="mencion" value="<?php echo $mencion; ?>">
	<input type="hidden" name="cod_asis" value="<?php echo $row_asistencia['cod_asis']; ?>">
		<input type="hidden" name="link" value="link95" />
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>

