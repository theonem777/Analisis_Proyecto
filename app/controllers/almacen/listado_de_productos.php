<?php

    $sql_productos = "SELECT *, cat.nombre_categoria as nombre_categoria, u.email as email
                        FROM tb_almacen as a INNER JOIN tb_categoria as cat ON a.id_categoria = cat.id_categoria
                        INNER JOIN tb_usuarios as u ON u.id_usuario = a.id_usuario;";
    $query_productos = $pdo->prepare($sql_productos);
    $query_productos->execute();
    $datos_productos = $query_productos->fetchAll(PDO::FETCH_ASSOC);