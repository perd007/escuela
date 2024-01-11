<?php require_once('Connections/conexion.php'); ?>
<?php


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {


$contador=$_POST["contador"] - 1;

for($i=1;$i<=$contador;$i++){

//verificamos que ya no se halla registrado la planilla
mysql_select_db($database_conexion, $conexion);
$query_asistencia = "SELECT * FROM asistencia where lapso='$_POST[lapso]' and mes='$_POST[mes]'  and materia='$_POST[materia]' and periodo='$_POST[periodo]' and grado='$_POST[grado]'";
$asistencia = mysql_query($query_asistencia, $conexion) or die(mysql_error());
$row_asistencia = mysql_fetch_assoc($asistencia);
$totalRows_asistencia = mysql_num_rows($asistencia);


if($totalRows_asistencia>=1){
echo "<script type=\"text/javascript\">alert ('Ya existe un registro de asistencia para este grupo de alumnos'); location.href='principal.php?link=link9' </script>";
exit;
}

                   
//otras validaciones
if(!is_numeric($_POST['dias_asis'.$i])){
echo "<script type=\"text/javascript\">alert ('Solo puede ingresar numeros en los dias asistidos de los alumnos!!!'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}

if($_POST['dias_asis'.$i]==""){
echo "<script type=\"text/javascript\">alert ('No puede dejar campos vacios en los dias asistidos de los alumnos '); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}

if($_POST['dias_asis'.$i]<0){
echo "<script type=\"text/javascript\">alert ('Los valores en los dias asistidos de los alumnos deben ser positivos'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}

}//fin del for


for($i=1;$i<=$contador;$i++){

$diasA=$_POST['dias_asis'.$i];
$histo=$_POST['histo'.$i];
  $insertSQL = sprintf("INSERT INTO asistencia (cod_hist, lapso, mes, materia, dias_totales, periodo, grado, dias_asis, seccion, docente) VALUES ( %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($histo, "int"),
                       GetSQLValueString($_POST['lapso'], "int"),
                       GetSQLValueString($_POST['mes'], "text"),
                       GetSQLValueString($_POST['materia'], "int"),
					   GetSQLValueString($_POST['dias_totales'], "int"),
					   GetSQLValueString($_POST['periodo'], "text"),
					   GetSQLValueString($_POST['grado'], "int"),
					   GetSQLValueString($diasA, "int"),
					   GetSQLValueString($_POST['seccion'], "text"),
					   GetSQLValueString($_POST['docente'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
   if($Result1){
   $contador2++;
   }else{
   $contador2--;
   }
  
  }//fin del for
  
   if($contador2==$contador){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados'); location.href='principal.php?link=link9' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='principal.php?link=link9' </script>";
  exit;
  }
}



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


//Generamos codigo
$cod_asis= $grado.$seccion.$periodo.$lapso.$mes;

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





//asigamosm una sentcia para consulta de materias si los alumno pernetenecen alguna mencion
if($mencion!=""){

$sentencia="and mencion='".$mencion."'";
}

mysql_select_db($database_conexion, $conexion);
$query_materia = "SELECT * FROM materia where grado=".$grado." ".$sentencia."";
$materia = mysql_query($query_materia, $conexion) or die(mysql_error());
$row_materia = mysql_fetch_assoc($materia);
$totalRows_materia = mysql_num_rows($materia);

//fin de la consulta de materias

//si no existe materia regresamos a la pagina anterior
if($totalRows_materia==0){
echo "<script type=\"text/javascript\">alert ('No Existen materias registradas para este año');  location.href='principal.php?link=link3' </script>";
exit;
}




//consulta de historial
$maxRows_historial = 15;
$pageNum_historial = 0;
if (isset($_GET['pageNum_historial'])) {
  $pageNum_historial = $_GET['pageNum_historial'];
}
$startRow_historial = $pageNum_historial * $maxRows_historial;

mysql_select_db($database_conexion, $conexion);
$query_historial = "SELECT * FROM historial where grado=".$grado." and seccion='".$seccion."' and ano_escolar='".$periodo."' ".$sentencia."";
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
echo "<script type=\"text/javascript\">alert ('No Existen Alumnos Registrados para esta seccion, grado y periodo'); location.href='principal.php?link=link9' </script>";
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
.Estilo2 {font-size: 12}
.Estilo3 {font-size: 12px}
.Estilo5 {font-size: 14px; color: #FFFFFF; }
-->
</style>
</head>
<script language="javascript">

function validar(){

				if(document.form1.dias_totales.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('dias_totales').value)){
				alert('Solo puede ingresar numeros en los Dias Totales de Asistencia!!!');
				return false;
		   		}
				}
				
				if(document.form1.dias_totales.value==""){
						alert("Debe Ingresar los Dias Totales de Asistencia para este mes");
						return false;
				}
				if(document.form1.docente.value==""){
						alert("Debe Ingresar el Docente");
						return false;
				}
				
}
		
		
		

</script>

<body>
<form method="post" name="form1" onsubmit="return validar()" action="<?php echo $editFormAction; ?>">
  <table class="border" border="1" align="left" cellpadding="0" cellspacing="0">
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#b50f0f" class="Estilo3"><div align="center" class="Estilo5">Datos de la Asistencia </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo3"><span class="Estilo2">Periodo Academico:</span></td>
      <td class="Estilo3"><span class="Estilo2"><?php echo $periodo; ?></span></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo3"><span class="Estilo2">Grado o A&ntilde;o Escolar:</span></td>
      <td class="Estilo3"><span class="Estilo2"><?php echo $grado."&ordm;"; ?></span></td>
    </tr>
    <tr valign="baseline">
      <td width="136" align="right" nowrap class="Estilo3"><span class="Estilo2">Lapso:</span></td>
      <td width="223" class="Estilo3"><span class="Estilo2"><?php echo $lapso."&ordm;"; ?></span></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo3"><span class="Estilo2">Mes:</span></td>
      <td class="Estilo3"><span class="Estilo2"><?php echo $meses; ?></span></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo3">Seccion:</td>
      <td class="Estilo3"><?php echo $seccion; ?></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo3"><span class="Estilo2">Materia:</span></td>
      <td class="Estilo3"><span class="Estilo2">
        <label>
        <select name="materia" class="Estilo3" id="materia">
          <?php 
do {  
?>
          <option value="<?php echo $row_materia['id_materia']?>"<?php if (!(strcmp($row_materia['id_materia'], $row_materia['id_materia']))) {echo "selected=\"selected\"";} ?>><?php echo $row_materia['nombre']?></option>
          <?php
} while ($row_materia = mysql_fetch_assoc($materia));
  $rows = mysql_num_rows($materia);
  if($rows > 0) {
      mysql_data_seek($materia, 0);
	  $row_materia = mysql_fetch_assoc($materia);
  }
?>
        </select>
        </label>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo3"><span class="Estilo2">Mencion:</span></td>
      <td class="Estilo3"><span class="Estilo2"><?php echo $mencion; ?>&nbsp;</span></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo3"><span class="Estilo2">Docente:</span></td>
      <td class="Estilo3"><span class="Estilo2">
        <label>
        <input name="docente" type="text" class="Estilo3" id="docente" size="35" maxlength="50" />
        </label>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo3"><span class="Estilo2">Dias Totales de Clase </span></td>
      <td class="Estilo3"><input name="dias_totales" type="text" class="Estilo3" id="dias_totales" size="2" maxlength="2" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table class="border" width="562" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="112" bgcolor="#b50f0f" scope="row"><div align="center" class="Estilo5">C.I.N&ordm;    V-&nbsp;</div></td>
      <td width="314" bgcolor="#b50f0f"><div align="center" class="Estilo5">NOMBRES Y APELLIDOS </div></td>
      <td width="124" bgcolor="#b50f0f"><div align="center" class="Estilo5">DIAS ASISTIDOS </div></td>
    </tr>
  
      <?php $cont=1; do { 
	  mysql_select_db($database_conexion, $conexion);
$query_alumno = "SELECT * FROM alumno where cedula='$row_historial[id_alumno]'";
$alumno = mysql_query($query_alumno, $conexion) or die(mysql_error());
$row_alumno = mysql_fetch_assoc($alumno);
$totalRows_alumno = mysql_num_rows($alumno);
	  
	  ?>
	    <tr>
        <td scope="row"><span class="Estilo3"><?php echo $row_alumno['cedula']; ?></span></td>
        <td><span class="Estilo3"><?php echo $row_alumno['nombre']; ?> <?php echo $row_alumno['apellido']; ?></span></td>
        <td><span class="Estilo3">
          <label>
          <input name="dias_asis<?php echo $cont; ?>" type="text" class="Estilo3" id="dias_asis" size="2" maxlength="2" />
          <input type="hidden" name="histo<?php echo $cont; ?>" value="<?php echo  $row_historial["cod_hist"]; ?>">
          </label>
        </span></td>
	    </tr>
        <?php $cont++;} while ($row_historial = mysql_fetch_assoc($historial)); ?>
		 <tr>
	      <td colspan="3" bgcolor="#b50f0f" scope="row">
	        <div align="center" class="Estilo3">
	          <input name="Submit" type="submit" class="Estilo3" value="Guardar" />
           </div>	      </td>
      </tr>
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
 <input type="hidden" name="MM_insert" value="form1">
	<input type="hidden" name="contador" value="<?php echo $cont; ?>">
	<input type="hidden" name="mes" value="<?php echo $meses; ?>">
	<input type="hidden" name="lapso" value="<?php echo $lapso; ?>">
	<input type="hidden" name="periodo" value="<?php echo $periodo; ?>">
	<input type="hidden" name="grado" value="<?php echo $grado; ?>">
<input type="hidden" name="seccion" value="<?php echo $seccion; ?>">
	<input type="hidden" name="mencion" value="<?php echo $mencion; ?>">
	<input type="hidden" name="cod_asis" value="<?php echo $cod_asis; ?>">

</form>
</body>
</html>
