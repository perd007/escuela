<?php require_once('Connections/conexion.php'); ?>
<?php


$currentPage = $_SERVER["PHP_SELF"];


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {

$contador=$_POST["contador"] - 1;
for($i=1;$i<=$contador;$i++){

//verificamos que ya no se halla registrado la planilla
mysql_select_db($database_conexion, $conexion);
$query_asistencia = "SELECT * FROM asistencia where lapso='".$_POST['lapso']."' and mes='".$_POST['mes']."'  and materia='".$_POST['materia']."' and periodo='".$_POST['periodo']."' and grado='".$_POST['grado']."' and id_Asis!='".$_POST['$cod_asis']."'";
$asistencia = mysql_query($query_asistencia, $conexion) or die(mysql_error());
$row_asistencia = mysql_fetch_assoc($asistencia);
$totalRows_asistencia = mysql_num_rows($asistencia);



if($totalRows_asistencia>=1){
echo "<script type=\"text/javascript\">alert ('Ya existe un registro de asistencia para grupo de alumnos'); location.href='principal.php?link=link9' </script>";
exit;
}

                   
//otras validaciones
if(!is_numeric($_POST['dias_asis'.$i])){
echo "<script type=\"text/javascript\">alert ('Solo puede ingresar numeros en los dias asistidos de los alumnos!!!'); location.href='principal.php?link=link93&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}

if($_POST['dias_asis'.$i]==""){
echo "<script type=\"text/javascript\">alert ('No puede dejar campos vacios en los dias asistidos de los alumnos '); location.href='principal.php?link=link93&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}

if($_POST['dias_asis'.$i]<0){
echo "<script type=\"text/javascript\">alert ('Los valores en los dias asistidos de los alumnos deben ser positivos'); location.href='principal.php?link=link93&cedula=$_POST[cedula]&hist=$_POST[histo]' </script>";
exit;
}

}//fin del for



for($i=1;$i<=$contador;$i++){

$diasA=$_POST['dias_asis'.$i];
$histo=$_POST['histo'.$i];


  $updateSQL = sprintf("UPDATE asistencia SET  lapso=%s, mes=%s, materia=%s, dias_asis=%s, dias_totales=%s, periodo=%s, grado=%s WHERE cod_hist=%s and id_Asis=%s",
                       
                       GetSQLValueString($_POST['lapso'], "int"),
                       GetSQLValueString($_POST['mes'], "text"),
                       GetSQLValueString($_POST['materia'], "int"),
                       GetSQLValueString($diasA, "int"),
                       GetSQLValueString($_POST['dias_totales'], "int"),
                       GetSQLValueString($_POST['periodo'], "text"),
                       GetSQLValueString($_POST['grado'], "int"),
					   GetSQLValueString($_POST['cod_hist'], "int"),
					   GetSQLValueString($_POST['$cod_asis'], "text"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
   if($Result1){
   $contador2++;
   }else{
   $contador2--;
   }

    if($contador2==$contador){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados'); location.href='principal.php?link=link93' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='principal.php?link=link93' </script>";
  exit;
  }
}
}


//********************

$id=$_GET["id_Asis"];

$maxRows_asistencia = 15;
$pageNum_asistencia = 0;
if (isset($_GET['pageNum_asistencia'])) {
  $pageNum_asistencia = $_GET['pageNum_asistencia'];
}
$startRow_asistencia = $pageNum_asistencia * $maxRows_asistencia;

mysql_select_db($database_conexion, $conexion);
$query_asistencia = "SELECT * FROM asistencia where id_Asis='$id'";
$query_limit_asistencia = sprintf("%s LIMIT %d, %d", $query_asistencia, $startRow_asistencia, $maxRows_asistencia) ;
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


//consulta de materias
mysql_select_db($database_conexion, $conexion);
$query_materia = "SELECT * FROM materia where grado=".$grado." ".$sentencia."";
$materia = mysql_query($query_materia, $conexion) or die(mysql_error());
$row_materia = mysql_fetch_assoc($materia);
$totalRows_materia = mysql_num_rows($materia);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo1 {
	font-size: 14px;
	color: #FFFFFF;
}
.Estilo2 {font-size: 12px}
.Estilo3 {font-size: 12}
-->
</style>
</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table border="1" class="border"  align="left" cellpadding="0" cellspacing="0">
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#b50f0f"><div align="center" class="Estilo1">Datos de la Asistencia </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap"><span class="Estilo2">Periodo Academico:</span></td>
      <td><span class="Estilo3">
        <select name="periodo" class="Estilo2" id="periodo">
          <?php 
	  switch ($row_asistencia['periodo']){
			case "2002 - 2005":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2005 - 2006":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006' selected=selected>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2006 - 2007":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007' selected=selected>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2007 - 2008":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008' selected=selected>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2008 - 2009":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009' selected=selected>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2009 - 2010":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010' selected=selected>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2010 - 2011":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011' selected=selected>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2011 - 2012":
			echo " 
		  <option value='2002 - 2005>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'  selected=selected>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2012 - 2013":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013' selected=selected>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2013 - 2014":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014' selected=selected>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2014 - 2015":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015' selected=selected>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2015 - 2016":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016' selected=selected>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2016 - 2017":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'  selected=selected>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2017 - 2018":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018' selected=selected>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2018 - 2019":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019' selected=selected>2018 - 2019</option>
          <option value='2019 - 2020'>2019 - 2020</option>";
			break;
			case "2019 - 2020":
			echo " 
		  <option value='2002 - 2005'>2002 - 2005</option>
          <option value='2005 - 2006'>2005 - 2006</option>
          <option value='2006 - 2007'>2006 - 2007</option>
          <option value='2007 - 2008'>2007 - 2008</option>
          <option value='2008 - 2009'>2008 - 2009</option>
          <option value='2009 - 2010'>2009 - 2010</option>
          <option value='2010 - 2011'>2010 - 2011</option>
          <option value='2011 - 2012'>2011 - 2012</option>
          <option value='2012 - 2013'>2012 - 2013</option>
          <option value='2013 - 2014'>2013 - 2014</option>
          <option value='2014 - 2015'>2014 - 2015</option>
          <option value='2015 - 2016'>2015 - 2016</option>
          <option value='2016 - 2017'>2016 - 2017</option>
          <option value='2017 - 2018'>2017 - 2018</option>
          <option value='2018 - 2019'>2018 - 2019</option>
          <option value='2019 - 2020' selected=selected>2019 - 2020</option>";
			break;
			
			
		
		}
	  
	  ?>
        </select>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap"><span class="Estilo2">Grado o A&ntilde;o Escolar:</span></td>
      <td>
        <span class="Estilo3">
        <select name="grado" class="Estilo2" id="grado">
          <?php 
	  switch ($row_asistencia['grado']){
		case 1:
			echo " 
		<option value='1'>1er  Año</option>
        <option value='2'>2do  Año</option>
        <option value='3'>3er  Año</option>
        <option value='4'>4to  Año</option>
        <option value='5'>5to  Año</option>
        <option value='6'>6to  Año</option>";
			break;
			case 2:
			echo " 
		<option value='2'>2do  Año</option>
		<option value='1'>1er  Año</option>
        <option value='3'>3er  Año</option>
        <option value='4'>4to  Año</option>
        <option value='5'>5to  Año</option>
        <option value='6'>6to  Año</option>";
			break;
			case 3:
			echo " 
		<option value='3'>3er  Año</option>
		<option value='1'>1er  Año</option>
        <option value='2'>2do  Año</option>
        <option value='4'>4to  Año</option>
        <option value='5'>5to  Año</option>
        <option value='6'>6to  Año</option>";
			break;
			case 4:
			echo " 
		<option value='4'>4to  Año</option>
		<option value='1'>1er  Año</option>
        <option value='2'>2do  Año</option>
        <option value='3'>3er  Año</option>
        <option value='5'>5to  Año</option>
        <option value='6'>6to  Año</option>";
			break;
			case 5:
			echo " 
		<option value='5'>5to  Año</option>
		<option value='1'>1er  Año</option>
        <option value='2'>2do  Año</option>
        <option value='3'>3er  Año</option>
        <option value='4'>4to  Año</option>
        <option value='6'>6to  Año</option>";
			break;
			case 6:
			echo " 
		<option value='6'>6to  Año</option>
		<option value='1'>1er  Año</option>
        <option value='2'>2do  Año</option>
        <option value='3'>3er  Año</option>
        <option value='4'>4to  Año</option>
        <option value='5'>5to  Año</option>";
			break;
		}
	  
	  ?>
        </select>
        </span></td>
    </tr>
    <tr valign="baseline">
      <td width="136" align="right" nowrap="nowrap"><span class="Estilo2">Lapso:</span></td>
      <td width="141"><span class="Estilo3">
        <select name="lapso" class="Estilo2" id="lapso" onchange="cambiar()">
          <?php 
	  switch ($row_asistencia['lapso']){
		case 1:
			echo " 
		<option value='1' selected=selected>1</option>
        <option value='2'>2do</option>
        <option value='3'>3ro</option> ";
			break;
			case 2:
			echo " 
		<option value='1'>1</option>
        <option value='2' selected=selected>2do</option>
        <option value='3'>3ro</option> ";
			break;
			case 3:
			echo " 
		<option value='1'>1</option>
        <option value='2'>2do</option>
        <option value='3' selected=selected>3ro</option> ";
			break;
		
		}
	  
	  ?>
          </select>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span class="Estilo2">Mes:</span></td>
      <td><span class="Estilo3">
        <select name="mes" class="Estilo2" id="mes">
          <?php 
		switch ($row_asistencia['mes']){
		case "Enero":
		echo "
        <option value='Enero' selected=selected>Enero</option>
        <option value='Febrero' >Febrero</option>
        <option value='Marzo'>Marzo</option>
        <option value='Abril'>Abril</option>
        <option value='Mayo'>Mayo</option>
        <option value='Junio'>Junio</option>
        <option value='Julio'>Julio</option>
        <option value='Agosto'>Agosto</option>
        <option value='Septiembre'>Septiembre</option>
        <option value='Octubre'>Octubre</option>
        <option value='Noviembre'>Noviembre</option>
        <option value='Diciembre'>Diciembre</option>";
		break;
		case "Febrero":
		echo "
        <option value='Enero'>Enero</option>
        <option value='Febrero' selected=selected>Febrero</option>
        <option value='Marzo'>Marzo</option>
        <option value='Abril'>Abril</option>
        <option value='Mayo'>Mayo</option>
        <option value='Junio'>Junio</option>
        <option value='Julio'>Julio</option>
        <option value='Agosto'>Agosto</option>
        <option value='Septiembre'>Septiembre</option>
        <option value='Octubre'>Octubre</option>
        <option value='Noviembre'>Noviembre</option>
        <option value='Diciembre'>Diciembre</option>";
		break;
		case "Marzo":
		echo "
        <option value='Enero'>Enero</option>
        <option value='Febrero'>Febrero</option>
        <option value='Marzo' selected=selected>Marzo</option>
        <option value='Abril'>Abril</option>
        <option value='Mayo'>Mayo</option>
        <option value='Junio'>Junio</option>
        <option value='Julio'>Julio</option>
        <option value='Agosto'>Agosto</option>
        <option value='Septiembre'>Septiembre</option>
        <option value='Octubre'>Octubre</option>
        <option value='Noviembre'>Noviembre</option>
        <option value='Diciembre'>Diciembre</option>";
		break;
		case "Abril":
		echo "
        <option value='Enero'>Enero</option>
        <option value='Febrero'>Febrero</option>
        <option value='Marzo'>Marzo</option>
        <option value='Abril' selected=selected>Abril</option>
        <option value='Mayo'>Mayo</option>
        <option value='Junio'>Junio</option>
        <option value='Julio'>Julio</option>
        <option value='Agosto'>Agosto</option>
        <option value='Septiembre'>Septiembre</option>
        <option value='Octubre'>Octubre</option>
        <option value='Noviembre'>Noviembre</option>
        <option value='Diciembre'>Diciembre</option>";
		break;
		case "Mayo":
		echo "
        <option value='Enero'>Enero</option>
        <option value='Febrero'>Febrero</option>
        <option value='Marzo'>Marzo</option>
        <option value='Abril'>Abril</option>
        <option value='Mayo' selected=selected>Mayo</option>
        <option value='Junio'>Junio</option>
        <option value='Julio'>Julio</option>
        <option value='Agosto'>Agosto</option>
        <option value='Septiembre'>Septiembre</option>
        <option value='Octubre'>Octubre</option>
        <option value='Noviembre'>Noviembre</option>
        <option value='Diciembre'>Diciembre</option>";
		break;
		case "Junio":
		echo "
        <option value='Enero' >Enero</option>
        <option value='Febrero'>Febrero</option>
        <option value='Marzo'>Marzo</option>
        <option value='Abril'>Abril</option>
        <option value='Mayo'>Mayo</option>
        <option value='Junio' selected=selected>Junio</option>
        <option value='Julio'>Julio</option>
        <option value='Agosto'>Agosto</option>
        <option value='Septiembre'>Septiembre</option>
        <option value='Octubre'>Octubre</option>
        <option value='Noviembre'>Noviembre</option>
        <option value='Diciembre'>Diciembre</option>";
		break;
		case "Julio":
		echo "
        <option value='Enero'>Enero</option>
        <option value='Febrero'>Febrero</option>
        <option value='Marzo'>Marzo</option>
        <option value='Abril'>Abril</option>
        <option value='Mayo'>Mayo</option>
        <option value='Junio'>Junio</option>
        <option value='Julio' selected=selected>Julio</option>
        <option value='Agosto'>Agosto</option>
        <option value='Septiembre'>Septiembre</option>
        <option value='Octubre'>Octubre</option>
        <option value='Noviembre'>Noviembre</option>
        <option value='Diciembre'>Diciembre</option>";
		break;
		case "Agosto":
		echo "
        <option value='Enero'>Enero</option>
        <option value='Febrero'>Febrero</option>
        <option value='Marzo'>Marzo</option>
        <option value='Abril'>Abril</option>
        <option value='Mayo'>Mayo</option>
        <option value='Junio'>Junio</option>
        <option value='Julio'>Julio</option>
        <option value='Agosto' selected=selected>Agosto</option>
        <option value='Septiembre'>Septiembre</option>
        <option value='Octubre'>Octubre</option>
        <option value='Noviembre'>Noviembre</option>
        <option value='Diciembre'>Diciembre</option>";
		break;
		case "Septiembre":
		echo "
        <option value='Enero' >Enero</option>
        <option value='Febrero'>Febrero</option>
        <option value='Marzo'>Marzo</option>
        <option value='Abril'>Abril</option>
        <option value='Mayo'>Mayo</option>
        <option value='Junio'>Junio</option>
        <option value='Julio'>Julio</option>
        <option value='Agosto'>Agosto</option>
        <option value='Septiembre' selected=selected>Septiembre</option>
        <option value='Octubre'>Octubre</option>
        <option value='Noviembre'>Noviembre</option>
        <option value='Diciembre'>Diciembre</option>";
		break;
		case "Octubre":
		echo "
        <option value='Enero'>Enero</option>
        <option value='Febrero'>Febrero</option>
        <option value='Marzo'>Marzo</option>
        <option value='Abril'>Abril</option>
        <option value='Mayo'>Mayo</option>
        <option value='Junio'>Junio</option>
        <option value='Julio'>Julio</option>
        <option value='Agosto'>Agosto</option>
        <option value='Septiembre'>Septiembre</option>
        <option value='Octubre' selected=selected>Octubre</option>
        <option value='Noviembre'>Noviembre</option>
        <option value='Diciembre'>Diciembre</option>";
		break;
		case "Noviembre":
		echo "
        <option value='Enero' >Enero</option>
        <option value='Febrero'>Febrero</option>
        <option value='Marzo'>Marzo</option>
        <option value='Abril'>Abril</option>
        <option value='Mayo'>Mayo</option>
        <option value='Junio'>Junio</option>
        <option value='Julio'>Julio</option>
        <option value='Agosto'>Agosto</option>
        <option value='Septiembre'>Septiembre</option>
        <option value='Octubre'>Octubre</option>
        <option value='Noviembre' selected=selected>Noviembre</option>
        <option value='Diciembre'>Diciembre</option>";
		break;
		case "Diciembre":
		echo "
        <option value='Enero' >Enero</option>
        <option value='Febrero'>Febrero</option>
        <option value='Marzo'>Marzo</option>
        <option value='Abril'>Abril</option>
        <option value='Mayo'>Mayo</option>
        <option value='Junio'>Junio</option>
        <option value='Julio'>Julio</option>
        <option value='Agosto'>Agosto</option>
        <option value='Septiembre'>Septiembre</option>
        <option value='Octubre'>Octubre</option>
        <option value='Noviembre' >Noviembre</option>
        <option value='Diciembre' selected=selected>Diciembre</option>";
		break;
		}
		 ?>
          </select>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span class="Estilo2">Materia:</span></td>
      <td><span class="Estilo3">
        <select name="materia" class="Estilo2" id="materia">
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
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span class="Estilo2">Mencion</span></td>
      <td><span class="Estilo3">
        <select name="mencion" disabled="disabled" class="Estilo2" id="mencion">
          <?php 
		switch ($row_historial['mencion']){
			case "Educacion":
		  echo "
            <option value=Auxiliar Docente>Auxiliar Docente</option>
          <option value=Administracion de Servicios en Salud>Administracion de Servicios en Salud</option>
		  ";
			break;
			case "Salud":
			echo "
			<option value=Administracion de Servicios en Salud>Administracion de Servicios en Salud</option>
		   <option value=Auxiliar Docente>Auxiliar Docente</option>
		  ";
			break;
			
		
		}
	
		  ?>
          </select>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span class="Estilo2">Dias Totales de Clase </span></td>
      <td><input name="dias_totales2" type="text" class="Estilo2" id="dias_totales" value="<?php echo $row_asistencia['dias_totales']; ?>" size="2" maxlength="2" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table class="border" width="572" border="1" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="112" bgcolor="#b50f0f" class="Estilo1" scope="row">C.I.N&ordm;    V-&nbsp;</td>
      <td width="314" bgcolor="#b50f0f" class="Estilo1">NOMBRES Y APELLIDOS </td>
      <td width="124" bgcolor="#b50f0f" class="Estilo1">DIAS ASISTIDOS </td>
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
  <td scope="row"><span class="Estilo2"><?php echo $row_alumno['cedula']; ?></span></td>
  <td><span class="Estilo2"><?php echo $row_alumno['nombre']; ?> <?php echo $row_alumno['apellido']; ?></span></td>
  <td><span class="Estilo2">
    <label>
      <input name="dias_asis<?php echo $cont; ?>" type="text" id="dias_asis" value="<?php echo $row_asistencia['dias_asis']; ?>" size="2" maxlength="2" />
      <input type="hidden" name="histo<?php echo $cont; ?>" value="<?php echo  $row_historial["cod_hist"]; ?>" />
      </label>
  </span></td>
    </tr>
  <?php $cont++; 
  } while ($row_asistencia = mysql_fetch_assoc($asistencia)); ?>
    <tr>
      <td colspan="3" scope="row">
        <div align="center" class="Estilo2">
            <input name="Submit" type="submit" class="Estilo2" value="Actualizar Datos" />
          </div>
        </td>
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
          <?php } // Show if not last page ?>
    </td>
  </tr>
</table>
  <p></p>
  <p>
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="id_Asis" value="<?php echo $row_asistencia['id_Asis']; ?>">
	<input type="hidden" name="contador" value="<?php echo $cont; ?>">
	<input type="hidden" name="mes" value="<?php echo $meses; ?>">
	<input type="hidden" name="lapso" value="<?php echo $lapso; ?>">
	<input type="hidden" name="periodo" value="<?php echo $periodo; ?>">
	<input type="hidden" name="grado" value="<?php echo $grado; ?>">
	<input type="hidden" name="mencion" value="<?php echo $mencion; ?>">
	<input type="hidden" name="cod_asis" value="<?php echo $row_asistencia['cod_asis']; ?>">
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
