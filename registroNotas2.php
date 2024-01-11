<?php require_once('Connections/conexion.php'); ?>
<?php 
//validar usuario
if($validacion==true){
	if($reg==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Registros');location.href='principal.php' </script>";
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

//funcion para recibir arreglo
function array_recibe($url_array) { 
    $tmp = stripslashes($url_array); 
    $tmp = urldecode($tmp); 
    $tmp = unserialize($tmp); 

   return $tmp; 
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
//capturar arreglo con materias
$arrelo=$_POST["arreglo"];
$materias=array_recibe($arrelo); 

//capturararreglo con MET
$arrelo2=$_POST["arreglo2"];
$materiasET=array_recibe($arrelo2); 

$arregloNot=array_recibe($_POST["arreglo3"]); 
$arregloNotEt=array_recibe($_POST["arreglo4"]); 


$contador=$_POST["contador"] - 1;
$contadorEd=$_POST["contEd"] - 1;
/*
	 echo "<script type=\"text/javascript\">alert ('primer contador".$_POST["contador"]." y el -1: ".$contador."'); location.href='principal.php?link=link52' </script>";
exit;
*/

//verificamos si es la primera nota de la materia
if($_POST["lapso17"]=="" && $_POST["lapso13"]=="") {  


//verificamos si existe un registro para este historial
mysql_select_db($database_conexion, $conexion);
$query_notas2 = "SELECT * FROM notas_materias where cod_hist='$_POST[histo]'";
$notas2 = mysql_query($query_notas2, $conexion) or die(mysql_error());
$row_notas2 = mysql_fetch_assoc($notas2);
$totalRows_notas2 = mysql_num_rows($notas2);

if($totalRows_notas2>0 ){
echo "<script type=\"text/javascript\">alert ('Este alumno ya tiene notas en este grado');  location.href='principal.php?link=link6&cedula=$cedula&hist=$row_hist[cod_hist]' </script>";
exit;
}


for($i=1;$i<=$contador;$i++){

$lapso_1_70=$_POST['lapso_1_70'.$i];
$lapso_1_30=$_POST['lapso_1_30'.$i];


$insertSQL = sprintf("INSERT INTO notas_materias (lapso_1_70, lapso_1_30,  id_materia, cod_hist) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($lapso_1_70, "int"),
                       GetSQLValueString($lapso_1_30, "int"),
                       GetSQLValueString($materias[$i], "int"),
					   GetSQLValueString($_POST['histo'], "int"));
					   
					  

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
   if($Result1){
   $contador2++;
   }else{
   $contador2--;
   }
   
     }// fin del for
 
 
 
 //Guardsamos observacion 1
 $insertSQLO1 = sprintf("INSERT INTO observaciones (primero, cod_hist) VALUES (%s, %s)",
                       GetSQLValueString($_POST['observacion1'], "text"),
					   GetSQLValueString($_POST['histo'], "int"));
					   
					  

  mysql_select_db($database_conexion, $conexion);
  $ResultO1 = mysql_query($insertSQLO1, $conexion) or die(mysql_error());
   if($ResultO1){
   }else{
   echo "<script type=\"text/javascript\">alert ('No se Guardo la Observacion del Primer Lapso');  location.href='principal.php?link=link6&cedula=$_POST[alumno]&hist=$_POST[cod_hist]' </script>";
  exit;
   }
 
 //fin del ingreso de observaciones 1
 }//fin de la verificacion




//verificamos si es la segunda nota de la materia
if($_POST["lapso27"]=="" && $_POST["lapso23"]=="" && $_POST["lapso17"]!="" && $_POST["lapso13"]!="") {  

for($i=1;$i<=$contador;$i++){

$lapso_2_70=$_POST['lapso_2_70'.$i];
$lapso_2_30=$_POST['lapso_2_30'.$i];


$insertSQL = sprintf("UPDATE notas_materias set lapso_2_70=%s, lapso_2_30=%s where  id_materia=%s and cod_hist=%s ",
                       GetSQLValueString($lapso_2_70, "int"),
                       GetSQLValueString($lapso_2_30, "int"),
                       GetSQLValueString($materias[$i], "int"),
					   GetSQLValueString($_POST["histo"], "int"));
					   
					  

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
   if($Result1){
   $contador2++;
   }else{
   $contador2--;
   }
   
     }// fin del for
 
 
 //Guardsamos observacion 2
 $insertSQLO2 = sprintf("UPDATE observaciones set segundo=%s where cod_hist=%s ",
                       GetSQLValueString($_POST['observacion2'], "text"),
					   GetSQLValueString($_POST['histo'], "int"));
					   
					  

  mysql_select_db($database_conexion, $conexion);
  $ResultO2 = mysql_query($insertSQLO2, $conexion) or die(mysql_error());
   if($ResultO2){
   }else{
   echo "<script type=\"text/javascript\">alert ('No se Guardo la Observacion del segundo Lapso');  location.href='principal.php?link=link6&cedula=$_POST[alumno]&hist=$_POST[cod_hist]' </script>";
  exit;
   }
 
 //fin del ingreso de observaciones 2
 
 
 }//fin de la verificacion



//verificamos si es la tercera nota de la materia
if($_POST["lapso37"]=="" && $_POST["lapso33"]=="" && $_POST["lapso27"]!="" && $_POST["lapso23"]!="") {

for($i=1;$i<=$contador;$i++){
 
$lapso_3_70=$_POST['lapso_3_70'.$i];
$lapso_3_30=$_POST['lapso_3_30'.$i];
$finallapso3=round(($lapso_3_70 + $lapso_3_30)/2);
$notaFinal=round(($arregloNot[$i] + $finallapso3)/3);


$insertSQL = sprintf("UPDATE notas_materias set lapso_3_70=%s, lapso_3_30=%s, definitiva=%s where  id_materia=%s and cod_hist=%s ",
                       GetSQLValueString($lapso_3_70, "int"),
                       GetSQLValueString($lapso_3_30, "int"),
					    GetSQLValueString($notaFinal, "int"),
					   GetSQLValueString($materias[$i], "int"), 
					   GetSQLValueString($_POST['histo'], "int"));
					   
					  

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
   if($Result1){
   $contador2++;
   }else{
   $contador2--;
   }
   
     }// fin del for
 
 //Guardsamos observacion 3
 $insertSQLO3 = sprintf("UPDATE observaciones set tercero=%s where cod_hist=%s ",
                       GetSQLValueString($_POST['observacion3'], "text"),
					   GetSQLValueString($_POST['histo'], "int"));
					   
					  

  mysql_select_db($database_conexion, $conexion);
  $ResultO3 = mysql_query($insertSQLO3, $conexion) or die(mysql_error());
   if($ResultO3){
   }else{
   echo "<script type=\"text/javascript\">alert ('No se Guardo la Observacion del tercer Lapso');  location.href='principal.php?link=link6&cedula=$_POST[alumno]&hist=$_POST[cod_hist]' </script>";
  exit;
   }

 //fin del ingreso de observaciones 3
 }//fin de la verificacion





 
 
 //verificamos si hay materias d educacion para el trabajo
 
 if($_POST["lapso17"]=="") {  
 
for($i=1;$i<=$contadorEd;$i++){

$programa1=$_POST["programa1".$i];

$insertSQL2 = sprintf("INSERT INTO notas_educ_trab (primer_lapso, id_eduT, cod_hist) VALUES (%s, %s, %s) ",
                       GetSQLValueString($programa1, "int"),
					   GetSQLValueString($materiasET[$i], "int"),
					   GetSQLValueString($_POST['histo'], "int"));
					   
					  

  mysql_select_db($database_conexion, $conexion);
  $Result2 = mysql_query($insertSQL2, $conexion) or die(mysql_error());
  if($Result2){
   }else{
    echo "<script type=\"text/javascript\">alert ('Ocurrio un Error no se guardo la nota de ed. para el trabajo');  location.href='principal.php?link=link6&cedula=$_POST[alumno]&hist=$_POST[cod_hist]' </script>";
  exit;
   }
   
}//fin del for

 }//fin de la verificacion

 
 //actualizamos segundo lapso de educacion para el trabajo
if($_POST["lapso27"]=="" && $_POST["lapso23"]=="" && $_POST["lapso17"]!="" && $_POST["lapso13"]!="") {  


for($i=1;$i<=$contadorEd;$i++){

$programa2=$_POST['programa2'.$i];

$inse = sprintf("UPDATE notas_educ_trab set segundo_lapso=%s where id_eduT=%s and cod_hist=%s",
                       GetSQLValueString($programa2, "int"),
					   GetSQLValueString($materiasET[$i], "int"),
					   GetSQLValueString($_POST['histo'], "int"));
					   
	  

  mysql_select_db($database_conexion, $conexion);
  $ResultET2 = mysql_query($inse, $conexion) or die(mysql_error());
  if($ResultET2){
   }else{
    echo "<script type=\"text/javascript\">alert ('Ocurrio un Error no se guardo la nota de ed. para el trabajo');  location.href='principal.php?link=link6&cedula=$_POST[alumno]&hist=$_POST[cod_hist]' </script>";
  exit;
   }
   
}//fin del for

 }//fin de la verificacion



//actualizamos tercere lapso de educacion para el trabajo
if($_POST["lapso37"]=="" && $_POST["lapso33"]=="" && $_POST["lapso27"]!="" && $_POST["lapso23"]!="") {  

for($i=1;$i<=$contadorEd;$i++){

$programa3=$_POST["programa3".$i];
$notaFinalEt=round(($arregloNotEt[$i]+$programa3)/3);

$inse2 = sprintf("UPDATE notas_educ_trab set tercer_lapso=%s, definitivo=%s where id_eduT=%s and cod_hist=%s ",
                       GetSQLValueString($programa3, "int"),
					   GetSQLValueString($notaFinalEt, "int"),
					   GetSQLValueString($materiasET[$i], "int"),
					   GetSQLValueString($_POST['histo'], "int"));
					   
					  

  mysql_select_db($database_conexion, $conexion);
  $Result22 = mysql_query($inse2, $conexion) or die(mysql_error());
  if($Result22){
   }else{
    echo "<script type=\"text/javascript\">alert ('Ocurrio un Error no se guardo la nota de ed. para el trabajo');  location.href='principal.php?link=link6&cedula=$_POST[alumno]&hist=$_POST[cod_hist]' </script>";
  exit;
   }
   
}//fin del for

 }//fin de la verificacion


 


//enviar a otra pagina para incribir en el siguinete año
 
   


//validamos si se guardo todas las notas
if($_POST["vali"]==1){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados'); location.href='principal.php?link=link61&grado=$_POST[grado]&mencion=$_POST[mencion]&alumno=$_POST[alumno]&cod=$_POST[histo]' </script>";
  }


 if($contador2==$contador){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados'); location.href='principal.php?link=link6&cedula=$_POST[alumno]&hist=$_POST[histo]&val=$_POST[val]&not=1' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='principal.php?link=link6&cedula=$_POST[alumno]&hist=$_POST[cod_hist]' </script>";
  exit;
  }
}

//fin de la insercion  y/o  actualizacion



$maxRows_materias = 20;
$pageNum_materias = 0;
if (isset($_GET['pageNum_materias'])) {
  $pageNum_materias = $_GET['pageNum_materias'];
}
$startRow_materias = $pageNum_materias * $maxRows_materias;



/**************************************************************************************************************************/

//obtener grado mediante 2 consultas
$cedula=$_GET["cedula"];
$codHistorial=$_GET["hist"];
$val=$_GET["val"];
//verificamos si el alumno ya tiene notas para el año registrado
mysql_select_db($database_conexion, $conexion);
$query_not = "SELECT * FROM notas_materias where cod_hist=$codHistorial";
$not = mysql_query($query_not, $conexion) or die(mysql_error());
$row_not = mysql_fetch_assoc($not);
$totalRows_not = mysql_num_rows($not);

if($totalRows_not>0 and $row_not["lapso_3_70"]!="" and $row_not["lapso_3_30"]!="" and $val==1 and $_GET["not"]!=1){
	 echo "<script type=\"text/javascript\">alert ('Este Alumno ya poseee notas apara este Año'); location.href='principal.php?link=link52&validar=1&cedula=$cedula' </script>";
exit;
}
if($totalRows_not>0 and $row_not["lapso_3_70"]!="" and $row_not["lapso_3_30"]!="" and $val==2 and $_GET["not"]!=1){
	 echo "<script type=\"text/javascript\">alert ('Este Alumno ya poseee notas apara este Año'); location.href='principal.php?link=link10&validar=1&cedula=$cedula' </script>";
exit;
}
//fin de la verificacion

//asgnamos direccionde botor de regreso
if($val==1){
	 $ruta= "principal.php?link=link52&validar=1&cedula=$cedula";
}else{
if($val==2){
	 $ruta= "principal.php?link=link10&validar=1&cedula=$cedula";
}
}

mysql_select_db($database_conexion, $conexion);
$query_historial = "SELECT * FROM historial where id_alumno=$cedula and cod_hist=$codHistorial";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);


mysql_select_db($database_conexion, $conexion);
$query_alumnos = "SELECT * FROM alumno where cedula='$cedula'";
$alumnos = mysql_query($query_alumnos, $conexion) or die(mysql_error());
$row_alumnos = mysql_fetch_assoc($alumnos);
$totalRows_alumnos = mysql_num_rows($alumnos);


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



//utilizamos una consulta de notas para diversos fines
mysql_select_db($database_conexion, $conexion);
$query_notas = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]'";
$notas = mysql_query($query_notas, $conexion) or die(mysql_error());
$row_notas = mysql_fetch_assoc($notas);
$totalRows_notas = mysql_num_rows($notas);



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
$query_observaciones = "SELECT * FROM observaciones where cod_hist='$row_historial[cod_hist]'";
$observaciones = mysql_query($query_observaciones, $conexion) or die(mysql_error());
$row_observaciones = mysql_fetch_assoc($observaciones);
$totalRows_observaciones = mysql_num_rows($observaciones);




