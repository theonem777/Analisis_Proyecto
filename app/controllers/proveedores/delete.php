<?php


include ('../../config.php');

$id_proveedor = $_GET['id_proveedor'];

    $sentencia = $pdo->prepare("DELETE FROM tb_proveedores WHERE id_proveedor = :id_proveedor");

    $sentencia->bindParam('id_proveedor', $id_proveedor);
    
   if($sentencia->execute()){

        session_start();
    $_SESSION['mensaje3'] = "Se elimino el proveedor correctamente";
   // header('Location: '.$URL.'/Proveedores/index.php');

   ?>
    <script>
        location.href = '<?php echo $URL ?>/Proveedores/index.php';
    </script>
   <?php

    }else{

    //echo "Las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje2'] = "no se pudo eliminar el proveedor";
    //header('Location: '.$URL.'/Proveedores/index.php');

     ?>
    <script>
        location.href = '<?php echo $URL ?>/Proveedores/index.php';
    </script>
   <?php

    }
