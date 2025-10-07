<?php
session_start();

// Recupera os dados do cadastro
$cadastro = $_SESSION['cadastro'] ?? null;

if (!$cadastro) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Cadastro</title>
</head>
<body>
    <h1>Confirmação de Cadastro</h1>
    <table border ="1" cellpadding="5">
        <tr><th>Nome</th><td><?= htmlspecialchars($cadastro['nome']) ?></td></tr>
        <tr><th>E-mail</th><td><?= htmlspecialchars($cadastro['email']) ?></td></tr>
        <tr><th>Idade</th><td><?= htmlspecialchars($cadastro['idade']) ?></td></tr>
        <tr><th>Cidade</th><td><?= htmlspecialchars($cadastro['cidade']) ?></td></tr>
        <tr><th>Curso</th><td><?= htmlspecialchars($cadastro['curso']) ?></td></tr>
        <tr>
            <th>Atividades</th>
            <td>
                <ul>
                    <?php foreach ($cadastro['atividades'] as $atv): ?>
                        <li><?= htmlspecialchars($atv) ?></li>
                    <?php endforeach; ?>
                </ul>
            </td>
        </tr>
    </table>
    <br>
    <a href="index.php">Novo cadastro</a>
</body>
</html>
