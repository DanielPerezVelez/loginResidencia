<?php
require_once("../conexion.php");
require_once("../funciones.php");
session_start();
//Para que se apliquen los cambios de $_SESSION se debe DESTRUIR LA SESION ACTUAL
$idcliente=$_SESSION['idcliente'];
$correoCliente=$_SESSION['usermail'];
$nombreCliente=$_SESSION['nombres'];
$apellidosCliente=$_SESSION['apellidos'];
$aboutme=$_SESSION['aboutme'];
$cdr=$_SESSION['ciudadresi'];
$cdo=$_SESSION['ciudadorigen'];
$sexo=$_SESSION['sexo'];
$adn=$_SESSION['anionac'];
$nacionalidad=$_SESSION['nacionalidad'];
$profilePic=$_SESSION['profilepic'];
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
                        <img src="../../imgs/<?php echo $profilePic;?>" width=370 height=370/>
                    </div>
                    <div class="pic-change">
                        <input type="file" name="uploadImage" id="uploadImage" accept=".jpg, .jpeg, .png" value="a">
                        <input type="submit" name="submit" value="Subir imagen">
                    </div>
                </form>
            </div>
            <div id="info-conf" class="divinfo-conf">
                <div class="div-h1info">
                    <h1>Información de perfil</h1>
                </div>
                <form class="form-info">
                    <div class="div-form-info">
                        <a class="a-nombre">Nombre(s):</a>
                        <a><?php echo "$nombreCliente.";?></a>
                        <br><br><br>
                        <a class="a-apellido">Apellido(s):</a>
                        <a><?php echo "$apellidosCliente";?></a>
                        <br><br><br>
                        <div>
                        <a class="a-nac">Nacionalidad:</a>
                            <a class="a-nac2">
                                <?php
                                    if($_SESSION['nacionalidad']==''){
                                        echo "No especificado";
                                    }else{
                                        echo "$nacionalidad";
                                    }
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="div-form-aboutme">
                        <h1>Acerca de mi</h1>
                        <br><br>
                        <textarea class="textarea-aboutme">
                            <?php
                                if($_SESSION['aboutme']==''){
                                    echo "Escribe algo sobre ti...";
                                }else{
                                    echo "$aboutme";
                                }
                            ?>
                        </textarea>
                    </div>    
                </form>
            </div>
            <div id="edit-conf" class="divedit-conf">
                <div class="div-hrefs">
                    <br>
                    <a class="a-editperfil" href="editarPerfil.php">Editar perfil.</a>
                    <br><br>
                    <a class="a-guardados" href="">Guardados</a>
                    <br><br>
                    <a class="a-interesantes" href="">Interesantes</a>
                    <br><br>
                </div>
                <div class="div-infoad">
                    <br>
                    <h4>Ciudad de residencia</h4>
                    <a class="a-nac2">
                        <?php
                            if($_SESSION['ciudadresi']==''){
                                echo "No especificado";
                            }else{
                                echo "$cdr";
                            }
                        ?>
                    </a>
                    <br><br><br>
                    <h4>Ciudad de origen</h4>
                    <a class="a-nac2">
                        <?php
                            if($_SESSION['ciudadorigen']==''){
                                echo "No especificado";
                            }else{
                                echo "$cdo";
                            }
                        ?>
                    </a>
                    <br><br><br>
                    <h4>Sexo</h4>
                    <a class="a-nac2">
                        <?php
                            if($_SESSION['sexo']==''){
                                echo "No especificado";
                            }else{
                                echo "$sexo";
                            }
                        ?>
                    </a>
                    <br><br><br>
                    <h4>Año de nacimiento</h4>
                    <a class="a-nac2">
                        <?php
                            if($_SESSION['anionac']==''){
                                echo "No especificado";
                            }else{
                                echo "$adn";
                            }
                        ?>
                    </a>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

