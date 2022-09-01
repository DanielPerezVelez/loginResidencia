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
    <link href="../../css/estilos-perfil.css" rel="stylesheet">
</head>

<body id="page">
    <div id="wrapper" class="div-wrapper"> 
        <div id="top-wrapper" class="divtop-wrapper">
            <div class="div-backhome">
                <a class="a-btnhome" href="../index1.php" role="button">
                IMMO CRM360
                </a>             
            </div>
            <div class="div-help">
                <a class="a-help" href="../../html/homeInterfaz.html" role="button">
                    ?
                </a> 
            </div>
            <div class="div-logout">
                <a class="a-logout" href="logoutClient.php" role="button">
                    Salir
                </a>
            </div>
        </div>

        <div id="content-wrapper" class="divcontent-wrapper">
            <div id="pics-conf" class="divpics-conf">
                <div class="profile-pic">
                    <button>
                        hi
                    </button> 
                </div>
                <div class="pic-change">
                    <button>
                        there
                    </button>
                </div>            
            </div>
            <div id="info-conf" class="divinfo-conf">
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

