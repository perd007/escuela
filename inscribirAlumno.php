<?php require_once('Connections/conexion.php'); ?>
<?php

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
//verificar si ya aprobo se inscribio todos lols grados
if($_POST['grado']==7){
echo "<script type=\"text/javascript\">alert ('Este alumno finalaizo el bachillerato'); location.href='Principal.php?link=link5' </script>";
exit;
	}
	
	
//verificar si el año escolar es igual 
mysql_select_db($database_conexion, $conexion);
$query_escolar = "SELECT * FROM historial where ano_escolar='$_POST[periodo]' and id_alumno='$_POST[alumno]'";
$escolar = mysql_query($query_escolar, $conexion) or die(mysql_error());
$row_escolar = mysql_fetch_assoc($escolar);
$totalRows_escolar = mysql_num_rows($escolar);

if($totalRows_escolar>=1){
 		echo "<script type=\"text/javascript\">alert ('Este alumno ya tiene registrado este periodo escolar'); location.href='Principal.php?link=link61&alumno=$_POST[alumno]' </script>";
  		exit;
}


//verificar que no se inscriba 2 veces el alumno en un mismo grado
mysql_select_db($database_conexion, $conexion);
$query_historial = "SELECT * FROM historial where id_alumno='$_POST[alumno]' ";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);

if($totalRows_historial>0){
 		echo "<script type=\"text/javascript\">alert ('Este alumno ya esta Inscrito para este grado'); location.href='Principal.php?link=link61&alumno=$_POST[alumno]' </script>";
  		exit;
}



	
//verificar si el grado es el actual para añadir uno nuevo como actual	
$query_historial = "SELECT * FROM historial where  cod_hist='$_POST[cod_hist]'";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);

if($row_historial["actual"]==1){
$actual=1;
$query_historial2 = "UPDATE historial SET actual=0 WHERE cod_hist='$row_historial[cod_hist]'";
$historial2 = mysql_query($query_historial2, $conexion) or die(mysql_error());
}else{
$actual=0;
}



//verificamos que periodo escolar no sea mayor que el anterior
mysql_select_db($database_conexion, $conexion);
$query_valHist = "SELECT * FROM historial where cod_hist='$_POST[cod_hist]'";
$valHist = mysql_query($query_valHist, $conexion) or die(mysql_error());
$row_valHist = mysql_fetch_assoc($valHist);
$totalRows_valHist = mysql_num_rows($valHist);
	//asignamos valores al año anterior
 switch ($row_valHist['ano_escolar']){
			case "2002 - 2005":
			$AnoEscolar=1;
			break;
			case "2005 - 2006":
			$AnoEscolar=2;
			break;
			case "2006 - 2007":
			$AnoEscolar=2;
			break;
			case "2007 - 2008":
			$AnoEscolar=3;
			break;
			case "2008 - 2009":
			$AnoEscolar=4;
			break;
			case "2009 - 2010":
			$AnoEscolar=5;
			break;
			case "2010 - 2011":
			$AnoEscolar=6;
			break;
			case "2011 - 2012":
			$AnoEscolar=7;
			break;
			case "2012 - 2013":
			$AnoEscolar=8;
			break;
			case "2013 - 2014":
			$AnoEscolar=9;
			break;
			case "2014 - 2015":
			$AnoEscolar=10;
			break;
			case "2015 - 2016":
			$AnoEscolar=11;
			break;
			case "2016 - 2017":
			$AnoEscolar=12;
			break;
			case "2017 - 2018":
			$AnoEscolar=13;
			break;
			case "2019 - 2020":
			$AnoEscolar=14;
			break;

		}
		
		//asignamos valores al año siguiente
 switch ($_POST['periodo']){
			case "2002 - 2005":
			$AnoEscolar2=1;
			break;
			case "2005 - 2006":
			$AnoEscolar2=2;
			break;
			case "2006 - 2007":
			$AnoEscolar2=2;
			break;
			case "2007 - 2008":
			$AnoEscolar2=3;
			break;
			case "2008 - 2009":
			$AnoEscolar2=4;
			break;
			case "2009 - 2010":
			$AnoEscolar2=5;
			break;
			case "2010 - 2011":
			$AnoEscolar2=6;
			break;
			case "2011 - 2012":
			$AnoEscolar2=7;
			break;
			case "2012 - 2013":
			$AnoEscolar2=8;
			break;
			case "2013 - 2014":
			$AnoEscolar2=9;
			break;
			case "2014 - 2015":
			$AnoEscolar2=10;
			break;
			case "2015 - 2016":
			$AnoEscolar2=11;
			break;
			case "2016 - 2017":
			$AnoEscolar2=12;
			break;
			case "2017 - 2018":
			$AnoEscolar2=13;
			break;
			case "2019 - 2020":
			$AnoEscolar2=14;
			break;

		}

