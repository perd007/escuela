<?php require_once('Connections/conexion.php'); ?>

<?php

//verificar si el alumno esta inscrito
mysql_select_db($database_conexion, $conexion);
$query_alumnoNotas = "SELECT * FROM alumno where cedula='$_GET[Alumno]'";
$alumnoNotas = mysql_query($query_alumnoNotas, $conexion) or die(mysql_error());
$row_alumnoNotas = mysql_fetch_assoc($alumnoNotas);
$totalRows_alumnoNotas = mysql_num_rows($alumnoNotas);


if($row_alumnoNotas["cedula"]!=$_GET["Alumno"]){
 		echo "<script type=\"text/javascript\">alert ('Este alumno no esta registrado ');  </script>";
  		exit;
}


mysql_select_db($database_conexion, $conexion);
$query_historialNotas = "SELECT * FROM historial where id_alumno='$_GET[Alumno]'   order by grado desc ";
$historialNotas = mysql_query($query_historialNotas, $conexion) or die(mysql_error());
$row_historialNotas = mysql_fetch_assoc($historialNotas);
$totalRows_historialNotas = mysql_num_rows($historialNotas);
$cedu=$_GET["Alumno"];


if($row_historialNotas["grado"]>=4 and $row_historialNotas["mencion"]=="Administracion de Servicios en Salud"){
echo "<script language='javascript'> window.location.href='NotasCertificadasASS.php?cedula=$cedu'; </script>";

}



if($row_historialNotas["grado"]>=4 and $row_historialNotas["mencion"]=="Auxiliar Docente"){
echo "<script language='javascript'> window.location.href='NotasCertificadasAE.php?cedula=$cedu'; </script>";
}

if($row_historialNotas["grado"]>=4 and $row_historialNotas["mencion"]=="Ciencia"){
echo "<script language='javascript'> window.location.href='NotasCertificadasC.php?cedula=$cedu'; </script>";
}


if($row_historialNotas["grado"]<=3 ){
echo "<script language='javascript'> window.location.href='NotasCertificadasEMG.php?cedula=$cedu'; </script>";
}


?>
