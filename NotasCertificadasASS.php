<?php require_once('Connections/conexion.php'); ?>
<?php


//recibimos datos 
$cedula=$_GET["cedula"];


mysql_select_db($database_conexion, $conexion);
$query_estudiante = "SELECT * FROM alumno where cedula=$cedula";
$estudiante = mysql_query($query_estudiante, $conexion) or die(mysql_error());
$row_estudiante = mysql_fetch_assoc($estudiante);
$totalRows_estudiante = mysql_num_rows($estudiante);


/* CONSULTA DE LAS NOTAS DE PRIMER AÑOI DEL ALUMNO */
$query_historial = "SELECT * FROM historial where id_alumno='$cedula' and grado=1";
$historial = mysql_query($query_historial, $conexion) or die(mysql_error());
$row_historial = mysql_fetch_assoc($historial);


mysql_select_db($database_conexion, $conexion);
$query_notas = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]'";
$notas = mysql_query($query_notas, $conexion) or die(mysql_error());
$row_notas = mysql_fetch_assoc($notas);
$totalRows_notas = mysql_num_rows($notas);

if($totalRows_notas<=0){
 		echo "<script type=\"text/javascript\">alert ('Este Alumno no tiene notas en el primer año'); </script>";
  		exit;
}


//llenar año
$ano1=substr($row_historial["ano_escolar"], -4);


//nombre y nota de la materia de castellano
$query_materias11 = "SELECT * FROM materia where nombre like 'castellano y literatura' and grado=1";
$materias11 = mysql_query($query_materias11, $conexion) or die(mysql_error());
$row_materias11 = mysql_fetch_assoc($materias11);

$query_nota11 = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]' and id_materia='$row_materias11[id_materia]'";
$nota11 = mysql_query($query_nota11, $conexion) or die(mysql_error());
$row_nota11 = mysql_fetch_assoc($nota11);

$nota11=$row_nota11["definitiva"];

//fin de la primera materia

//nombre y nota de la materia de ingles
$query_materias12 = "SELECT * FROM materia where nombre like 'ingles' and grado=1";
$materias12 = mysql_query($query_materias12, $conexion) or die(mysql_error());
$row_materias12 = mysql_fetch_assoc($materias12);

$query_nota12 = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]' and id_materia='$row_materias12[id_materia]'";
$nota12 = mysql_query($query_nota12, $conexion) or die(mysql_error());
$row_nota12 = mysql_fetch_assoc($nota12);

$nota12=$row_nota12["definitiva"];

//fin de la segunda materia


//nombre y nota de la materia de matematica
$query_materias13 = "SELECT * FROM materia where nombre like 'matematica' and grado=1";
$materias13 = mysql_query($query_materias13, $conexion) or die(mysql_error());
$row_materias13 = mysql_fetch_assoc($materias13);

$query_nota13 = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]' and id_materia='$row_materias13[id_materia]'";
$nota13 = mysql_query($query_nota13, $conexion) or die(mysql_error());
$row_nota13 = mysql_fetch_assoc($nota13);

$nota13=$row_nota13["definitiva"];

//fin de la tercera materia materia


//nombre y nota de la materia de est. de la naturaleza
$query_materias14 = "SELECT * FROM materia where nombre like 'EST. DE LA NATURALEZA'
 and grado=1";
$materias14 = mysql_query($query_materias14, $conexion) or die(mysql_error());
$row_materias14 = mysql_fetch_assoc($materias14);

$query_nota14 = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]' and id_materia='$row_materias14[id_materia]'";
$nota14 = mysql_query($query_nota14, $conexion) or die(mysql_error());
$row_nota14 = mysql_fetch_assoc($nota14);

$nota14=$row_nota14["definitiva"];

//fin de la 4 materia


//nombre y nota de la materia de historia de venezuela
$query_materias15 = "SELECT * FROM materia where nombre like 'historia de venezuela' and grado=1";
$materias15 = mysql_query($query_materias15, $conexion) or die(mysql_error());
$row_materias15 = mysql_fetch_assoc($materias15);

$query_nota15 = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]' and id_materia='$row_materias15[id_materia]'";
$nota15 = mysql_query($query_nota15, $conexion) or die(mysql_error());
$row_nota15 = mysql_fetch_assoc($nota15);

$nota15=$row_nota15["definitiva"];

//fin de la 5 materia


//nombre y nota de la materia de educacion familiar y ciudadana
$query_materia16 = "SELECT * FROM materia where nombre like 'EDUC. FAM. Y CIUDADANA' and grado=1";
$materias16 = mysql_query($query_materia16, $conexion) or die(mysql_error());
$row_materias16 = mysql_fetch_assoc($materias16);

$query_nota16 = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]' and id_materia='$row_materias16[id_materia]'";
$nota16 = mysql_query($query_nota16, $conexion) or die(mysql_error());
$row_nota16 = mysql_fetch_assoc($nota16);

$nota16=$row_nota16["definitiva"];

//fin de la 6 materia



//nombre y nota de la materia de geografia general
$query_materias17 = "SELECT * FROM materia where nombre like 'geografia general' and grado=1";
$materias17 = mysql_query($query_materias17, $conexion) or die(mysql_error());
$row_materias17 = mysql_fetch_assoc($materias17);

$query_nota17 = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]' and id_materia='$row_materias17[id_materia]'";
$nota17 = mysql_query($query_nota17, $conexion) or die(mysql_error());
$row_nota17 = mysql_fetch_assoc($nota17);

$nota17=$row_nota17["definitiva"];

//fin de la 7 materia



//nombre y nota de la materia de educacion artistica
$query_materias18 = "SELECT * FROM materia where nombre like 'educacion artistica' and grado=1";
$materias18 = mysql_query($query_materias18, $conexion) or die(mysql_error());
$row_materias18 = mysql_fetch_assoc($materias18);

$query_nota18 = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]' and id_materia='$row_materias18[id_materia]'";
$nota18 = mysql_query($query_nota18, $conexion) or die(mysql_error());
$row_nota18 = mysql_fetch_assoc($nota18);

$nota18=$row_nota18["definitiva"];

//fin de la 8 materia



//nombre y nota de la materia de EDUC. FISICA Y DEPORTEs
$query_materias19 = "SELECT * FROM materia where nombre like 'EDUC. FISICA Y DEPORTE' and grado=1";
$materias19 = mysql_query($query_materias19, $conexion);
$row_materias19 = mysql_fetch_assoc($materias19);

$query_nota19 = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]' and id_materia='$row_materias19[id_materia]'";
$nota19 = mysql_query($query_nota19, $conexion);
$row_nota19 = mysql_fetch_assoc($nota19);

$nota19=$row_nota19["definitiva"];

//fin de la 9 materia



//nombre y nota de la materia de lengua autoctona
$query_materias110 = "SELECT * FROM materia where nombre like 'lengua  autoctona' and grado=1";
$materias110 = mysql_query($query_materias110, $conexion) or die(mysql_error());
$row_materias110 = mysql_fetch_assoc($materias110);

$query_nota110 = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]' and id_materia='$row_materias110[id_materia]'";
$nota110 = mysql_query($query_nota110, $conexion) or die(mysql_error());
$row_nota110 = mysql_fetch_assoc($nota110);

$nota110=$row_nota110["definitiva"];

//fin de la 10 materia


/* FIN DE LAS ATERIAS DE PRIMER AÑO*/


/*****************************************************************************************/

/* CONSULTA DE LAS NOTAS DEL SEGUNDO AÑO DEL ALUMNO */
$query_historial2 = "SELECT * FROM historial  where id_alumno=$cedula and grado=2";
$historial2 = mysql_query($query_historial2, $conexion) or die(mysql_error());
$row_historial2= mysql_fetch_assoc($historial2);
//llenar año
$ano2=substr($row_historial2["ano_escolar"], -4);


//nombre y nota de la materia de castellano
$query_materias21 = "SELECT * FROM materia where nombre like 'castellano y literatura' and grado=2";
$materias21 = mysql_query($query_materias21, $conexion) or die(mysql_error());
$row_materias21 = mysql_fetch_assoc($materias21);

$query_nota21 = "SELECT * FROM notas_materias where cod_hist='$row_historial2[cod_hist]' and id_materia='$row_materias21[id_materia]'";
$nota21 = mysql_query($query_nota21, $conexion) or die(mysql_error());
$row_nota21 = mysql_fetch_assoc($nota21);

$nota21=$row_nota21["definitiva"];

//fin de la primera materia



//nombre y nota de la materia de ingles
$query_materias22 = "SELECT * FROM materia where nombre like 'ingles' and grado=2";
$materias22 = mysql_query($query_materias22, $conexion) or die(mysql_error());
$row_materias22 = mysql_fetch_assoc($materias22);

$query_nota22 = "SELECT * FROM notas_materias where cod_hist='$row_historial2[cod_hist]' and id_materia='$row_materias22[id_materia]'";
$nota22 = mysql_query($query_nota22, $conexion) or die(mysql_error());
$row_nota22 = mysql_fetch_assoc($nota22);

$nota22=$row_nota22["definitiva"];

//fin de la segunda materia


//nombre y nota de la materia de matematica
$query_materias23 = "SELECT * FROM materia where nombre like 'matematica' and grado=2";
$materias23 = mysql_query($query_materias23, $conexion) or die(mysql_error());
$row_materias23 = mysql_fetch_assoc($materias23);

$query_nota23 = "SELECT * FROM notas_materias where cod_hist='$row_historial2[cod_hist]' and id_materia='$row_materias23[id_materia]'";
$nota23 = mysql_query($query_nota23, $conexion) or die(mysql_error());
$row_nota23 = mysql_fetch_assoc($nota23);

$nota23=$row_nota23["definitiva"];

//fin de la tercera  materia


//nombre y nota de la materia de educacion para la salud
$query_materias24 = "SELECT * FROM materia where nombre like 'EDUCACION PARA LA  SALUD' and grado=2";
$materias24 = mysql_query($query_materias24, $conexion) or die(mysql_error());
$row_materias24 = mysql_fetch_assoc($materias24);

$query_nota24 = "SELECT * FROM notas_materias where cod_hist='$row_historial2[cod_hist]' and id_materia='$row_materias24[id_materia]'";
$nota24 = mysql_query($query_nota24, $conexion) or die(mysql_error());
$row_nota24 = mysql_fetch_assoc($nota24);

$nota24=$row_nota24["definitiva"];

//fin de la 4  materia


//nombre y nota de la materia de cienciaa biologicas
$query_materias25 = "SELECT * FROM materia where nombre like 'CIENCIAS BIOLOGICAS' and grado=2";
$materias25 = mysql_query($query_materias25, $conexion) or die(mysql_error());
$row_materias25 = mysql_fetch_assoc($materias25);

$query_nota25 = "SELECT * FROM notas_materias where cod_hist='$row_historial2[cod_hist]' and id_materia='$row_materias25[id_materia]'";
$nota25 = mysql_query($query_nota25, $conexion) or die(mysql_error());
$row_nota25 = mysql_fetch_assoc($nota25);

$nota25=$row_nota25["definitiva"];

//fin de la 5 materia





//nombre y nota de la materia de historia de venezuela
$query_materias26 = "SELECT * FROM materia where nombre like 'historia de venezuela' and grado=2";
$materias26 = mysql_query($query_materias26, $conexion) or die(mysql_error());
$row_materias26 = mysql_fetch_assoc($materias26);

$query_nota26 = "SELECT * FROM notas_materias where cod_hist='$row_historial2[cod_hist]' and id_materia='$row_materias26[id_materia]'";
$nota26 = mysql_query($query_nota26, $conexion) or die(mysql_error());
$row_nota26 = mysql_fetch_assoc($nota26);

$nota26=$row_nota26["definitiva"];

//fin de la 6 materia


//nombre y nota de la materia de historia universal
$query_materias27 = "SELECT * FROM materia where nombre like 'historia universal' and grado=2";
$materias27 = mysql_query($query_materias27, $conexion) or die(mysql_error());
$row_materias27 = mysql_fetch_assoc($materias27);

$query_nota27 = "SELECT * FROM notas_materias where cod_hist='$row_historial2[cod_hist]' and id_materia='$row_materias27[id_materia]'";
$nota27 = mysql_query($query_nota27, $conexion) or die(mysql_error());
$row_nota27 = mysql_fetch_assoc($nota27);

$nota27=$row_nota27["definitiva"];

//fin de la 7  materia

//nombre y nota de la materia de educacion artistica
$query_materias28 = "SELECT * FROM materia where nombre like 'educacion artistica' and grado=2";
$materias28 = mysql_query($query_materias28, $conexion) or die(mysql_error());
$row_materias28 = mysql_fetch_assoc($materias28);

