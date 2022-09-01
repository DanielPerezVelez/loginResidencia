<?php
require_once("../conexion.php");
require_once("../funciones.php");
session_start();
//Para que se apliquen los cambios de $_SESSION se debe DESTRUIR LA SESION ACTUAL
$idcliente=$_GET['id'];
$conexion= conectarDB();
if(!isset($_SESSION['usermail'])){
    sleep(1);
    header("location: loginScreen.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <?php
        if(isset($idcliente)){
            $query="SELECT * FROM cliente WHERE idcliente=$idcliente";
            $resultado=mysqli_query($conexion,$query);
            while($row=mysqli_fetch_array($resultado)){?>
<h1><?php echo $_SESSION['nombres']; ?> </h1>
    <?php
            }
        }
    ?>
<a href='logoutClient.php'> Salir </a>
    
</body>
</html>