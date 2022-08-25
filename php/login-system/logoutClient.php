<?php
    session_start();
    session_destroy();

    header("location: loginScreen.php");
    exit();

?>