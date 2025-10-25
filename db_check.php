<?php
require __DIR__ . '/app/config.php';

header('Content-Type: text/plain; charset=UTF-8');

try {
    // consulta mínima
    $pdo->query('SELECT 1');
    echo "DB_OK\n";

    // listar tablas para confirmar el esquema y permisos
    $stmt = $pdo->query('SHOW TABLES');
    foreach ($stmt as $row) {
        echo array_values($row)[0] . "\n";
    }
} catch (Throwable $e) {
    http_response_code(500);
    echo "DB_FAIL: " . $e->getMessage() . "\n";
}