$query_nota28 = "SELECT * FROM notas_materias where cod_hist='$row_historial2[cod_hist]' and id_materia='$row_materias28[id_materia]'";
$nota28 = mysql_query($query_nota28, $conexion) or die(mysql_error());
$row_nota28 = mysql_fetch_assoc($nota28);

$nota28=$row_nota28["definitiva"];

//fin de la 8  materia


//nombre y nota de la materia de EDUC. FISICA Y DEPORTE
$query_materias29 = "SELECT * FROM materia where nombre like 'EDUC. FISICA Y DEPORTE' and grado=2";
$materias29 = mysql_query($query_materias29, $conexion) or die(mysql_error());
$row_materias29 = mysql_fetch_assoc($materias29);

$query_nota29 = "SELECT * FROM notas_materias where cod_hist='$row_historial2[cod_hist]' and id_materia='$row_materias29[id_materia]'";
$nota29 = mysql_query($query_nota29, $conexion) or die(mysql_error());
$row_nota29 = mysql_fetch_assoc($nota29);

$nota29=$row_nota29["definitiva"];

//fin de la 9  materia


//nombre y nota de la materia de lengua autoctona
$query_materias210 = "SELECT * FROM materia where nombre like 'lengua autoctona' and grado=2";
$materias210 = mysql_query($query_materias210, $conexion);
$row_materias210 = mysql_fetch_assoc($materias210);

$query_nota210 = "SELECT * FROM notas_materias where cod_hist='$row_historial2[cod_hist]' and id_materia='$row_materias210[id_materia]'";
$nota210 = mysql_query($query_nota210, $conexion) or die(mysql_error());
$row_nota210 = mysql_fetch_assoc($nota210);

$nota210=$row_nota210["definitiva"];

//fin de la 10  materia

/* FIN DE LAS ATERIAS DE SEGUNDO AÑO*/



/*****************************************************************************************/

/* CONSULTA DE LAS NOTAS DEL TERCER AÑO DEL ALUMNO */
$query_historial3 = "SELECT * FROM historial  where id_alumno=$cedula and grado=3";
$historial3 = mysql_query($query_historial3, $conexion) or die(mysql_error());
$row_historial3= mysql_fetch_assoc($historial3);
//llenar año
$ano3=substr($row_historial3["ano_escolar"], -4);

//nombre y nota de la materia de castellano
$query_materias31 = "SELECT * FROM materia where nombre like 'castellano y literatura' and grado=3";
$materias31 = mysql_query($query_materias31, $conexion) or die(mysql_error());
$row_materias31 = mysql_fetch_assoc($materias31);

$query_nota31 = "SELECT * FROM notas_materias where cod_hist='$row_historial3[cod_hist]' and id_materia='$row_materias31[id_materia]'";
$nota31 = mysql_query($query_nota31, $conexion) or die(mysql_error());
$row_nota31 = mysql_fetch_assoc($nota31);

$nota31=$row_nota31["definitiva"];

//fin de la primera materia


//nombre y nota de la materia de ingles
$query_materias32 = "SELECT * FROM materia where nombre like 'ingles' and grado=3";
$materias32 = mysql_query($query_materias32, $conexion) or die(mysql_error());
$row_materias32 = mysql_fetch_assoc($materias32);

$query_nota32 = "SELECT * FROM notas_materias where cod_hist='$row_historial3[cod_hist]' and id_materia='$row_materias32[id_materia]'";
$nota32 = mysql_query($query_nota32, $conexion) or die(mysql_error());
$row_nota32 = mysql_fetch_assoc($nota32);

$nota32=$row_nota32["definitiva"];

//fin de la segunda materia


//nombre y nota de la materia de matematica
$query_materias33 = "SELECT * FROM materia where nombre like 'matematica' and grado=3";
$materias33 = mysql_query($query_materias33, $conexion) or die(mysql_error());
$row_materias33 = mysql_fetch_assoc($materias33);

$query_nota33 = "SELECT * FROM notas_materias where cod_hist='$row_historial3[cod_hist]' and id_materia='$row_materias33[id_materia]'";
$nota33 = mysql_query($query_nota33, $conexion) or die(mysql_error());
$row_nota33 = mysql_fetch_assoc($nota33);

$nota33=$row_nota23["definitiva"];

//fin de la tercera  materia


//nombre y nota de la materia de cienciaa biologicas
$query_materias34 = "SELECT * FROM materia where nombre like 'CIENCIAS BIOLOGICAS' and grado=3";
$materias34 = mysql_query($query_materias34, $conexion) or die(mysql_error());
$row_materias34 = mysql_fetch_assoc($materias34);

$query_nota34 = "SELECT * FROM notas_materias where cod_hist='$row_historial3[cod_hist]' and id_materia='$row_materias34[id_materia]'";
$nota34 = mysql_query($query_nota34, $conexion) or die(mysql_error());
$row_nota34 = mysql_fetch_assoc($nota34);

$nota34=$row_nota34["definitiva"];

//fin de la 4  materia


//nombre y nota de la materia de fisica
$query_materias35 = "SELECT * FROM materia where nombre like 'fisica' and grado=3";
$materias35 = mysql_query($query_materias35, $conexion) or die(mysql_error());
$row_materias35 = mysql_fetch_assoc($materias35);

$query_nota35 = "SELECT * FROM notas_materias where cod_hist='$row_historial3[cod_hist]' and id_materia='$row_materias35[id_materia]'";
$nota35 = mysql_query($query_nota35, $conexion) or die(mysql_error());
$row_nota35 = mysql_fetch_assoc($nota35);

$nota35=$row_nota35["definitiva"];

//fin de la 5 materia




//nombre y nota de la materia de quimica
$query_materias36 = "SELECT * FROM materia where nombre like 'quimica' and grado=3";
$materias36 = mysql_query($query_materias36, $conexion) or die(mysql_error());
$row_materias36 = mysql_fetch_assoc($materias36);

$query_nota36 = "SELECT * FROM notas_materias where cod_hist='$row_historial3[cod_hist]' and id_materia='$row_materias36[id_materia]'";
$nota36 = mysql_query($query_nota36, $conexion) or die(mysql_error());
$row_nota36 = mysql_fetch_assoc($nota36);

$nota36=$row_nota36["definitiva"];

//fin de la 6 materia


//nombre y nota de la materia de catedra bolivariana
$query_materias37 = "SELECT * FROM materia where nombre like 'catedra bolivariana' and grado=3";
$materias37 = mysql_query($query_materias37, $conexion) or die(mysql_error());
$row_materias37 = mysql_fetch_assoc($materias37);

$query_nota37 = "SELECT * FROM notas_materias where cod_hist='$row_historial3[cod_hist]' and id_materia='$row_materias37[id_materia]'";
$nota37 = mysql_query($query_nota37, $conexion) or die(mysql_error());
$row_nota37 = mysql_fetch_assoc($nota37);

$nota37=$row_nota37["definitiva"];

//fin de la 7  materia


//nombre y nota de la materia de geografia de venezuela
$query_materias38 = "SELECT * FROM materia where nombre like 'geografia de venezuela' and grado=3";
$materias38 = mysql_query($query_materias38, $conexion) or die(mysql_error());
$row_materias38 = mysql_fetch_assoc($materias38);

$query_nota38 = "SELECT * FROM notas_materias where cod_hist='$row_historial3[cod_hist]' and id_materia='$row_materias38[id_materia]'";
$nota38 = mysql_query($query_nota38, $conexion) or die(mysql_error());
$row_nota38 = mysql_fetch_assoc($nota38);

$nota38=$row_nota38["definitiva"];

//fin de la 8  materia


//nombre y nota de la materia de EDUC. FISICA Y DEPORTE
$query_materias39 = "SELECT * FROM materia where nombre like 'EDUCACION FISICA Y DEPORTE' and grado=3";
$materias39 = mysql_query($query_materias39, $conexion) or die(mysql_error());
$row_materias39 = mysql_fetch_assoc($materias39);

$query_nota39 = "SELECT * FROM notas_materias where cod_hist='$row_historial3[cod_hist]' and id_materia='$row_materias39[id_materia]'";
$nota39 = mysql_query($query_nota39, $conexion) or die(mysql_error());
$row_nota39 = mysql_fetch_assoc($nota39);

$nota39=$row_nota39["definitiva"];

//fin de la 9  materia


//nombre y nota de la materia de lengua autoctona
$query_materias310 = "SELECT * FROM materia where nombre like 'lengua autoctona' and grado=3";
$materias310 = mysql_query($query_materias310, $conexion) or die(mysql_error());
$row_materias310 = mysql_fetch_assoc($materias310);

$query_nota310 = "SELECT * FROM notas_materias where cod_hist='$row_historial3[cod_hist]' and id_materia='$row_materias310[id_materia]'";
$nota310 = mysql_query($query_nota310, $conexion) or die(mysql_error());
$row_nota310 = mysql_fetch_assoc($nota310);

$nota310=$row_nota310["definitiva"];

//fin de la 10  materia



/* FIN DE LAS MATERIAS DE TERCER AÑO*/


/*****************************************************************************************/


/* CONSULTA DE LAS NOTAS DEL 4to AÑO DEL ALUMNO mencion Administracion de Servicios en Salud*/
$query_historial4 = "SELECT * FROM historial  where id_alumno=$cedula and grado=4 and mencion='Administracion de Servicios en Salud' ";
$historial4 = mysql_query($query_historial4, $conexion) or die(mysql_error());
$row_historial4= mysql_fetch_assoc($historial4);
//llenar año
$ano4=substr($row_historial4["ano_escolar"], -4);

//nombre y nota de la materia de castellano
$query_materias41 = "SELECT * FROM materia where nombre like 'castellano y literatura' and grado=4 and mencion='Administracion de Servicios en Salud' ";
$materias41 = mysql_query($query_materias41, $conexion) or die(mysql_error());
$row_materias41 = mysql_fetch_assoc($materias41);

$query_nota41 = "SELECT * FROM notas_materias where cod_hist='$row_historial4[cod_hist]' and id_materia='$row_materias41[id_materia]'";
$nota41 = mysql_query($query_nota41, $conexion) or die(mysql_error());
$row_nota41 = mysql_fetch_assoc($nota41);

$nota41=$row_nota41["definitiva"];

//fin de la primera materia


//nombre y nota de la materia de ingles
$query_materias42 = "SELECT * FROM materia where nombre like 'ingles' and grado=4 and mencion='Administracion de Servicios en Salud' ";
$materias42 = mysql_query($query_materias42, $conexion) or die(mysql_error());
$row_materias42 = mysql_fetch_assoc($materias42);

$query_nota42 = "SELECT * FROM notas_materias where cod_hist='$row_historial4[cod_hist]' and id_materia='$row_materias42[id_materia]'";
$nota42 = mysql_query($query_nota42, $conexion) or die(mysql_error());
$row_nota42 = mysql_fetch_assoc($nota42);

$nota42=$row_nota42["definitiva"];

//fin de la segunda materia


//nombre y nota de la materia de matematica
$query_materias43 = "SELECT * FROM materia where nombre like 'matematica' and grado=4 and mencion='Administracion de Servicios en Salud' ";
$materias43 = mysql_query($query_materias43, $conexion) or die(mysql_error());
$row_materias43 = mysql_fetch_assoc($materias43);

$query_nota43 = "SELECT * FROM notas_materias where cod_hist='$row_historial4[cod_hist]' and id_materia='$row_materias43[id_materia]'";
$nota43 = mysql_query($query_nota43, $conexion) or die(mysql_error());
$row_nota43 = mysql_fetch_assoc($nota43);

$nota43=$row_nota43["definitiva"];

//fin de la tercera  materia


//nombre y nota de la materia de cienciaa biologicas
$query_materias44 = "SELECT * FROM materia where nombre like 'cienciaa biologicas' and grado=4 and mencion='Administracion de Servicios en Salud' ";
$materias44 = mysql_query($query_materias44, $conexion) or die(mysql_error());
$row_materias44 = mysql_fetch_assoc($materias44);

$query_nota44 = "SELECT * FROM notas_materias where cod_hist='$row_historial4[cod_hist]' and id_materia='$row_materias44[id_materia]'";
$nota44 = mysql_query($query_nota44, $conexion) or die(mysql_error());
$row_nota44 = mysql_fetch_assoc($nota44);

$nota44=$row_nota44["definitiva"];

//fin de la 4  materia


