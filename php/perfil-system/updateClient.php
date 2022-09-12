<?php
require_once("../conexion.php");
require_once("../funciones.php");
$conexion= conectarDB();
session_start();
$nombres= clean($_POST ['input-nombre']);
$apellidos= clean($_POST ['input-apellido']);
$aboutme=clean($_POST ['txtarea-aboutme']);
$cdr= clean($_POST ['input-cdr']);
$cdo= clean($_POST ['input-cdo']);
$sexo= clean($_POST ['input-sexo']);
$adn= clean($_POST ['input-adn']);
$nacionalidad= clean($_POST ['select-nac']);
$idcliente=$_SESSION['idcliente'];

$_SESSION['nombres']=$nombres;
$_SESSION['apellidos']=$apellidos;
$_SESSION['aboutme']=$aboutme;
$_SESSION['ciudadresi']=$cdr;
$_SESSION['ciudadorigen']=$cdo;
$_SESSION['sexo']=$sexo;
$_SESSION['anionac']=$adn;
$_SESSION['nacionalidad']=$nacionalidad;
$query="UPDATE cliente SET nombres='$nombres', apellidos='$apellidos', idnacionalidad='$nacionalidad', aboutme='$aboutme', ciudadresi='$cdr', ciudadorigen='$cdo', sexo='$sexo', anionac='$adn' WHERE idcliente='$idcliente' ";
$resultado = mysqli_query($conexion,$query);
sleep(1);
header("location: perfil.php");