<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Menu do Sistema</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="menu">
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_email']); ?></h1>
        <h2>Menu</h2>
        <ul>
            <li><a href="cadastrar_item.php">Cadastrar Item</a></li>
            <li><a href="lista_itens.php">Listar Itens</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </div>
</body>
</html>
