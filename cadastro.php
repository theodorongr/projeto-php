<?php

require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? '';
    $senha = $_POST["senha"] ?? '';

    if ($email === '' || $senha === '') {
        echo "Preencha todos os campos.";
        exit;
    }

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    try {
        $sql = "INSERT INTO usuarios (email, senha) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email, $senhaHash]);

        echo "Usuário cadastrado com sucesso! <a href='login.html'>Fazer login</a>";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar usuário: " . $e->getMessage();
    }
} else {
    header("Location: cadastro.html");
    exit;
}
