<?php
// Mostrar cualquier error en pantalla (solo para diagnóstico)
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

header('Content-Type: text/plain; charset=UTF-8');

function read($k) { $v = getenv($k); return ($v === false) ? '' : $v; }

$host = read('MYSQLHOST');
$port = read('MYSQLPORT');
$db   = read('MYSQLDATABASE');
$user = read('MYSQLUSER');
$pass = read('MYSQLPASSWORD');

echo "ENV:\n";
echo "MYSQLHOST=$host\n";
echo "MYSQLPORT=$port\n";
echo "MYSQLDATABASE=$db\n";
echo "MYSQLUSER=$user\n";
echo "MYSQLPASSWORD=" . (strlen($pass) ? "(set)" : "(empty)") . "\n\n";

try {
    if ($host === '' || $port === '' || $db === '' || $user === '') {
        throw new Exception("Faltan variables de entorno MYSQL*");
    }

    $dsn = "mysql:host={$host};port={$port};dbname={$db};charset=utf8mb4";
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);

    $pdo->query('SELECT 1');
    echo "CONN=OK\n";

    $stmt = $pdo->query('SHOW TABLES');
    foreach ($stmt as $row) {
        echo array_values($row)[0] . "\n";
    }
} catch (Throwable $e) {
    http_response_code(500);
    echo "CONN=FAIL: " . $e->getMessage() . "\n";
}

