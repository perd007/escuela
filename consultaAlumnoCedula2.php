<?php require_once('Connections/conexion.php'); ?>
<?php

$cedula=$_GET["cedula"];
mysql_select_db($database_conexion, $conexion);
$query_alumno = "SELECT * FROM alumno where cedula=$cedula";
$alumno = mysql_query($query_alumno, $conexion) or die(mysql_error());
$row_alumno = mysql_fetch_assoc($alumno);
$totalRows_alumno = mysql_num_rows($alumno);



if($totalRows_alumno<=0){
echo "<script type=\"text/javascript\">alert ('Este Alumno no esta Registrado'); location.href='principal.php?link=link1115' </script>";
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
.Estilo11 {font-size: 14px; font-weight: bold; }
.Estilo12 {font-size: 14px; }
.Estilo4 {font-size: 12px}
.Estilo66 {color: #FFFFFF; font-size: 14px; }
.Estilo16 {	font-size: 14px;
	text-align: right;
	font-weight: bold;
}
.Estilo17 {color: #FFFFFF;
	font-size: 14px;
	text-align: center;
	font-weight: bold;
}
.Estilo41 {	font-size: 12px;
	text-align: center;
}
.Estilo661 {color: #FFFFFF; font-size: 14px; text-align: center;}
.hhh {	text-align: left;
}
-->
</style>
</head>
<script language="javascript">
<!--

function validar(){

			var valor=confirm('¿Esta seguro de Eliminar este Alumno?');
			if(valor==false){
			return false;
			}
			else{
			return true;
			}
		
}
//-->
</script>
<body>
<table class="border" width="475" border="1" align="center" cellpadding="0" cellspacing="0">
  <tr valign="baseline">
    <td colspan="3" align="right"  bgcolor="#b50f0f" class="Estilo17"><div align="center">Datos de Estudiante </div></td>
  </tr>
  <tr valign="baseline">
    <td width="223" align="right" nowrap="nowrap"><div align="right"><span class="Estilo16">Cedula:</span></div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['cedula']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Nombre:</span></div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['nombre']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Apellido:</span></div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['apellido']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Sexo:</span></div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['sexo']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Edad:</span></div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['edad']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">Lugar de Nacimiento:</td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['lugarNac']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Fecha de Naciento:</span></div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['fecha_nac']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">Comunidad donde vive:</td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['direccion']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">&iquest; Posee alguna Enfermedad?:</span></div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['enfermedad']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">&iquest;Tiene Hermanos (as) en el Colegio?</td>
    <td width="63" class="Estilo12"><?php echo $row_alumno['hermanos']; ?></td>
    <td width="233" class="Estilo12"><?php echo $row_alumno['hermanosG']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">Escuela de Procedencia</td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['escuelaProc']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">Poblacion:</td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['poblacion']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">Alumno (a) Repitiente:</td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['repitiente']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">Materias:</td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['materias']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">N&ordm; Materias Penientes</td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['Nmaterias']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">Materias</td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['materias2']; ?></td>
  </tr>
  <tr valign="baseline">
    <td colspan="3" align="right" bgcolor="#b50f0f"><div align="center" class="Estilo17"><span class="Estilo13">Ingrese los Datos del Representante </span></div></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Cedula del Representante:</div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['cedulaR']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Nombre del Represenatnte:</div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['nombreR']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Sexo del Representante: </div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['sexoR']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Ocupacion del Represenatnte:</div></td>
    <td colspan="2" class="hhh"><?php echo $row_alumno['ocupacionR']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Fecha de Naciento:</span></div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['fechaR']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">&iquest;Vive con el Alumno?</td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['viveR']; ?></td>
  </tr>
  <tr valign="baseline">
    <td colspan="3" align="right" nowrap="nowrap" bgcolor="#b50f0f" class="Estilo16"><div align="center" class="Estilo17">Ingrese los Datos del Padre </div></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Cedula del Padre:</div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['cedulaP']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Nombre del Padre:</div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['nombreP']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Ocupacion del Represenatnte:</div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['ocupacionP']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Fecha de Naciento:</span></div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['fechaP']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">&iquest;Vive con el Alumno?</td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['viveP']; ?></td>
  </tr>
  <tr valign="baseline">
    <td colspan="3" align="right" nowrap="nowrap" bgcolor="#b50f0f" class="Estilo16"><div align="center" class="Estilo17">Ingrese los Datos de la Madre </div></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Cedula de la Madre:</div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['cedulaM']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Nombre de la Madre:</div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['nombreM']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16"><div align="right">Ocupacion del Represenatnte:</div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['ocupacionM']; ?></td>
  </tr>
  <tr valign="baseline">
    <td nowrap="nowrap" align="right"><div align="right"><span class="Estilo16">Fecha de Naciento:</span></div></td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['fechaM']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">&iquest;Vive con el Alumno?</td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['viveM']; ?></td>
  </tr>
  <tr valign="baseline">
    <td colspan="3" align="right" nowrap="nowrap" bgcolor="#b50f0f" class="Estilo16"><div align="center" class="Estilo17">Otros Datos </div></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">Observaciones:</td>
    <td colspan="2" class="Estilo12" ><?php echo $row_alumno['Observacion']; ?></td>
  </tr>
  <tr valign="baseline">
    <td align="right" nowrap="nowrap" class="Estilo16">Fecha de Inscripcion:</td>
    <td colspan="2" class="Estilo12"><?php echo $row_alumno['fechaI']; ?></td>
  </tr>
  <tr valign="baseline">
    <td colspan="3" nowrap="nowrap" bgcolor="#b50f0f" ><table width="129" height="23" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="17" height="21" scope="col"> <label> <? echo "<a href='principal.php?id=$row_alumno[id]&link=link113&link2=link1116'> <input type=submit name=Submit22  class='Estilo4' value=Modificar /></a>";?></label></th>
        <th width="94" scope="col"><form id="form1" name="form1" method="get" action="Principal.php">
          <label>
            <input name="Submit" type="submit" class="Estilo4" value="Regresar" />
            <input type="hidden" name="link" value="link1115" />
          </label>
        </form></th>
        <th width="18" scope="col"> <label> <? echo "<a onClick='return validar()' href='principal.php?id=$row_alumno[id]&cedula=$row_alumno[cedula]&link=link115&link2=link1116'><input type=submit name=Submit2 class='Estilo4' value=Elinimar /></a>"; ?></label></th>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
