<?php

$host = 'postgres_server';
$dbname = 'db1';
$user = 'admin';
$password = 'admin';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    die("Ошибка подключения к базе данных: " . $e->getMessage());
}
?>