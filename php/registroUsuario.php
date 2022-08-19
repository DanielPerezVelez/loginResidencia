<?php
require_once("conexion.php");
$conexion= conectarDB();
$nombres= $_POST ['registerNombres'];
$apellidos= $_POST ['registerApellidos'];
$telefono=$_POST ['registerTelefono'];
$correo= $_POST ['registerCorreo'];
$password= $_POST ['registerPassword'];

if(buscarCorreoRepetido($correo,$conexion)==1){
    sleep(1);
    header("location: ../loginScreen.php?errorCorreo=true");    
}
if(buscarTelefonoRepetido($telefono,$conexion)==1){
    sleep(1);
    header("location: ../loginScreen.php?errorTelefono=true");    
}
if(buscarCorreoRepetido($correo,$conexion)==0 && buscarTelefonoRepetido($telefono,$conexion)==0){ //Si no está duplicado, el sistema podrá ingresar el registro a la base de datos
    $query= "INSERT INTO usuarios(nombres, apellidos, correo, password, telefono)
    VALUES ('$nombres','$apellidos','$correo','$password','$telefono')";
    $resultado = mysqli_query($conexion,$query);
    sleep(1);
    header("location: ../loginScreen.php?registroValido=true");
}

//Se crea una función para que busque registros repetidos a partir de las variables
function buscarCorreoRepetido($correo,$conexion){
    $query="SELECT * FROM usuarios WHERE correo='$correo'";
    $resultado=mysqli_query($conexion,$query);
    if(mysqli_num_rows($resultado) > 0){
        return 1;
    }else{
        return 0;
    }
}

function buscarTelefonoRepetido($telefono,$conexion){
    $query="SELECT * FROM usuarios WHERE telefono='$telefono'";
    $resultado=mysqli_query($conexion,$query);
    if(mysqli_num_rows($resultado) > 0){
        return 1;
    }else{
        return 0;
    }
}

 mysqli_close($conexion);