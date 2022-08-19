<?php
require_once("conexion.php");
$conexion= conectarDB();

$correo= $_POST ['loginCorreo'];
$password= $_POST ['loginPassword'];

if(validar($correo,$password,$conexion)==1){
   echo "success";
    
}

function validar($correo,$password,$conexion){
    $query="SELECT * FROM usuarios WHERE correo='$correo' AND password='$password'";
    $resultado=mysqli_query($conexion,$query);
    //Aqui compara si la consulta es verdadera, de ser verdadera (que haya registros similares) se completará el login
    if(mysqli_num_rows($resultado) > 0){
        return 1;
    }else{
        sleep(1);
        header("location: ../loginScreen.php?errorLogin=true");
    }
}

mysqli_close($conexion);