//nombre y nota de la materia de fisica
$query_materias45 = "SELECT * FROM materia where nombre like 'fisica' and grado=4 and mencion='Administracion de Servicios en Salud' ";
$materias45 = mysql_query($query_materias45, $conexion) or die(mysql_error());
$row_materias45 = mysql_fetch_assoc($materias45);

$query_nota45 = "SELECT * FROM notas_materias where cod_hist='$row_historial4[cod_hist]' and id_materia='$row_materias45[id_materia]'";
$nota45 = mysql_query($query_nota45, $conexion) or die(mysql_error());
$row_nota45 = mysql_fetch_assoc($nota45);

$nota45=$row_nota45["definitiva"];

//fin de la 5 materia





//nombre y nota de la materia de quimica
$query_materias46 = "SELECT * FROM materia where nombre like 'quimica' and grado=4 and mencion='Administracion de Servicios en Salud' ";
$materias46 = mysql_query($query_materias46, $conexion) or die(mysql_error());
$row_materias46 = mysql_fetch_assoc($materias46);

$query_nota46 = "SELECT * FROM notas_materias where cod_hist='$row_historial4[cod_hist]' and id_materia='$row_materias46[id_materia]'";
$nota46 = mysql_query($query_nota46, $conexion) or die(mysql_error());
$row_nota46 = mysql_fetch_assoc($nota46);

$nota46=$row_nota46["definitiva"];

//fin de la 6 materia


//nombre y nota de la materia de historia de venezuela
$query_materias47 = "SELECT * FROM materia where nombre like 'historia de venezuela' and grado=4 and mencion='Administracion de Servicios en Salud' ";
$materias47 = mysql_query($query_materias47, $conexion) or die(mysql_error());
$row_materias47 = mysql_fetch_assoc($materias47);

$query_nota47 = "SELECT * FROM notas_materias where cod_hist='$row_historial4[cod_hist]' and id_materia='$row_materias47[id_materia]'";
$nota47 = mysql_query($query_nota47, $conexion) or die(mysql_error());
$row_nota47 = mysql_fetch_assoc($nota47);

$nota47=$row_nota47["definitiva"];

//fin de la 7  materia


//nombre y nota de la materia de instruccion premilitar
$query_materias48 = "SELECT * FROM materia where nombre like 'instruccion premilitar' and grado=4 and mencion='Administracion de Servicios en Salud' ";
$materias48 = mysql_query($query_materias48, $conexion) or die(mysql_error());
$row_materias48 = mysql_fetch_assoc($materias48);

$query_nota48 = "SELECT * FROM notas_materias where cod_hist='$row_historial4[cod_hist]' and id_materia='$row_materias48[id_materia]'";
$nota48 = mysql_query($query_nota48, $conexion) or die(mysql_error());
$row_nota48 = mysql_fetch_assoc($nota48);

$nota48=$row_nota48["definitiva"];

//fin de la 8  materia


//nombre y nota de la materia de informatica
$query_materias49 = "SELECT * FROM materia where nombre like 'informatica' and grado=4 and mencion='Administracion de Servicios en Salud' ";
$materias49 = mysql_query($query_materias49, $conexion) or die(mysql_error());
$row_materias49 = mysql_fetch_assoc($materias49);

$query_nota49 = "SELECT * FROM notas_materias where cod_hist='$row_historial4[cod_hist]' and id_materia='$row_materias49[id_materia]'";
$nota49 = mysql_query($query_nota49, $conexion) or die(mysql_error());
$row_nota49 = mysql_fetch_assoc($nota49);

$nota49=$row_nota49["definitiva"];

//fin de la 9  materia


//nombre y nota de la materia de educacion fisica
$query_materias410 = "SELECT * FROM materia where nombre like 'educacion fisica' and grado=4 and mencion='Administracion de Servicios en Salud' ";
$materias410 = mysql_query($query_materias410, $conexion) or die(mysql_error());
$row_materias410 = mysql_fetch_assoc($materias410);

$query_nota410 = "SELECT * FROM notas_materias where cod_hist='$row_historial[cod_hist]' and id_materia='$row_materias410[id_materia]'";
$nota410 = mysql_query($query_nota410, $conexion) or die(mysql_error());
$row_nota410 = mysql_fetch_assoc($nota410);

$nota410=$row_nota410["definitiva"];

//fin de la 10  materia


/* FIN DE LAS MATERIAS DE 4to AÑO mencion auxiliar docencia*/



/*****************************************************************************************/

/* CONSULTA DE LAS NOTAS DEL 5to AÑO DEL ALUMNO mencion Administracion de Servicios en Salud*/
$query_historial5 = "SELECT * FROM historial  where id_alumno=$cedula and grado=5 and mencion='Administracion de Servicios en Salud' ";
$historial5 = mysql_query($query_historial5, $conexion) or die(mysql_error());
$row_historial5= mysql_fetch_assoc($historial5);
//llenar año
$ano5=substr($row_historial5["ano_escolar"], -4);

//nombre y nota de la materia de literatura venezolana
$query_materias51 = "SELECT * FROM materia where nombre like 'literatura venezolana' and grado=5 and mencion='Administracion de Servicios en Salud' ";
$materias51 = mysql_query($query_materias51, $conexion) or die(mysql_error());
$row_materias51 = mysql_fetch_assoc($materias51);

$query_nota51 = "SELECT * FROM notas_materias where cod_hist='$row_historial5[cod_hist]' and id_materia='$row_materias51[id_materia]'";
$nota51 = mysql_query($query_nota51, $conexion) or die(mysql_error());
$row_nota51 = mysql_fetch_assoc($nota51);

$nota51=$row_nota51["definitiva"];

//fin de la primera materia


//nombre y nota de la materia de ingles
$query_materias52 = "SELECT * FROM materia where nombre like 'ingles' and grado=5 and mencion='Administracion de Servicios en Salud' ";
$materias52 = mysql_query($query_materias52, $conexion) or die(mysql_error());
$row_materias52 = mysql_fetch_assoc($materias52);

$query_nota52 = "SELECT * FROM notas_materias where cod_hist='$row_historial5[cod_hist]' and id_materia='$row_materias52[id_materia]'";
$nota52 = mysql_query($query_nota52, $conexion) or die(mysql_error());
$row_nota52 = mysql_fetch_assoc($nota52);

$nota52=$row_nota52["definitiva"];

//fin de la segunda materia


//nombre y nota de la materia de matematica
$query_materias53 = "SELECT * FROM materia where nombre like 'matematica' and grado=5 and mencion='Administracion de Servicios en Salud' ";
$materias53 = mysql_query($query_materias53, $conexion) or die(mysql_error());
$row_materias53 = mysql_fetch_assoc($materias53);

$query_nota53 = "SELECT * FROM notas_materias where cod_hist='$row_historial5[cod_hist]' and id_materia='$row_materias53[id_materia]'";
$nota53 = mysql_query($query_nota53, $conexion) or die(mysql_error());
$row_nota53 = mysql_fetch_assoc($nota53);

$nota53=$row_nota53["definitiva"];

//fin de la tercera  materia


//nombre y nota de la materia de ciencias biologicas
$query_materias54 = "SELECT * FROM materia where nombre like 'ciencias biologicas' and grado=5 and mencion='Administracion de Servicios en Salud' ";
$materias54 = mysql_query($query_materias54, $conexion) or die(mysql_error());
$row_materias54 = mysql_fetch_assoc($materias54);

$query_nota54 = "SELECT * FROM notas_materias where cod_hist='$row_historial5[cod_hist]' and id_materia='$row_materias54[id_materia]'";
$nota54 = mysql_query($query_nota54, $conexion) or die(mysql_error());
$row_nota54 = mysql_fetch_assoc($nota54);

$nota54=$row_nota54["definitiva"];

//fin de la 4  materia


//nombre y nota de la materia de fisica
$query_materias55 = "SELECT * FROM materia where nombre like 'fisica' and grado=5 and mencion='Administracion de Servicios en Salud' ";
$materias55 = mysql_query($query_materias55, $conexion) or die(mysql_error());
$row_materias55 = mysql_fetch_assoc($materias55);

$query_nota55 = "SELECT * FROM notas_materias where cod_hist='$row_historial5[cod_hist]' and id_materia='$row_materias55[id_materia]'";
$nota55 = mysql_query($query_nota55, $conexion) or die(mysql_error());
$row_nota55 = mysql_fetch_assoc($nota55);

$nota55=$row_nota55["definitiva"];

//fin de la 5 materia





//nombre y nota de la materia de geografia quimica
$query_materias56 = "SELECT * FROM materia where nombre like 'quimica' and grado=5 and mencion='Administracion de Servicios en Salud' ";
$materias56 = mysql_query($query_materias56, $conexion) or die(mysql_error());
$row_materias56 = mysql_fetch_assoc($materias56);

$query_nota56 = "SELECT * FROM notas_materias where cod_hist='$row_historial5[cod_hist]' and id_materia='$row_materias56[id_materia]'";
$nota56 = mysql_query($query_nota56, $conexion) or die(mysql_error());
$row_nota56 = mysql_fetch_assoc($nota56);

$nota56=$row_nota56["definitiva"];

//fin de la 6 materia


//nombre y nota de la materia de geografia economica
$query_materias57 = "SELECT * FROM materia where nombre like 'geografia economica' and grado=5 and mencion='Administracion de Servicios en Salud' ";
$materias57 = mysql_query($query_materias57, $conexion) or die(mysql_error());
$row_materias57 = mysql_fetch_assoc($materias57);

$query_nota57 = "SELECT * FROM notas_materias where cod_hist='$row_historial5[cod_hist]' and id_materia='$row_materias57[id_materia]'";
$nota57 = mysql_query($query_nota57, $conexion) or die(mysql_error());
$row_nota57 = mysql_fetch_assoc($nota57);

$nota57=$row_nota57["definitiva"];

//fin de la 7  materia


//nombre y nota de la materia de historia de venezuela
$query_materias58 = "SELECT * FROM materia where nombre like 'historia de venezuela' and grado=5 and mencion='Administracion de Servicios en Salud' ";
$materias58 = mysql_query($query_materias58, $conexion) or die(mysql_error());
$row_materias58 = mysql_fetch_assoc($materias58);

$query_nota58 = "SELECT * FROM notas_materias where cod_hist='$row_historial5[cod_hist]' and id_materia='$row_materias58[id_materia]'";
$nota58 = mysql_query($query_nota58, $conexion) or die(mysql_error());
$row_nota58 = mysql_fetch_assoc($nota58);

$nota58=$row_nota58["definitiva"];

//fin de la 8  materia


//nombre y nota de la materia de instruccion premilitar
$query_materias59 = "SELECT * FROM materia where nombre like 'instruccion premilitar' and grado=5 and mencion='Administracion de Servicios en Salud' ";
$materias59 = mysql_query($query_materias59, $conexion) or die(mysql_error());
$row_materias59 = mysql_fetch_assoc($materias59);

$query_nota59 = "SELECT * FROM notas_materias where cod_hist='$row_historial5[cod_hist]' and id_materia='$row_materias59[id_materia]'";
$nota59 = mysql_query($query_nota59, $conexion) or die(mysql_error());
$row_nota59 = mysql_fetch_assoc($nota59);

$nota59=$row_nota59["definitiva"];

//fin de la 9  materia


//nombre y nota de la materia de informatica
$query_materias510 = "SELECT * FROM materia where nombre like 'informatica' and grado=5 and mencion='Administracion de Servicios en Salud' ";
$materias510 = mysql_query($query_materias510, $conexion) or die(mysql_error());
$row_materias510 = mysql_fetch_assoc($materias510);

$query_nota510 = "SELECT * FROM notas_materias where cod_hist='$row_historial5[cod_hist]' and id_materia='$row_materias510[id_materia]'";
$nota510 = mysql_query($query_nota510, $conexion) or die(mysql_error());
$row_nota510 = mysql_fetch_assoc($nota510);

$nota510=$row_nota510["definitiva"];

//fin de la 10  materia




//nombre y nota de la materia de educacion fisica y deporte
$query_materias511 = "SELECT * FROM materia where nombre like 'educacion fisica y deporte' and grado=5 and mencion='Administracion de Servicios en Salud' ";
$materias511 = mysql_query($query_materias511, $conexion) or die(mysql_error());
$row_materias511 = mysql_fetch_assoc($materias511);

$query_nota511 = "SELECT * FROM notas_materias where cod_hist='$row_historial5[cod_hist]' and id_materia='$row_materias511[id_materia]'";
$nota511 = mysql_query($query_nota511, $conexion) or die(mysql_error());
$row_nota511 = mysql_fetch_assoc($nota511);

$nota511=$row_nota511["definitiva"];

//fin de la 11  materia