$colspan1=2;
$colspan2=2;
$colspan3=2;

if($row_notas["lapso_1_70"]!="" && $row_notas["lapso_1_30"]!=""){
 $colspan1=1;
}
if($row_notas["lapso_2_70"]!="" && $row_notas["lapso_2_30"]!=""){
 $colspan2=1;
}
if($row_notas["lapso_3_70"]!="" && $row_notas["lapso_3_30"]!=""){
 $colspan3=1;
}
 
$nombreBoton="Guardar Notas";
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">
<!--
.Estilo1 {color: #FFFFFF}
.Estilo2 {
	color: #000000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<p>&nbsp;</p>

<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table  border="1" cellpadding="0" cellspacing="0">
    <tr>
      <th colspan="9" bgcolor="#b50f0f" scope="col"><span class="Estilo1">Datos del Alumno: <?php echo $row_alumnos['cedula']."   "; ?><?php echo $row_alumnos['nombre']."   "; ?><?php echo $row_alumnos['apellido']."   "; ?></span></th>
    </tr>
    <tr>
      <td width="180"   rowspan="2"><div align="center"><strong>Materia</strong></div></td>
      <td width="60" colspan="<?php echo $colspan1; ?>"><div align="center"><strong>Lapso I </strong></div></td>
      <? $medida=175;
	  
	   ////verificamos si existen notas de 1er lapso para pedir las de 2do
	  if($row_notas["lapso_1_70"]!="" && $row_notas["lapso_1_30"]!="") { 
	  $medida=250;
	  ?>
      <td width="60" colspan="<?php echo $colspan2; ?>"><div align="center"><strong>Lapso II </strong></div></td>
      <? } 
	  
	   ////verificamos si existen notas de 2do lapso para pedir las de 3er
	   if($row_notas["lapso_2_70"]!="" && $row_notas["lapso_2_30"]!="") {
	   $medida=325;
	  ?>
      <td width="60" colspan="<?php echo $colspan3; ?>"><div align="center"><strong>Lapso III </strong></div></td>
      <? }// fin de la verificacion 
	  
	   //verificamos si existen notas de 3er lapso para mostar definitivas y 
	   //pedir observaciones
	   if($row_notas["lapso_3_70"]!="" && $row_notas["lapso_3_30"]!=""){ 
	  $medida=433;
	  
	  ?>
      <td width="60" rowspan="2"><div align="center"><strong>Definitiva</strong></div></td>
      <? }// fin de la verificacion?>
    </tr>
    <tr>
      <? //verificar si estan registradas las notas de primer lapso
		 if($row_notas["lapso_1_70"]=="" && $row_notas["lapso_1_30"]==""){
	 ?>
      <td><div align="center"><strong>70%</strong></div></td>
      <td><div align="center"><strong>30%</strong></div></td>
      <? 
	    }else{ ?>
      <td><div align="center"><strong>Nota</strong></div></td>
      <? }//fin de la verificacion si estan registradas las notas de primer lapso

	   ////verificamos si existen notas de 1er lapso para pedir las de 2do
	   if($row_notas["lapso_2_70"]=="" && $row_notas["lapso_1_30"]!="") {  ?>
	   
      <td ><div align="center"><strong>70%</strong></div></td>
      <td ><div align="center"><strong>30%</strong></div></td>
      <? 
	   }else{ 
	   if($row_notas["lapso_2_70"]!="" && $row_notas["lapso_2_30"]!=""){
	  ?>
      <td><div align="center"><strong>Nota</strong></div></td>
      <? }}// fin de la verificacion 
	  
	 //verificamos si existen notas de 2do lapso para pedir las de 3ro
	  if($row_notas["lapso_3_70"]=="" && $row_notas["lapso_2_70"]!="") {
	  ?>
      <td ><div align="center"><strong>70%</strong></div></td>
      <td ><div align="center"><strong>30%</strong></div></td>
      <? }else{ 
	   if($row_notas["lapso_3_70"]!="" && $row_notas["lapso_3_30"]!=""){
	  ?>
      <td ><div align="center"><strong>Nota</strong></div></td>
      <? }}//fin de la verificacion ?>
    </tr>
    <?php $cont=1;
	  do { 
	  mysql_select_db($database_conexion, $conexion);
$query_notasD = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]' and id_materia='$row_materias[id_materia]'";
$notasD = mysql_query($query_notasD, $conexion) or die(mysql_error());
$row_notasD = mysql_fetch_assoc($notasD);
$totalRows_notasD = mysql_num_rows($notasD);

	  //obtenemos las notasn definitivas por lapso
$lapso1=round(($row_notasD["lapso_1_70"] + $row_notasD["lapso_1_30"])/2);
$lapso2=round(($row_notasD["lapso_2_70"] + $row_notasD["lapso_2_30"])/2);
$lapso3=round(($row_notasD["lapso_3_70"] + $row_notasD["lapso_3_30"])/2);

$definitiva=round(($lapso1+$lapso2+$lapso3)/3);
	  ?>
    <tr>
      <td ><div align="left"><?php echo $row_materias['nombre']; 
		
		
		$arreglo[$cont]=$row_materias['id_materia'];
		$arregloNotas[$cont]=$lapso1+$lapso2;
		
		?></div></td>
      <? 
		   //verificar si estan registradas las notas de primer lapso
		   if($row_notas["lapso_1_70"]=="" && $row_notas["lapso_1_30"]==""){
		    ?>
      <td><label> </label>
          <div align="center">
            <select name="lapso_1_70<?php echo $cont; ?>" >
              <option value="01">01</option>
              <option value="02">02</option>
              <option value="03">03</option>
              <option value="04">04</option>
              <option value="05">05</option>
              <option value="06">06</option>
              <option value="07">07</option>
              <option value="08">08</option>
              <option value="09">09</option>
              <option value="10">10</option>
              <option value="11">11</option>
              <option value="12">12</option>
              <option value="13">13</option>
              <option value="14">14</option>
              <option value="15">15</option>
              <option value="16">16</option>
              <option value="17">17</option>
              <option value="18">18</option>
              <option value="19">19</option>
              <option value="20">20</option>
            </select>
        </div></td>
      <td><div align="center">
          <select name="lapso_1_30<?php echo $cont; ?>" id="lapso_1_30">
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
          </select>
      </div></td>
      <? } else{
			 if($row_notas["lapso_1_70"]!="" && $row_notas["lapso_1_30"]!=""){
			 ?>
      <td><label> </label>
          <div align="center"> <? echo $lapso1;?> </div></td>
      <? }}// de la verificacion de notas de primer lapso ?>
      <? 
			////verificamos si existen notas de 1er lapso para pedir las de 2do
			if($row_notas["lapso_1_70"]!="" && $row_notas["lapso_2_70"]=="") {
	  
	  ?>
      <td><div align="center">
          <select name="lapso_2_70<?php echo $cont; ?>" id="lapso_2_70">
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
          </select>
      </div></td>
      <td><div align="center">
          <select name="lapso_2_30<?php echo $cont; ?>" id="lapso_2_30">
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
          </select>
      </div></td>
      <? } else{ 
			if($row_notas["lapso_2_70"]!="" && $row_notas["lapso_2_30"]!=""){ ?>
      <td ><label> </label>
          <div align="center"> <? echo $lapso2;?> </div></td>
      <? }}// fin de la verificacion de la existencia de notas de 1er lapso ?>
      <? 
			//verificamos si existen notas de segundo lapso para pedir las de tercero
			if($row_notas["lapso_2_70"]!="" && $row_notas["lapso_3_70"]=="") {
	  ?>
      <td><div align="center">
          <select name="lapso_3_70<?php echo $cont; ?>" id="lapso_3_70">
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
          </select>
      </div></td>
      <td><div align="center">
          <select name="lapso_3_30<?php echo $cont; ?>" id="lapso_3_30">
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
          </select>
      </div></td>
      <? } else{
			if($row_notas["lapso_3_70"]!="" && $row_notas["lapso_3_30"]!=""){ ?>
      <td ><label> </label>
          <div align="center"> <? echo $lapso3;?> </div></td>
      <? }}// fin de la verificacion de la existencia de notas de segundo lapso  ?>
      <?
			 //verificamos si existen notas de 3er lapso para mostar definitivas y 
			 //pedir observaciones
			 if($row_notas["lapso_3_70"]!="" && $row_notas["lapso_3_30"]!="" ) {
			 $nombreBoton="Inscribir Alumno";
			 $rut="<a href='principal.php?link=link61&grado=$row_historial[grado]&mencion=$row_historial[mencion]&alumno=$row_historial[id_alumno]&cod=$row_historial[cod_hist]' >";
			 $rut2="</a>";
	  ?>
	     <input type="hidden" name="vali" value="1">
      <td> <div align="center"><?php echo $definitiva; ?></div></td>
      
      <?php } // fin de la verificacion de observacion ?>
      <? 
		$cont++;
		} while ($row_materias = mysql_fetch_assoc($materias)); 
		
		
		//serializar array para enviarlo
		function array_envia($array) { 
        $tmp = serialize($array); 
        $tmp = urlencode($tmp); 
        return $tmp; 
        } 

		$arreglo2=array_envia($arreglo); 
		$arreglo3=array_envia($arregloNotas);
		
		?>
    </tr>
	
  </table>
  <table width="450">
    <tr>
      <td height="12" bgcolor="#FFFFFF"><div align="left" class="Estilo2">
        <div align="center">Primer Lapso </div>
      </div></td>
      <?php if($row_notas["lapso_1_70"]!="" && $row_notas["lapso_1_30"]!="") { ?>
      <td width="143" bgcolor="#FFFFFF"><div align="left" class="Estilo2">
        <div align="center">Segundo Lapso </div>
      </div></td>
      <?php } 
	  if($row_notas["lapso_2_70"]!="" && $row_notas["lapso_2_30"]!="") { ?>
      <td bgcolor="#FFFFFF"><div align="left" class="Estilo2">
        <div align="center">Tercer Lapso </div>
      </div></td>
      <?php } ?>
    </tr>
    <tr>
      <?php if($row_notas["lapso_1_70"]=="" && $row_notas["lapso_1_30"]==""){ ?>
      <td width="154" ><textarea name="observacion1" cols="20" rows="2" id="observacion1" onkeydown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"></textarea>      </td>
      <? }else{
	 if($row_notas["lapso_1_70"]!="" && $row_notas["lapso_1_30"]!=""){?>
      <? echo "<td width=154 >".$row_observaciones["primero"]." </td>"; ?>
      <?php }}?>
      <?php if($row_notas["lapso_1_70"]!="" && $row_notas["lapso_1_30"]!="" &&  $row_notas["lapso_2_30"]=="") { ?>
      <td width="154"><textarea name="observacion2" cols="20" rows="2" id="observacion2" onkeydown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"></textarea></td>
      <?php  } else{ 
			if($row_notas["lapso_2_70"]!="" && $row_notas["lapso_2_30"]!=""){ ?>
      <? echo "<td width=154 >".$row_observaciones["segundo"]." </td>"; ?>
      <? }} ?>
      <?php 
	  if($row_notas["lapso_2_70"]!="" && $row_notas["lapso_2_30"]!="" && $row_notas["lapso_3_30"]=="") { ?>
      <td width="154"><textarea name="observacion3" cols="20" rows="2" id="observacion3" onkeydown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"></textarea></td>
      <?php  } else{
			if($row_notas["lapso_3_70"]!="" && $row_notas["lapso_3_30"]!=""){ ?>
      <? echo "<td width=154 >".$row_observaciones["tercero"]." </td>"; ?>
      <? }}// fin de la verificacion de la existencia de notas de segundo lapso  ?>
    </tr>
  </table>
  <p>&nbsp;      </p>
      <p>
        <?php 
  //verificamos si se estan registrandolas notas de tercer lapso y mostramos los registros
  //para educacion para el trabajo
  if($row_historial["grado"]==1 or $row_historial["grado"]==3 or $row_historial["grado"]==2){ ?>
      </p>
      <table border="1" cellpadding="0" cellspacing="0">
        <tr>
          <th colspan="6" bgcolor="#b50f0f" scope="col"><div align="center" class="Estilo1">Materias de Educacion para el Trabajo </div></th>
        </tr>
        <tr>
          <td width="181"><strong>Materia </strong></td>
          <td width="60"><div align="center"><strong>Lapso 1 </strong></div></td>
          <? 
	   ////verificamos si existen notas de 1er lapso para pedir las de 2do
	  if($row_notas["lapso_1_70"]!="" && $row_notas["lapso_1_30"]!="" ) { 
	  ?>
          <td width="60"><div align="center"><strong>Lapso 2 </strong></div></td>
          <? }
	   ////verificamos si existen notas de 1er lapso para pedir las de 2do
	  if($row_notas["lapso_2_70"]!="" && $row_notas["lapso_2_30"]!="") { 
	  ?>
          <td width="60"><div align="center"><strong>Lapso 3 </strong></div></td>
		   <? }?>
		   <? if($row_notas["lapso_3_70"]!="" && $row_notas["lapso_3_30"]!=""){ ?>
          <td width="60"><div align="center"><strong>Definitiva</strong></div></td>
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
		  
              <?php if($row_eduT["primer_lapso"]=="" ){ ?>
              <select name="programa1<?php echo $contEd; ?>" id="programa1<?php echo $contEd; ?>" >
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
              </select>
              <?php }else{
				echo " <div align=center>".$row_eduT['primer_lapso']."</div>";
				} ?>
          </div></td>
          <? 
	   ////verificamos si existen notas de 1er lapso para pedir las de 2do
	  if($row_eduT['primer_lapso']!="") { 
	  ?>
          <td><div align="center">
              <?php if($row_eduT['segundo_lapso']==""){ ?>
              <select name="programa2<?php echo $contEd; ?>" id="programa2<?php echo $contEd; ?>" >
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
              </select>
              <?php }else{
				echo "<div align=center>".$row_eduT['segundo_lapso']."</div>";
				}?>
          </div></td>
		  <? }//fin de verificacion para mostrar segundo lapso ?>
		  
		  
          <? if($row_eduT['segundo_lapso']!="") { ?>
		  
          <td><div align="center">
              <?php if($row_eduT['tercer_lapso']==""){ ?>
              <select name="programa3<?php echo $contEd; ?>" id="programa3<?php echo $contEd; ?>" >
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
              </select>
              <?php }else{
				echo " <div align=center>".$row_eduT['tercer_lapso']."</div>";
				?>
          </div></td>
		
		  <td><div align="center"><?php echo $definitivaEt=round(($row_eduT["primer_lapso"]+$row_eduT["segundo_lapso"]+$row_eduT["tercer_lapso"])/3); ?></div></td>
		  <? }?>
		  <? }//fin de la verificacion para mostrar tercer lapso ?>
        </tr>
        <?php  $contEd++; } while ($row_MaEdt = mysql_fetch_assoc($MaEdt)); 
	
		$arregloET2=array_envia($arregloET); 
		$arregloNotasET2=array_envia($arregloNotas2); 
		?>
      </table>
      <?php 
	}//fin de la verificacion si es o no alumno de educacion basica  
	?>
<table width="<?php echo  $medida; ?>" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <th width="212" bgcolor="#b50f0f" scope="col"><div align="center">
        <?php if($row_historial['grado']<5){
			echo $rut;?><input name="submit" type="submit" value="<?php echo  $nombreBoton; ?>"  /><?php echo $rut2; 
			
		}?>
      </div></th>
      <th width="162" bgcolor="#b50f0f" scope="col">
        <div align="left"><a href="<?php echo  $ruta; ?>">
          <input name="submit2" type="submit" value="Regresar">
          </a>
      </div></th>
    </tr>
  </table>
<input type="hidden" name="MM_insert" value="form1">
    <input type="hidden" name="histo" value="<?php echo  $row_historial["cod_hist"]; ?>">
    <input type="hidden" name="contador" value="<?php echo $cont; ?>">
    <input type="hidden" name="arreglo" value="<?php echo $arreglo2; ?>">
	<input type="hidden" name="arreglo2" value="<?php echo $arregloET2; ?>">
    <input type="hidden" name="lapso17" value="<?php echo $row_notas["lapso_1_70"]; ?>">
    <input type="hidden" name="lapso13" value="<?php echo $row_notas["lapso_1_30"]; ?>">
    <input type="hidden" name="lapso27" value="<?php echo $row_notas["lapso_2_70"]; ?>">
    <input type="hidden" name="lapso23" value="<?php echo $row_notas["lapso_2_30"]; ?>">
    <input type="hidden" name="lapso37" value="<?php echo $row_notas["lapso_3_70"]; ?>">
    <input type="hidden" name="lapso33" value="<?php echo $row_notas["lapso_3_30"]; ?>"> 
	<input type="hidden" name="eduT" value="<?php echo $row_MaEdt['id_eduT']; ?>">
    <input type="hidden" name="grado" value="<?php echo  $row_historial["grado"]; ?>">
    <input type="hidden" name="mencion" value="<?php echo  $row_historial["mencion"]; ?>">
    <input type="hidden" name="alumno" value="<?php echo  $row_historial["id_alumno"]; ?>">
	<input type="hidden" name="contEd" value="<?php echo  $contEd; ?>">
	 <input type="hidden" name="arreglo3" value="<?php echo  $arreglo3; ?>">
	  <input type="hidden" name="arreglo4" value="<?php echo  $arregloNotasET2; ?>">
       <input type="hidden" name="val" value="<?php echo  $val; ?>">
	
</form>
</body>
</html>
