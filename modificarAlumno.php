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


$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {


  $updateSQL = sprintf("UPDATE alumno SET cedula=%s, nombre=%s, apellido=%s, enfermedad=%s, sexo=%s, edad=%s, fecha_nac=%s, lugarNac=%s, hermanos=%s, hermanosG=%s, escuelaProc=%s, poblacion=%s, repitiente=%s, materias=%s, Nmaterias=%s, materias2=%s, comunidad=%s, cedulaR=%s, nombreR=%s, sexoR=%s, ocupacionR=%s, fechaR=%s, viveR=%s, cedulaP=%s, nombreP=%s, ocupacionP=%s, fechaP=%s, viveP=%s, cedulaM=%s, nombreM=%s, ocupacionM=%s, fechaM=%s, viveM=%s, Observacion=%s, fechaI=%s WHERE id=%s",
                       GetSQLValueString($_POST['cedula'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido'], "text"),
                       GetSQLValueString($_POST['enfermedad'], "text"),
                       GetSQLValueString($_POST['sexo'], "text"),
                       GetSQLValueString($_POST['edad'], "int"),
                       GetSQLValueString($_POST['fecha'], "date"),
					   GetSQLValueString($_POST['lugar'], "text"),
					   GetSQLValueString($_POST['hermanos'], "text"),
					   GetSQLValueString($_POST['grados'], "text"),
					   GetSQLValueString($_POST['escuelaProc'], "text"),
					   GetSQLValueString($_POST['poblacion'], "text"),
					   GetSQLValueString($_POST['repite'], "text"),
					   GetSQLValueString($_POST['materias'], "text"),
					   GetSQLValueString($_POST['Nmaterias'], "text"),
					   GetSQLValueString($_POST['materias2'], "text"),
                       GetSQLValueString($_POST['direccion'], "text"),
					   GetSQLValueString($_POST['cedulaR'], "int"),
                       GetSQLValueString($_POST['nombreR'], "text"),
					   GetSQLValueString($_POST['sexoR'], "text"),
					   GetSQLValueString($_POST['ocupacionR'], "text"),
					   GetSQLValueString($_POST['fechaR'], "date"),
					   GetSQLValueString($_POST['viveR'], "text"),
					   GetSQLValueString($_POST['cedulaP'], "int"),
                       GetSQLValueString($_POST['nombreP'], "text"),
					   GetSQLValueString($_POST['ocupacionP'], "text"),
					   GetSQLValueString($_POST['fechaP'], "date"),
					   GetSQLValueString($_POST['viveP'], "text"),
					   GetSQLValueString($_POST['cedulaM'], "int"),
                       GetSQLValueString($_POST['nombreM'], "text"),
					   GetSQLValueString($_POST['ocupacionM'], "text"),
					   GetSQLValueString($_POST['fechaM'], "date"),
					   GetSQLValueString($_POST['viveM'], "text"),
					   GetSQLValueString($_POST['observacion'], "text"),
					   GetSQLValueString($_POST['fechaI'], "date"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($updateSQL, $conexion) or die(mysql_error());
  if($Result1){
	  if($_POST["rut"]=="link112"){
  echo "<script type=\"text/javascript\">alert ('Datos Actualizados');  location.href='principal.php?link=link112' </script>";
	  }else{
 echo "<script type=\"text/javascript\">alert ('Datos Actualizados');  location.href='principal.php?link=link1116&cedula=$_POST[cedula]' </script>";
		  
			}
	  
  
  
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='principal.php?link=link112' </script>";
  exit;
  }
}


$id=$_GET["id"];
mysql_select_db($database_conexion, $conexion);
$query_alumnos = "SELECT * FROM alumno where id=$id";
$alumnos = mysql_query($query_alumnos, $conexion) or die(mysql_error());
$row_alumnos = mysql_fetch_assoc($alumnos);
$totalRows_alumnos = mysql_num_rows($alumnos);






if($_GET["link2"]=="link1116"){
$rut="link1116";
}else{
$rut="link112";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jscalendar-1.0/calendar.js"></script>
    <script type="text/javascript" src="jscalendar-1.0/calendar-setup.js"></script>
    <script type="text/javascript" src="jscalendar-1.0/lang/calendar-es.js"></script>
    <style type="text/css"> 
    @import url("jscalendar-1.0/calendar-win2k-cold-1.css"); .Estilo7 {font-weight: bold}
    .Estilo10 {color: #FFFFFF}
   
    </style>
		<script type="text/JavaScript" language="javascript" src="calendario/calendar-setup.js"></script>
<style type="text/css">
<!--




.Estilo13 {
	color: #FFFFFF;
	font-style: italic;
	font-size: 14px
}
.Estilo16 {
	font-size: 14px;
	text-align: left;
}

.estilo17 {
	font-size: 14px;
	text-align: right;
}
.izq {
	text-align: left;
}
-->
</style>
</head>
<script language="javascript">

function validar(){
		if(document.form1.cedula.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedula').value)){
				alert('Solo puede ingresar numeros en la cedula de alumno!!!');
				return false;
		   		}
				}
		if(document.form1.edad.value!=""){
			 var filtro = /^(\d)+$/i;
		   	  if (!filtro.test(document.getElementById('edad').value)){
				alert('Solo puede ingresar numeros en la edad de alumno!!!');
				return false;
		   		}
				}
				if(document.form1.Nmaterias.value!=""){
			 var filtro = /^(\d)+$/i;
		   	  if (!filtro.test(document.getElementById('Nmaterias').value)){
				alert('Solo puede ingresar numeros en el numero de materias!!!');
				return false;
		   		}
				}
				
		if(document.form1.cedulaR.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedulaR').value)){
				alert('Solo puede ingresar numeros en la cedula del Representante!!!');
				return false;
		   		}
				}
				if(document.form1.cedulaP.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedulaP').value)){
				alert('Solo puede ingresar numeros en la cedula del Padre!!!');
				return false;
		   		}
				}
				
				if(document.form1.cedulaM.value!=""){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedulaM').value)){
				alert('Solo puede ingresar numeros en la cedula de la Madre!!!');
				return false;
		   		}
				}
				
				
	
				if(document.form1.cedula.value==""){
						alert("Debe Ingresar la Cedula de alumno");
						return false;
				}
				
				
				if(document.form1.edad.value==""){
						alert("Debe Ingresar la Edad del Alumno");
						return false;
				}
				if(document.form1.nombre.value==""){
						alert("Debe Ingresar el Nombre del Alumno");
						return false;
				}
			
				if(document.form1.apellido.value==""){
						alert("Debe Ingresar el Apellido del Alumno");
						return false;
				}
				
				if(document.form1.direccion.value==""){
						alert("Debe Ingresar la Comunidad donde Vive el Alumno");
						return false;
				}
				
				
				
				if(document.form1.cedulaR.value==""){
						alert("Debe Ingresar la Cedula del Represenatnte");
						return false;
				}
				
				if(document.form1.nombreR.value==""){
						alert("Debe Ingresar el Nombre del Represenatnte");
						return false;
				}
				
				if(document.form1.OcupacionR.value==""){
						alert("Debe Ingresar la Ocupacion del Represenatnte");
						return false;
				}

			



}
			
			
</script>
<body>
<p>&nbsp;</p>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>"  onsubmit="return validar()">
  <table width="448" align="center" class="border">
    <tr valign="baseline">
      <td colspan="3" align="right"  bgcolor="#b50f0f"><div align="center" class="Estilo13">Datos del Alumno </div></td>
    </tr>
    <tr valign="baseline">
      <td width="213" class="estilo17"><div  class="estilo17">Cedula de Alumno:</div></td>
      <td colspan="2" class="izq"><div align="left"><span class="estilo15">
        <input name="cedula" type="text" class="Estilo16" id="cedula"  value="<?php echo $row_alumnos['cedula']; ?>" size="9" maxlength="9">
      </span></div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="estilo17"><span class="estilo15">Nombre del Alumno:</span></td>
      <td colspan="2" class="izq"><div align="left"><span class="estilo15">
        <input name="nombre" type="text" class="Estilo16" value="<?php echo $row_alumnos['nombre']; ?>" size="32" maxlength="50">
      </span></div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="estilo17"><span class="estilo15">Apellido del Alumno:</span></td>
      <td colspan="2" class="izq"><div align="left"><span class="estilo15">
        <input name="apellido" type="text" class="Estilo16" value="<?php echo $row_alumnos['apellido']; ?>" size="32" maxlength="50">
      </span></div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="estilo17"><span class="estilo16">Enfermedad que Posee:</span></td>
      <td colspan="2" ><div class="estilo16">
        <textarea name="enfermedad" cols="35" class="Estilo16" onkeydown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"><?php echo $row_alumnos['direccion']; ?></textarea>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td  class="estilo17"><div align="right"  class="estilo17">Sexo de Alumno:</div></td>
      <td colspan="2" class="izq">
        <div align="left"><span class="estilo15">
          <select name="sexo" class="Estilo16"  id="sexo">
            <?php


if($row_alumnos['sexo']=="Masculino"){ 
		echo "
          <option value='Masculino'>Masculino</option>
		  <option value='Femeninio'>Femeninio</option>
           }//fin del if 
		";
		}else{
		if($row_alumnos['sexo']=="Femenino"){
			echo "
          <option value='Femeninio'>Femenino</option>
		  <option value='Masculino'>Masculino</option>
		  ";
         }
		 }//fin del else 
		  ?>
          </select>
        </span></div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="estilo17"><span class="estilo15">Edad del Alumno:</span></td>
      <td colspan="2" class="izq"><div align="left"><span class="estilo15">
        <input name="edad" type="text" class="Estilo16" id="edad" value="<?php echo $row_alumnos['edad']; ?>" size="2" maxlength="2">
      </span></div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="estilo17"><span class="Estilo161">Lugar de Nacimiento:</span></td>
      <td colspan="2" class="izq"><div align="left"><span class="Estilo161">
        <input name="lugar" type="text" class="Estilo16" id="lugar" onkeydown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }" value="<?php echo $row_alumnos['lugarNac']; ?>" size="40" maxlength="200" />
      </span></div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="estilo17">Fecha de Nacimiento:</td>
      <td colspan="2" class="izq">
        <div align="left">
          <input name="fecha" type="text" class="Estilo16" id="fecha" value="<?php echo $row_alumnos['fecha_nac']; ?>" readonly="readonly" />
       <button type="button" id="cal-button-1" title="Clic Para Escoger la fecha">Fecha</button>
      <script type="text/javascript">
							Calendar.setup({
							  inputField    : "fecha",
							  ifFormat   : "%Y-%m-%d",
							  button        : "cal-button-1",
							  align         : "Tr"
							});
						  </script>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="estilo17">Direccion:</td>
      <td colspan="2" class="izq"><div align="left">
        <input name="direccion" type="text" class="Estilo16" id="direccion" onkeydown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }" value="<?php echo $row_alumnos['comunidad']; ?>" size="40" maxlength="200" />
      </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="estilo17">&iquest;Tiene Hermanos (as) en el Colegio?</td>
      <td width="42" class="izq"><div align="left">
        <select name="hermanos" class="Estilo16" id="hermanos">
          
          <?php