//nombre y nota de la materia de pre pasantia
$query_materias512 = "SELECT * FROM materia where nombre like 'pre pasantia' and grado=5 and mencion='Administracion de Servicios en Salud' ";
$materias512 = mysql_query($query_materias512, $conexion) or die(mysql_error());
$row_materias512 = mysql_fetch_assoc($materias512);

$query_nota512 = "SELECT * FROM notas_materias where cod_hist='$row_historial5[cod_hist]' and id_materia='$row_materias512[id_materia]'";
$nota512 = mysql_query($query_nota512, $conexion) or die(mysql_error());
$row_nota512 = mysql_fetch_assoc($nota512);

$nota512=$row_nota512["definitiva"];

//fin de la 12  materia






/* FIN DE LAS MATERIAS DE 5to AÑO mencion auxiliar docencia*/


/*****************************************************************************************/


//asignamos nombre a las notas con una funcion

function nombre($nota){
	switch ($nota){
		case 1:
		$nota="UNO";
		break;
		case 2:
		$nota="DOS";
		break;
		case 3:
		$nota="TRES";
		break;
		case 4:
		$nota="CUATRO";
		break;
		case 5:
		$nota="CINCO";
		break;
		case 6:
		$nota="SIES";
		break;
		case 7:
		$nota="SIETE";
		break;
		case 8:
		$nota="OCHO";
		break;
		case 9:
		$nota="NUEVE";
		break;
		case 10:
		$nota="DIEZ";
		break;
		case 11:
		$nota="ONCE";
		break;
		case 12:
		$nota="DOCE";
		break;
		case 13:
		$nota="TRECE";
		break;
		case 14:
		$nota="CATORCE";
		break;
		case 15:
		$nota="QUINCE";
		break;
		case 16:
		$nota="DIECISEIS";
		break;
		case 17:
		$nota="DIECISIETE";
		break;
		case 18:
		$nota="DIECIOCHO";
		break;
		case 9:
		$nota="NUEVE";
		break;
		case 19:
		$nota="DIECINUEVE";
		break;
		case 20:
		$nota="VEINTE";
		break;
	}
	
	return $nota;
}//fin de la funcion

?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administracion de Servicios en Salud</title>
<style type="text/css">
<!--
.Estilo4 {font-size: 10pt; font-family: Arial, Helvetica, sans-serif; }
p.MsoNormal {mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:ES;
	mso-fareast-language:ES;}
p.MsoNormal2 {mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:ES;
	mso-fareast-language:ES;}
p.MsoNormal211 {mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:ES;
	mso-fareast-language:ES;}
p.MsoNormal2112 {mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:ES;
	mso-fareast-language:ES;}
p.MsoNormal22 {mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:ES;
	mso-fareast-language:ES;}
p.MsoNormal222 {mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:ES;
	mso-fareast-language:ES;}
p.MsoNormal3 {mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:ES;
	mso-fareast-language:ES;}
span.GramE {mso-style-name:"";
	mso-gram-e:yes;}
span.GramE2 {mso-style-name:"";
	mso-gram-e:yes;}
span.GramE3 {mso-style-name:"";
	mso-gram-e:yes;}
span.SpellE {mso-style-name:"";
	mso-spl-e:yes;}
span.SpellE2 {mso-style-name:"";
	mso-spl-e:yes;}
.Estilo10 {font-size: 8px; font-family: Arial, Helvetica, sans-serif; }
p.MsoNormal2111 {mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:ES;
	mso-fareast-language:ES;}
p.MsoNormal221 {mso-style-unhide:no;
	mso-style-qformat:yes;
	mso-style-parent:"";
	margin:0cm;
	margin-bottom:.0001pt;
	mso-pagination:widow-orphan;
	font-size:10.0pt;
	font-family:"Times New Roman","serif";
	mso-fareast-font-family:"Times New Roman";
	mso-ansi-language:ES;
	mso-fareast-language:ES;}
.Estilo11 {font-size: 12px}
-->
</style>
</head>
<script>
function imprimir(){
window.print()
window.close();
}
</script>
<body <? if($_GET["ver"]==1){ 
	  echo "onload='imprimir();'";	
	  } ?>>
<form name="form1" method="get"  action="NotasCertificadasASS.php" />
<table width="835" border="0" align="center">
  <tr>
    <td width="829" height="1496" valign="top"><table cellpadding="0" cellspacing="0" width="99%" >
      <tr valign="top">
        <td width="45%" height="81" valign="top"><![endif]>
              <div>
                <p class="MsoNormal22" align="center" style='text-align:center'><b style='mso-bidi-font-weight:normal'><span
    style='mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE"><img src="imagenes/mE.jpg" width="350" height="86" /></span></b></p>
                <p class="MsoNormal22"><b style='mso-bidi-font-weight:normal'><span
    style='mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE">
                  <o:p>&nbsp;</o:p>
                </span></b></p>
              </div>
          <![if !mso]></td>
        <td width="24%">&nbsp;</td>
        <td width="31%"><p class="MsoNormal211" align="left" style='text-align:center'><b
    style='mso-bidi-font-weight:normal'><u><span style='font-size:
    8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE">CERTIFICACI&Oacute;N
          DE CALIFICACIONES
          <o:p></o:p>
        </span></u></b></p>
              <p class="MsoNormal211" align="left" style='text-align:center'><b
    style='mso-bidi-font-weight:normal'><span style='font-size:8.0pt;
    font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE">C&Oacute;DIGO DEL
                FORMATO: RR-DEA-03-03
                <o:p></o:p>
              </span></b></p>
          <p align="left" class="MsoNormal211"><b style='mso-bidi-font-weight:normal'><span
    style='font-size:8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:
    ES-VE' lang="ES-VE" xml:lang="ES-VE">I. Plan de Estudio: </span></b><u><span style='font-size:
    8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE">EDUCACION
            MEDIA TECNICA </span></u><b style='mso-bidi-font-weight:normal'><span style='font-size:8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
    mso-ansi-language:ES-VE'
    lang="ES-VE" xml:lang="ES-VE">
                          <o:p></o:p>
                        </span></b></p>
          <p align="left" class="MsoNormal211"><b style='mso-bidi-font-weight:normal'><span
    style='font-size:8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:
    ES-VE' lang="ES-VE" xml:lang="ES-VE">C&oacute;digo de Plan de Estudio: </span></b><u><span
    style='font-size:8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:
    ES-VE' lang="ES-VE" xml:lang="ES-VE">___32011_____ </span></u><b style='mso-bidi-font-weight:
    normal'><span style='font-size:8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
    mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE">
                <o:p></o:p>
              </span></b></p>
          <p align="left" class="MsoNormal211"><b style='mso-bidi-font-weight:normal'><span
    style='font-size:8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:
    ES-VE' lang="ES-VE" xml:lang="ES-VE">Menci&oacute;n:</span></b><u><span style='font-size:8.0pt;
    font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE"><span
    style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;EDUCACION MEDIA GENERAL </span>__</span></u><b
    style='mso-bidi-font-weight:normal'><span style='font-size:8.0pt;
    font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE">
          <o:p></o:p>
          </span></b></p></td>
      </tr>
    </table>
        <p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
style='font-size:11.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">II. Datos del Plantel
          o Zona Educativa que emite
          <st1:PersonName ProductID="la Certificaci&#65523;n"
w:st="on">la Certificaci&oacute;n</st1:PersonName>
          :
          <o:p></o:p>
        </span></b></p>
      <p class="MsoNormal" style='text-align:justify;tab-stops:549.0pt'><span
class="SpellE"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">C&oacute;d.DEA</span></span><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;'
lang="es" xml:lang="es">: <u>PD-00140203</u> <span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Nombre: <u>UNIDAD EDUCATIVA INTERCULTURAL
        BILING&Uuml;E SAN JOSE<span style='mso-spacerun:yes'>&nbsp; </span>DE MIRABAL<span
style='mso-spacerun:yes'>&nbsp; </span></u><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;</span><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;</span><span
style='mso-spacerun:yes'>&nbsp;</span><span class="SpellE">Dtto</span>. Esc.<u> 01</u>
                <o:p></o:p>
        </span></p>
      <p class="MsoNormal" style='text-align:justify'><span style='font-size:
9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Direcci&oacute;n<span class="GramE">: <u><span
style='mso-spacerun:yes'>&nbsp;</span>CASERIO</u></span><u> MIRABAL, EJE VIAL SUR DE
        PUERTO AYACUCHO. VIA SAMARIAPO </u><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;</span><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Tel&eacute;fono: <u>0415 - 2125080</u>
                <o:p></o:p>
        </span></p>
      <p class="MsoNormal" style='text-align:justify'><span
style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:PT-BR' lang="PT-BR" xml:lang="PT-BR">Munic&iacute;pio: <u>ATURES</u><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span class="SpellE">Entidad</span> Federal: <u>ESTADO AMAZONAS</u><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Zona Educativa:<span
class="GramE"><span style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><u>PUERTO AYACUCHO</u>
              <o:p></o:p>
        </span></p>
      <p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">III. Datos de
        Identificaci&oacute;n del Alumno:
        <o:p></o:p>
        </span></b></p>
      <p class="MsoNormal" style='text-align:justify'><span style='font-size:
9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Nacionalidad: <u>VENEZOLANA</u> <span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>C&eacute;dula<span
style='mso-spacerun:yes'>&nbsp; </span>Identidad: <u>V-<strong><u><?php echo $row_estudiante["cedula"]; ?></u></strong> </u><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;</span><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Fecha<span
style='mso-spacerun:yes'>&nbsp; </span>de<span style='mso-spacerun:yes'>&nbsp;&nbsp; </span>Nacimiento: <u><strong><u><?php echo $row_estudiante["fecha_nac"]; ?></u></strong>
                <o:p></o:p>
        </u></span></p>
      <p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Apellidos:<span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span><strong><u><?php echo $row_estudiante["apellido"]; ?></u></strong><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Nombres: <u><strong><u><?php echo $row_estudiante["nombre"]; ?></u></strong>
                <o:p></o:p>
        </u></span></p>
      <p class="MsoNormal" style='text-align:justify'><span style='font-size:
9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Lugar<span style='mso-spacerun:yes'>&nbsp; </span>de<span style='mso-spacerun:yes'>&nbsp;&nbsp; </span>Nacimiento:<span
style='mso-spacerun:yes'>&nbsp;&nbsp; </span><u>PATO GUAYABAL</u> <span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;</span>Entidad<span style='mso-spacerun:yes'>&nbsp;&nbsp; </span>Federal: <u>TERRITORIO FEDERAL AMAZONAS
        <o:p></o:p>
        </u></span></p>
      <p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
          <o:p>&nbsp;</o:p>
        </span></p>
      <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0"
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-padding-alt:0cm 3.5pt 0cm 3.5pt;mso-border-insideh:.5pt solid windowtext;
 mso-border-insidev:.5pt solid windowtext'>
          <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;page-break-inside:avoid;
  height:13.1pt'>
            <td width="392" colspan="4" valign="top" style='width:294.1pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">IV. Planteles donde curs&oacute; estos
              estudios:</span></b><span style='font-size:11.0pt;mso-bidi-font-size:
  10.0pt' lang="es" xml:lang="es">
                          <o:p></o:p>
                      </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><h2 style='margin:0cm;margin-bottom:.0001pt'><span lang="es" xml:lang="es">N&deg;
                      <o:p></o:p>
            </span></h2></td>
            <td width="154" valign="top" style='width:115.4pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Nombre del Plantel
              <o:p></o:p>
            </span></b></p></td>
            <td width="121" valign="top" style='width:91.1pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Localidad
              <o:p></o:p>
            </span></b></p></td>
            <td width="36" valign="top" style='width:27.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">E.F.
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:1;height:13.1pt'>
            <td width="27" valign="top" style='width:19.9pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><h2 style='margin:0cm;margin-bottom:.0001pt'><span lang="es" xml:lang="es">N&deg;
                      <o:p></o:p>
            </span></h2></td>
            <td width="205" valign="top" style='width:153.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Nombre
              del Plantel
              <o:p></o:p>
            </span></b></p></td>
            <td width="123" valign="top" style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Localidad
              <o:p></o:p>
            </span></b></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">E.F.
              <o:p></o:p>
            </span></b></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">2
              <o:p></o:p>
            </span></b></p></td>
            <td width="154" valign="top" style='width:115.4pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="121" valign="top" style='width:91.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="36" valign="top" style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes;height:13.1pt'>
            <td width="27" valign="top" style='width:19.9pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">1
              <o:p></o:p>
            </span></b></p></td>
            <td width="205" valign="bottom" style='width:153.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">U.E.I.B &ldquo;SAN JOSE DE MIRABAL&rdquo;
                        <o:p></o:p>
            </span></b></p></td>
            <td width="123" valign="bottom" style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">CASERIO MIRABAL
              <o:p></o:p>
            </span></b></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">AM
              <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">3
              <o:p></o:p>
            </span></b></p></td>
            <td width="154" valign="top" style='width:115.4pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="121" valign="top" style='width:91.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="36" valign="top" style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
          </tr>
      </table>
      <p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
