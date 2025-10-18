<?php

    $sql_clientes = "SELECT * FROM tb_clientes";
                   
    $query_clientes = $pdo->prepare($sql_clientes);
    $query_clientes->execute();
    $datos_clientes = $query_clientes->fetchAll(PDO::FETCH_ASSOC);