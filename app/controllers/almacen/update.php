<?php


include ('../../config.php');

$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$id_categoria = $_POST['id_categoria'];
$stock = $_POST['stock'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maxino = $_POST['stock_maxino'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$id_usuario = $_POST['id_usuario'];
$descripcion = $_POST['descripcion'];
$id_producto = $_POST['id_producto'];
$image_text = $_POST['image_text'];

if($_FILES['image']['name'] != null){

   // echo "hay imagen nueva";
   $nombreDelArchivo = date("Y-m-d-h-i-s");
   $image_text = $nombreDelArchivo."__".$_FILES['image']['name'];
   $location = "../../../almacen/img_productos/".$image_text;
    move_uploaded_file($_FILES['image']['tmp_name'], $location);
}else{
    echo "no hay imagen nueva";
}
    
    $sentencia = $pdo->prepare("UPDATE tb_almacen 
        SET nombre =:nombre, 
            descripcion =:descripcion,
            stock =:stock,
            stock_minimo =:stock_minimo,
            stock_maxino =:stock_maxino,
            precio_compra =:precio_compra,
            precio_venta =:precio_venta,
            fecha_ingreso =:fecha_ingreso,
            imagen =:imagen,
            id_usuario =:id_usuario,
            id_categoria =:id_categoria,
            fyh_actualizacion=:fyh_actualizacion 
            WHERE id_producto = :id_producto");

    $sentencia->bindParam('nombre', $nombre);
    $sentencia->bindParam('descripcion', $descripcion);
    $sentencia->bindParam('stock', $stock);
    $sentencia->bindParam('stock_minimo', $stock_minimo);
    $sentencia->bindParam('stock_maxino', $stock_maxino);
    $sentencia->bindParam('precio_compra', $precio_compra);
    $sentencia->bindParam('precio_venta', $precio_venta);
    $sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
    $sentencia->bindParam('imagen', $image_text);
    $sentencia->bindParam('id_usuario', $id_usuario);
     $sentencia->bindParam('id_categoria', $id_categoria);
    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
   
   
    if( $sentencia->execute()){

        session_start();
    $_SESSION['mensaje6'] = "Producto Actualizado correctamente";
    header('Location: '.$URL.'/almacen/index.php');

    }else{

    session_start();
    $_SESSION['mensaje4'] = "Producto no actualizado";
    header('Location: '.$URL.'/almacen/update.php?id='.$id_producto);

    }

    