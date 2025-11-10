<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.html");
    exit;
}

require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $descricao  = $_POST["descricao"]  ?? '';
    $fabricante = $_POST["fabricante"] ?? '';
    $custo      = $_POST["custo"]      ?? '';
    $venda      = $_POST["venda"]      ?? '';
    $local      = $_POST["local"]      ?? '';

    if ($descricao === '' || $custo === '' || $venda === '') {
        echo "Preencha descrição, custo e venda.";
    } else {
        $sql = "INSERT INTO itens (descricao, fabricante, custo, venda, local)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$descricao, $fabricante, $custo, $venda, $local]);

        echo "Item cadastrado com sucesso! <a href='lista_itens.php'>Ver itens</a> | <a href='cadastrar_item.php'>Cadastrar outro</a>";
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Item</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastrar Item</h2>

        <?php if (!empty($msg)) echo "<p>$msg</p>"; ?>

        <form action="cadastrar_item.php" method="POST">
            <label>Descrição:</label>
            <input type="text" name="descricao" required>

            <label>Fabricante:</label>
            <input type="text" name="fabricante">

            <label>Custo:</label>
            <input type="number" step="0.01" name="custo" required>

            <label>Venda:</label>
            <input type="number" step="0.01" name="venda" required>

            <label>Local:</label>
            <input type="text" name="local">

            <input type="submit" value="Salvar">
        </form>

        <p><a href="menu.php">Voltar ao menu</a></p>
    </div>
</body>
</html>