if($row_alumnos['hermanos']=="SI"){ 
		echo "
          <option value='SI'>SI</option>
        <option value='NO'>NO</option>
           }//fin del if 
		";
		}else{
		if($row_alumnos['hermanos']=="NO"){
			echo "
			<option value='NO'>NO</option>
          <option value='SI'>SI</option>
		  ";
         }
		 }//fin del else 
		  ?>
        </select>
      </div></td>
      <td width="171" class="izq"><div class="Estilo16" align="left">Grados:
      </div>   
          <div align="left">
            <input name="grados" type="text" class="Estilo16" id="grados" value="<?php echo $row_alumnos['hermanosG']; ?>" size="25" maxlength="100" />
        </div>
     </td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="estilo17">Escuela de Procedencia</td>
      <td colspan="2" class="izq">
        <div align="left">
          <input name="escuelaProc" type="text" class="Estilo16" id="escuelaProc" value="<?php echo $row_alumnos['escuelaProc']; ?>" size="40" maxlength="100" />
      </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="estilo17">Poblacion:</td>
      <td colspan="2" class="izq">
        <div align="left">
          <input name="poblacion" type="text" class="Estilo16" id="poblacion" value="<?php echo $row_alumnos['poblacion']; ?>" size="40" maxlength="50" />
          </div>
    </td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="estilo17">Alumno (a) Repitiente:</td>
      <td colspan="2" class="izq"><div align="left">
        <select name="repite" class="Estilo16" id="repite">
          <?php


