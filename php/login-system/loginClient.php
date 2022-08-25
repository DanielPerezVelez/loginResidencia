<?php
require_once("../conexion.php");
require_once("../funciones.php");
session_start();

$conexion= conectarDB();
$correo= clean($_POST ['loginCorreo']);
$password= md5($_POST ['loginPassword']);

if(validar($correo,$password,$conexion)==1){
    $_SESSION['username'] = $correo;
    header("location: ../../html/pruebas.php");
}

function validar($correo,$password,$conexion){
    $query="SELECT * FROM cliente WHERE correo='$correo' AND password='$password'";
    $resultado=mysqli_query($conexion,$query);
    //Aqui compara si la consulta es verdadera, de ser verdadera (que haya registros similares) se completará el login
    if(mysqli_num_rows($resultado) > 0){
        return 1;
    }else{
        //Error de login
        sleep(1);
        header("location: loginScreen.php?errorLogin=true");
    }
}

mysqli_close($conexion);