style='font-size:2.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
          <o:p>&nbsp;</o:p>
        </span></b></p>
      <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0"
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-padding-alt:0cm 3.5pt 0cm 3.5pt;mso-border-insideh:.5pt solid windowtext;
 mso-border-insidev:.5pt solid windowtext'>
          <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;page-break-inside:avoid'>
            <td colspan="8" valign="top" style='width:414.4pt;border:none;
  padding:0cm 3.5pt 0cm 3.5pt'><h6 align="left" style='margin-left:0cm;text-align:left;text-indent:0cm;
  mso-list:none;tab-stops:35.4pt'><span lang="es" xml:lang="es">V. Pensum de Estudio:
              <o:p></o:p>
            </span></h6></td>
            <td width="14" rowspan="44" valign="top" style='width:8.0pt;border:none;border-right:solid windowtext 1.0pt;
  mso-border-right-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>              <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p></td>
            <td width="179" valign="top" style='width:133.95pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h6 align="left" style='margin-left:24.15pt;text-align:left;text-indent:-21.3pt;
  mso-list:l15 level1 lfo5;tab-stops:35.4pt'>
                <![if !supportLists]>
                <span style='mso-fareast-font-family:Arial;mso-bidi-font-family:Arial'
  lang="es" xml:lang="es"><span
  style='mso-list:Ignore'>VI.<span style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp;&nbsp;&nbsp; </span></span></span>
                <![endif]>
                <span lang="es" xml:lang="es">PLANTEL
                  <o:p></o:p>
            </span></h6></td>
          </tr>
          <tr style='mso-yfti-irow:1;page-break-inside:avoid'>
            <td width="223" style='width:166.55pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">A&ntilde;o
              o Grado: </span></b><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es"><span
  style='mso-spacerun:yes'>&nbsp;</span>1&ordm; A&Ntilde;O <b style='mso-bidi-font-weight:normal'>
                          <o:p></o:p>
                      </b></span></p></td>
            <td colspan="2" style='width:106.3pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">Calificaci&oacute;n
              <o:p></o:p>
            </span></h4></td>
            <td width="38" rowspan="2" style='width:1.0cm;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">T-E
              <o:p></o:p>
            </span></h4></td>
            <td colspan="3" style='width:70.85pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">Fecha
              <o:p></o:p>
            </span></h4></td>
            <td width="59" style='width:42.35pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Plantel
              <o:p></o:p>
            </span></b></p></td>
            <td width="179" rowspan="2" valign="top" style='width:133.95pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Apellidos
              y Nombres del Director(a):
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:2;page-break-inside:avoid;height:5.95pt'>
            <td width="223" style='width:166.55pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt;height:5.95pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Asignaturas
              <o:p></o:p>
            </span></b></p></td>
            <td width="48" style='width:35.4pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:5.95pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:8.0pt;
  font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">En
              N&deg;
                          <o:p></o:p>
            </span></b></p></td>
            <td width="95" style='width:70.9pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:5.95pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">En
              letras
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:5.95pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Mes
              <o:p></o:p>
            </span></b></p></td>
            <td width="72" style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:5.95pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">A&ntilde;o
              <o:p></o:p>
            </span></b></p></td>
            <td width="59" style='width:42.35pt;border:none;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;
  height:5.95pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">N&deg;
                        <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:3;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" style='text-align:justify'><span style='font-family:
  &quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">CASTELLANO Y LITERATURA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota11; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota11); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td width="72" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $ano1; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;background:white;mso-background-themecolor:background1;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" style='margin-left:35.4pt;text-indent:-35.4pt'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;'
  lang="es" xml:lang="es">Pbro.
              Lic. F&eacute;lix A. Brito M.
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:4;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">INGLES
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota12; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo nombre($nota12); ?></span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span>07</p></td>
            <td width="72" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo  $ano1; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">N&uacute;mero
              de C.I.:
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:5;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">MATEMATICA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota13; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota13); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'>07</p></td>
            <td width="72" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo  $ano1; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">V-</span><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;;
  mso-ansi-language:PT-BR' lang="PT-BR" xml:lang="PT-BR">6.307.017</span><span style='font-family:
  &quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:6;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">EST.
              DE LA NATURALEZA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota14; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota14); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span>07</p></td>
            <td width="72" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $ano1; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Firma:
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:7;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">HISTORIA
              DE VENEZUELA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota15; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota15); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span>07</p></td>
            <td width="72" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $ano1; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" rowspan="2" valign="top" style='width:133.95pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:8;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">EDUC.
              FAM. Y CIUDADANA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota16; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota16); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span>07</p></td>
            <td width="72" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo  $ano1; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:9;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">GEOGRAFIA
              GENERAL
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota17; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota17); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span>07</p></td>
            <td width="72" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo  $ano1; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" rowspan="10" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h2 align="center" class="Estilo11" style='margin:0cm;margin-bottom:.0001pt'><span lang="es" xml:lang="es">SELLO DEL
              <o:p></o:p>
              </span></h2>
                <h2 align="center" style='margin:0cm;margin-bottom:.0001pt'><span class="Estilo11" lang="es" xml:lang="es">PLANTEL</span><span lang="es" xml:lang="es">
                <o:p></o:p>
              </span></h2></td>
          </tr>
          <tr style='mso-yfti-irow:10;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">EDUCACION
              ARTISTICA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota18; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota18); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span>07</p></td>
            <td width="72" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $ano1; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:11;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">EDUC.
              FISICA Y DEPORTE
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota19; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota19); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span>07</p></td>
            <td width="72" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo  $ano1; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:12;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">LENGUA<span
  style='mso-spacerun:yes'>&nbsp; </span>AUTOCTONA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota110; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota110); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span>07</p></td>
            <td width="72" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo  $ano1; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:13;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">EDUC.
              PARA EL TRABAJO
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">13
              <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">TRECE
              <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span>07</p></td>
            <td width="72" valign="top" style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano1; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:14;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***</span></b><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"> </span><b style='mso-bidi-font-weight:
  normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span></b></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">*
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="72" valign="top" style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:15;page-break-inside:avoid'>
            <td width="223" style='width:166.55pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">A&ntilde;o
              o Grado:<span style='mso-spacerun:yes'>&nbsp; </span></span></b><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">2&ordm;
                A&Ntilde;O<span style='mso-spacerun:yes'>&nbsp; </span><b style='mso-bidi-font-weight:
  normal'>
                            <o:p></o:p>
                        </b></span></p></td>
            <td colspan="2" style='width:106.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es"><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Calificaci&oacute;n
              <o:p></o:p>
            </span></h4></td>
            <td width="38" rowspan="2" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">T-E
              <o:p></o:p>
            </span></h4></td>
            <td colspan="3" style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">Fecha
              <o:p></o:p>
            </span></h4></td>
            <td width="59" style='width:42.35pt;border:none;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Plantel
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:16;page-break-inside:avoid'>
            <td width="223" style='width:166.55pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Asignaturas
              <o:p></o:p>
            </span></b></p></td>
            <td width="48" style='width:35.4pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:8.0pt;
  font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">En
              N&deg;
                          <o:p></o:p>
            </span></b></p></td>
            <td width="95" style='width:70.9pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">En letras
              <o:p></o:p>
            </span></b></p></td>
            <td width="41" style='width:27.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Mes
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" style='width:43.2pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">A&ntilde;o
              <o:p></o:p>
            </span></b></p></td>
            <td width="59" style='width:42.35pt;border:none;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">N&deg;
                        <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:17;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">CASTELLANO
              Y LITERATURA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota21; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota11); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano2; ?></span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;background:white;mso-background-themecolor:background1;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:18;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">INGLES
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota22; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo nombre($nota22); ?></span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano2; ?></span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:19;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">MATEMATICA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota23; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota23); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano2; ?></span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" rowspan="3" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Para efectos de su validez
              <o:p></o:p>
              </span></p>
                <p class="MsoNormal" align="center" style='text-align:center'><span class="GramE"><span style='font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;'
  lang="es" xml:lang="es">a</span></span><span
  style='font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es"> nivel estadal.</span><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                  <o:p></o:p>
              </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:20;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">EDUCACION
              PARA LA<span style='mso-spacerun:yes'>&nbsp; </span>SALUD
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota24; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota24); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano2; ?></span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:21;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">CIENCIAS
              BIOLOGICAS
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota25; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota25); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano2; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:21;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt;
  height:7.6pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">HISTORIA
              DE VENEZUELA
              <o:p></o:p>
            </span></p></td>
            <td valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota26; ?>
                      <o:p></o:p>
            </span></p></td>
            <td valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota26); ?>
                      <o:p></o:p>
            </span></p></td>
            <td valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt;height:7.6pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt;height:7.6pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt;height:7.6pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano2; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt;height:7.6pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:21;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">HISTORIA
              UNIVERSAL
              <o:p></o:p>
            </span></p></td>
            <td valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota27; ?>
                      <o:p></o:p>
            </span></p></td>
            <td valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota27); ?>
                      <o:p></o:p>
            </span></p></td>
            <td valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano2; ?></span></p></td>
            <td valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          
          <tr style='mso-yfti-irow:24;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">EDUCACION
              ARTISTICA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota28; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota28); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano2; ?></span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Director(a):
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:25;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">EDUC.
              FISICA Y DEPORTE
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota29; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota29); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano2; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:26;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">LENGUA
              AUTOCTONA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota210; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota210); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano2; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">N&uacute;mero
              de C.I.:
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:27;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">EDUC.
              PARA EL TRABAJO
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">15
              <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">QUINCE
              <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano2; ?></span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***</span></b><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"> </span><b style='mso-bidi-font-weight:
  normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span></b></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">*
              <o:p></o:p>
            </span></b></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Firma:
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:29;page-break-inside:avoid'>
            <td width="223" style='width:166.55pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">A&ntilde;o
              o Grado: </span></b><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es"><span
  style='mso-spacerun:yes'>&nbsp;</span>3&ordm; A&Ntilde;O <b style='mso-bidi-font-weight:normal'>
                          <o:p></o:p>
                      </b></span></p></td>
            <td colspan="2" style='width:106.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es"><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Calificaci&oacute;n
              <o:p></o:p>
            </span></h4></td>
            <td width="38" rowspan="2" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">T-E
              <o:p></o:p>
            </span></h4></td>
            <td colspan="3" style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">Fecha
              <o:p></o:p>
            </span></h4></td>
            <td width="59" style='width:42.35pt;border:none;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Plantel
              <o:p></o:p>
            </span></b></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:30;page-break-inside:avoid'>
            <td width="223" style='width:166.55pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Asignaturas
              <o:p></o:p>
            </span></b></p></td>
            <td width="48" style='width:35.4pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:8.0pt;
  font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">En
              N&deg;
                          <o:p></o:p>
            </span></b></p></td>
            <td width="95" style='width:70.9pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">En letras
              <o:p></o:p>
            </span></b></p></td>
            <td width="41" style='width:27.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Mes
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" style='width:43.2pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">A&ntilde;o
              <o:p></o:p>
            </span></b></p></td>
            <td width="59" style='width:42.35pt;border:none;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">N&deg;
                        <o:p></o:p>
            </span></b></p></td>
            <td width="179" rowspan="11" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">SELLO DE LA</span></b><b
  style='mso-bidi-font-weight:normal'><span style='font-size:9.0pt;
  font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
              </span></b></p>
                <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">ZONA EDUCATIVA
                  <o:p></o:p>
              </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:31;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" style='text-align:justify'><span style='font-family:
  &quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">CASTELLANO Y LITERATURA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota31; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota11); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano3; ?></span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;background:white;mso-background-themecolor:background1;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:32;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" style='text-align:justify'><span style='font-family:
  &quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">INGLES
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota32; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo nombre($nota32); ?></span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">F</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano3; ?></span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:33;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" style='text-align:justify'><span style='font-family:
  &quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">MATEMATICA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota33; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota33); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">F</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano3; ?></span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">01</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:34;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" style='text-align:justify'><span style='font-family:
  &quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">CIENCIAS BIOLOGICAS
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota34; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota34); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">F</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano3; ?></span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">01</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:35;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" style='text-align:justify'><span style='font-family:
  &quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">FISICA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota35; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota35); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">F</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano3; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">01</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:36;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" style='text-align:justify'><span style='font-family:
  &quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">QUIMICA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota36; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota36); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">F</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt;height:7.6pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano3; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">01</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:37;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" style='text-align:justify'><span style='font-family:
  &quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">CATEDRA BOLIVARIANA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota37; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota37); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">F</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano3; ?></span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">01</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:38;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" style='text-align:justify'><span style='font-family:
  &quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">GEOGRAFIA DE VENEZUELA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota38; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota38); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">F</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano3; ?></span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">01</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:39;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" style='text-align:justify'><span style='font-family:
  &quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">EDUCACI&Oacute;N FISICA Y DEPORTE
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota39; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota39); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">F</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano3; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">01</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:40;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">LENGUA
              AUTOCTONA
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota310; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota310); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">F</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano3; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">01</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:41;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" style='text-align:justify'><span style='font-family:
  &quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">EDUC. PARA EL TRABAJO
              <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">15
              <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">QUINCE
              <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">F</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano3; ?></span></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">01</span><span
  lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="179" rowspan="3" valign="top" style='width:133.95pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Para efectos de su validez a nivel
              nacional e internacional y cuando se trate de estudios libres o equivalentes
              sin escolaridad.
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:42;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***</span></b><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"> </span><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">*
              <o:p></o:p>
            </span></b></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:43;mso-yfti-lastrow:yes;page-break-inside:avoid'>
            <td width="223" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="48" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="95" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">*
              <o:p></o:p>
            </span></b></p></td>
            <td width="41" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="59" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <![if !supportMisalignedColumns]>
          <tr height="0">
            <td width="223" style='border:none'></td>
            <td width="48" style='border:none'></td>
            <td width="95" style='border:none'></td>
            <td width="38" style='border:none'></td>
            <td width="41" style='border:none'></td>
            <td width="0" style='border:none'></td>
            <td width="72" style='border:none'></td>
            <td width="59" style='border:none'></td>
            <td width="14" style='border:none'></td>
            <td width="179" style='border:none'></td>
          </tr>
          <![endif]>
      </table>
      <p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
