<?php require_once('Connections/conexion.php'); ?>
<?php 
//validar usuario

if($validacion==true){
	if($cons==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Consultas'); location.href='principal.php' </script>";
    exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido');  location.href='principal.php'  </script>";
 exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<style type="text/css">
<!--
.Estilo1 {
color: #FFFFFF;
font-size: 12px;
}
.Estilo2 {
	font-size: 14px;
	color: #FFFFFF;
}
.Estilo3 {font-size: 12px}
-->
</style>
<?php
if (($_POST["MM_insert"] != "form1") and $_GET["validar"]!=1) {
echo "
<script language=javascript>
<!--


function validar(){

		if(document.form1.cedula.value!=''){
			 var filtro = /^(\d)+$/i;
		      if (!filtro.test(document.getElementById('cedula').value)){
				alert('Solo puede ingresar numeros en la cedula de alumno!!!');
				return false;
		   		}
				}
		
				
				if(document.form1.cedula.value==''){
						alert('Debe Ingresar la Cedula de alumno');
						return false;
				}
				
				
			
				
		}

</script>

"; ?>
<body>
<?php


echo "
<br>
<form method=post name=form1 onsubmit='return validar()' action=".$editFormAction.">
  <table width=300 border=1 align=center>
  <tr bgcolor='#b50f0f' >
      <td colspan='2' >
	  <div class='Estilo2' align='center'>Consulta de Notas</div>
	  </td>
      
    </tr>
    <tr>
	 <td width=80><div class='Estilo3' align='right'>
        Cedula:
      </div></td>
      <td width=220><label>
        <input name='cedula' type=text id='cedula' class='Estilo3' size=9 maxlength=9 />
      </label></td>
	  <tr bgcolor='#b50f0f'>
      <td  colspan='2'>
	  <div align='center'>
        <input type=submit class='Estilo3' name=Submit value=buscar />
      </div>
	  </td>
	  </tr>
    </tr>
  </table>
  <input type=hidden name=MM_insert value=form1>
</form>
";


}// fin del primer if
 ?>

<p>&nbsp;</p>
<?php

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1") or $_GET["validar"]==1) {


//verificar si el alumno esta inscrito
mysql_select_db($database_conexion, $conexion);
$query_alumno = "SELECT * FROM alumno where cedula='$_POST[cedula]'";
$alumno = mysql_query($query_alumno, $conexion) or die(mysql_error());
$row_alumno = mysql_fetch_assoc($alumno);
$totalRows_alumno = mysql_num_rows($alumno);

if($row_alumno["cedula"]!=$_POST["cedula"]){
 		echo "<script type=\"text/javascript\">alert ('Este alumno no esta registrado '); location.href='Principal.php?link=link52' </script>";
  		exit;
}


//capturar cedula por post o get
if($_POST["cedula"]!=""){
$cedula=$_POST["cedula"];
}else{
$cedula=$_GET["cedula"];
}

$currentPage = $_SERVER["PHP_SELF"];
$maxRows_hist = 10;
$pageNum_hist = 0;
if (isset($_GET['pageNum_hist'])) {
  $pageNum_hist = $_GET['pageNum_hist'];
}
$startRow_hist = $pageNum_hist * $maxRows_hist;

mysql_select_db($database_conexion, $conexion);
$query_hist = "SELECT * FROM historial where id_alumno=$cedula";
$query_limit_hist = sprintf("%s LIMIT %d, %d", $query_hist, $startRow_hist, $maxRows_hist);
$hist = mysql_query($query_limit_hist, $conexion) or die(mysql_error());
$row_hist = mysql_fetch_assoc($hist);



if (isset($_GET['totalRows_hist'])) {
  $totalRows_hist = $_GET['totalRows_hist'];
} else {
  $all_hist = mysql_query($query_hist);
  $totalRows_hist = mysql_num_rows($all_hist);
}
$totalPages_hist = ceil($totalRows_hist/$maxRows_hist)-1;


$queryString_hist = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_hist") == false && 
        stristr($param, "totalRows_hist") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_hist = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_hist = sprintf("&totalRows_hist=%d%s", $totalRows_hist, $queryString_hist);

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

//validar si posee historial
if($totalRows_hist<=0){
 		echo "<script type=\"text/javascript\">alert ('Este alumno no posee historial'); location.href='Principal.php?link=link52' </script>";
  		exit;
}



mysql_select_db($database_conexion, $conexion);
$query_alumnos = "SELECT * FROM alumno where cedula=$cedula";
$alumnos = mysql_query($query_alumnos, $conexion) or die(mysql_error());
$row_alumnos = mysql_fetch_assoc($alumnos);
$totalRows_alumnos = mysql_num_rows($alumnos);


echo "
<script language=javascript>
<!--


function validar(){

		var valor=confirm('¿Esta seguro de Eliminar este Historial? Se perderan las todas notas');
			if(valor==false){
			return false;
			}
			else{
			return true;
			}

				
		}

</script>

";


echo "
<table width=500 border=0 align='center' cellspacing='0' cellpadding='4'>
<tr bgcolor=#b50f0f>
    <th colspan=5 class='Estilo1' >Consulta de Notas</th>
  </tr>
  <tr>
    <th colspan=5 class='Estilo3' scope=col>".$row_alumnos['cedula']." ".$row_alumnos['nombre']." ".$row_alumnos['apellido']."</th>
  </tr>
  <tr>
    <td width=75 bgcolor=#b50f0f><div align=center class=Estilo1><strong>Año</strong></div></td>
    <td width=75 bgcolor=#b50f0f><div align=center class=Estilo1><strong>Grado</strong></div></td>
    <td width=75 bgcolor=#b50f0f><div align=center class=Estilo1><strong>Seccion</strong></div></td>
	<td width=95 bgcolor=#b50f0f><div align=center class=Estilo1><strong>Opcion</strong></div></td>
    <td width=85 bgcolor=#b50f0f><div align=center class=Estilo1><strong>Opcion</strong></div></td>
  </tr>

   "; do { 
   //verificar el grado

 switch ($row_hist['grado']){
 
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
			
		
		}
   
   
   
   
   echo "<tr>";
			$modulo=$cont%2;
			if($modulo!=0){
			$color="#DC9AA0";
			
			}else{
			$color="#FFFFFF";
			$color2="";
			} 
		echo "
      <td bgcolor=".$color."><div align=center>".$row_hist['ano_escolar']."</div></td>
      <td bgcolor=".$color."><div align=center>".$termino."</div></td>
      <td bgcolor=".$color."><div align=center>".$row_hist['seccion']."</div></td>
	   <td bgcolor=".$color."><div align=center><span class=Estilo1><a href='principal.php?link=link6&cedula=$cedula&hist=$row_hist[cod_hist]&val=2&val2=1'>Cargar Notas</a></span></div></td>
	   <td bgcolor=".$color."><div align=center><span class=Estilo1><a href='principal.php?link=link60&cedula=$cedula&hist=$row_hist[cod_hist]&val=2&val2=1'>Cambiar Notas</a></span></div></td>"; 
	  
	  $cont++;} while ($row_hist = mysql_fetch_assoc($hist)); 
	  
	  echo "
  <tr><td><br></td></tr>
  <tr>
  <td colspan=5  bgcolor=#b50f0f><div align=center>
	  <a href='Principal.php?link=link10'>
        <input type=button  class='Estilo3' name=Submit value=Regresar />
        </a>
		</div></td>
		</tr>
</table>
<table border=0 width=50% align=center>
        <tr>
          <td width=23% align=center>"; if ($pageNum_hist > 0) { // Show if not first page 
               echo " <a href='"; printf("%s?pageNum_hist=%d%s", $currentPage, 0, $queryString_hist); echo "'>Primero</a>
                 ";} // Show if not first page 
          echo "</td>
          <td width=31% align=center>"; if ($pageNum_hist > 0) { // Show if not first page 
                echo "<a href='"; printf("%s?pageNum_hist=%d%s", $currentPage, max(0, $pageNum_hist - 1), $queryString_hist);  echo "'>Anterior</a>
                "; } // Show if not first page 
           echo "</td>
          <td width=23% align=center>"; if ($pageNum_hist < $totalPages_hist) { // Show if not last page 
               echo " <a href='";  printf("%s?pageNum_hist=%d%s", $currentPage, min($totalPages_hist, $pageNum_hist + 1), $queryString_hist);  echo "'>Siguiente</a>
                "; } // Show if not last page 
            echo "</td>
          <td width=23% align=center>"; if ($pageNum_hist < $totalPages_hist) { // Show if not last page 
               echo "<a href='"; printf("%s?pageNum_hist=%d%s", $currentPage, $totalPages_hist, $queryString_hist);  echo "'>&Uacute;ltimo</a>
               ";} // Show if not last page 
         echo " </td>
        </tr>
      </table>
	  
";


}// fin del segundo if

 ?>

<p>&nbsp;</p>
</body>
</html>
