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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {


//verificar si el a�o escolar es igual 
mysql_select_db($database_conexion, $conexion);
$query_escolar = "SELECT * FROM historial where ano_escolar='$_POST[periodo]' and id_alumno='$_POST[cedula]'";
$escolar = mysql_query($query_escolar, $conexion) or die(mysql_error());
$row_escolar = mysql_fetch_assoc($escolar);
$totalRows_escolar = mysql_num_rows($escolar);

if($totalRows_escolar>=1){
 		echo "<script type=\"text/javascript\">alert ('Este alumno ya tiene registrado este periodo escolar'); location.href='Principal.php?link=link5' </script>";
  		exit;
}



//verificar si el alumno esta inscrito
mysql_select_db($database_conexion, $conexion);
$query_alumno = "SELECT * FROM alumno where cedula='$_POST[cedula]'";
$alumno = mysql_query($query_alumno, $conexion) or die(mysql_error());
$row_alumno = mysql_fetch_assoc($alumno);
$totalRows_alumno = mysql_num_rows($alumno);

if($row_alumno["cedula"]!=$_POST["cedula"]){
 		echo "<script type=\"text/javascript\">alert ('Este alumno no esta registrado '); location.href='Principal.php?link=link5' </script>";
  		exit;
}

//verificar que no se inscriba 2 veces el alumno en un mismo grado
mysql_select_db($database_conexion, $conexion);
$query_historial = "SELECT * FROM historial where grado=' $_POST[grado]' and id_alumno='$_POST[cedula]' ";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);

if($totalRows_historial>0){
 		echo "<script type=\"text/javascript\">alert ('Este alumno ya esta registrado en ". $_POST['grado'] ." A�o '); location.href='Principal.php?link=link5' </script>";
  		exit;
}



//verificar si es el grado actual
if($_POST["actual"]=="actual"){
$actual=1;
$query_historial = "SELECT * FROM historial where actual=1 and id_alumno='$_POST[cedula]' ";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);

if($totalRows_historia>0){
echo "<script type=\"text/javascript\">alert ('Este alumno ya tiene registrado un grado actual '); location.href='Principal.php?link=link5' </script>";
exit;
	}

}else{
$actual=0;
$query_historial = "SELECT * FROM historial where actual=1 and id_alumno='$_POST[cedula]' ";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);
$totalRows_historial = mysql_num_rows($historial);

if($totalRows_historial>0){
if($row_historial["grado"]<=$_POST['grado']){
echo "<script type=\"text/javascript\">alert ('El grado no puede ser mayor al grado actual que tiene registrado el alumno'); location.href='Principal.php?link=link5' </script>";
exit;
	}
}//fin del else
}



//verificamos si es de educacion media
if($_POST['grado']==1 or $_POST['grado']==2 or $_POST['grado']==3){




$media=1;
$diversificado=0;
 //ingresamos valores a historial
   $insertSQL = sprintf("INSERT INTO historial (media, diversificado, seccion, ano_escolar, grado,  actual, id_alumno) VALUES (%s, %s, %s, %s, %s,  %s, %s)",
                       GetSQLValueString($media, "int"),
					   GetSQLValueString($diversificado, "int"), 
					   GetSQLValueString($_POST['seccion'], "text"),
                       GetSQLValueString($_POST['periodo'], "text"),
                       GetSQLValueString($_POST['grado'], "text"),
					   GetSQLValueString($actual, "int"),
					   GetSQLValueString($_POST['cedula'], "int"));

}//fin de verificacion de media
 
					
					
					   

