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

$image = $_POST['image'];
$nombreDelArchivo = date("Y-m-d-h-i-s");
$filename = $nombreDelArchivo."__".$_FILES['image']['name'];
$location = "../../../almacen/img_productos/".$filename;

move_uploaded_file($_FILES['image']['tmp_name'], $location);

    
    $sentencia = $pdo->prepare("INSERT INTO tb_almacen
        (codigo, nombre, descripcion, id_categoria, id_usuario, stock, stock_minimo, stock_maxino, precio_compra, precio_venta, fecha_ingreso, imagen, fyh_creacion) 
    VALUES (:codigo, :nombre, :descripcion, :id_categoria, :id_usuario, :stock, :stock_minimo, :stock_maxino, :precio_compra, :precio_venta, :fecha_ingreso, :imagen, :fyh_creacion)");

    $sentencia->bindParam('codigo', $codigo);
    $sentencia->bindParam('nombre', $nombre);
    $sentencia->bindParam('descripcion', $descripcion);
    $sentencia->bindParam('id_categoria', $id_categoria);
    $sentencia->bindParam('id_usuario', $id_usuario);
    $sentencia->bindParam('stock', $stock);
    $sentencia->bindParam('stock_minimo', $stock_minimo);
    $sentencia->bindParam('stock_maxino', $stock_maxino);
    $sentencia->bindParam('precio_compra', $precio_compra);
    $sentencia->bindParam('precio_venta', $precio_venta);
    $sentencia->bindParam('fecha_ingreso', $fecha_ingreso);
    $sentencia->bindParam('imagen', $filename);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    
    if($sentencia->execute()){

        session_start();
    $_SESSION['mensaje1'] = "Producto guardado correctamente";
    header('Location: '.$URL.'/almacen/index.php');

    }else{

    //echo "Las contraseñas no coinciden";
    session_start();
    $_SESSION['mensaje6'] = "Producto no creado";
    header('Location: '.$URL.'/almacen/create.php');

    }

     


    



