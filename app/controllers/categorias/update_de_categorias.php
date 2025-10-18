<?php


include ('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];
$id_categoria = $_GET['id_categoria'];

    
    $sentencia = $pdo->prepare("UPDATE tb_categoria
        SET nombre_categoria =:nombre_categoria, 
            fyh_actualizacion=:fyh_actualizacion 
            WHERE id_categoria = :id_categoria");

    $sentencia->bindParam('nombre_categoria', $nombre_categoria);
    $sentencia->bindParam('fyh_actualizacion', $fechaHora);
    $sentencia->bindParam('id_categoria', $id_categoria);
   
    if( $sentencia->execute()){

        session_start();
    $_SESSION['mensaje5'] = "Rol Actualizado correctamente";
    //header('Location: '.$URL.'/roles/index.php');
     ?>
    <script>
        location.href = '<?php echo $URL ?>/Categorias/index.php';
    </script>
   <?php
     

    }else{

    session_start();
    $_SESSION['mensaje4'] = "Rol no actualizado";
    //header('Location: '.$URL.'/roles/update.php?id='.$id_rol);
     ?>
    <script>
        location.href = '<?php echo $URL ?>/Categorias/index.php';
    </script>
   <?php
    
    

    }

    