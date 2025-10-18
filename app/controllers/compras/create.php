<?php


include ('../../config.php');

$id_producto = $_GET['id_producto'];
$nro_compra = $_GET['nro_compra'];
$fecha_compra = $_GET['fecha_compra'];
$id_proveedor = $_GET['id_proveedor'];
$comprobante = $_GET['comprobante'];
$id_usuario = $_GET['id_usuario'];
$precio_compra = $_GET['precio_compra'];
$cantidad = $_GET['cantidad'];
$stock_total = $_GET['stock_total'];

    
    $pdo->beginTransaction();
       

    $sentencia = $pdo->prepare("INSERT INTO tb_compras (id_producto, nro_compra, fecha_compra, id_proveedor, comprobante, id_usuario, precio_compra, cantidad, fyh_creacion)
    VALUES (:id_producto, :nro_compra, :fecha_compra, :id_proveedor, :comprobante, :id_usuario, :precio_compra, :cantidad, :fyh_creacion)");

    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->bindParam('nro_compra', $nro_compra);
    $sentencia->bindParam('fecha_compra', $fecha_compra);
    $sentencia->bindParam('id_proveedor', $id_proveedor);
    $sentencia->bindParam('comprobante', $comprobante);
    $sentencia->bindParam('id_usuario', $id_usuario);
    $sentencia->bindParam('precio_compra', $precio_compra);
    $sentencia->bindParam('cantidad', $cantidad);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    
    if($sentencia->execute()){

    $sentencia = $pdo->prepare("UPDATE tb_almacen 
    SET stock =:stock WHERE id_producto = :id_producto");

    $sentencia->bindParam('stock', $stock_total);
    $sentencia->bindParam('id_producto', $id_producto);
    $sentencia->execute();

    $pdo->commit(); 

        session_start();
    $_SESSION['mensaje1'] = "se registro la compra correctamente";
    //header('Location: '.$URL.'/compras/index.php');
     ?>
    <script>
        location.href = '<?php echo $URL ?>/compras/index.php';
    </script>
   <?php

    }else{

    //echo "Las contraseñas no coinciden";

    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje6'] = "compra no registrada";
    //header('Location: '.$URL.'/compras/create.php');
     ?>
    <script>
        location.href = '<?php echo $URL ?>/compras/create.php';
    </script>
   <?php

    }









     


    



