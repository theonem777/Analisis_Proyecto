<?php

    $sql_clientes = "SELECT * FROM tb_clientes WHERE id_cliente = '$id_cliente' ";
                   
    $query_clientes = $pdo->prepare($sql_clientes);
    $query_clientes->execute();
    $datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);