//verificamos si es de educacion diversificada
if($_POST['grado']==4 or $_POST['grado']==5 or $_POST['grado']==6){

$media=0;
$diversificado=1;

//validar que quinto y sexto a�os sean los mismos que cuarto
if($_POST['grado']>4){
$query_historialv = "SELECT * FROM historial where id_alumno='$_POST[cedula]' and grado=4  ";
$historialv = mysql_query($query_historialv, $conexion) or die(mysql_error());
$row_historialv = mysql_fetch_assoc($historialv);

if($row_historialv["mencion"]!=$_POST['mencion']){
echo "<script type=\"text/javascript\">alert ('La mencion que tiene este alumno no coincide con la que registro para cuarto a�o'); location.href='Principal.php?link=link5' </script>";
exit;
	}
	
}



 //ingresamos valores a historial
   $insertSQL = sprintf("INSERT INTO historial (media, diversificado, seccion, ano_escolar, grado, mencion, actual, id_alumno) VALUES (%s, %s, %s, %s, %s, %s,  %s, %s)",
                       GetSQLValueString($media, "int"),
					   GetSQLValueString($diversificado, "int"), 
					   GetSQLValueString($_POST['seccion'], "text"),
                       GetSQLValueString($_POST['periodo'], "text"),
                       GetSQLValueString($_POST['grado'], "text"),
					   GetSQLValueString($_POST['mencion'], "text"),
					   GetSQLValueString($actual, "int"),
					   GetSQLValueString($_POST['cedula'], "int"));


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
.Estilo4 {font-size: 12px}
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
						alert("Debe Seleccionar un A�o Escolar");
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
  <p>&nbsp;</p>
  <table align="center" class="border" cellpadding="0" cellspacing="0">
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap bgcolor="#b50f0f"><div align="center" class="Estilo1">Registro de Historial </div></td>
    </tr>
    <tr valign="baseline">
      <td width="107" align="right" nowrap><span class="Estilo4">Cedula del Alumno:</span></td>
      <td width="131"><div class="Estilo4"><input  name="cedula" type="text" class="Estilo4" id="cedula" value="" size="8" maxlength="8" /></div></td>
      <td width="106"><? /* <span class="Estilo4"> A&ntilde;o Actual?
          <label>
          <input name="actual" type="checkbox" class="Estilo4" id="actual" value="actual" />
          </label>
      </span> */ ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><span class="Estilo4">Periodo Academico: </span></td>
      <td colspan="2"><span class="Estilo4">
        <label>
        <select name="periodo" class="Estilo4" id="periodo">
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
        </label>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><span class="Estilo4">Grado o A&ntilde;o Escolar: </span></td>
      <td colspan="2"><span class="Estilo4">
        <label>
        <select name="grado" class="Estilo4" id="grado" onchange="cambiar()">
          <option value="-">Seleccione un A&ntilde;o</option>
          <option value="1">1er A&ntilde;o</option>
          <option value="2">2do A&ntilde;o</option>
          <option value="3">3er A&ntilde;o</option>
          <option value="4">4to A&ntilde;o</option>
          <option value="5">5to A&ntilde;o</option>
        </select>
        </label>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><span class="Estilo4">Seccion:</span></td>
      <td colspan="2"><span class="Estilo4">
        <label>
        <select name="seccion" class="Estilo4" id="seccion">
          <option value="-">Seleccione una Seccion</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="E">E</option>
        </select>
        </label>
      </span></td>
    </tr>
    <tr  valign="baseline">
      <td nowrap align="right"><span class="Estilo4">Mencion:</span></td>
      <td colspan="2"><span class="Estilo4">
        <label>
        <select name="mencion" disabled="disabled" class="Estilo4" id="mencion">
          <option value="-">Seleccione una Mencion</option>
          <option value="Auxiliar Docente">Auxiliar Docente</option>
          <option value="Administracion de Servicios en Salud">Administracion de Servicios en Salud</option>
          <option value="Ciencia">Ciencia</option>
        </select>
        </label>
      </span></td>
    </tr>
    
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap bgcolor="#b50f0f"><div align="center">
        <input type="submit" class="Estilo4" value="Guardar Datos">
      </div></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>

<p>&nbsp;</p>

<p>&nbsp;</p>
</body>
</html>

