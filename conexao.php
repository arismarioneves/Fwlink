<?php

# ▓▓▓▓Dev by Mari05liM▓▓▓▓
# mariodev@outlook.com.br

// Configurações Banco de Dados
$host = isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : 'localhost';
$user = isset($_ENV['DB_USER']) ? $_ENV['DB_USER'] : 'root';
$pass = isset($_ENV['DB_PASSWORD']) ? $_ENV['DB_PASSWORD'] : '';
$db = isset($_ENV['DB_NAME']) ? $_ENV['DB_NAME'] : 'fwlink';

$con = @mysqli_connect($host, $user, $pass, $db);

if (!$con) {
    // echo "Não foi possível conectar ao MySQL: " . mysqli_connect_error();
    echo "Olá, estamos com problemas técnicos. Tente novamente mais tarde.";
    exit();
}

mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, "SET character_set_connection=utf8");
mysqli_query($con, "SET character_set_client=utf8");
mysqli_query($con, "SET character_set_results=utf8");

mysqli_query($con, "SET sql_mode = ''");

// PDO
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Timezone do Banco de Dados
$timeZone = '-03:00'; // America/Sao_Paulo
$pdo->exec("SET time_zone = '{$timeZone}'");
