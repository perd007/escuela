<?php require_once('Connections/conexion.php'); ?>
<?php
if($validacion==true){
	if($eli==0){
	echo "<script type=\"text/javascript\">alert ('Usted no posee permisos para realizar Eliminaciones'); location.href='principal.php' </script>";
 exit;
	}
}
else{
echo "<script type=\"text/javascript\">alert ('Error usuario invalido'); location.href='principal.php' </script>";
 exit;
 }
?>
<?php



//recibimos la cedula
$id=$_GET["id"];


mysql_select_db($database_conexion, $conexion);
$query_notas = "SELECT * FROM notas_materias where id_materia='$id'";
$notas = mysql_query($query_notas, $conexion) or die(mysql_error());
$row_notas = mysql_fetch_assoc($notas);
$totalRows_notas = mysql_num_rows($notas);


//verificar si el representante tiene representados
if($totalRows_notas>0){
echo"<script type=\"text/javascript\">alert ('Esta Materia no puede ser borrada ya que existen notas registradas'); location.href='principal.php?link=link32' </script>";
exit();
}
else{

$sql="delete from materia where id_materia='$id'";
$verificar=mysql_query($sql,$conexion) or die(mysql_error());

if($verificar){
	echo"<script type=\"text/javascript\">alert ('Materia Eliminada'); location.href='principal.php?link=link32' </script>";
}
else
	echo"<script type=\"text/javascript\">alert ('Error'); location.href='principal.php?link=link32' </script>";
	
}//fin de l primer else


?>