if($row_alumnos['repitiente']=="SI"){ 
		echo "
          <option value='SI'>SI</option>
        <option value='NO'>NO</option>
           }//fin del if 
		";
		}else{
		if($row_alumnos['repitiente']=="NO"){
			echo "
			<option value='NO'>NO</option>
          <option value='SI'>SI</option>
		  ";
         }
		 }//fin del else 
		  ?>
        </select>
      </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="estilo17">Materias:</td>
      <td colspan="2" class="izq">
        <div align="left">
          <input name="materias" type="text" class="Estilo16" id="materias" value="<?php echo $row_alumnos['materias']; ?>" size="40" maxlength="100" />
          </div>
      </td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="estilo17">N&ordm; Materias Penientes</td>
      <td colspan="2" class="izq">
        <div align="left">
          <input name="Nmaterias" type="text" class="Estilo16" id="Nmaterias" value="<?php echo $row_alumnos['Nmaterias']; ?>" size="5" maxlength="2" />
          </div>
      </td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="estilo17">Materias</td>
      <td colspan="2" class="izq"><div align="left">
        <input name="materias2" type="text" class="Estilo16" id="materias2" value="<?php echo $row_alumnos['materias2']; ?>" size="40" maxlength="40" />
      </div></td>
    </tr>
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap="nowrap" bgcolor="#b50f0f"><div align="center" class="Estilo13">Datos de Representantes </div></td>
    </tr>
 
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Cedula del Representante:</div></td>
      <td colspan="2" class="Estilo16"><input name="cedulaR" type="text" class="Estilo16" id="cedulaR" value="<?php echo $row_alumnos['cedulaR']; ?>" size="9" maxlength="9" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Nombre del Represenatnte:</div></td>
      <td colspan="2" class="Estilo16"><input name="nombreR" type="text" class="Estilo16" id="nombreR" value="<?php echo $row_alumnos['nombreR']; ?>" size="40" maxlength="50" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Sexo del Representante: </div></td>
      <td colspan="2" class="Estilo16"><select name="sexoR" class="Estilo16" id="sexoR2">
           <?php


