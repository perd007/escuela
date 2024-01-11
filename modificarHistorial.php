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

//verificar si el alumno esta inscrito
mysql_select_db($database_conexion, $conexion);
$query_alumno = "SELECT * FROM alumno where cedula='$_POST[cedula]'";
$alumno = mysql_query($query_alumno, $conexion) or die(mysql_error());
$row_alumno = mysql_fetch_assoc($alumno);
$totalRows_alumno = mysql_num_rows($alumno);

if($row_alumno["cedula"]!=$_POST["cedula"]){
 		echo "<script type=\"text/javascript\">alert ('Este alumno no esta registrado '); location.href='Principal.php?link=link52&cedula=$_POST[cedula]' </script>";
  		exit;
}

//verificar si el año escolar es igual 
mysql_select_db($database_conexion, $conexion);
$query_escolar = "SELECT * FROM historial where ano_escolar='$_POST[periodo]' and id_alumno='$_POST[cedula]'";
$escolar = mysql_query($query_escolar, $conexion) or die(mysql_error());
$row_escolar = mysql_fetch_assoc($escolar);
$totalRows_escolar = mysql_num_rows($escolar);

if($totalRows_escolar>=1){
 		echo "<script type=\"text/javascript\">alert ('Este alumno ya tiene registrado este periodo escolar'); location.href='Principal.php?link=link522&id=$_POST[cod_hist]' </script>";
  		exit;
}




//verificar que no se inscriba 2 veces el alumno en un mismo grado
mysql_select_db($database_conexion, $conexion);
$query_historial = "SELECT * FROM historial where grado=' $_POST[grado]' and id_alumno='$_POST[cedula]' ";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);

if($totalRows_historial>0){
 		echo "<script type=\"text/javascript\">alert ('Este alumno ya esta registrado en ". $_POST['grado'] ." Año '); location.href='Principal.php?link=link522&id=$_POST[cod_hist]' </script>";
  		exit;
}

//verificar si es el grado actual
if($_POST["actual"]=="actual"){
$actual=1;
$query_historial = "SELECT * FROM historial where actual=1 and id_alumno='$_POST[cedula]' and cod_hist!='$_POST[cod_hist]'";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);

if($totalRows_historia>0){
echo "<script type=\"text/javascript\">alert ('Este alumno ya tiene registrado un grado actual en otro registro '); location.href='Principal.php?link=link522' </script>";
exit;
	}

}else{
/*
$actual=0;
$query_historial = "SELECT * FROM historial where actual=1 and id_alumno='$_POST[cedula]' ";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);

if($row_historial["grado"]<$_POST['grado']){
echo "<script type=\"text/javascript\">alert ('El grado no puede ser mayor al grado actual que tiene registrado el alumno'); location.href='Principal.php?link=link5' </script>";
exit;
	} */
}//fin del else


//verificamos si es de educacion media
if($_POST['grado']==1 or $_POST['grado']==2 or $_POST['grado']==3){


//verificamos que existan materias de educacion para el trabajo registradas
mysql_select_db($database_conexion, $conexion);
$query_MET = "SELECT * FROM educ_trabajo";
$MET = mysql_query($query_MET, $conexion) or die(mysql_error());
$row_MET = mysql_fetch_assoc($MET);
$totalRows_MET = mysql_num_rows($MET);


if($totalRows_MET<0){
echo "<script type=\"text/javascript\">alert ('No puede registrar los grados de educacion media por que no existen materias de educacion para el trabajo registradas'); location.href='Principal.php?link=link522' </script>";
exit;
	}

$media=1;
$diversificado=0;
 //ingresamos valores a historial

  $updateSQL = sprintf("UPDATE historial SET media=%s, diversificado=%s,  ano_escolar=%s, grado=%s, seccion=%s,  id_eduT=%s, actual=%s WHERE cod_hist=%s",
                      
                        GetSQLValueString($media, "int"),
					   GetSQLValueString($diversificado, "int"),
                       GetSQLValueString($_POST['periodo'], "text"),
                       GetSQLValueString($_POST['grado'], "int"),
                       GetSQLValueString($_POST['mencion'], "text"),
                       GetSQLValueString($_POST['id_eduT'], "int"),
                       GetSQLValueString($actual, "int"),
                       GetSQLValueString($_POST['cod_hist'], "int"));
					   
}//fin de verificacion de media
//verificamos si es de educacion diversificada
if($_POST['grado']="1er Año" or $_POST['grado']="2do Año" or $_POST['grado']="2do Año"){

$media=0;
$historial=1;
 //ingresamos valores a historial
  $updateSQL = sprintf("UPDATE historial SET media=%s, diversificado=%s,  ano_escolar=%s, grado=%s, seccion=%s, mencion=%s, actual=%s WHERE cod_hist=%s",
                      
                        GetSQLValueString($media, "int"),
					   GetSQLValueString($diversificado, "int"),
                       GetSQLValueString($_POST['periodo'], "text"),
                       GetSQLValueString($_POST['grado'], "int"),
                       GetSQLValueString($_POST['seccion'], "text"),
                       GetSQLValueString($_POST['mencion'], "text"),
                       GetSQLValueString($actual, "int"),
                       GetSQLValueString($_POST['cod_hist'], "int"));


}//fin de verificacion de diversificada
 

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Actualizados');  location.href='Principal.php?link=link52' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='Principal.php?link=link52' </script>";
  exit;
  }
}


