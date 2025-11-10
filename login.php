<?php
session_start();
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? '';
    $senha = $_POST["senha"] ?? '';

    if ($email === '' || $senha === '') {
        echo "Preencha e-mail e senha.";
        exit;
    }

    try {
        $sql = "SELECT * FROM usuarios WHERE email = ? LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            header("Location: menu.php");
            exit;
        } else {
            echo "E-mail ou senha inválidos.";
        }
    } catch (PDOException $e) {
        echo "Erro ao realizar login: " . $e->getMessage();
    }
} else {
    header("Location: login.html");
    exit;
}
