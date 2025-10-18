<?php


include ('../../config.php');

$id_producto = $_POST['id_producto'];

    $sentencia = $pdo->prepare("DELETE FROM tb_almacen WHERE id_producto = :id_producto");

    $sentencia->bindParam('id_producto', $id_producto);
    
    if($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje5'] = "Datos Borrados correctamente";
        header("Location: ".$URL."/almacen/index.php");
        exit();
    } else {
        session_start();
        $_SESSION['mensaje6'] = "Error al borrar los datos";
        header("Location: ".$URL."/almacen/delete.php?id=".$id_producto);
        exit();
    }