$id=$_GET["id"];

mysql_select_db($database_conexion, $conexion);
$query_historial = "SELECT * FROM historial where cod_hist=$id";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);


mysql_select_db($database_conexion, $conexion);
$query_Edu_trab = "SELECT * FROM educ_trabajo";
$Edu_trab = mysql_query($query_Edu_trab, $conexion) or die(mysql_error());
$row_Edu_trab = mysql_fetch_assoc($Edu_trab);
$totalRows_Edu_trab = mysql_num_rows($Edu_trab);
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
-->
</style>
</head>
<script language="javascript">
<!--


function cambiar(){

   	     
			if(document.form1.grado.value==3){
		   document.form1.mencion.disabled=true;
		    document.form1.id_eduT.disabled=false;
			 document.form1.mencion.value="-";
		   return true;
		   }
		   
		   	if(document.form1.grado.value==2){
		  document.form1.mencion.disabled=true;
		    document.form1.id_eduT.disabled=false;
			 document.form1.mencion.value="-";
		   return true;
		   }
		   	     
			if(document.form1.grado.value==1){
		  document.form1.mencion.disabled=true;
		    document.form1.id_eduT.disabled=false;
			 document.form1.mencion.value="-";
		   return true;
		   }
		   
		   
           if(document.form1.grado.value==6){
		   document.form1.mencion.disabled=false;
		    document.form1.id_eduT.disabled=true;
		   return true;
		   }
		    if(document.form1.grado.value==5){
		   document.form1.mencion.disabled=false;
		    document.form1.id_eduT.disabled=true;
		   return true;
		   }
		   	     
			if(document.form1.grado.value==4){
		   document.form1.mencion.disabled=false;
		    document.form1.id_eduT.disabled=true;
		   return true;
		   }
		
		   	     
		   	     
		      
   }
   
function validar(){

		if(document.form1.cedula.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedula').value)){
				alert('Solo puede ingresar numeros en la cedula de alumno!!!');
				return false;
		   		}
				}
		
				
				if(document.form1.cedula.value==""){
						alert("Debe Ingresar la Cedula de alumno");
						return false;
				}
				if(document.form1.grado.value=="-"){
						alert("Debe Seleccionar un Año Escolar");
						return false;
				}
				if(document.form1.seccion.value=="-"){
						alert("Debe Seleccionar una Seccion");
						return false;
				}
				
				
				if(document.form1.grado.value==1 || document.form1.grado.value==2 || document.form1.grado.value==3){
					if(document.form1.id_eduT.value==0){
						alert("Debe Seleccionar una Materia de Educacion para el Trabajo");
						return false;
					}
				}
				
				
				if(document.form1.grado.value==4 || document.form1.grado.value==5 || document.form1.grado.value==6){
					if(document.form1.mencion.value=="-"){
						alert("Debe Seleccionar una mencion");
						return false;
					}
				}
				
				
			
				
		}

