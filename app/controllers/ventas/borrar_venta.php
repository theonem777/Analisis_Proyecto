<?php

include ('../../config.php');

$id_venta = $_GET['id_venta'];
$nro_venta = $_GET['nro_venta'];

 $pdo->beginTransaction();


 $sentencia = $pdo->prepare("DELETE FROM tb_ventas WHERE id_venta = :id_venta");

    $sentencia->bindParam('id_venta', $id_venta);

    if($sentencia->execute()) {

         $sentencia2 = $pdo->prepare("DELETE FROM tb_carrito WHERE nro_venta = :nro_venta");
         $sentencia2->bindParam('nro_venta', $nro_venta);
         $sentencia2->execute();

        $pdo->commit(); 

         session_start();
    $_SESSION['mensaje1'] = "se elimino la venta correctamente";

          ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/index.php";
    </script>
    <?php

    } else {

        $pdo->rollBack();

         session_start();
    $_SESSION['mensaje6'] = "venta no eliminada";

         ?>
    <script>
        location.href = "<?php echo $URL;?>/ventas/index.php";
    </script>
    <?php
    }

