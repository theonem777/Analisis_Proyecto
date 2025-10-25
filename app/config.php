<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function env2($a, $b = null) {
    $v = getenv($a);
    if ($v === false || $v === '') {
        $v = $b ? getenv($b) : '';
    }
    return $v;
}

/* Variables desde Railway (usa referencias del servicio MySQL) */
$DB_HOST = env2('MYSQLHOST', 'Host MySQL');
$DB_PORT = env2('MYSQLPORT', 'MYSQLPORT');
$DB_NAME = env2('MYSQLDATABASE', 'BASE DE DATOS MYSQL');
$DB_USER = env2('MYSQLUSER', 'USUARIOMYSQL');
$DB_PASS = env2('MYSQLPASSWORD', 'CONTRASEÑA MYSQL');

/* PDO sin MYSQL_ATTR_INIT_COMMAND (causa el 500 en Railway) */
$dsn = "mysql:host={$DB_HOST};port={$DB_PORT};dbname={$DB_NAME};charset=utf8mb4";

try {
$pdo = new PDO($dsn, $DB_USER, $DB_PASS, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
]);
$pdo->exec("SET NAMES utf8mb4");
} catch (PDOException $e) {
    echo "Error de conexión a la base de datos.";
    exit;
}

/* URL base: APP_URL si existe; si no, toma el host de la petición */
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost';
$base = rtrim(env2('APP_URL'), '/');
if ($base === '') { $base = "{$scheme}://{$host}"; }
$URL = $base;

date_default_timezone_set("America/Guatemala");
$fechaHora = date("Y-m-d H:i:s");

