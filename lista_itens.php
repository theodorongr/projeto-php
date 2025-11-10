<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
require_once 'conexao.php';

$sql = "SELECT codigo, descricao, fabricante, custo, venda, local FROM itens ORDER BY codigo DESC";
$stmt = $pdo->query($sql);
$itens = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Itens</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="table-container">
        <h2>Lista de Itens</h2>

        <table>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Fabricante</th>
                <th>Custo</th>
                <th>Venda</th>
                <th>Local</th>
            </tr>
            <?php foreach ($itens as $item): ?>
                <tr>
                    <td><?php echo $item['codigo']; ?></td>
                    <td><?php echo htmlspecialchars($item['descricao']); ?></td>
                    <td><?php echo htmlspecialchars($item['fabricante']); ?></td>
                    <td><?php echo number_format($item['custo'], 2, ',', '.'); ?></td>
                    <td><?php echo number_format($item['venda'], 2, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($item['local']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <p><a href="cadastrar_item.php" class="button">Cadastrar novo item</a></p>
        <p><a href="menu.php">Voltar ao menu</a></p>
    </div>

</body>
</html>
