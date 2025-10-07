<?php
session_start();
$tipos_lanche = [
    'Hambúrguer',
    'Cachorro-quente',
    'Pizza',
    'Sanduíche',
    'Pastel'
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Pedido de Lanche</title>
    <style>
        .campo { margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1>Cadastrar Pedido de Lanche</h1>
    <form method="post" action="cadastrar_lanche.php">
        <div class="campo">
            <label for="nome">Nome do Cliente:</label><br>
            <input type="text" name="nome" id="nome">
        </div>
        <div class="campo">
            <label for="endereco">Endereço:</label><br>
            <input type="text" name="endereco" id="endereco">
        </div>
        <div class="campo">
            <label for="tipo_lanche">Tipo de Lanche:</label><br>
            <select name="tipo_lanche" id="tipo_lanche">
                <option value="">Selecione...</option>
                <?php foreach ($tipos_lanche as $tipo): ?>
                    <option value="<?= $tipo ?>"><?= $tipo ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="campo">
            <label for="quantidade">Quantidade:</label><br>
            <input type="number" name="quantidade" id="quantidade" min="1">
        </div>
        <div class="campo">
            <label for="observacoes">Observações:</label><br>
            <textarea name="observacoes" id="observacoes"></textarea>
        </div>
        <button type="submit">Enviar Pedido</button>
    </form>
    <p>
        <a href="https://wa.me/?text=Olá!%20Gostaria%20de%20fazer%20um%20pedido%20de%20lanche." target="_blank">
            Iniciar conversa pelo WhatsApp
        </a>
    </p>
</body>
</html>