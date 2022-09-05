<?php
require_once("../conexion.php");
require_once("../funciones.php");
session_start();

$conexion= conectarDB();
$correo= clean($_POST ['loginCorreo']);
$password= md5($_POST ['loginPassword']);

$query="SELECT * FROM cliente WHERE correo='$correo' AND password='$password'";
$resultado=mysqli_query($conexion,$query);
//Aqui compara si la consulta es verdadera, de ser verdadera (que haya registros similares) se completará el login
if(mysqli_num_rows($resultado) > 0){
    while($row=mysqli_fetch_array($resultado)){
        if($correo==$row["correo"] && $password==$row["password"]){
            $_SESSION['usermail']=$correo;
            $_SESSION['idcliente']=$row['idcliente'];
            $_SESSION['nombres']=$row['nombres'];
            $_SESSION['profilepic']=$row['profilepic'];
            //te manda al dashboard
            header("location: ../index1.php");
        }
    }
}else{
    //Error de login
    sleep(1);
    header("location: loginScreen.php?errorLogin=true");
}

mysqli_close($conexion);