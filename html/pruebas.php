<?php

    session_start();

    $correo= $_SESSION['username'];
    echo "<h1>$correo</h1>";
    echo "<a href='../php/logoutClient.php'> Salir </a>";

?>