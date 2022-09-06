<?php
require_once("../conexion.php");
require_once("../funciones.php");
$conexion= conectarDB();
session_start();
$idcliente=$_SESSION['idcliente'];

if (isset($_POST['submit']) && isset($_FILES['uploadImage'])){
    $_FILES['uploadImage'];
   
    $img_name=$_FILES['uploadImage']['name'];
    $img_size=$_FILES['uploadImage']['size'];
    $tmp_name=$_FILES['uploadImage']['tmp_name'];
    $error=$_FILES['uploadImage']['error'];

    if ($error===0){
        if ($img_size > 125000){
            $em="It's too big!";
            header("Location: perfil.php?error=$em");
        }else{
            $img_ex=pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc=strtolower($img_ex);

            $allowed_exs=array("jpg","jpeg","png");
            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name=uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path='../../imgs/'.$new_img_name;
                move_uploaded_file($tmp_name,$img_upload_path);
                //actualizar la columna profilepic de la base de datos
                $_SESSION['profilepic']=$new_img_name;
                header("location: perfil.php");    
                $query="UPDATE cliente SET profilepic='$new_img_name' WHERE idcliente='$idcliente' ";
                mysqli_query($conexion,$query);         
            }else{
                $em="Not valid file type!";
                header("Location: perfil.php?error=$em");
            }
        }
    }else{
        $em="unknown error ocurred!";
        header("Location: perfil.php?error=$em");
    }
}else{
    header("Location: ../index1.php");
}