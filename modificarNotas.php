<?php require_once('Connections/conexion.php'); ?>
<?php 
if($validacion==true){
	if($modi==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Modificaciones'); location.href='principal.php' </script>";
 exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido'); location.href='principal.php' </script>";
 exit;
 }
?>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}



if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

//realizamos tantas repeticiones como materias alla cursado el alumno
$contador=$_POST["contador"] - 1;
$contadorET=$_POST["contador2"] - 1;

$contador2=0;

for($i=1;$i<=$contador;$i++){


//validar que ningun campo este vacio
if($_POST['lapso_1_70'.$i]==""){
echo "<script type=\"text/javascript\">alert ('Debe Ingresar la nota del 70% del primer lapso '); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if($_POST['lapso_1_30'.$i]==""){
echo "<script type=\"text/javascript\">alert ('Debe Ingresar la nota del 30% del primer lapso'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if($_POST['lapso_2_70'.$i]=="" and $_POST['lap2']!=""){
echo "<script type=\"text/javascript\">alert ('Debe Ingresar la nota del 70% del segundo lapso'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if($_POST['lapso_2_30'.$i]==""and $_POST['lap2']!="" ){
echo "<script type=\"text/javascript\">alert ('Debe Ingresar la nota del 30% del segundo lapso'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if($_POST['lapso_3_70'.$i]=="" and $_POST['lap3']!=""){
echo "<script type=\"text/javascript\">alert ('Debe Ingresar la nota del 70% del tercer lapso'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if($_POST['lapso_3_30'.$i]=="" and $_POST['lap3']!=""){
echo "<script type=\"text/javascript\">alert ('Debe Ingresar la nota del 30% del tercer lapso'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}



//validar que las notas esten dentro del rango de 1 a 20
if($_POST['lapso_1_70'.$i]<1 or $_POST['lapso_1_70'.$i]>20){
echo "<script type=\"text/javascript\">alert ('La nota ingresada del 70% del primer lapso debe estar entre 1 y 20 puntos'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if($_POST['lapso_1_30'.$i]<1 or $_POST['lapso_1_30'.$i]>20){
echo "<script type=\"text/javascript\">alert ('La nota ingresada del 30% del primer lapso debe estar entre 1 y 20 puntos'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}

if($_POST['lapso_2_70'.$i]<1 or $_POST['lapso_2_70'.$i]>20 ){
echo "<script type=\"text/javascript\">alert ('La nota ingresada del 70% del segundo lapso debe estar entre 1 y 20 puntos'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}

if($_POST['lapso_2_30'.$i]<1 or $_POST['lapso_2_30'.$i]>20 ){
echo "<script type=\"text/javascript\">alert ('La nota ingresada del 30% del segundo lapso debe estar entre 1 y 20 puntos'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}

if($_POST['lapso_3_70'.$i]<1 or $_POST['lapso_3_70'.$i]>20  ){
echo "<script type=\"text/javascript\">alert ('La nota ingresada del 70% del tercer lapso debe estar entre 1 y 20 puntos'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}


if($_POST['lapso_3_30'.$i]<1 or $_POST['lapso_3_30'.$i]>20   ){
echo "<script type=\"text/javascript\">alert ('La nota ingresada del 30% del tercer lapso debe estar entre 1 y 20 puntos'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}


//validar que los valores sean enteros
if(!is_numeric($_POST['lapso_1_70'.$i])){
echo "<script type=\"text/javascript\">alert ('Solo puede ingresar numeros en la  nota del 70% del primer lapso!!!'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if(!is_numeric($_POST['lapso_1_30'.$i])){
echo "<script type=\"text/javascript\">alert ('Solo puede ingresar numeros en la  nota del 30% del primer lapso!!!'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if(!is_numeric($_POST['lapso_2_70'.$i])){
echo "<script type=\"text/javascript\">alert ('Solo puede ingresar numeros en la  nota del 70% del segundo lapso!!!'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if(!is_numeric($_POST['lapso_2_30'.$i])){
echo "<script type=\"text/javascript\">alert ('Solo puede ingresar numeros en la  nota del 30% del segundo lapso!!!'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if(!is_numeric($_POST['lapso_3_70'.$i])){
echo "<script type=\"text/javascript\">alert ('Solo puede ingresar numeros en la  nota del 70% del tercer lapso!!!'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if(!is_numeric($_POST['lapso_3_30'.$i])){
echo "<script type=\"text/javascript\">alert ('Solo puede ingresar numeros en la  nota del 70% del tercer lapso!!!'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}

}//fin del for

for($i=1;$i<=$contador;$i++){
//calculamos definitiva

echo "<br>";
$lapso1=round(($_POST['lapso_1_70'.$i] + $_POST['lapso_1_30'.$i])/2);
$lapso2=round(($_POST['lapso_2_70'.$i] + $_POST['lapso_2_30'.$i])/2);
$lapso3=round(($_POST['lapso_3_70'.$i] + $_POST['lapso_3_30'.$i])/2);
$definitiva=round($final1=($lapso1 + $lapso2 + $lapso3)/3);

  $updateSQL = sprintf("UPDATE notas_materias SET lapso_1_70=%s, lapso_1_30=%s, lapso_2_70=%s, lapso_2_30=%s, lapso_3_70=%s, lapso_3_30=%s, definitiva=%s  WHERE cod_hist=%s and cod_NM=%s",
                       GetSQLValueString($_POST['lapso_1_70'.$i], "int"),
                       GetSQLValueString($_POST['lapso_1_30'.$i], "int"),
                       GetSQLValueString($_POST['lapso_2_70'.$i], "int"),
                       GetSQLValueString($_POST['lapso_2_30'.$i], "int"),
                       GetSQLValueString($_POST['lapso_3_70'.$i], "int"),
                       GetSQLValueString($_POST['lapso_3_30'.$i], "int"),
                       GetSQLValueString($definitiva, "int"),
                       GetSQLValueString($_POST['histo'], "int"),
					   GetSQLValueString($_POST['cod_NM'.$i], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  if($Result1){
   $contador2++;
   }else{
   $contador2--;
   }


  
 }//fin del for
 
  //Guardsamos observaciones
 $insertSQLO = sprintf("UPDATE observaciones set primero=%s, segundo=%s, tercero=%s where cod_hist=%s ",
                       GetSQLValueString($_POST['observacion1'], "text"),
					   GetSQLValueString($_POST['observacion2'], "text"),
					   GetSQLValueString($_POST['observacion3'], "text"),
					   GetSQLValueString($_POST['histo'], "int"));
					   
					  

  mysql_select_db($database_conexion, $conexion);
  $ResultO = mysql_query($insertSQLO, $conexion) or die(mysql_error());
   if($ResultO){
   }else{
   echo "<script type=\"text/javascript\">alert ('No se Guardo las Observaciones');  location.href='Principal.php?link=link52&validar=1&cedula=$_POST[cedula]' </script>";
  exit;
   }//fin del ingreso de observaciones 

 
  
  
if ($_POST["MM_update2"] == "form2") {


for($i=1;$i<=$contadorET;$i++){

if($_POST['programa1'.$i]==""){
echo "<script type=\"text/javascript\">alert ('Debe Ingresar la nota del primer lapso'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if($_POST['programa2'.$i]==""){
echo "<script type=\"text/javascript\">alert ('Debe Ingresar la nota del segundo lapso'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if($_POST['programa3'.$i]==""){
echo "<script type=\"text/javascript\">alert ('Debe Ingresar la nota del tercer lapso'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}


if($_POST['programa1'.$i]<1 or $_POST['programa1'.$i]>20){
echo "<script type=\"text/javascript\">alert ('La nota ingresada del primer lapso de educacion para el trabajo lapso debe estar entre 1 y 20 puntos'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if($_POST['programa2'.$i]<1 or $_POST['programa2'.$i]>20){
echo "<script type=\"text/javascript\">alert ('La nota ingresada del segundo lapso de educacion para el trabajo debe estar entre 1 y 20 puntos'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if($_POST['programa3'.$i]<1 or $_POST['programa3'.$i]>20){
echo "<script type=\"text/javascript\">alert ('La nota ingresada del  tercer lapso de educacion para el trabajo debe estar entre 1 y 20 puntos'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}


//validar que los valores sean enteros
if(!is_numeric($_POST['programa1'.$i])){
echo "<script type=\"text/javascript\">alert ('Solo puede ingresar numeros en la  nota del  primer lapso de educacion para el trabajo!!!'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if(!is_numeric($_POST['programa2'.$i])){
echo "<script type=\"text/javascript\">alert ('Solo puede ingresar numeros en la nota del segundo lapso de educacion para el trabajo!!!'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
if(!is_numeric($_POST['programa3'.$i])){
echo "<script type=\"text/javascript\">alert ('Solo puede ingresar numeros en la nota del tercer lapso de educacion para el trabajo!!!'); location.href='principal.php?link=link60&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}
}//fin deñ for de vlidacion

for($i=1;$i<=$contadorET;$i++){

$final=($_POST['programa1'.$i] + $_POST['programa2'.$i] + $_POST['programa3'.$i])/3;

  $updateSQL = sprintf("UPDATE notas_educ_trab SET primer_lapso=%s, segundo_lapso=%s, tercer_lapso=%s, definitivo=%s WHERE cod_ET=%s",
                       GetSQLValueString($_POST['programa1'.$i], "int"),
                       GetSQLValueString($_POST['programa2'.$i], "int"),
                       GetSQLValueString($_POST['programa3'.$i], "int"),
                       GetSQLValueString($final, "int"),
                       GetSQLValueString($_POST['cod_ET'.$i], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result2 = mysql_query($updateSQL, $conexion) or die(mysql_error());
   if($Result2){
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error al guardar la notas de Educacion para el trabajo');  location.href='Principal.php?link=link52&validar=1&cedula=$_POST[cedula]' </script>";
  exit;
  }
}

}//fin del for

if($contador2==$contador){
//otra para saber a donde volver si a consulta historial o a vernotas
$val2=$_POST["val2"];
if($val2==1){
	 $variable= "link10";
}else{
	 $variable= "link52";
}


//script para regresar
  echo "<script type=\"text/javascript\">alert ('Datos Guardados');  location.href='Principal.php?link=$variable&cedula=$_POST[cedula]&validar=1&val=$_POST[val]' </script>";
  }else{
 
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='Principal.php?link=$variable&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
  exit;
   }

}
/************************************************************************************************/

//recibimos datos
$hist=$_GET["hist"];
$alumno=$_GET["cedula"];
$val=$_GET["val"];
//asgnamos direccionde botor de regreso

if($val==1){
	 $ruta= "principal.php?link=link52&validar=1&cedula=$cedula";
}else{
if($val==2){
	 $ruta= "principal.php?link=link10&validar=1&cedula=$cedula";
}
}



//otra para saber a donde volver si a consulta historial o a vernotas
$val2=$_GET["val2"];
if($val2==1){
	  $variable="link10";
}else{
	  $variable="link52";
}

mysql_select_db($database_conexion, $conexion);
$query_historial = "SELECT * FROM historial where cod_hist=$hist";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);


//buscamos datos del alumno
mysql_select_db($database_conexion, $conexion);
$query_alumnos = "SELECT * FROM alumno where cedula=$alumno";
$alumnos = mysql_query($query_alumnos, $conexion) or die(mysql_error());
$row_alumnos = mysql_fetch_assoc($alumnos);
$totalRows_alumnos = mysql_num_rows($alumnos);


//inicio del juego de regsitros
$maxRows_materias = 15;
$pageNum_materias = 0;
if (isset($_GET['pageNum_materias'])) {
  $pageNum_materias = $_GET['pageNum_materias'];
}
$startRow_materias = $pageNum_materias * $maxRows_materias;

mysql_select_db($database_conexion, $conexion);
$query_materias = "SELECT * FROM materia where grado='$row_historial[grado]'";
$query_limit_materias = sprintf("%s LIMIT %d, %d", $query_materias, $startRow_materias, $maxRows_materias);
$materias = mysql_query($query_limit_materias, $conexion) or die(mysql_error());
$row_materias = mysql_fetch_assoc($materias);

if (isset($_GET['totalRows_materias'])) {
  $totalRows_materias = $_GET['totalRows_materias'];
} else {
  $all_materias = mysql_query($query_materias);
  $totalRows_materias = mysql_num_rows($all_materias);
}
$totalPages_materias = ceil($totalRows_materias/$maxRows_materias)-1;



//consulta para verificar si los lapsos estan llenos todos
mysql_select_db($database_conexion, $conexion);
$query_not = "SELECT * FROM notas_materias where cod_hist=$hist and id_materia='$row_materias[id_materia]'";
$not = mysql_query($query_not, $conexion) or die(mysql_error());
$row_not = mysql_fetch_assoc($not);
$totalRows_not = mysql_num_rows($not);

mysql_select_db($database_conexion, $conexion);
$query_notasET = "SELECT * FROM notas_educ_trab  where cod_hist=$hist";
$notasET = mysql_query($query_notasET, $conexion) or die(mysql_error());
$row_notasET = mysql_fetch_assoc($notasET);
$totalRows_notasET = mysql_num_rows($notasET);

mysql_select_db($database_conexion, $conexion);
$query_materiaEt = "SELECT * FROM educ_trabajo where id_eduT='$row_notasET[id_eduT]'";
$materiaEt = mysql_query($query_materiaEt, $conexion) or die(mysql_error());
$row_materiaEt = mysql_fetch_assoc($materiaEt);
$totalRows_materiaEt = mysql_num_rows($materiaEt);

mysql_select_db($database_conexion, $conexion);
$query_observaciones = "SELECT * FROM observaciones where cod_hist=$hist";
$observaciones = mysql_query($query_observaciones, $conexion) or die(mysql_error());
$row_observaciones = mysql_fetch_assoc($observaciones);
$totalRows_observaciones = mysql_num_rows($observaciones);



$maxRows_MaEdt = 10;
$pageNum_MaEdt = 0;
if (isset($_GET['pageNum_MaEdt'])) {
  $pageNum_MaEdt = $_GET['pageNum_MaEdt'];
}
$startRow_MaEdt = $pageNum_MaEdt * $maxRows_MaEdt;

mysql_select_db($database_conexion, $conexion);
$query_MaEdt = "SELECT * FROM educ_trabajo where grado='$row_historial[grado]'";
$query_limit_MaEdt = sprintf("%s LIMIT %d, %d", $query_MaEdt, $startRow_MaEdt, $maxRows_MaEdt);
$MaEdt = mysql_query($query_limit_MaEdt, $conexion) or die(mysql_error());
$row_MaEdt = mysql_fetch_assoc($MaEdt);

if (isset($_GET['totalRows_MaEdt'])) {
  $totalRows_MaEdt = $_GET['totalRows_MaEdt'];
} else {
  $all_MaEdt = mysql_query($query_MaEdt);
  $totalRows_MaEdt = mysql_num_rows($all_MaEdt);
}
$totalPages_MaEdt = ceil($totalRows_MaEdt/$maxRows_MaEdt)-1;




 mysql_select_db($database_conexion, $conexion);
$query_eduT2 = "SELECT * FROM notas_educ_trab where cod_hist='$row_historial[cod_hist]' and id_eduT='$row_MaEdt[id_eduT]'";
$eduT2 = mysql_query($query_eduT2, $conexion) or die(mysql_error());
$row_eduT2 = mysql_fetch_assoc($eduT2);
$totalRows_eduT2 = mysql_num_rows($eduT2);



if($totalRows_not <=0){
echo "<script type=\"text/javascript\">alert ('Este Alumno Aun no Tiene Notas Cargadas'); location.href='principal.php?link=link52&MM_insert=form1&validar=1&cedula=$alumno' </script>";
exit;
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo2 {color: #FFFFFF}
.Estilo4 {color: #FFFFFF; font-weight: bold; }
-->
</style>
</head>


<body>
<form action="<?php echo $editFormAction; ?>" method="post" enctype="multipart/form-data" name="form1"  onsubmit="return validar()">
<table width="498"  border="1" cellpadding="0" cellspacing="0">
  <tr>
    <th colspan="8" bgcolor="#b50f0f" scope="col"><span class="Estilo2">Datos del Alumno: <?php echo $row_alumnos['cedula']."   "; ?><?php echo $row_alumnos['nombre']."   "; ?><?php echo $row_alumnos['apellido']."   "; ?></span></th>
  </tr>
  <tr>
    <td width="195"   rowspan="2"><div align="center"><strong>Materia</strong></div></td>
    <td colspan="2" ><div align="center"><strong>Lapso I </strong></div></td>
	<?php //validar si posee notas en segundo lapso
	if($row_not['lapso_2_30']!="" and $row_not['lapso_2_70']!=""){
	 ?>
    <td colspan="2"><div align="center"><strong>Lapso II </strong></div></td>
	<?php } //fin de la validacion
	if($row_not['lapso_3_30']!="" and $row_not['lapso_3_70']!=""){ ?>
    <td colspan="2"><div align="center"><strong>Lapso III </strong></div></td>
    <td width="87" rowspan="2"><div align="center"><strong>Definitiva</strong></div></td>
    <?php }//fin de la validacion?>
  </tr>
  <tr>
    <td width="37"><div align="center"><strong>70%</strong></div></td>
    <td width="32"><div align="center"><strong>30%</strong></div></td>
	<?php //validar si posee notas en segundo lapso
	if($row_not['lapso_2_30']!="" and $row_not['lapso_2_70']!=""){
	 ?>
    <td width="32" ><div align="center"><strong>70%</strong></div></td>
    <td width="32" ><div align="center"><strong>30%</strong></div></td>
		<?php } //fin de la validacion
	if($row_not['lapso_3_30']!="" and $row_not['lapso_3_70']!=""){ ?>
    <td width="33" ><div align="center"><strong>70%</strong></div></td>
    <td width="32" ><div align="center"><strong>30%</strong></div></td>
	<?php }//fin de la validacion?>
  </tr>
  <?php $cont=1; do { 
  
  mysql_select_db($database_conexion, $conexion);
$query_no = "SELECT * FROM notas_materias where cod_hist=$hist and id_materia='$row_materias[id_materia]'";
$no = mysql_query($query_no, $conexion) or die(mysql_error());
$row_no = mysql_fetch_assoc($no);
$totalRows_no = mysql_num_rows($no);
  
  ?>
    <tr>
      <td ><div align="center"><?php echo $row_materias['nombre']; ?></div></td>
      <td>
          <div align="center">
            <input name="lapso_1_70<?php echo $cont; ?>" id="lapso_1_70<?php echo $cont; ?>" type="text" value="<?php echo $row_no['lapso_1_70']; ?>" size="2" maxlength="2" />
          </div></td>
      <td><div align="center">
        <input name="lapso_1_30<?php echo $cont; ?>" id="lapso_1_30<?php echo $cont; ?>" type="text" value="<?php echo $row_no['lapso_1_30']; ?>" size="2" maxlength="2" />
      </div></td>
	  <?php //validar si posee notas en segundo lapso
	if($row_not['lapso_2_30']!="" and $row_not['lapso_2_70']!=""){
	 ?>
      <td><div align="center">
        <input name="lapso_2_70<?php echo $cont; ?>" id="lapso_2_70<?php echo $cont; ?>" type="text" value="<?php echo $row_no['lapso_2_70']; ?>" size="2" maxlength="2" />
      </div></td>
      <td><div align="center">
        <input name="lapso_2_30<?php echo $cont; ?>" id="lapso_2_30<?php echo $cont; ?>" type="text" value="<?php echo $row_no['lapso_2_30']; ?>" size="2" maxlength="2" />
      </div></td>
	  <?php } //fin de la validacion
	if($row_not['lapso_3_30']!="" and $row_not['lapso_3_70']!=""){ ?>
      <td><div align="center">
        <input name="lapso_3_70<?php echo $cont; ?>"  type="text" id="lapso_3_70<?php echo $cont; ?>" value="<?php echo $row_no['lapso_3_70']; ?>" size="2" maxlength="2" />
      </div></td>
      <td><div align="center">
        <input name="lapso_3_30<?php echo $cont; ?>" id="lapso_3_30<?php echo $cont; ?>" type="text" value="<?php echo $row_no['lapso_3_30']; ?>" size="2" maxlength="2" />
      </div></td>
      <td><div align="center"><?php echo $row_no['definitiva']; ?></div></td>
      <?php }//fin de la validacion ?>
    </tr>
	<input type="hidden" name="cod_NM<?php echo $cont; ?>" value="<?php echo $row_no['cod_NM']; ?>">
	
    <?php $cont++;
	} while ($row_materias = mysql_fetch_assoc($materias)); ?>
  </table>
  <table width="450" border="0">
    <tr>
      <td height="12" bgcolor="#b50f0f"><div align="left" class="Estilo4">
        <div align="center">Primer Lapso </div>
      </div></td>
      <td width="143" bgcolor="#b50f0f"><div align="left" class="Estilo4">
        <div align="center">Segundo Lapso </div>
      </div></td>
      <td bgcolor="#b50f0f"><div align="left" class="Estilo4">
        <div align="center">Tercer Lapso </div>
      </div></td>
    </tr>
    <tr>

      <td width="154" ><textarea name="observacion1" cols="20" rows="2" id="observacion1" onkeydown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"><?php echo $row_observaciones['primero']; ?></textarea>      </td>
      <td width="154"><textarea name="observacion2" cols="20" rows="2" id="observacion2" onkeydown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"><?php echo $row_observaciones['segundo']; ?></textarea></td>	 
      <td width="154"><textarea name="observacion3" cols="20" rows="2" id="observacion3" onkeydown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"><?php echo $row_observaciones['tercero']; ?></textarea></td>
    </tr>
  </table>
  <p><?php 
  //vcalidamos si posee notas de educacion para el trabajo
  if($totalRows_notasET>0){ ?>
  </p>
  <table border="1" cellpadding="0" cellspacing="0">
    <tr>
      <th colspan="6" bgcolor="#b50f0f" scope="col"><div align="center" class="Estilo2">Materias de Educacion para el Trabajo </div></th>
    </tr>
    <tr>
      <td width="181"><strong>Materia </strong></td>
      <td width="59"><div align="center"><strong>Lapso 1 </strong></div></td>
      <? 
	   ////verificamos si existen notas de 1er lapso para pedir las de 2do
	  if($row_eduT2['segundo_lapso']!="") { 
	  ?>
      <td width="61"><div align="center"><strong>Lapso 2 </strong></div></td>
      <? }
	   ////verificamos si existen notas de 1er lapso para pedir las de 2do
	  if($row_eduT2['tercer_lapso']!="") { 
	  ?>
      <td width="60"><div align="center"><strong>Lapso 3 </strong></div></td>
      <? }?>
      <? if($row_eduT2['definitivo']!=""){ ?>
      <td width="66"><div align="center"><strong>Definitiva</strong></div></td>
      <? }?>
    </tr>
    <?php 
	  $contEd=1;
	  do { 
	  
	  $arregloET[$contEd]=$row_MaEdt['id_eduT'];
	
	  
	  mysql_select_db($database_conexion, $conexion);
$query_eduT = "SELECT * FROM notas_educ_trab where cod_hist='$row_historial[cod_hist]' and id_eduT='$row_MaEdt[id_eduT]'";
$eduT = mysql_query($query_eduT, $conexion) or die(mysql_error());
$row_eduT = mysql_fetch_assoc($eduT);
$totalRows_eduT = mysql_num_rows($eduT);
  $arregloNotas2[$contEd]=$row_eduT["primer_lapso"]+ $row_eduT["segundo_lapso"];
	  ?>
    <tr>
      <td><?php echo $row_MaEdt['nombre']; ?></td>
      <td><div align="center">
        <input name="programa1<?php echo $contEd; ?>" type="text" value="<?php echo $row_eduT['primer_lapso']; ?>" size="2" maxlength="2" />
      </div></td>
      <? 
	   ////verificamos si existen notas de 1er lapso para pedir las de 2do
	  if($row_eduT['segundo_lapso']!="") { 
	  ?>
      <td><div align="center">
        <input name="programa2<?php echo $contEd; ?>" type="text" value="<?php echo $row_eduT['segundo_lapso']; ?>" size="2" maxlength="2" />
      </div></td>
      <? }//fin de verificacion para mostrar segundo lapso ?>
      <? if($row_eduT['tercer_lapso']!="") { ?>
      <td><div align="center">
        <input name="programa3<?php echo $contEd; ?>" type="text" value="<?php echo $row_eduT['tercer_lapso']; ?>" size="2" maxlength="2" />
      </div></td>
      <td><div align="center"><?php echo $row_eduT['definitivo']; ?></div></td>
     
      <? }//fin de la verificacion para mostrar tercer lapso ?>
    </tr>
	 <input type="hidden" name="cod_ET<?php echo $contEd; ?>" value="<?php echo  $row_eduT['cod_ET']; ?>">
    <?php  
	$contEd++; } while ($row_MaEdt = mysql_fetch_assoc($MaEdt)); 
	
		?>
  </table>
  <p>&nbsp;    </p>
    <p>
      <input type="hidden" name="MM_update2" value="form2">
     
      
      <?php } //fin de la validacion de educacion para el trabajo ?>
    </p>
    <table width="545" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <th width="271" bgcolor="#b50f0f" scope="col">
        <div align="right">
          <input name="submit" type="submit" value="Actualizar Notas">
      </div></th>
      <th width="264" bgcolor="#b50f0f" scope="col"><div align="left"><a href="<?php echo  $ruta; ?>">
          <input name="submit2" type="submit" value="Regresar">
      </a></div></th>
    </tr>
  </table>
  <p><input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="cedula" value="<?php echo $alumno; ?>">
    <input type="hidden" name="histo" value="<?php echo $row_historial["cod_hist"]; ?>">
    <input type="hidden" name="contador" value="<?php echo $cont; ?>">
	 <input type="hidden" name="contador2" value="<?php echo $contEd; ?>">
    <input type="hidden" name="definitiva" value="<?php echo $row_no['definitiva']; ?>">
     <input type="hidden" name="val" value="<?php echo $val; ?>">
      <input type="hidden" name="val2" value="<?php echo $val2; ?>">
     <input type="hidden" name="lap2" value="<?php echo $row_no['lapso_2_70']; ?>">
     <input type="hidden" name="lap3" value="<?php echo $row_no['lapso_3_70']; ?>">
  </p>
</form>
<p>&nbsp;</p>


<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($materias);

mysql_free_result($no);

mysql_free_result($observaciones);

mysql_free_result($materiaEt);

mysql_free_result($notasET);

mysql_free_result($alumnos);

mysql_free_result($historial);
?>
