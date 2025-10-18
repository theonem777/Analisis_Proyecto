<?php

$id_producto_get = $_GET['id'];


    $sql_productos = "SELECT *, cat.nombre_categoria as nombre_categoria, u.email as email, u.id_usuario as id_usuario
                        FROM tb_almacen as a INNER JOIN tb_categoria as cat ON a.id_categoria = cat.id_categoria
                        INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario WHERE id_producto = '$id_producto_get'";
    $query_productos = $pdo->prepare($sql_productos);
    $query_productos->execute();
    $datos_productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);


    foreach ($datos_productos as $dato_productos){ 
    $codigo = $dato_productos['codigo'];
    $nombre = $dato_productos['nombre'];
    $nombre_categoria = $dato_productos['nombre_categoria'];
    $stock = $dato_productos['stock'];
    $stock_minimo = $dato_productos['stock_minimo'];
    $stock_maxino = $dato_productos['stock_maxino'];
    $precio_compra = $dato_productos['precio_compra'];
    $precio_venta = $dato_productos['precio_venta'];
    $fecha_ingreso = $dato_productos['fecha_ingreso'];
    $email = $dato_productos['email'];
    $id_usuario = $dato_productos['id_usuario'];
    $descripcion = $dato_productos['descripcion'];
    $imagen = $dato_productos['imagen'];
}
