<?php
require_once("../conexion.php");
require_once("../funciones.php");
$conexion= conectarDB();
$nombres= clean($_POST ['registerNombres']);
$apellidos= clean($_POST ['registerApellidos']);
$telefono=clean($_POST ['registerTelefono']);
$correo= clean($_POST ['registerCorreo']);
$password= md5($_POST ['registerPassword']);
$rolclt= clean($_POST ['selectRol']);
$defaultPic="default-client-pic.png";

if(buscarCorreoRepetido($correo,$conexion)==1){
    sleep(1);
    header("location: loginScreen.php?errorCorreo=true");    
}
if(buscarTelefonoRepetido($telefono,$conexion)==1){
    sleep(1);
    header("location: loginScreen.php?errorTelefono=true");    
}
if(buscarCorreoRepetido($correo,$conexion)==0 && buscarTelefonoRepetido($telefono,$conexion)==0){ //Si no está duplicado, el sistema podrá ingresar el registro a la base de datos
    $query= "INSERT INTO cliente(nombres, apellidos, correo, password, telefono, idrolclt, profilepic)
    VALUES ('$nombres','$apellidos','$correo','$password','$telefono', $rolclt, '$defaultPic')";
    $resultado = mysqli_query($conexion,$query);
    sleep(1);
    header("location: loginScreen.php?registroValido=true");
}

//Se crea una función para que busque registros repetidos a partir de las variables
function buscarCorreoRepetido($correo,$conexion){
    $query="SELECT * FROM cliente WHERE correo='$correo'";
    $resultado=mysqli_query($conexion,$query);
    if(mysqli_num_rows($resultado) > 0){
        return 1;
    }else{
        return 0;
    }
}

function buscarTelefonoRepetido($telefono,$conexion){
    $query="SELECT * FROM cliente WHERE telefono='$telefono'";
    $resultado=mysqli_query($conexion,$query);
    if(mysqli_num_rows($resultado) > 0){
        return 1;
    }else{
        return 0;
    }
}

 mysqli_close($conexion);