style='font-size:2.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
          <o:p>&nbsp;</o:p>
        </span></b></p>
      <h6 align="left" style='margin-left:0cm;text-align:left;text-indent:0cm;
mso-list:none;tab-stops:35.4pt'><span lang="es" xml:lang="es">VIII. Programas Aprobados de
        Educaci&oacute;n para el Trabajo: GRADO / NOMBRE / HORAS ALUMNO SEM.
        <o:p></o:p>
        </span></h6>
      <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0"
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-padding-alt:0cm 3.5pt 0cm 3.5pt;mso-border-insideh:.5pt solid windowtext;
 mso-border-insidev:.5pt solid windowtext'>
          <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
            <td width="45" valign="top" style='width:34.0pt;border:solid windowtext 1.0pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">1&ordm;
                      <o:p></o:p>
            </span></p></td>
            <td width="255" valign="top" style='width:191.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">AGRICULTURA
              <o:p></o:p>
            </span></p></td>
            <td width="76" valign="top" style='width:2.0cm;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">4
              HORAS
              <o:p></o:p>
            </span></p></td>
            <td width="45" valign="top" style='width:34.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">2&ordm;
                      <o:p></o:p>
            </span></p></td>
            <td width="254" valign="top" style='width:190.7pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">TECNICAS
              DE INVESTIGACION
              <o:p></o:p>
            </span></p></td>
            <td width="66" valign="top" style='width:49.6pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">2 <span style='mso-spacerun:yes'>&nbsp;</span>HORAS
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:1'>
            <td width="45" valign="top" style='width:34.0pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">1&ordm;
                      <o:p></o:p>
            </span></p></td>
            <td width="255" valign="top" style='width:191.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">COMPUTACI&Oacute;N
              <o:p></o:p>
            </span></p></td>
            <td width="76" valign="top" style='width:2.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">2
              HORAS
              <o:p></o:p>
            </span></p></td>
            <td width="45" valign="top" style='width:34.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">2&ordm;
                      <o:p></o:p>
            </span></p></td>
            <td width="254" valign="top" style='width:190.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">COMPUTACION
              <o:p></o:p>
            </span></p></td>
            <td width="66" valign="top" style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">2 <span
  style='mso-spacerun:yes'>&nbsp;</span>HORAS
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:2'>
            <td width="45" valign="top" style='width:34.0pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">1&ordm;
                      <o:p></o:p>
            </span></p></td>
            <td width="255" valign="top" style='width:191.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">TECNICAS
              DE INVESTIGACI&Oacute;N
              <o:p></o:p>
            </span></p></td>
            <td width="76" valign="top" style='width:2.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">2
              HORAS
              <o:p></o:p>
            </span></p></td>
            <td width="45" valign="top" style='width:34.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">3&ordm;
                      <o:p></o:p>
            </span></p></td>
            <td width="254" valign="top" style='width:190.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">AGRICULTURA
              <o:p></o:p>
            </span></p></td>
            <td width="66" valign="top" style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">3<span
  style='mso-spacerun:yes'>&nbsp; </span>HORAS
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:3'>
            <td width="45" valign="top" style='width:34.0pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">2&ordm;
                      <o:p></o:p>
            </span></p></td>
            <td width="255" valign="top" style='width:191.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">AGRICULTURA
              <o:p></o:p>
            </span></p></td>
            <td width="76" valign="top" style='width:2.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">2
              HORAS
              <o:p></o:p>
            </span></p></td>
            <td width="45" valign="top" style='width:34.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">3&ordm;
                      <o:p></o:p>
            </span></p></td>
            <td width="254" valign="top" style='width:190.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">COMPUTACI&Oacute;N
              <o:p></o:p>
            </span></p></td>
            <td width="66" valign="top" style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">2<span
  style='mso-spacerun:yes'>&nbsp; </span>HORAS
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:4;mso-yfti-lastrow:yes'>
            <td width="45" valign="top" style='width:34.0pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">2&ordm;
                      <o:p></o:p>
            </span></p></td>
            <td width="255" valign="top" style='width:191.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">DIBUJO
              TECNICO
              <o:p></o:p>
            </span></p></td>
            <td width="76" valign="top" style='width:2.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">2
              HORAS
              <o:p></o:p>
            </span></p></td>
            <td width="45" valign="top" style='width:34.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">3&ordm;
                      <o:p></o:p>
            </span></p></td>
            <td width="254" valign="top" style='width:190.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">TECNICAS
              DE INVESTIGACI&Oacute;N
              <o:p></o:p>
            </span></p></td>
            <td width="66" valign="top" style='width:49.6pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">2 HORAS
              <o:p></o:p>
            </span></p></td>
          </tr>
      </table>
      <h6 align="left" style='margin-left:0cm;text-align:left;text-indent:0cm;
mso-list:none;tab-stops:35.4pt'><span lang="es" xml:lang="es">
          <o:p>&nbsp;</o:p>
        </span></h6>
      <h6 align="left" style='margin-left:0cm;text-align:left;text-indent:0cm;
mso-list:none;tab-stops:35.4pt'><span lang="es" xml:lang="es">IX. Observaciones: </span><span style='font-weight:normal'
lang="es" xml:lang="es">_________________________________________________________________________
        _____________________________________________________________ </span></h6>
      <h6 align="left" style='margin-left:0cm;text-align:left;text-indent:0cm;
mso-list:none;tab-stops:35.4pt'><span style='font-weight:normal'
lang="es" xml:lang="es">_______________________________________________________________________________________________________________________________________________________.- </span><span lang="es" xml:lang="es">
          <o:p></o:p>
        </span></h6>
      <p class="MsoNormal" style='margin-right:-11.6pt'><span lang="es" xml:lang="es">
          <o:p>&nbsp;</o:p>
        </span></p>
      <p class="MsoNormal" style='margin-right:-11.6pt'><b style='mso-bidi-font-weight:
normal'><span style='font-size:11.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">X. </span></b><b style='mso-bidi-font-weight:normal'><span
style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Lugar y Fecha de Expedici&oacute;n: </span></b><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;'
lang="es" xml:lang="es">CASERIO MIRABAL 08/02/11.<u>
          <o:p></o:p>
        </u></span></p>
      <p class="MsoNormal" style='margin-right:-11.6pt'><b style='mso-bidi-font-weight:
normal'><span style='font-size:11.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Timbre Fiscal: </span></b><span
style='font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Este
        Documento no tiene validez si no se le colocan en la parte posterior timbres
        fiscales por Bs. 19.50, 00.
        <o:p></o:p>
    </span></p></td>
  </tr>
  <tr valign="top">
    <td valign="top" height="1502"><p class="MsoNormal2"><b style='mso-bidi-font-weight:normal'><span
style='font-size:11.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
      <o:p>&nbsp;</o:p>
      </span></b>
            <v:textbox style='mso-next-textbox:#_x0000_s1315'>
            <![if !mso]>
    </p>
        <table cellpadding="0" cellspacing="0" width="99%" >
          <tr valign="top">
            <td width="44%" height="81" valign="top"><![endif]>
                <div>
                  <p class="MsoNormal221" align="center" style='text-align:center'><b style='mso-bidi-font-weight:normal'><span
    style='mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE"><img src="imagenes/mE.jpg" width="350" height="86" /></span></b></p>
                  <p class="MsoNormal221"><b style='mso-bidi-font-weight:normal'><span
    style='mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE">
                    <o:p>&nbsp;</o:p>
                  </span></b></p>
                </div>
            <![if !mso]></td>
            <td width="24%">&nbsp;</td>
            <td width="32%"><p class="MsoNormal2111" align="left" style='text-align:center'><b
    style='mso-bidi-font-weight:normal'><u><span style='font-size:
    8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE">CERTIFICACI&Oacute;N
              DE CALIFICACIONES
              <o:p></o:p>
              </span></u></b></p>
                <p class="MsoNormal2111" align="left" style='text-align:center'><b
    style='mso-bidi-font-weight:normal'><span style='font-size:8.0pt;
    font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE">C&Oacute;DIGO DEL
                  FORMATO: RR-DEA-03-03
                  <o:p></o:p>
                </span></b></p>
              <p align="left" class="MsoNormal2111"><b style='mso-bidi-font-weight:normal'><span
    style='font-size:8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:
    ES-VE' lang="ES-VE" xml:lang="ES-VE">I. Plan de Estudio: </span></b><u><span style='font-size:
    8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE">EDUCACION
                MEDIA TECNICA </span></u><b style='mso-bidi-font-weight:normal'><span style='font-size:8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
    mso-ansi-language:ES-VE'
    lang="ES-VE" xml:lang="ES-VE">
                    <o:p></o:p>
                  </span></b></p>
              <p align="left" class="MsoNormal2111"><b style='mso-bidi-font-weight:normal'><span
    style='font-size:8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:
    ES-VE' lang="ES-VE" xml:lang="ES-VE">C&oacute;digo de Plan de Estudio: </span></b><u><span
    style='font-size:8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:
    ES-VE' lang="ES-VE" xml:lang="ES-VE">___45027_____ </span></u><b style='mso-bidi-font-weight:
    normal'><span style='font-size:8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
    mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE">
                  <o:p></o:p>
                </span></b></p>
              <p align="left" class="MsoNormal2111"><b style='mso-bidi-font-weight:normal'><span
    style='font-size:8.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:
    ES-VE' lang="ES-VE" xml:lang="ES-VE">Menci&oacute;n:</span></b><u><span style='font-size:8.0pt;
    font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:ES-VE' lang="ES-VE" xml:lang="ES-VE"><span
    style='mso-spacerun:yes'>&nbsp;&nbsp;</span></span><span class="Estilo10">ADMINISTRACI&Oacute;N DE  SERVICIOS EN SALUD</span></u><span class="Estilo10"><b
    style='mso-bidi-font-weight:normal'>
                  <o:p></o:p>
            </b></span><span class="Estilo10"></span></p></td>
          </tr>
      </table>
        <![endif]>
        <p class="MsoNormal2"><b style='mso-bidi-font-weight:normal'><span
style='font-size:11.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
          <o:p>&nbsp;</o:p>
        </span></b></p>
      <p class="MsoNormal2"><b style='mso-bidi-font-weight:normal'><span
style='font-size:11.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">II. Datos del Plantel
        o Zona Educativa que emite
        <st1:PersonName ProductID="la Certificaci&#65523;n"
