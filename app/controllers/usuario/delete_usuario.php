<?php


include ('../../config.php');

$id_usuario = $_POST['id_usuario'];

    $sentencia = $pdo->prepare("DELETE FROM tb_usuarios WHERE id_usuario = :id_usuario");

    $sentencia->bindParam('id_usuario', $id_usuario);
    $sentencia->execute();

     session_start();
    $_SESSION['mensaje5'] = "Datos Borrados correctamente";
    header('Location: '.$URL.'/usuarios/index.php');
