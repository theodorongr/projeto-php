<?php

require_once 'conexao.php';

if($_SERVER["RESQUEST_METHOD"] == "POST"){

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    
    try {
    $sql = "INSERT INTO usuarios (email, senha) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([$email, $senhaHash]);

    echo "Usuário cadastrado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar usuário: " . $e->getMessage();
    }
}

?>