<?php

    $sql_compras = "SELECT *, 
                    pro.codigo as codigo, pro.nombre as nombre_producto, 
                    pro.descripcion as descripcion_producto, pro.stock as stock_producto,
                    pro.stock_minimo as stock_minimo_producto, pro.stock_maxino as stock_maxino_producto, 
                    pro.precio_compra as precio_compra, pro.precio_venta as precio_venta, pro.fecha_ingreso as fecha_ingreso,
                    pro.imagen as imagen_producto,
                    cat.nombre_categoria as nombre_categoria, us.nombres as nombre_usuario, prov.nombre_proveedor as nombre_proveedor_compra,
                    prov.celular as celular_proveedor, prov.telefono as telefono_proveedor, prov.empresa as empresa_proveedor, prov.email as email_proveedor,
                    prov.direccion as direccion_proveedor
                    FROM tb_compras as co INNER JOIN tb_almacen as pro 
    ON co.id_producto = pro.id_producto INNER JOIN tb_categoria as cat 
    ON cat.id_categoria = pro.id_categoria INNER JOIN tb_usuarios as us ON co.id_usuario = us.id_usuario INNER JOIN tb_proveedores as prov 
    ON co.id_proveedor = prov.id_proveedor;";
                    // pro.imagen as imagen_producto
                    // FROM tb_compras as co INNER JOIN tb_almacen as pro
    $query_compras = $pdo->prepare($sql_compras);
    $query_compras->execute();
    $datos_compras = $query_compras->fetchAll(PDO::FETCH_ASSOC);