//realizamos la verificacion
if($AnoEscolar>=$AnoEscolar2){
 echo "<script type=\"text/javascript\">alert ('El Periodo escolar que selecciono es inferior al que poseia el alumno anteriormente'); location.href='principal.php?link=link61&grado=$_POST[grado]&mencion=$_POST[mencion]&alumno=$_POST[alumno]&cod=$_POST[cod_hist]' </script>";
 exit;
}

//verificamos si es de educacion media
if($_POST['grado']==1 or $_POST['grado']==2 or $_POST['grado']==3){


//verificamos que existan materias de educacion para el trabajo registradas
mysql_select_db($database_conexion, $conexion);
$query_MET = "SELECT * FROM educ_trabajo";
$MET = mysql_query($query_MET, $conexion) or die(mysql_error());
$row_MET = mysql_fetch_assoc($MET);
$totalRows_MET = mysql_num_rows($MET);


if($totalRows_MET<0){
echo "<script type=\"text/javascript\">alert ('No puede registrar los grados de educacion media por que no existen materias de educacion para el trabajo registradas'); location.href='Principal.php?link=link5' </script>";
exit;
	}

$media=1;
$diversificado=0;
 //ingresamos valores a historial
   $insertSQL = sprintf("INSERT INTO historial (media, diversificado, seccion, ano_escolar, grado, actual, id_alumno) VALUES (%s, %s, %s, %s, %s, %s,  %s, %s)",
                       GetSQLValueString($media, "int"),
					   GetSQLValueString($diversificado, "int"), 
					   GetSQLValueString($_POST['seccion'], "text"),
                       GetSQLValueString($_POST['periodo'], "text"),
                       GetSQLValueString($_POST['grado'], "text"),
					   GetSQLValueString($actual, "int"),
					   GetSQLValueString($_POST['alumno'], "int"));

}//fin de verificacion de media
 
					
					
					   

//verificamos si es de educacion diversificada
if($_POST['grado']==4 or $_POST['grado']==5 or $_POST['grado']==6){

$media=0;
$diversificado=1;
 //ingresamos valores a historial
   $insertSQL = sprintf("INSERT INTO historial (media, diversificado, seccion, ano_escolar, grado, mencion, actual, id_alumno) VALUES (%s, %s, %s, %s, %s, %s,  %s, %s)",
                       GetSQLValueString($media, "int"),
					   GetSQLValueString($diversificado, "int"), 
					   GetSQLValueString($_POST['seccion'], "text"),
                       GetSQLValueString($_POST['periodo'], "text"),
                       GetSQLValueString($_POST['grado'], "text"),
					   GetSQLValueString($_POST['mencion'], "text"),
					   GetSQLValueString($actual, "int"),
					   GetSQLValueString($_POST['alumno'], "int"));


}//fin de verificacion de diversificada
 
 
 //ejecutamos la consulta que halla sido seleccionada
mysql_select_db($database_conexion, $conexion);
$Result = mysql_query($insertSQL, $conexion) or die(mysql_error());
   if($Result){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados');  location.href='Principal.php' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='Principal.php' </script>";
  exit;
  }


}


//recibimos de registroNotas2.php
$grado=$_GET["grado"];
$mencion=$_GET["mencion"];
$alumno=$_GET["alumno"];
$histo=$_GET["cod"];

$grado2=$grado+=1;

mysql_select_db($database_conexion, $conexion);
$query_estudiante = "SELECT * FROM alumno  where cedula=$alumno";
$estudiante = mysql_query($query_estudiante, $conexion) or die(mysql_error());
$row_estudiante = mysql_fetch_assoc($estudiante);
$totalRows_estudiante = mysql_num_rows($estudiante);




?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo1 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 12px
}
.Estilo2 {font-size: 12px}
-->
</style>
</head>
<script language="javascript">
<!--


   
function validar(){

			
				if(document.form1.seccion.value=="-"){
						alert("Debe Seleccionar una Seccion");
						return false;
				}
				
				
			
					if(document.form1.id_eduT.value==0){
						alert("Debe Seleccionar una Materia de Educacion para el Trabajo");
						return false;
					}
				
				
				
			
					if(document.form1.mencion.value=="-"){
						alert("Debe Seleccionar una mencion");
						return false;
					}
				
			
				
		}

