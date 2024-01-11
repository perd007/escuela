<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Estilo2 {
	font-size: 14px;
	color: #FFFFFF;
}
.Estilo3 {font-size: 12px}
-->
</style>
</head>
<script language="javascript">
<!--

function cambiar(){

   	     
			if(document.form1.grado.value==3){
		   document.form1.mencion.disabled=true;
		   document.form1.mencion.value="-";
		   return true;
		   }
		   
		   	if(document.form1.grado.value==2){
		  document.form1.mencion.disabled=true;
		   document.form1.mencion.value="-";
		   return true;
		   }
		   	     
			if(document.form1.grado.value==1){
		  document.form1.mencion.disabled=true;
			 document.form1.mencion.value="-";
		   return true;
		   }
		   
		   
           if(document.form1.grado.value==6){
		   document.form1.mencion.disabled=false;
		    
		   return true;
		   }
		    if(document.form1.grado.value==5){
		   document.form1.mencion.disabled=false;
		  
		   return true;
		   }
		   	     
			if(document.form1.grado.value==4){
		   document.form1.mencion.disabled=false;
		    
		   return true;
		   }
		
		   	     
		   	     
		      
   }
   
   
function validar(){

				
				if(document.form1.lapso.value=="-"){
						alert("Debe seleccionar un lapso");
						return false;
				}
				if(document.form1.seccion.value=="-"){
						alert("Debe seleccionar una seccion");
						return false;
				}
					if(document.form1.grado.value=="-"){
						alert("Debe seleccionar un año escolar");
						return false;
				}
					
		}

</script>
<body>
<p>&nbsp;</p>
<form id="form1" name="form1" method="get" onsubmit="return validar()" action="principal.php">
  <table class="border" width="449" border="0" align="center" cellspacing="5">
    <tr>
      <th colspan="2" align="center" bgcolor="#b50f0f" scope="row"><span class="Estilo2">Consulta de Asistencias</span> </th>
    </tr>
    <tr>
      <th colspan="2" align="center" scope="row"><span class="Estilo3">Seleccione los Datos del Grupo </span></th>
    </tr>
    <tr>
      <th width="166" scope="row"><div align="right" class="Estilo3">Periodo Academico:</div></th>
      <td width="264"><span class="Estilo3">
        <select name="periodo" class="Estilo3" id="periodo">
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
    <tr>
      <th scope="row"><div align="right" class="Estilo3">Grado o A&ntilde;o Escolar:</div></th>
      <td><span class="Estilo3">
        <select name="grado" class="Estilo3" id="grado" onchange="cambiar()">
          <option value="-">Seleccione un A&ntilde;o</option>
          <option value="1">1er A&ntilde;o</option>
          <option value="2">2do A&ntilde;o</option>
          <option value="3">3er A&ntilde;o</option>
          <option value="4">4to A&ntilde;o</option>
          <option value="5">5to A&ntilde;o</option>
          <option value="6">6to A&ntilde;o</option>
        </select>
      </span></td>
    </tr>
    <tr>
      <th scope="row"><div align="right" class="Estilo3">Seccion:</div></th>
      <td><span class="Estilo3">
        <select name="seccion" class="Estilo3" id="seccion">
          <option value="-">Seleccione una Seccion</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="E">E</option>
        </select>
      </span></td>
    </tr>
    <tr>
      <th scope="row"><div align="right" class="Estilo3">Mes:</div></th>
      <td><span class="Estilo3">
        <select name="mes" class="Estilo3" id="mes">
          <option value="1" selected="selected">Enero</option>
          <option value="2">Febrero</option>
          <option value="3">Marzo</option>
          <option value="4">Abril</option>
          <option value="5">Mayo</option>
          <option value="6">Junio</option>
          <option value="7">Julio</option>
          <option value="8">Agosto</option>
          <option value="9">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
        </select>
      </span></td>
    </tr>
    <tr>
      <th scope="row"><div align="right" class="Estilo3">Lapso:</div></th>
      <td><span class="Estilo3">
        <select name="lapso" class="Estilo3" id="lapso" onchange="cambiar()">
          <option value="-">Seleccione un Lapso</option>
          <option value="1">1ro</option>
          <option value="2">2do</option>
          <option value="3">3ro</option>
        </select>
      </span></td>
    </tr>
    <tr>
      <th scope="row"><div align="right" class="Estilo3">Mencion:</div></th>
      <td><span class="Estilo3">
        <select name="mencion" disabled="disabled" class="Estilo3" id="mencion">
          <option value="-">Seleccione una Mencion</option>
          <option value="Auxiliar Docente">Auxiliar Docente</option>
          <option value="Administracion de Servicios en Salud">Administracion de Servicios en Salud</option>
        </select>
      </span></td>
    </tr>
    <tr>
      <th colspan="2" bgcolor="#b50f0f" align="center" scope="row"><label>
        <input name="Submit" type="submit" class="Estilo3" value="siguiente" />
		<input type="hidden" name="link" value="link94" />
      </label></th>
    </tr>
  </table>
</form>
</body>
</html>
