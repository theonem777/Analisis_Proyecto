<?php


include ('../../config.php');

$rol = $_POST['rol'];


    
    $sentencia = $pdo->prepare("INSERT INTO tb_roles
        (rol, fyh_creacion) 
    VALUES (:rol, :fyh_creacion)");

    $sentencia->bindParam('rol', $rol);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    
    if($sentencia->execute()){

        session_start();
    $_SESSION['mensaje1'] = "Rol guardado correctamente";
    header('Location: '.$URL.'/roles/index.php');

    }else{

    //echo "Las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje6'] = "Rol no creado";
    header('Location: '.$URL.'/roles/create.php');

    }

     


    