w:st="on">la Certificaci&oacute;n</st1:PersonName>
        :
        <o:p></o:p>
        </span></b></p>
      <p class="MsoNormal2" style='text-align:justify;tab-stops:549.0pt'><span
class="SpellE2"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">C&oacute;d.DEA</span></span><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;'
lang="es" xml:lang="es">: <u>PD-00140203</u> <span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Nombre: <u>UNIDAD EDUCATIVA INTERCULTURAL
        BILING&Uuml;E SAN JOSE<span style='mso-spacerun:yes'>&nbsp; </span>DE MIRABAL<span
style='mso-spacerun:yes'>&nbsp; </span></u><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;</span><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;</span><span
style='mso-spacerun:yes'> &nbsp;</span><span class="SpellE2">Dtto</span>. Esc.<u> 01</u>
                <o:p></o:p>
        </span></p>
      <p class="MsoNormal2" style='text-align:justify'><span style='font-size:
9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Direcci&oacute;n: <u>CASERIO MIRABAL, EJE VIAL
        SUR DE PUERTO AYACUCHO. VIA SAMARIAPO </u><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;</span><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp; </span>Tel&eacute;fono: <u>0415 - 2125080</u>
                <o:p></o:p>
        </span></p>
      <p class="MsoNormal2" style='text-align:justify'><span
style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-ansi-language:PT-BR' lang="PT-BR" xml:lang="PT-BR">Munic&iacute;pio: <u>ATURES</u><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span class="SpellE2">Entidad</span> Federal: <u>ESTADO AMAZONAS</u><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Zona Educativa:<span
class="GramE2"><span style='mso-spacerun:yes'>&nbsp;&nbsp; </span></span><u>PUERTO AYACUCHO</u>
              <o:p></o:p>
        </span></p>
      <p class="MsoNormal2"><b style='mso-bidi-font-weight:normal'><span
style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">III. Datos de
        Identificaci&oacute;n del Alumno:
        <o:p></o:p>
        </span></b></p>
      <p class="MsoNormal2" style='text-align:justify'><span style='font-size:
9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Nacionalidad: <u>VENEZOLANA</u><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>C&eacute;dula<span
style='mso-spacerun:yes'>&nbsp; </span>Identidad: <u>V-<strong><u><?php echo $row_estudiante["cedula"]; ?></u></strong> </u><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;</span><span style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;</span>Fecha<span
style='mso-spacerun:yes'>&nbsp; </span>de<span style='mso-spacerun:yes'>&nbsp;&nbsp; </span>Nacimiento: <u><strong><u><?php echo $row_estudiante["fecha_nac"]; ?></u></strong>
                <o:p></o:p>
        </u></span></p>
      <p class="MsoNormal2"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Apellidos:<span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span><strong><u><?php echo $row_estudiante["apellido"]; ?></u></strong><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>Nombres: <u><strong><u><?php echo $row_estudiante["nombre"]; ?></u></strong>
                <o:p></o:p>
        </u></span></p>
      <p class="MsoNormal2" style='text-align:justify'><span style='font-size:
9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Lugar<span style='mso-spacerun:yes'>&nbsp; </span>de<span style='mso-spacerun:yes'>&nbsp;&nbsp; </span>Nacimiento:<span
style='mso-spacerun:yes'>&nbsp;&nbsp; </span><u>PATO GUAYABAL</u><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span
style='mso-spacerun:yes'>&nbsp;&nbsp;</span>Entidad<span style='mso-spacerun:yes'>&nbsp;&nbsp; </span>Federal: <u>TERRITORIO FEDERAL AMAZONAS
        <o:p></o:p>
        </u></span></p>
      <p class="MsoNormal2"><b style='mso-bidi-font-weight:normal'><span
style='font-size:11.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
          <o:p>&nbsp;</o:p>
        </span></b></p>
      <p class="MsoNormal3" style='text-align:justify'></p>
      <p class="MsoNormal3"><span style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
          <o:p>&nbsp;</o:p>
        </span></p>
      <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0"
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-padding-alt:0cm 3.5pt 0cm 3.5pt;mso-border-insideh:.5pt solid windowtext;
 mso-border-insidev:.5pt solid windowtext'>
          <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;page-break-inside:avoid;
  height:13.1pt'>
            <td width="392" colspan="4" valign="top" style='width:294.1pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
  style='font-size:11.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">IV. Planteles donde curs&oacute; estos
              estudios:</span></b><span style='font-size:11.0pt;mso-bidi-font-size:
  10.0pt' lang="es" xml:lang="es">
                          <o:p></o:p>
                      </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><h2 style='margin:0cm;margin-bottom:.0001pt'><span lang="es" xml:lang="es">N&deg;
                      <o:p></o:p>
            </span></h2></td>
            <td width="154" valign="top" style='width:115.4pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Nombre del Plantel
              <o:p></o:p>
            </span></b></p></td>
            <td width="121" valign="top" style='width:91.1pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Localidad
              <o:p></o:p>
            </span></b></p></td>
            <td width="36" valign="top" style='width:27.0pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">E.F.
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:1;height:13.1pt'>
            <td width="27" valign="top" style='width:19.9pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><h2 style='margin:0cm;margin-bottom:.0001pt'><span lang="es" xml:lang="es">N&deg;
                      <o:p></o:p>
            </span></h2></td>
            <td width="205" valign="top" style='width:153.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Nombre
              del Plantel
              <o:p></o:p>
            </span></b></p></td>
            <td width="123" valign="top" style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Localidad
              <o:p></o:p>
            </span></b></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">E.F.
              <o:p></o:p>
            </span></b></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">2
              <o:p></o:p>
            </span></b></p></td>
            <td width="154" valign="top" style='width:115.4pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="121" valign="top" style='width:91.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="36" valign="top" style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes;height:13.1pt'>
            <td width="27" valign="top" style='width:19.9pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">1
              <o:p></o:p>
            </span></b></p></td>
            <td width="205" valign="bottom" style='width:153.7pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">U.E.I.B &ldquo;SAN JOSE DE MIRABAL&rdquo;
                        <o:p></o:p>
            </span></b></p></td>
            <td width="123" valign="bottom" style='width:92.15pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
  style='font-size:9.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">CASERIO MIRABAL
              <o:p></o:p>
            </span></b></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">AM
              <o:p></o:p>
            </span></p></td>
            <td width="38" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">3
              <o:p></o:p>
            </span></b></p></td>
            <td width="154" valign="top" style='width:115.4pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="121" valign="top" style='width:91.1pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="36" valign="top" style='width:27.0pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:13.1pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:11.0pt;
  mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
          </tr>
      </table>
      <p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
