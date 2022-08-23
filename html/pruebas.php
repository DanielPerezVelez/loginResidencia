<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <title>Login y Registro</title>

</head>
<body>
    <main>
<select name="xd">
    <option value="xp"> hola</option> 
    <option value="xb"> como</option>
    <option value="xn"> estas</option> 


</select>
<selectn name= "selectRol">
<?php

function conectarDB() : mysqli {
    $conexion = mysqli_connect('localhost', 'root', '', 'bdimmo1');

    if(!$conexion) {
        echo "error";
        exit;
    }
    return $conexion;
}

$conexion= conectarDB(); 
$sql='SELECT * FROM rolclt';
$query=mysqli_query($conexion,$sql);
                            
while($row=mysqli_fetch_array($query)){
$idrolclt=$row['idrolclt'];
$descripcion=$row['descripcion'];
?>
<option value="<?php echo $idrolclt ?>"><?php echo $descripcion?></option>
<?php
}
?>
</select>
</main>

</body>
</html>