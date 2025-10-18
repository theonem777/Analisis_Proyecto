<?php


include ('../../config.php');

$nro_venta = $_GET['nro_venta'];
$id_cliente = $_GET['id_cliente'];
$total_cancelar = $_GET['total_cancelar'];



    
    $pdo->beginTransaction();
       

    $sentencia = $pdo->prepare("INSERT INTO tb_ventas (nro_venta, id_cliente, total_pagado, fyh_creacion)
    VALUES (:nro_venta, :id_cliente, :total_pagado, :fyh_creacion)");

    $sentencia->bindParam('nro_venta', $nro_venta);
    $sentencia->bindParam('id_cliente', $id_cliente);
    $sentencia->bindParam('total_pagado', $total_cancelar);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    
    if($sentencia->execute()){

    $pdo->commit(); 

        session_start();
    $_SESSION['mensaje1'] = "se registro la venta correctamente";
    //header('Location: '.$URL.'/compras/index.php');
     ?>
    <script>
        location.href = '<?php echo $URL ?>/ventas/create.php';
    </script>
   <?php

    }else{

    //echo "Las contraseñas no coinciden";

    $pdo->rollBack();

    session_start();
    $_SESSION['mensaje7'] = "venta no registrada";
   // header('Location: '.$URL.'/ventas/create.php');
     ?>
    <script>
        location.href = '<?php echo $URL ?>/ventas/create.php';
    </script>
   <?php

    }









     


    