style='font-size:2.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
          <o:p>&nbsp;</o:p>
        </span></b></p>
      <table class="MsoNormalTable" border="1" cellspacing="0" cellpadding="0"
 style='border-collapse:collapse;border:none;mso-border-alt:solid windowtext .5pt;
 mso-padding-alt:0cm 3.5pt 0cm 3.5pt;mso-border-insideh:.5pt solid windowtext;
 mso-border-insidev:.5pt solid windowtext'>
          <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;page-break-inside:avoid'>
            <td colspan="8" valign="top" style='width:414.4pt;border:none;
  padding:0cm 3.5pt 0cm 3.5pt'><h6 align="left" style='margin-left:0cm;text-align:left;text-indent:0cm;
  mso-list:none;tab-stops:35.4pt'><span lang="es" xml:lang="es">V. Pensum de Estudio:
              <o:p></o:p>
            </span></h6></td>
            <td width="14" rowspan="44" valign="top" style='width:8.0pt;border:none;border-right:solid windowtext 1.0pt;
  mso-border-right-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>              <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p>            <p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p></td>
            <td width="179" valign="top" style='width:133.95pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h6 align="left" style='margin-left:24.15pt;text-align:left;text-indent:-21.3pt;
  mso-list:l15 level1 lfo5;tab-stops:35.4pt'>
                <![if !supportLists]>
                <span style='mso-fareast-font-family:Arial;mso-bidi-font-family:Arial'
  lang="es" xml:lang="es"><span
  style='mso-list:Ignore'>VI.<span style='font:7.0pt &quot;Times New Roman&quot;'>&nbsp;&nbsp;&nbsp; </span></span></span>
                <![endif]>
                <span lang="es" xml:lang="es">PLANTEL
                  <o:p></o:p>
            </span></h6></td>
          </tr>
          <tr style='mso-yfti-irow:1;page-break-inside:avoid'>
            <td width="220" style='width:166.55pt;border:solid windowtext 1.0pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">A&ntilde;o
              o Grado: </span></b>4&ordm; A&Ntilde;O</p></td>
            <td colspan="2" style='width:106.3pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">Calificaci&oacute;n
              <o:p></o:p>
            </span></h4></td>
            <td width="36" rowspan="2" style='width:1.0cm;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">T-E
              <o:p></o:p>
            </span></h4></td>
            <td colspan="3" style='width:70.85pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">Fecha
              <o:p></o:p>
            </span></h4></td>
            <td width="61" style='width:42.35pt;border-top:solid windowtext 1.0pt;
  border-left:none;border-bottom:none;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-top-alt:solid windowtext .5pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Plantel
              <o:p></o:p>
            </span></b></p></td>
            <td width="179" rowspan="2" valign="top" style='width:133.95pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Apellidos
              y Nombres del Director(a):
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:2;page-break-inside:avoid;height:5.95pt'>
            <td width="220" style='width:166.55pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt;height:5.95pt'><p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Asignaturas
              <o:p></o:p>
            </span></b></p></td>
            <td width="46" style='width:35.4pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:5.95pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:8.0pt;
  font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">En
              N&deg;
                          <o:p></o:p>
            </span></b></p></td>
            <td width="97" style='width:70.9pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:5.95pt'><p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">En
              letras
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:5.95pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Mes
              <o:p></o:p>
            </span></b></p></td>
            <td width="57" style='width:42.5pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;height:5.95pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">A&ntilde;o
              <o:p></o:p>
            </span></b></p></td>
            <td width="61" style='width:42.35pt;border:none;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt;
  height:5.95pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">N&deg;
                        <o:p></o:p>
            </span></b></p></td>
          </tr>
          

          <tr style='mso-yfti-irow:14;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">CASTELLANO    Y LITERATURA</span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota41; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota41); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td width="57" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $ano4; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;background:white;mso-background-themecolor:background1;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" style='margin-left:35.4pt;text-indent:-35.4pt'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;'
  lang="es" xml:lang="es">Pbro.
              Lic. F&eacute;lix A. Brito M.
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:14;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">INGLES</span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota42; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo nombre($nota42); ?></span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td width="57" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo  $ano4; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">N&uacute;mero
              de C.I.:
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:14;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">MATEM&Aacute;TICA</span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota43; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota43); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td width="57" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo  $ano4; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">V-</span><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;;
  mso-ansi-language:PT-BR' lang="PT-BR" xml:lang="PT-BR">6.307.017</span><span style='font-family:
  &quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:14;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">CIENCIAS    BIOLOGICAS </span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota44; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota44); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td width="57" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $ano4; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Firma:
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:14;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">FISICA</span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota45; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota45); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td width="57" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $ano4; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" rowspan="2" valign="top" style='width:133.95pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:14;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">QUIMICA</span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota46; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota46); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td width="57" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo  $ano4; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:14;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">HISTORIA DE    VENEZUELA </span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota47; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota47); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td width="57" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo  $ano4; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" rowspan="10" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h2 align="center" class="Estilo11" style='margin:0cm;margin-bottom:.0001pt'><span lang="es" xml:lang="es">SELLO DEL
              <o:p></o:p>
              </span></h2>
                <h2 align="center" style='margin:0cm;margin-bottom:.0001pt'><span class="Estilo11" lang="es" xml:lang="es">PLANTEL</span><span lang="es" xml:lang="es">
                <o:p></o:p>
              </span></h2></td>
          </tr>
          <tr style='mso-yfti-irow:14;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">INSTRUCCI&Oacute;N    PREMILITAR </span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota48; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota48); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td width="57" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $ano4; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:14;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">INFORMATICA </span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota49; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota49); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td width="57" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo  $ano4; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:14;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">EDUC. FISICA Y DEPORTE</span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota410; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota410); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td width="57" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo  $ano4; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:14;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***</span></b><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"> </span><b style='mso-bidi-font-weight:
  normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span></b></p></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">*
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" valign="top" style='width:1.0cm;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="57" valign="top" style='width:42.5pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:15;page-break-inside:avoid'>
            <td width="220" style='width:166.55pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">A&ntilde;o
              o Grado:<span style='mso-spacerun:yes'>&nbsp; </span></span></b><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">5&ordm;
                A&Ntilde;O<span style='mso-spacerun:yes'>&nbsp; </span><b style='mso-bidi-font-weight:
  normal'>
                            <o:p></o:p>
                        </b></span></p></td>
            <td colspan="2" style='width:106.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es"><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Calificaci&oacute;n
              <o:p></o:p>
            </span></h4></td>
            <td width="36" rowspan="2" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">T-E
              <o:p></o:p>
            </span></h4></td>
            <td colspan="3" style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">Fecha
              <o:p></o:p>
            </span></h4></td>
            <td width="61" style='width:42.35pt;border:none;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Plantel
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:16;page-break-inside:avoid'>
            <td width="220" style='width:166.55pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Asignaturas
              <o:p></o:p>
            </span></b></p></td>
            <td width="46" style='width:35.4pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-size:8.0pt;
  font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">En
              N&deg;
                          <o:p></o:p>
            </span></b></p></td>
            <td width="97" style='width:70.9pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">En letras
              <o:p></o:p>
            </span></b></p></td>
            <td width="98" style='width:27.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Mes
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" style='width:43.2pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">A&ntilde;o
              <o:p></o:p>
            </span></b></p></td>
            <td width="61" style='width:42.35pt;border:none;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">N&deg;
                        <o:p></o:p>
            </span></b></p></td>
          </tr>
          

          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">LITERATURA VENEZOLANA</span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota51; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota51); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano5; ?></span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;background:white;mso-background-themecolor:background1;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">INGLES</span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota52; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo nombre($nota52); ?></span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano5; ?></span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">MATEM&Aacute;TICA</span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota53; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota53); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano5; ?></span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">CIENCIAS BIOLOGICAS</span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota54; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota54); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano5; ?></span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" rowspan="3" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Para efectos de su validez
              <o:p></o:p>
              </span></p>
                <p class="MsoNormal" align="center" style='text-align:center'><span class="GramE"><span style='font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;'
  lang="es" xml:lang="es">a</span></span><span
  style='font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es"> nivel estadal.</span><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                  <o:p></o:p>
              </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">FISICA </span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota55; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota55); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano5; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">QUIMICA </span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota56; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota56); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt;height:7.6pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt;height:7.6pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt;height:7.6pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano5; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt;height:7.6pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">GEOGRAFIA ECONOMICA </span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota57; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota57); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano5; ?></span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">HISTORIA DE VENEZUELA </span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota58; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota58); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano5; ?></span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">INSTRUCCI&Oacute;N PREMILITAR</span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota59; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota59); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano5; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-bottom-alt:solid windowtext .5pt;mso-border-right-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Director(a):
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">INFORMATICA </span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota510; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota510); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano5; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">EDUC. &nbsp;FISICA Y DEPORTE</span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota511; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota511); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano5; ?></span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">N&uacute;mero
              de C.I.:
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><span class="Estilo4">PRE &ndash; PASANTIA </span></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo $nota512; ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"><?php echo nombre($nota512); ?>
                      <o:p></o:p>
            </span></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">F
              <o:p></o:p>
            </span></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">07
              <o:p></o:p>
            </span></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><?php echo  $ano5; ?></span><span lang="es" xml:lang="es">
                <o:p></o:p>
            </span></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">01
              <o:p></o:p>
            </span></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:28;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***</span></b><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es"> </span><b style='mso-bidi-font-weight:
  normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:
  &quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
            </span></b></p></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">*
              <o:p></o:p>
            </span></b></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Firma:
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:29;page-break-inside:avoid'>
            <td width="220" style='width:166.55pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
  style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">A&ntilde;o
              o Grado: </span></b><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es"><span
  style='mso-spacerun:yes'>&nbsp;</span>6&ordm; A&Ntilde;O <b style='mso-bidi-font-weight:normal'>
                          <o:p></o:p>
                      </b></span></p></td>
            <td colspan="2" style='width:106.3pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es"><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Calificaci&oacute;n
              <o:p></o:p>
            </span></h4></td>
            <td width="36" rowspan="2" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">T-E
              <o:p></o:p>
            </span></h4></td>
            <td colspan="3" style='width:70.85pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><h4><span style='font-size:10.0pt' lang="es" xml:lang="es">Fecha
              <o:p></o:p>
            </span></h4></td>
            <td width="61" style='width:42.35pt;border:none;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Plantel
              <o:p></o:p>
            </span></b></p></td>
            <td width="179" valign="top" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p>&nbsp;</o:p>
            </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:30;page-break-inside:avoid'>
            <td width="220" style='width:166.55pt;border:solid windowtext 1.0pt;border-top:
  none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="46" style='width:35.4pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="97" style='width:70.9pt;border-top:none;border-left:none;border-bottom:
  solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;mso-border-top-alt:
  solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="98" style='width:27.65pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td colspan="2" style='width:43.2pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="61" style='width:42.35pt;border:none;border-right:solid windowtext 1.0pt;
  mso-border-left-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-right-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="179" rowspan="11" style='width:133.95pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">SELLO DE LA</span></b><b
  style='mso-bidi-font-weight:normal'><span style='font-size:9.0pt;
  font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
                <o:p></o:p>
              </span></b></p>
                <p class="MsoNormal" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">ZONA EDUCATIVA
                  <o:p></o:p>
              </span></b></p></td>
          </tr>
          <tr style='mso-yfti-irow:31;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="61" valign="top" style='width:42.35pt;border:solid windowtext 1.0pt;
  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
  solid windowtext .5pt;background:white;mso-background-themecolor:background1;
  padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:32;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:33;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:34;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:35;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:36;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:37;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:38;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:39;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:40;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:41;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  background:white;mso-background-themecolor:background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;background:white;mso-background-themecolor:
  background1;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="179" rowspan="3" valign="top" style='width:133.95pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal" align="center" style='text-align:center'><span
  style='font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">Para efectos de su validez a nivel
              nacional e internacional y cuando se trate de estudios libres o equivalentes
              sin escolaridad.
              <o:p></o:p>
            </span></p></td>
          </tr>
          <tr style='mso-yfti-irow:42;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'>&nbsp;</td>
          </tr>
          <tr style='mso-yfti-irow:43;mso-yfti-lastrow:yes;page-break-inside:avoid'>
            <td width="220" valign="top" style='width:166.55pt;border:solid windowtext 1.0pt;
  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
  padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="46" valign="top" style='width:35.4pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="97" valign="top" style='width:70.9pt;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="36" valign="top" style='width:1.0cm;border-top:none;border-left:none;
  border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">*
              <o:p></o:p>
            </span></b></p></td>
            <td width="98" valign="top" style='width:27.65pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td colspan="2" valign="top" style='width:43.2pt;border-top:none;
  border-left:none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
            <td width="61" valign="top" style='width:42.35pt;border-top:none;border-left:
  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
  mso-border-alt:solid windowtext .5pt;padding:0cm 3.5pt 0cm 3.5pt'><p class="MsoNormal3" align="center" style='text-align:center'><b
  style='mso-bidi-font-weight:normal'><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
  mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">***
              <o:p></o:p>
            </span></b></p></td>
          </tr>
          <![if !supportMisalignedColumns]>
          <tr height="0">
            <td width="220" style='border:none'></td>
            <td width="46" style='border:none'></td>
            <td width="97" style='border:none'></td>
            <td width="36" style='border:none'></td>
            <td width="98" style='border:none'></td>
            <td width="0" style='border:none'></td>
            <td width="57" style='border:none'></td>
            <td width="61" style='border:none'></td>
            <td width="14" style='border:none'></td>
            <td width="178" style='border:none'></td>
          </tr>
          <![endif]>
      </table>
      <p class="MsoNormal3"><b style='mso-bidi-font-weight:normal'><span
style='font-size:2.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;;
mso-bidi-font-family:&quot;Times New Roman&quot;' lang="es" xml:lang="es">
          <o:p>&nbsp;</o:p>
        </span></b></p>
      <h6 align="left">VIII.&nbsp; Programas Aprobados de Educaci&oacute;n para el  Trabajo: GRADO / NOMBRE / HORAS ALUMNO SEM.</h6>
      <table border="1" cellspacing="0" cellpadding="0" width="91%">
          <tr>
            <td width="5%" valign="top"><p align="center"><strong>***</strong></p></td>
            <td width="17%" valign="top"><p align="center"><strong>*****</strong></p></td>
            <td width="11%" valign="top"><p align="center"><strong>*****</strong></p></td>
            <td width="4%" valign="top"><p align="center"><strong>**</strong></p></td>
            <td width="20%" valign="top"><p align="center"><strong>*****</strong></p></td>
            <td width="9%" valign="top"><p align="center"><strong>*****</strong></p></td>
            <td width="4%" valign="top"><p align="center"><strong>**</strong></p></td>
            <td width="14%" valign="top"><p align="center"><strong>*****</strong></p></td>
            <td width="10%" valign="top"><p align="center"><strong>*****</strong></p></td>
          </tr>
          <tr>
            <td width="5%" valign="top"><p align="center"><strong>***</strong></p></td>
            <td width="17%" valign="top"><p align="center"><strong>*****</strong></p></td>
            <td width="11%" valign="top"><p align="center"><strong>*****</strong></p></td>
            <td width="4%" valign="top"><p align="center"><strong>**</strong></p></td>
            <td width="20%" valign="top"><p align="center"><strong>*****</strong></p></td>
            <td width="9%" valign="top"><p align="center"><strong>*****</strong></p></td>
            <td width="4%" valign="top"><p align="center"><strong>**</strong></p></td>
            <td width="14%" valign="top"><p align="center"><strong>*****</strong></p></td>
            <td width="10%" valign="top"><p align="center"><strong>*****</strong></p></td>
          </tr>
      </table>
      <h6 style='margin-left:0cm;text-align:justify;text-indent:0cm;mso-list:none;
tab-stops:35.4pt'><span style="margin-left:0cm;text-align:left;text-indent:0cm;
mso-list:none;tab-stops:35.4pt"><span lang="es" xml:lang="es">IX. Observaciones: </span><span style='font-weight:normal'
lang="es" xml:lang="es">_________________________________________________________________________
        _____________________________________________________________ </span></span></h6>
      <h6 style='margin-left:0cm;text-align:justify;text-indent:0cm;mso-list:none;
tab-stops:35.4pt'><span style="margin-left:0cm;text-align:left;text-indent:0cm;
mso-list:none;tab-stops:35.4pt"><span style='font-weight:normal'
lang="es" xml:lang="es">________________________________________________________________________________________________________________________________________________________.- </span><span lang="es" xml:lang="es">
          <o:p></o:p>
        </span></span></h6>
      <p class="MsoNormal2" style='margin-right:-11.6pt'><span lang="es" xml:lang="es">
          <o:p>&nbsp;</o:p>
        </span></p>
      <p class="MsoNormal2" style='margin-right:-11.6pt'><b style='mso-bidi-font-weight:
normal'><span style='font-size:11.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">X. </span></b><b style='mso-bidi-font-weight:normal'><span
style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Lugar y Fecha de Expedici&oacute;n: </span></b><span style='font-family:&quot;Arial&quot;,&quot;sans-serif&quot;'
lang="es" xml:lang="es">CASERIO MIRABAL 08/02/11.<u>
          <o:p></o:p>
        </u></span></p>
      <p class="MsoNormal2" style='margin-right:-11.6pt'><b style='mso-bidi-font-weight:
normal'><span style='font-size:11.0pt;mso-bidi-font-size:10.0pt;
font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Timbre Fiscal: </span></b><span
style='font-size:8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">Este
        Documento no tiene validez si no se le colocan en la parte posterior timbres
        fiscales por Bs. 19.50, 00.
        <o:p></o:p>
        </span></p>
      <div align="center">
            <input type="hidden" name="cedula" value="<? echo $cedula; ?>"  >
	 <input type="hidden" name="ver" value="1"  >
	  <input type="submit" v name="imprimir" value="Imprimir" <? if($_GET["ver"]==1){ 
	  echo "style='visibility:hidden'";}?>
	 />
      </div>
      <p class="MsoNormal2" style='margin-right:-11.6pt'><span style='font-size:
8.0pt;mso-bidi-font-size:10.0pt;font-family:&quot;Arial&quot;,&quot;sans-serif&quot;' lang="es" xml:lang="es">
          <o:p>&nbsp;</o:p>
      </span></p>
    </td>
  </tr>
</table>
</form>
</body>
</html>
