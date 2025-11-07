<?php

require_once 'conexao.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    try {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        
        $user = $stmt->fetch();

        if ($usuario && password_verify($senha, $usuario['senha'])) {
        
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            exit;

        }else{
            echo "E-mail ou senha inválidos.";
        }

    } catch (PDOException $e){
    echo "Erro ao realizar login: " . $e->getMessage();
    }
        
             
}

?>