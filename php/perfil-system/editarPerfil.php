<?php
require_once("../conexion.php");
require_once("../funciones.php");
session_start();
//Para que se apliquen los cambios de $_SESSION se debe DESTRUIR LA SESION ACTUAL
$idcliente=$_SESSION['idcliente'];
$correoCliente=$_SESSION['usermail'];
$nombreCliente=$_SESSION['nombres'];
$apellidosCliente=$_SESSION['apellidos'];
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
    <link href="../../css/estilos-edit-perfil.css" rel="stylesheet">
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
            <form action="updateClient.php" class="form-update" method="POST">
                <div class="xd">
                    <div id="info-conf" class="divinfo-conf">
                        <div class="div-h1info">
                            <h1>Editar mi perfil</h1>
                        </div>
                        <div class="div-info">
                            <div class="div-form-info">
                                <br>
                                <a class="a-nombre">Nombre(s):</a>
                                <br>
                                <input class="input-nombre" name="input-nombre" placeholder="<?php echo $nombreCliente;?>">
                                <br>
                                <a class="a-apellido">Apellido(s):</a>
                                <br>
                                <input class="input-apellido" name="input-apellido"placeholder="<?php echo $apellidosCliente;?>">
                                <br>
                                <div>
                                    <a class="a-nac">Nacionalidad:</a>
                                    <br>
                                    <select class ="select-nac" name= "select-nac">
                                        <?php
                                            //Creacion de conexion
                                            $sql='SELECT * FROM nacionalidades';
                                            $query=mysqli_query($conexion,$sql);       
                                            while($row=mysqli_fetch_array($query)){
                                                $idnacionalidad=$row['idnacionalidad'];
                                                $nacionalidad=$row['nacionalidad'];
                                        ?>
                                    <option value="<?php echo $idnacionalidad ?>"><?php echo $nacionalidad?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="div-form-aboutme">
                                <h1>Acerca de mi</h1>
                                <br>
                                <textarea class="txtarea-aboutme" name="txtarea-aboutme"></textarea>
                            </div> 
                        </div>        
                    </div>
                    <div id="info-ad" class="divinfo-ad">
                        <button>Guardar cambios</button>
                        <div class="div-blanco">
                            <div class="div-laterales">
                            <br>
                            <h4>Ciudad de residencia</h4>
                            <input class="input-cdr" name="input-cdr">
                            <br><br>
                            <h4>Ciudad de origen</h4>
                            <input class="input-cdo" name="input-cdo">
                            <br><br>
                            <h4>Sexo</h4>
                            <input class="input-sexo" name="input-sexo">
                            <br><br>
                            <h4>Año de nacimiento</h4>
                            <input class="input-adn" name="input-adn">
                            <br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>