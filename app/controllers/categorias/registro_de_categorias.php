<?php


include ('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];

$sentencia = $pdo->prepare("INSERT INTO tb_categoria
        (nombre_categoria, fyh_creacion) 
    VALUES (:nombre_categoria, :fyh_creacion)");

    $sentencia->bindParam('nombre_categoria', $nombre_categoria);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    
    if($sentencia->execute()){

        session_start();
    $_SESSION['mensaje1'] = "Se registro la categoria correctamente";
   // header('Location: '.$URL.'/Categorias/index.php');

   ?>
    <script>
        location.href = '<?php echo $URL ?>/Categorias/index.php';
    </script>
   <?php

    }else{

    //echo "Las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje6'] = "Categoria no creada";
    //header('Location: '.$URL.'/Categorias/index.php');

     ?>
    <script>
        location.href = '<?php echo $URL ?>/Categorias/index.php';
    </script>
   <?php

    }