</script>
<body>
<form method="post" name="form1" onsubmit="return validar()" action="<?php echo $editFormAction; ?>">
  <p>&nbsp;  </p>
  <table align="center" class="border">
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap="nowrap" bgcolor="#b50f0f"><div align="center"><span class="Estilo1">Modificacion del Historial </span></div></td>
    </tr>
    <tr valign="baseline">
      <td width="109" align="right" nowrap="nowrap"><span class="Estilo2">Alumno:</span></td>
      <td width="130">
	    <span class="Estilo2">
	    <?php 
	
	  mysql_select_db($database_conexion, $conexion);
      $query_alumno = "SELECT * FROM alumno where cedula='$row_historial[id_alumno]'";
      $alumno = mysql_query($query_alumno, $conexion) or die(mysql_error());
      $row_alumno = mysql_fetch_assoc($alumno);
      $totalRows_alumno = mysql_num_rows($alumno);


	  
	  echo " ".$row_alumno["cedula"]." ".$row_alumno["nombre"]." ".$row_alumno["apellido"]." "; 
	  

	  ?>
      </span> </td>
       <?php
		  /* <td width="105"> <span class="Estilo2">A&ntilde;o Actual? 
          <label>
		
		if($row_historial['actual']==1)
          echo "<input name=actual type=checkbox id=actual checked=checked value=actual />";
		  else
		if($row_historial['actual']==0)
          echo "<input name=actual type=checkbox id=actual  value=actual />";
		            </label>
      </span></td>
	  */
		  ?>

    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span class="Estilo2">Periodo Academico: </span></td>
      <td colspan="2"><span class="Estilo2">
        <label>
        <select name="periodo" class="Estilo2" id="periodo">
          <?php 
	  switch ($row_historial['ano_escolar']){
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
        </label>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span class="Estilo2">Grado o A&ntilde;o Escolar </span></td>
      <td colspan="2"><span class="Estilo2">
        <label>
	    <select name="grado" class="Estilo2" id="grado" onchange="cambiar()">
	      
          <?php 
	  switch ($row_historial['grado']){
			case 1:
			echo " 
		<option value=1>1er  Año</option>
        <option value=2>2do  Año</option>
        <option value=3>3er  Año</option>
        <option value=4>4to  Año</option>
        <option value=5>5to  Año</option>
        <option value=6>6to  Año</option>";
			break;
			case 2:
			echo " 
		<option value=2>2do  Año</option>
		<option value=1>1er  Año</option>
        <option value=3>3er  Año</option>
        <option value=4>4to  Año</option>
        <option value=5>5to  Año</option>
        <option value=6>6to  Año</option>";
			break;
			case 3:
			echo " 
		<option value=3>3er  Año</option>
		<option value=1>1er  Año</option>
        <option value=2>2do  Año</option>
        <option value=4>4to  Año</option>
        <option value=5>5to  Año</option>
        <option value=6>6to  Año</option>";
			break;
			case 4:
			echo " 
		<option value=4>4to  Año</option>
		<option value=1>1er  Año</option>
        <option value=2>2do  Año</option>
        <option value=3>3er  Año</option>
        <option value=5>5to  Año</option>
        <option value=6>6to  Año</option>";
			break;
			case 5:
			echo " 
		<option value=5>5to  Año</option>
		<option value=1>1er  Año</option>
        <option value=2>2do  Año</option>
        <option value=3>3er  Año</option>
        <option value=4>4to  Año</option>
        <option value=6>6to  Año</option>";
			break;
			case 6:
			echo " 
		<option value=6>6to  Año</option>
		<option value=1>1er  Año</option>
        <option value=2>2do  Año</option>
        <option value=3>3er  Año</option>
        <option value=4>4to  Año</option>
        <option value=5>5to  Año</option>";
			break;
		}
	  
	  ?>
          </select>
        </label>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span class="Estilo2">Seccion</span></td>
      <td colspan="2"><span class="Estilo2">
        <label>
        <select name="seccion" class="Estilo2" id="seccion">
          
          <?php 
	  switch ($row_historial['seccion']){
			case "A":
			echo " 
		  <option value=A>A</option>
          <option value=B>B</option>
          <option value=C>C</option>
          <option value=D>D</option>
          <option value=E>E</option>";
			break;
			case "B":
			echo "
		  <option value=B>B</option> 
		  <option value=A>A</option>
          <option value=C>C</option>
          <option value=D>D</option>
          <option value=E>E</option>";
			break;
			case "C":
			echo " 
		  <option value=C>C</option>
		  <option value=A>A</option>
          <option value=B>B</option>
          <option value=D>D</option>
          <option value=E>E</option>";
			break;
			case "D":
			echo " 
		  <option value=D>D</option>
		  <option value=A>A</option>
		  <option value=B>B</option>
		  <option value=C>C</option>
          <option value=E>E</option>";
			break;
			case "E":
			echo " 
		  <option value=E>E</option>
		  <option value=A>A</option>
		  <option value=B>B</option>
		  <option value=C>C</option>
		  <option value=D>D</option>";
			break;
		
		}
	  
	  ?>
        </select>
        </label>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><span class="Estilo2">Mencion</span></td>
      <td colspan="2"><span class="Estilo2">
        <label>
        <select name="mencion" disabled="disabled" class="Estilo2" id="mencion">
          <?php 
		switch ($row_historial['mencion']){
			case "Auxiliar Docente":
		  echo "
            <option value=Auxiliar Docente>Auxiliar Docente</option>
          <option value=Administracion de Servicios en Salud>Administracion de Servicios en Salud</option>
		  ";
			break;
			case "Administracion de Servicios en Salud":
			echo "
			<option value=Administracion de Servicios en Salud>Administracion de Servicios en Salud</option>
		   <option value=Auxiliar Docente>Auxiliar Docente</option>
		  ";
			break;
			case "Ciencia":
			echo "
			<option value=Ciencia>Ciencia</option>
			<option value=Administracion de Servicios en Salud>Administracion de Servicios en Salud</option>
		   <option value=Auxiliar Docente>Auxiliar Docente</option>
		  ";
			break;
		
		}
	
		  ?>
        </select>
        </label>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap="nowrap" bgcolor="#b50f0f"><div align="center"> <a href="Principal.php?link=link52&validar=1&cedula=<?php echo  $row_alumno["cedula"]; ?>">
        <input name="Submit" type="button" class="Estilo2" value="Regresar" />
        </a>
            <input name="submit" type="submit" class="Estilo2" value="Actualizar" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="cod_hist" value="<?php echo $row_historial['cod_hist']; ?>">
	<input type="hidden" name="cedula" value="<?php echo $row_historial['id_alumno']; ?>">
  </p>
</form>


<p>&nbsp;</p>
</body>
</html>