if($row_alumnos['sexoR']=="Masculino"){ 
		echo "
          <option value='Masculino'>Masculino</option>
		  <option value='Femeninio'>Femeninio</option>
           }//fin del if 
		";
		}else{
		if($row_alumnos['sexoR']=="Femenino"){
			echo "
          <option value='Femenino'>Femenino</option>
		  <option value='Masculino'>Masculino</option>
		  ";
         }
		 }//fin del else 
		  ?>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Ocupacion del Represenatnte:</div></td>
      <td colspan="2" class="Estilo16">&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16"><div align="right"><span class="Estilo16">Fecha de Naciento:</span></div></td>
      <td colspan="2"><span class="Estilo16">
        <input name="fechaR" type="text" class="Estilo16" id="fechaR" value="<?php echo $row_alumnos['fechaR']; ?>" readonly="readonly" />
    <button type="button" id="cal-button-2" title="Clic Para Escoger la fecha">Fecha</button>
      <script type="text/javascript">
							Calendar.setup({
							  inputField    : "fechaR",
							  ifFormat   : "%Y-%m-%d",
							  button        : "cal-button-2",
							  align         : "Tr"
							});
						  </script>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="estilo17">&iquest;Vive con el Alumno?</td>
      <td colspan="2" class="Estilo16">
        <select name="viveR" class="Estilo16" id="viveR">
            <?php


if($row_alumnos['viveR']=="SI"){ 
		echo "
          <option value='SI'>SI</option>
        <option value='NO'>NO</option>
           }//fin del if 
		";
		}else{
		if($row_alumnos['viveR']=="NO"){
			echo "
			<option value='NO'>NO</option>
          <option value='SI'>SI</option>
		  ";
         }
		 }//fin del else 
		  ?>
        </select>
        <input name="ocupacionR" type="text" class="Estilo16" id="ocupacionR" value="<?php echo $row_alumnos['ocupacionR']; ?>" size="40" maxlength="50" /></td>
    </tr>
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap="nowrap" bgcolor="#b50f0f" class="Estilo16"><div align="center" class="Estilo17"><span class="Estilo13">Datos del Padre </span></div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Cedula del Padre:</div></td>
      <td colspan="2" class="Estilo16"><input name="cedulaP" type="text" class="Estilo16" id="cedulaP" value="<?php echo $row_alumnos['cedulaP']; ?>" size="9" maxlength="9" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Nombre del Padre:</div></td>
      <td colspan="2" class="Estilo16"><input name="nombreP" type="text" class="Estilo16" id="nombreP" value="<?php echo $row_alumnos['nombreP']; ?>" size="40" maxlength="50" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Ocupacion del Represenatnte:</div></td>
      <td colspan="2" class="Estilo16"><input name="ocupacionP" type="text" class="Estilo16" id="ocupacionP" value="<?php echo $row_alumnos['ocupacionP']; ?>" size="40" maxlength="50" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Fecha de Naciento:</span></div></td>
      <td colspan="2"><span class="Estilo16">
        <input name="fechaP" type="text" class="Estilo16" id="fechaP" value="<?php echo $row_alumnos['fechaP']; ?>" readonly="readonly" />
            <button type="button" id="cal-button-3" title="Clic Para Escoger la fecha">Fecha</button>
      <script type="text/javascript">
							Calendar.setup({
							  inputField    : "fechaP",
							  ifFormat   : "%Y-%m-%d",
							  button        : "cal-button-3",
							  align         : "Tr"
							});
						  </script>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="estilo17">&iquest;Vive con el Alumno?</td>
      <td colspan="2" class="Estilo16"><label>
        <select name="viveP" class="Estilo16" id="viveP">
                     <?php


