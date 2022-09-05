<?php
require_once("../conexion.php");
require_once("../funciones.php");
session_start();
//Para que se apliquen los cambios de $_SESSION se debe DESTRUIR LA SESION ACTUAL
$idcliente=$_SESSION['idcliente'];
$nombreCliente=$_SESSION['nombres'];
$profilePic=$_SESSION['profilepic'];
$_SESSION['a']=$profilePic;
$conexion= conectarDB();
if(!isset($_SESSION['usermail'])){
    sleep(1);
    header("location: ../login-system/loginScreen.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="../../css/estilos-perfil.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body id="page">
    <div id="wrapper" class="div-wrapper"> 
        <div id="top-wrapper" class="divtop-wrapper">
            <div class="div-backhome">
                <a class="a-btnhome" href="../index1.php" role="button">
                    IMMO CRM360
                </a>             
            </div>
            <div class="div-logout">
                <a class="a-logout" href="../login-system/logoutClient.php" role="button">
                    Salir
                </a>
            </div>
        </div>

        <div id="content-wrapper" class="divcontent-wrapper">
            <div id="pics-conf" class="divpics-conf">
                <form id="formProPic" class="formProPic" action="uploadImage.php" method="POST" enctype="multipart/form-data">
                    <div class="profile-pic">
                        <img src="../../imgs/<?php echo $_SESSION['a'];?>" width=370 height=370/>
                    </div>
                    <div class="pic-change">
                        <input type="file" name="uploadImage" id="uploadImage" accept=".jpg, .jpeg, .png" value="a">
                        <input type="submit" name="submit" value="Subir imagen">
                    </div>
                </form>
            </div>
            <div id="info-conf" class="divinfo-conf">
                <h1><?php echo $nombreCliente; ?> </h1>
            </div>
            <div id="edit-conf" class="divedit-conf">
                <ul class="perfil-edit-conf" id="perfilEditSidebar">
                    <button>
                        ?
                    </button>
                </ul>
            </div>
        </div>
        <footer>
            hi 
         </footer>
    </div>
</body>
</html>