</script>
<body>
<form method="post" name="form1" onsubmit="return validar()" action="<?php echo $editFormAction; ?>">
  <p>&nbsp;</p>
  <table border="0" class="border" align="center" cellpadding="2" cellspacing="0">
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap bgcolor="#b50f0f"><div align="center" class="Estilo1">Inscripcion de Alumnos </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap><div align="center" class="Estilo2"><?php echo $row_estudiante['cedula']; ?>&nbsp;<?php echo $row_estudiante['nombre']; ?>&nbsp;<?php echo $row_estudiante['apellido']; ?></div>      </td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap><span class="Estilo2">A&ntilde;o a Inscribir </span></td>
      <td><span class="Estilo2">
        <?php 
	  //verificar el grado

 switch ($grado2){
 
			case 1:
			$termino="1er Año";
			break;
			case 2:
			$termino="2do Año";
			break;
			case 3:
			$termino="3er Año";
			break;
			case 4:
			$termino="4to Año";
			break;
			case 5:
			$termino="5to Año";
			break;
			case 5:
			$termino="6to Año";
			break;
		
		}
	  echo $termino; ?>
      &nbsp;</span></td>
    </tr>
    <tr valign="baseline">
      <td width="157" align="right" nowrap><span class="Estilo2">Periodo Academico:</span></td>
      <td width="239"><span class="Estilo2">
        <select name="periodo" class="Estilo2" id="periodo">
          <option value="2002 - 2005" >2002 - 2005</option>
          <option value="2005 - 2006">2005 - 2006</option>
          <option value="2006 - 2007">2006 - 2007</option>
          <option value="2007 - 2008">2007 - 2008</option>
          <option value="2008 - 2009">2008 - 2009</option>
          <option value="2009 - 2010">2009 - 2010</option>
          <option value="2010 - 2011">2010 - 2011</option>
          <option value="2011 - 2012">2011 - 2012</option>
          <option value="2012 - 2013">2012 - 2013</option>
          <option value="2013 - 2014">2013 - 2014</option>
          <option value="2014 - 2015">2014 - 2015</option>
          <option value="2015 - 2016">2015 - 2016</option>
          <option value="2016 - 2017">2016 - 2017</option>
          <option value="2017 - 2018">2017 - 2018</option>
          <option value="2018 - 2019">2018 - 2019</option>
          <option value="2019 - 2020">2019 - 2020</option>
        </select>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><span class="Estilo2">Seccion:</span></td>
      <td><span class="Estilo2">
        <select name="seccion" class="Estilo2" id="seccion">
          <option value="-">Seleccione una Seccion</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="E">E</option>
        </select>
      </span></td>
    </tr>
	<?php //verificamos si el alumno estaba en 9no
	if($grado==3){
	 ?>
    <tr valign="baseline">
      <td nowrap align="right"><span class="Estilo2">Mencion:</span></td>
      <td><span class="Estilo2">
        <select name="mencion" class="Estilo2" id="mencion">
          <option value="-">Seleccione una Mencion</option>
          <option value="Auxiliar Docente">Auxiliar Docente</option>
          <option value="Administracion de Servicios en Salud">Administracion de Servicios en Salud</option>
          <option value="Ciencia">Ciencia</option>
        </select>
      </span></td>
    </tr>
	<?php
	}else
	if($grado>=4){ ?>
	 
    <tr valign="baseline">
      <td nowrap align="right"><span class="Estilo2">Mencion:</span></td>
      <td><span class="Estilo2"><?php echo $mencion; ?></span></td>
    </tr>
	<input type="hidden" name="mencion" value="<?php echo $mencion; ?>">
	<? 
	}//fin del else
	
	
	//verificamos si existe amerita inscripcion de materia de educacion para el trabajo
	if($grado==1 or $grado==2){
	 ?>
	<?php }//fin de la valioacion de MET
	 ?>
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap bgcolor="#b50f0f"><div align="center">
          <input type="submit" class="Estilo2" value="Guardar Datos">
          </div></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
  <input type="hidden" name="grado" value="<?php echo $grado2; ?>">
   <input type="hidden" name="alumno" value="<?php echo $alumno; ?>">
   <input type="hidden" name="cod_hist" value="<?php echo $histo; ?>">
   <input type="hidden" name="mencion" value="<?php echo $mencion; ?>">
   
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($estudiante);
?>
