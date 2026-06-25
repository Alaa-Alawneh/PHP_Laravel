<?php
    require __DIR__ . '/../vendor/autoload.php';
    Dotenv\Dotenv::createImmutable(__DIR__ . '/..')->load();
    $host = $_ENV["DB_HOST"];
    $username = $_ENV["MYSQL_USER"];
    $password = $_ENV["MYSQL_USER_PASSWORD"];
    $dbname = $_ENV["MYSQL_DB_NAME"];
    $port = $_ENV["PORT_NUMBER"];
    $servername= $host .":". $port;

    $conn = new mysqli($servername, $username, $password, $dbname);


    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>