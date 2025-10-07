<?php
session_start();

$tipos_lanche = [
    'Hambúrguer',
    'Cachorro-quente',
    'Pizza',
    'Sanduíche',
    'Pastel'
];

$erros = [];
$dados = [
    'nome' => '',
    'endereco' => '',
    'tipo_lanche' => '',
    'quantidade' => '',
    'observacoes' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados['nome'] = trim($_POST['nome'] ?? '');
    $dados['endereco'] = trim($_POST['endereco'] ?? '');
    $dados['tipo_lanche'] = $_POST['tipo_lanche'] ?? '';
    $dados['quantidade'] = $_POST['quantidade'] ?? '';
    $dados['observacoes'] = trim($_POST['observacoes'] ?? '');

    if ($dados['nome'] === '') {
        $erros['nome'] = 'O nome do cliente é obrigatório.';
    }
    if ($dados['endereco'] === '') {
        $erros['endereco'] = 'O endereço é obrigatório.';
    }
    if ($dados['tipo_lanche'] === '') {
        $erros['tipo_lanche'] = 'Selecione o tipo de lanche.';
    }
    if ($dados['quantidade'] === '' || !is_numeric($dados['quantidade']) || intval($dados['quantidade']) <= 0) {
        $erros['quantidade'] = 'A quantidade deve ser maior que 0.';
    }

    if (empty($erros)) {
        $_SESSION['pedido'] = $dados;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pedido de Lanche</title>
    <style>
        .erro { color: red; font-size: 0.9em; margin-bottom: 5px; }
        .campo { margin-bottom: 15px; }
        .pedido { background: #f0f0f0; padding: 10px; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Pedido de Lanche</h1>
    <?php if (!empty($erros)): ?>
        <form method="post" action="">
            <div class="campo">
                <label for="nome">Nome do Cliente:</label><br>
                <input type="text" name="nome" id="nome" value="<?= htmlspecialchars($dados['nome']) ?>">
                <?php if (isset($erros['nome'])): ?>
                    <div class="erro"><?= $erros['nome'] ?></div>
                <?php endif; ?>
            </div>
            <div class="campo">
                <label for="endereco">Endereço:</label><br>
                <input type="text" name="endereco" id="endereco" value="<?= htmlspecialchars($dados['endereco']) ?>">
                <?php if (isset($erros['endereco'])): ?>
                    <div class="erro"><?= $erros['endereco'] ?></div>
                <?php endif; ?>
            </div>
            <div class="campo">
                <label for="tipo_lanche">Tipo de Lanche:</label><br>
                <select name="tipo_lanche" id="tipo_lanche">
                    <option value="">Selecione...</option>
                    <?php foreach ($tipos_lanche as $tipo): ?>
                        <option value="<?= $tipo ?>" <?= $dados['tipo_lanche'] === $tipo ? 'selected' : '' ?>><?= $tipo ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if (isset($erros['tipo_lanche'])): ?>
                    <div class="erro"><?= $erros['tipo_lanche'] ?></div>
                <?php endif; ?>
            </div>
            <div class="campo">
                <label for="quantidade">Quantidade:</label><br>
                <input type="number" name="quantidade" id="quantidade" min="1" value="<?= htmlspecialchars($dados['quantidade']) ?>">
                <?php if (isset($erros['quantidade'])): ?>
                    <div class="erro"><?= $erros['quantidade'] ?></div>
                <?php endif; ?>
            </div>
            <div class="campo">
                <label for="observacoes">Observações:</label><br>
                <textarea name="observacoes" id="observacoes"><?= htmlspecialchars($dados['observacoes']) ?></textarea>
            </div>
            <button type="submit">Enviar Pedido</button>
        </form>
    <?php elseif (isset($_SESSION['pedido'])): ?>
        <div class="pedido">
            <h2>Pedido enviado:</h2>
            <strong>Nome:</strong> <?= htmlspecialchars($_SESSION['pedido']['nome']) ?><br>
            <strong>Endereço:</strong> <?= htmlspecialchars($_SESSION['pedido']['endereco']) ?><br>
            <strong>Tipo de Lanche:</strong> <?= htmlspecialchars($_SESSION['pedido']['tipo_lanche']) ?><br>
            <strong>Quantidade:</strong> <?= htmlspecialchars($_SESSION['pedido']['quantidade']) ?><br>
            <strong>Observações:</strong> <?= nl2br(htmlspecialchars($_SESSION['pedido']['observacoes'])) ?><br>
        </div>
        <p>
            <a href="index.php">Novo Pedido</a>
        </p>
    <?php endif; ?>
</body>
</html>