if($row_alumnos['viveP']=="SI"){ 
		echo "
          <option value='SI'>SI</option>
        <option value='NO'>NO</option>
           }//fin del if 
		";
		}else{
		if($row_alumnos['viveP']=="NO"){
			echo "
			<option value='NO'>NO</option>
          <option value='SI'>SI</option>
		  ";
         }
		 }//fin del else 
		  ?>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap="nowrap" bgcolor="#b50f0f" class="Estilo16"><div align="center" class="Estilo17"><span class="Estilo13">Datos de la Madre </span></div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Cedula de la Madre:</div></td>
      <td colspan="2" class="Estilo16"><input name="cedulaM" type="text" class="Estilo16" id="cedulaM" value="<?php echo $row_alumnos['cedulaM']; ?>" size="9" maxlength="9" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Nombre de la Madre:</div></td>
      <td colspan="2" class="Estilo16"><input name="nombreM" type="text" class="Estilo16" id="nombreR3" value="<?php echo $row_alumnos['nombreM']; ?>" size="40" maxlength="50" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Ocupacion del Represenatnte:</div></td>
      <td colspan="2" class="Estilo16"><input name="ocupacionM" type="text" class="Estilo16" id="ocupacionM" value="<?php echo $row_alumnos['ocupacionM']; ?>" size="40" maxlength="50" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Fecha de Naciento:</span></div></td>
      <td colspan="2"><span class="Estilo16">
        <input name="fechaM" type="text" class="Estilo16" id="fechaM" value="<?php echo $row_alumnos['fechaM']; ?>" readonly="readonly" />
            <button type="button" id="cal-button-4" title="Clic Para Escoger la fecha">Fecha</button>
      <script type="text/javascript">
							Calendar.setup({
							  inputField    : "fechaM",
							  ifFormat   : "%Y-%m-%d",
							  button        : "cal-button-4",
							  align         : "Tr"
							});
						  </script>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="estilo17">&iquest;Vive con el Alumno?</td>
      <td colspan="2" class="Estilo16"><label>
        <select name="viveM" class="Estilo16" id="viveM">
                      <?php


if($row_alumnos['viveM']=="SI"){ 
		echo "
          <option value='SI'>SI</option>
        <option value='NO'>NO</option>
           }//fin del if 
		";
		}else{
		if($row_alumnos['viveM']=="NO"){
			echo "
			<option value='NO'>NO</option>
          <option value='SI'>SI</option>
		  ";
         }
		 }//fin del else 
		  ?>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap="nowrap" bgcolor="#b50f0f" class="Estilo16"><div align="center" class="Estilo17"><span class="Estilo13">Otros Datos </span></div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="estilo17">Observaciones:</td>
      <td colspan="2" class="Estilo16"><label>
        <textarea name="observacion" cols="35" id="observacion" onkeydown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"><?php echo $row_alumnos['Observacion']; ?></textarea>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="estilo17">Fecha de Inscripcion:</td>
      <td colspan="2" class="Estilo16"><input name="fechaI" type="text" class="Estilo16" id="fechaI" value="<?php echo $row_alumnos['fechaI']; ?>" readonly="readonly" />
         <button type="button" id="cal-button-5" title="Clic Para Escoger la fecha">Fecha</button>
      <script type="text/javascript">
							Calendar.setup({
							  inputField    : "fechaI",
							  ifFormat   : "%Y-%m-%d",
							  button        : "cal-button-5",
							  align         : "Tr"
							});
						  </script></td>
    </tr>
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap bgcolor="#b50f0f"><div align="center">
        <label>
        <a href="Principal.php?link=<?php echo $rut;?>&cedula=<?php echo $row_alumnos['cedula'];?>"><input name="Submit" type="button" class="Estilo16" value="Regresar" />
        </a>        </label>
        <input type="submit" class="Estilo16" value="Actualizar">
        <label>
          <input name="button" type="reset" class="Estilo16" id="button" value="limpiar" />
        </label>
      </div></td>
    </tr>
  </table>
  <p>&nbsp;  </p>
  <p>
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="id" value="<?php echo $row_alumnos['id']; ?>">
    <input type="hidden" name="rut" value="<?php echo $rut; ?>">
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($alumnos);


?>
