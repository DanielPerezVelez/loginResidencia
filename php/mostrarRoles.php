<?php
require_once("conexion.php");
$conexion= conectarDB();

$query="SELECT * FROM rolclt";
$result=mysqli_query($conexion,$query);

while($row=mysqli_fetch_array($result)){
    $idrolclt=$row['idrolclt'];
    $descripcion=$row['descripcion'];
    echo$descripcion;
}