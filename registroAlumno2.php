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



//verificar que el alumno no este registrado
mysql_select_db($database_conexion, $conexion);
$query_alumno = "SELECT * FROM alumno where cedula='$_POST[cedula]'";
$alumno = mysql_query($query_alumno, $conexion) or die(mysql_error());
$row_alumno = mysql_fetch_assoc($alumno); 

if($_POST['cedula']==$row_alumno["cedula"]){
 		echo "<script type=\"text/javascript\">alert ('Este alumno ya esta registrado'); location.href='Principal.php?link=link111&representante=$repre&representante2=$repre2' </script>";
  		exit;
}
// fin de la verificacion

//verificar que LA CEDULA NO SEA LA MISMA DEL REPRESENTANTE
mysql_select_db($database_conexion, $conexion);
$query_representantes2 = "SELECT * FROM alumno where cedulaR='$_POST[cedula]'";
$representantes2 = mysql_query($query_representantes2, $conexion) or die(mysql_error());
$row_representantes2 = mysql_fetch_assoc($representantes2);
$totalRows_representantes2 = mysql_num_rows($representantes2);

if($_POST['cedula']==$row_representantes2["cedula"]){
 		echo "<script type=\"text/javascript\">alert ('La cedula alumno es igual a la de un representante'); location.href='Principal.php?link=link111&representante=$repre&representante2=$repre2' </script>";
  		exit;
}


// fin de la verificacion




 $insertSQL = sprintf("INSERT INTO alumno (cedula, nombre, apellido, enfermedad, sexo, edad, fecha_nac, lugarNac, comunidad, hermanos, hermanosG, escuelaProc, poblacion, repitiente, materias, Nmaterias, materias2, cedulaR, nombreR, sexoR, ocupacionR, fechaR, viveR, cedulaP, nombreP, ocupacionP, fechaP, viveP, cedulaM, nombreM, ocupacionM, fechaM, viveM, Observacion, fechaI) VALUES (%s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s, %s,  %s, %s, %s, %s, %s, %s, %s, %s, %s, %s,  %s, %s, %s,  %s, %s, %s, %s, %s, %s )",
                       GetSQLValueString($_POST['cedula'], "int"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['apellido'], "text"),
                       GetSQLValueString($_POST['enfermedad'], "text"),
                       GetSQLValueString($_POST['sexo'], "text"),
                       GetSQLValueString($_POST['edad'], "int"),
                       GetSQLValueString($_POST['fecha'], "date"),
					   GetSQLValueString($_POST['direccion'], "text"),
					   GetSQLValueString($_POST['lugar'], "text"),
					   GetSQLValueString($_POST['hermanos'], "text"),
					   GetSQLValueString($_POST['grados'], "text"),
					   GetSQLValueString($_POST['escuelaProc'], "text"),
					   GetSQLValueString($_POST['poblacion'], "text"),
					   GetSQLValueString($_POST['repite'], "text"),
					   GetSQLValueString($_POST['materias'], "text"),
					   GetSQLValueString($_POST['Nmaterias'], "text"),
					   GetSQLValueString($_POST['materias2'], "text"),
					   GetSQLValueString($_POST['cedulaR'], "int"),
                       GetSQLValueString($_POST['nombreR'], "text"),
					   GetSQLValueString($_POST['sexoR'], "text"),
					   GetSQLValueString($_POST['ocupacionR'], "text"),
					   GetSQLValueString($_POST['fechaR'], "text"),
					   GetSQLValueString($_POST['viveR'], "text"),
					   GetSQLValueString($_POST['cedulaP'], "int"),
                       GetSQLValueString($_POST['nombreP'], "text"),
					   GetSQLValueString($_POST['ocupacionP'], "text"),
					   GetSQLValueString($_POST['fechaP'], "text"),
					   GetSQLValueString($_POST['viveP'], "text"),
					   GetSQLValueString($_POST['cedulaM'], "int"),
                       GetSQLValueString($_POST['nombreM'], "text"),
					   GetSQLValueString($_POST['ocupacionM'], "text"),
					   GetSQLValueString($_POST['fechaM'], "text"),
					   GetSQLValueString($_POST['viveM'], "text"),
					   GetSQLValueString($_POST['observacion'], "text"),
					   GetSQLValueString($_POST['fechaI'], "text"));



  mysql_select_db($database_conexion, $conexion);
  $Result1 = mysql_query($insertSQL, $conexion) or die(mysql_error());
  if($Result1){
  echo "<script type=\"text/javascript\">alert ('Datos Guardados');  location.href='principal.php?link=link111&cedula=$_POST[cedula]' </script>";
  }else{
  echo "<script type=\"text/javascript\">alert ('Ocurrio un Error');  location.href='principal.php' </script>";
  exit;
  }
  

}




?>
<html>
<head>
<title>Documento sin t&iacute;tulo</title>

<style type="text/css">
<!--

