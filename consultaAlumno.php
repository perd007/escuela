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
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_alum = 10;
$pageNum_alum = 0;
if (isset($_GET['pageNum_alum'])) {
  $pageNum_alum = $_GET['pageNum_alum'];
}
$startRow_alum = $pageNum_alum * $maxRows_alum;

mysql_select_db($database_conexion, $conexion);
$query_alum = "SELECT * FROM alumno order by cedula asc";
$query_limit_alum = sprintf("%s LIMIT %d, %d", $query_alum, $startRow_alum, $maxRows_alum);
$alum = mysql_query($query_limit_alum, $conexion) or die(mysql_error());
$row_alum = mysql_fetch_assoc($alum);

if (isset($_GET['totalRows_alum'])) {
  $totalRows_alum = $_GET['totalRows_alum'];
} else {
  $all_alum = mysql_query($query_alum);
  $totalRows_alum = mysql_num_rows($all_alum);
}
$totalPages_alum = ceil($totalRows_alum/$maxRows_alum)-1;

$queryString_alum = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_alum") == false && 
        stristr($param, "totalRows_alum") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_alum = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_alum = sprintf("&totalRows_alum=%d%s", $totalRows_alum, $queryString_alum);

if($totalRows_alum<=0){
 		echo "<script type=\"text/javascript\">alert ('No hay Alumnos Registrado'); location.href='Principal.php?link=link1' </script>";
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
.Estilo4 {font-size: 12px; color: #FFFFFF; }
.Estilo5 {font-size: 12px;  }
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
<table class="border"  width="479" border="0" align="left" cellpadding="2" cellspacing="0">
  <tr>
    <th width="96" bgcolor="#b50f0f" scope="col"><div align="left" class="Estilo4">Cedula</div></th>
    <th width="104" bgcolor="#b50f0f" scope="col"><div align="left" class="Estilo4">Nombre</div></th>
    <th width="114" bgcolor="#b50f0f" scope="col"><div align="left" class="Estilo4" >Apellido</div></th>
    <th width="48" bgcolor="#b50f0f" scope="col"><div align="left" class="Estilo4">Opcion</div></th>
    <th width="49" bgcolor="#b50f0f" scope="col"><div align="left" class="Estilo4">Opcion</div></th>
    <th width="56" bgcolor="#b50f0f" scope="col"><div align="left" class="Estilo4">Opcion</div></th>
  </tr>
  <?php   do{
			$modulo=$cont%2;
			if($modulo!=0){
			$color="#DC9AA0";
			
			}else{
			$color="#FFFFFF";
			$color2="";
			} 
			?>
  <tr bgcolor="<?php echo $color; ?>" >
      <td class="Estilo5"><div align="left" class="Estilo5" <?php echo $color2;?> ><?php echo $row_alum['cedula']; ?></div></td>
      <td class="Estilo5"><div align="left" class="Estilo5"  <?php echo $color2;?> ><?php echo $row_alum['nombre']; ?></div></td>
      <td class="Estilo5"><div align="left" class="Estilo5"  <?php echo $color2;?> ><?php echo $row_alum['apellido']; ?></div></td>
      <td class="Estilo5"><div align="center" class="Estilo5" <?php echo $color2; ?>><span class="Estilo1"><?php echo "<a href='principal.php?id=$row_alum[id]&link=link114'>Detalle</a>"; ?></span></div></td>
      <td class="Estilo5"><div align="center" class="Estilo5" <?php echo $color2; ?>><span class="Estilo1"><? echo "<a href='principal.php?id= $row_alum[id]&link=link113'>Modificar</a>";?></span></div></td>
      <td class="Estilo5"><div align="center" class="Estilo5" <?php echo $color2; ?>><span class="Estilo1"><? echo "<a onClick='return validar()' href='principal.php?id=$row_alum[id]&cedula=$row_alum[cedula]&link=link115'>Eliminar</a>"; ?></span></div></td>
  </tr>
   <?php $cont++;} while ($row_alum = mysql_fetch_assoc($alum)); ?>
</table>
<table border="0" width="50%" align="center">
      <tr>
        <td width="23%" align="center"><?php if ($pageNum_alum > 0) { // Show if not first page ?>
              <a  href="<?php printf("%s?pageNum_alum=%d%s", $currentPage, 0, $queryString_alum); ?>">Primero</a>
              <?php } // Show if not first page ?>
        </td>
        <td width="31%" align="center"><?php if ($pageNum_alum > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_alum=%d%s", $currentPage, max(0, $pageNum_alum - 1), $queryString_alum); ?>">Anterior</a>
              <?php } // Show if not first page ?>
        </td>
        <td width="23%" align="center"><?php if ($pageNum_alum < $totalPages_alum) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_alum=%d%s", $currentPage, min($totalPages_alum, $pageNum_alum + 1), $queryString_alum); ?>">Siguiente</a>
              <?php } // Show if not last page ?>
        </td>
        <td width="23%" align="center"><?php if ($pageNum_alum < $totalPages_alum) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_alum=%d%s", $currentPage, $totalPages_alum, $queryString_alum); ?>">&Uacute;ltimo</a>
              <?php } // Show if not last page ?>
        </td>
      </tr>
</table>
</body>
</html>
<?php
mysql_free_result($alum);
?>
