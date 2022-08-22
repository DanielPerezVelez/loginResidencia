<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    <link rel="stylesheet" href="css/estilos.css"/>
    <script defer src="js/scriptEmptyFields.js"></script>
</head>
<body>
    <main>
        <div class="contenedor_todo">      
            <!-- Cajas -->
            <div class="caja_trasera">
                <div class="caja_trasera_login">
                    <h3>Ya tienes cuenta?</h3>
                    <p>Inicia sesion para logearte</p>
                    <button id="btnCaTrLo">Iniciar sesion</button>
                </div>

                <div class="caja_trasera_register">
                    <h3 class="cuenta">¿Aún no tienes una cuenta?</h3>
                    <p>Regístrate para que puedas iniciar sesion</p>
                    <button id="btnCaTrRe">Registrarse</button>
                </div>       
            </div>           
            <!-- Formularios -->
            <div class="contenedor_login_register">   
                <form action="php/validarUsuario.php" method="POST" class="formulario_login">
                    <h2>Iniciar Sesion</h2>
                    <input required type="text" placeholder="Correo" name="loginCorreo">
                    <input required type="password" placeholder="Contraseña" name="loginPassword">
                    <div class="divBtnFoLo">
                        <button id="btnFoLo"> Entrar </button>
                    </div>
                    <br>
                    <?php if(isset($_GET['registroValido'])){
                        ?>
                        <script src="js/mostrarLo.js"></script>
                        <a class="aExito">¡Usuario registrado exitosamente!</a>
                        <?php
                    }?>
                    <?php if(isset($_GET['errorLogin'])){
                        ?>
                        <script src="js/mostrarLo.js"></script>
                        <a class="aFallo">¡Correo o contraseña incorrectas!</a>
                        <?php
                    }?>
                </form>

                <form id="formRegister" action="php/registroUsuario.php" method="POST" class="formulario_register">
                    <h2>Registrarse</h2>
                    <div>
                        <input required type="text" placeholder="Nombre(s)" class="registerNombreClass" name="registerNombres">
                        <input required type="text" placeholder="Apellido(s)" class="registerApellidoClass" name="registerApellidos">
                        <input required type="text" placeholder="Telefono" class="registerTelefonoClass" name="registerTelefono">
                        <input required id="inputCorreoRe" type="text" placeholder="Correo" class="registerCorreoClass" name="registerCorreo">
                        <input required id="inputPasswordRe" type="password" placeholder="Contraseña" class="registerPasswordClass" name="registerPassword">
                    </div>
                    <br>
                    <h4>¿Qué desea hacer?</h4>
                    <br>
                    <select class="selectRol" name= "selectRol" id="selectRol">
                        <option value="admin">Administrar sus propiedades</option>
                        <option value="clienteCompra">Adquirir una propiedad</option>
                        <option value="clienteVende">Ofrecer propiedades a clientes</option>
                    </select>
                    <a class="aFallo" id="error"></a>
                    <div class="divBtnFoRe">
                        <button id="btnFoRe"> Registrarse </button>
                    </div>
                    <br>
                    <?php if(isset($_GET['errorCorreo'])){
                        ?>
                        <script src="js/mostrarRe.js"></script>
                        <div class="divErrores1">
                            <a class="aFallo">El correo ya ha sido utilizado con anterioridad.</a>
                            <br>
                            <a class="aFallo">Inicia sesion para continuar.</a>
                        </div>
                        <?php
                        }
                        if(isset($_GET['errorTelefono'])){
                        ?>
                        <script src="js/mostrarRe.js"></script>
                        <div class="divErrores2">
                            <a class="aFallo">El teléfono que ingresaste ya está ocupado.</a>
                            <br>
                            <a class="aFallo">Elige uno diferente para continuar.</a>
                        </div>
                        <?php
                    }?>
                </form>
            </div>
        </div>
    </main>
    <script src="js/script.js"></script>
    <!--<script src="js/scriptEmptyFields.js"></script>-->
</body>
</html>