.Estilo16 {font-size: 14px}
.Estilo17 {
	color: #FFFFFF;
	font-size: 14px;
	text-align: center;
}
-->
</style>
</head>
<script type="text/javascript" src="jscalendar-1.0/calendar.js"></script>
    <script type="text/javascript" src="jscalendar-1.0/calendar-setup.js"></script>
    <script type="text/javascript" src="jscalendar-1.0/lang/calendar-es.js"></script>
    <style type="text/css"> 
    @import url("jscalendar-1.0/calendar-win2k-cold-1.css"); .Estilo7 {font-weight: bold}
    .Estilo10 {color: #FFFFFF}
   
    </style>
		<script type="text/JavaScript" language="javascript" src="calendario/calendar-setup.js"></script>
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
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" onSubmit="return validar()">

<table align="center"  width="600"  >
     
  </table>


  <p>&nbsp;</p>
  <table width="447" class="border" align="center">
    
     <tr valign="baseline">
       <td colspan="3" align="right"  bgcolor="#b50f0f" class="Estilo17">Tipo de Registro</td>
     </tr>
     <tr valign="baseline">
       <td colspan="3" align="right"  bgcolor="#b50f0f" class="Estilo17"><div align="center">Datos de Estudiante </div></td>
     </tr> 
	
    <tr valign="baseline">
      <td width="205" align="right" nowrap="nowrap"><div align="right"><span class="Estilo16">Cedula:</span></div></td>
      <td colspan="2"><input name="cedula" type="text" class="Estilo16" id="cedula" value="" size="9" maxlength="8" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Nombre:</span></div></td>
      <td colspan="2"><input name="nombre" type="text" class="Estilo16" value="" size="32" maxlength="50" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Apellido:</span></div></td>
      <td colspan="2"><input name="apellido" type="text" class="Estilo16" value="" size="32" maxlength="50" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Sexo:</span></div></td>
      <td colspan="2"><span class="Estilo16">
        <label>
        <select name="sexo" class="Estilo16" id="sexo">
          <option value="Masculino">Masculino</option>
          <option value="Femenino">Femenino</option>
        </select>
        </label>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Edad:</span></div></td>
      <td colspan="2"><input name="edad" type="text" class="Estilo16" id="edad" value="" size="5" maxlength="2" /></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16">Lugar de Nacimiento:</td>
      <td colspan="2"><span class="Estilo16">
        <input name="lugar" type="text" class="Estilo16" id="lugar" onKeyDown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }" value="" size="40" maxlength="200">
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Fecha de Naciento:</span></div></td>
      <td colspan="2">
        <span class="Estilo16">
        <input name="fecha" type="text" class="Estilo16" id="fecha" value="" readonly>

        <button type="button" id="cal-button-1" title="Clic Para Escoger la fecha">Fecha</button>
      <script type="text/javascript">
							Calendar.setup({
							  inputField    : "fecha",
							  ifFormat   : "%Y-%m-%d",
							  button        : "cal-button-1",
							  align         : "Tr"
							});
						  </script>
        </span></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16">Comunidad donde vive:</td>
      <td colspan="2"><span class="Estilo16">
        <input name="direccion" type="text" class="Estilo16" id="direccion" onKeyDown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }" value="" size="40" maxlength="200">
      </span></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">&iquest; Posee alguna Enfermedad?:</span></div></td>
      <td colspan="2"><span class="Estilo16">
        <textarea name="enfermedad" cols="35" class="Estilo16" onKeyDown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"></textarea>
      </span></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16">&iquest;Tiene Hermanos (as) en el Colegio?</td>
      <td width="58"><select name="hermanos" class="Estilo16" id="hermanos">
        <option value="SI">SI</option>
        <option value="NO">NO</option>
      </select></td>
      <td width="168">Grados: 
        <label>
          <input name="grados" type="text" id="grados" size="25" maxlength="100">
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16">Escuela de Procedencia</td>
      <td colspan="2"><label>
        <input name="escuelaProc" type="text" id="escuelaProc" size="40" maxlength="100">
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16">Poblacion:</td>
      <td colspan="2"><label>
        <input name="poblacion" type="text" id="poblacion" size="40" maxlength="50">
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16">Alumno (a) Repitiente:</td>
      <td colspan="2"><select name="repite" class="Estilo16" id="repite">
        <option value="SI">SI</option>
        <option value="NO">NO</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16">Materias:</td>
      <td colspan="2"><label>
        <input name="materias" type="text" id="materias" size="40" maxlength="100">
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16">N&ordm; Materias Penientes</td>
      <td colspan="2"><label>
        <input name="Nmaterias" type="text" id="Nmaterias" size="5" maxlength="2">
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap="nowrap" class="Estilo16">Materias</td>
      <td colspan="2"><input name="materias2" type="text" id="materias2" size="40" maxlength="40"></td>
    </tr>
    <tr valign="baseline">
      <td colspan="3" align="right" bgcolor="#b50f0f">
        <div align="center" class="Estilo17">Ingrese los Datos del Representante      </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo16"><div align="right">Cedula del Representante:</div></td>
      <td colspan="2" class="Estilo16"><input name="cedulaR" type="text" class="Estilo16" id="cedulaR" value="" size="9" maxlength="9"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo16"><div align="right">Nombre del Representante:</div></td>
      <td colspan="2" class="Estilo16"><input name="nombreR" type="text" class="Estilo16" id="nombreR" value="" size="40" maxlength="50"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo16"><div align="right">Sexo del Representante: </div></td>
      <td colspan="2" class="Estilo16"><select name="sexoR" class="Estilo16" id="sexoR">
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
      </select></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo16"><div align="right">Ocupacion del Representante:</div></td>
      <td colspan="2" class="Estilo16"><input name="ocupacionR" type="text" class="Estilo16" id="ocupacionR" value="" size="40" maxlength="50"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Fecha de Naciento:</span></div></td>
      <td colspan="2"><span class="Estilo16">
        <input name="fechaR" type="text" class="Estilo16" id="fechaR" value="" readonly>
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
      <td align="right" nowrap class="Estilo16">&iquest;Vive con el Alumno?</td>
      <td colspan="2" class="Estilo16"><label>
        <select name="viveR" class="Estilo16" id="viveR">
          <option value="SI">SI</option>
          <option value="NO">NO</option>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap bgcolor="#b50f0f" class="Estilo16"><div align="center" class="Estilo17">Ingrese los Datos del Padre </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo16"><div align="right">Cedula del Padre:</div></td>
      <td colspan="2" class="Estilo16"><input name="cedulaP" type="text" class="Estilo16" id="cedulaP" value="" size="9" maxlength="9"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo16"><div align="right">Nombre del Padre:</div></td>
      <td colspan="2" class="Estilo16"><input name="nombreP" type="text" class="Estilo16" id="nombreP" value="" size="40" maxlength="50"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo16"><div align="right">Ocupacion del Representante:</div></td>
      <td colspan="2" class="Estilo16"><input name="ocupacionP" type="text" class="Estilo16" id="ocupacionP" value="" size="40" maxlength="50"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Fecha de Naciento:</span></div></td>
      <td colspan="2"><span class="Estilo16">
        <input name="fechaP" type="text" class="Estilo16" id="fechaP" value="" readonly>
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
      <td align="right" nowrap class="Estilo16">&iquest;Vive con el Alumno?</td>
      <td colspan="2" class="Estilo16"><label>
        <select name="viveP" class="Estilo16" id="viveP">
          <option value="SI">SI</option>
          <option value="NO">NO</option>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap bgcolor="#b50f0f" class="Estilo16"><div align="center" class="Estilo17">Ingrese los Datos de la Madre </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo16"><div align="right">Cedula de la Madre:</div></td>
      <td colspan="2" class="Estilo16"><input name="cedulaM" type="text" class="Estilo16" id="cedulaM" value="" size="9" maxlength="9"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo16"><div align="right">Nombre de la Madre:</div></td>
      <td colspan="2" class="Estilo16"><input name="nombreM" type="text" class="Estilo16" id="nombreR3" value="" size="40" maxlength="50"></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo16"><div align="right">Ocupacion del Representante:</div></td>
      <td colspan="2" class="Estilo16"><input name="ocupacionM" type="text" class="Estilo16" id="ocupacionM" value="" size="40" maxlength="50"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Fecha de Naciento:</span></div></td>
      <td colspan="2"><span class="Estilo16">
        <input name="fechaM" type="text" class="Estilo16" id="fechaM" value="" readonly>
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
      <td align="right" nowrap class="Estilo16">&iquest;Vive con el Alumno?</td>
      <td colspan="2" class="Estilo16"><label>
        <select name="viveM" class="Estilo16" id="viveM">
          <option value="SI">SI</option>
          <option value="NO">NO</option>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td colspan="3" align="right" nowrap bgcolor="#b50f0f" class="Estilo16"><div align="center" class="Estilo17">Otros Datos </div></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo16">Observaciones:</td>
      <td colspan="2" class="Estilo16"><label>
        <textarea name="observacion" cols="35" id="observacion" onKeyDown="if(this.value.length &gt;= 200){ alert('Has superado el tama&ntilde;o m&aacute;ximo permitido de este campo'); return false; }"></textarea>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td align="right" nowrap class="Estilo16">Fecha de Inscripcion:</td>
      <td colspan="2" class="Estilo16"><input name="fechaI" type="text" class="Estilo16" id="fechaI" value="" readonly>
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
      <td colspan="3" align="right" nowrap="nowrap" bgcolor="#b50f0f" class="Estilo16"><div align="center">
        <input name="submit" type="submit" class="Estilo16" value="Guardar Datos" />
        <label>
          <input name="button" type="reset" class="Estilo16" id="button" value="Limpiar">
        </label>
      </div></td>
    </tr>
  </table>
  <p>&nbsp;  </p>
  <p>
    <input type="hidden" name="MM_insert" value="form1" />
    
    </p>
</form>
</body>
</html>

