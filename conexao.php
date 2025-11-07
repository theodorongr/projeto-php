<?php

$host =  'localhost';
$dbname = 'projeto_login';
$user = 'root';
$password = '!Lui131415';

try{
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
echo "Erro na conexão: " . $e->getMessage();
}


?>