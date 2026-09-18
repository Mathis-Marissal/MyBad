<?php

// Connexion à la base de données (comme sur ZenTea), avec support des emojis (utf8mb4)
$host = getenv('MYSQL_ADDON_HOST') ?: 'localhost';
$dbname = getenv('MYSQL_ADDON_DB') ?: 'mybad';
$user = getenv('MYSQL_ADDON_USER') ?: 'root';
$password = getenv('MYSQL_ADDON_PASSWORD') ?: '';
$port = getenv('MYSQL_ADDON_PORT') ?: '3306';

try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4",
        $user,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
