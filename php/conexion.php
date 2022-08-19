
<?php

function conectarDB() : mysqli {
    $conexion = mysqli_connect('localhost', 'root', '', 'bdimmo1');

    if(!$conexion) {
        echo "error";
        exit;
    }
    return $conexion;
}


