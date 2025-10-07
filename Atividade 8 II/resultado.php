<?php
// resultado.php

// Se o arquivo for acessado sem POST, redireciona para o formulário
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: form.php');
    exit;
}

// Pega as frutas enviadas (compatível com PHP 5.x+)
$frutas = isset($_POST['frutas']) ? $_POST['frutas'] : [];

// Garante que é um array
if (!is_array($frutas)) {
    $frutas = [$frutas];
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Resultado</title>
</head>
<body>

<h2>Frutas escolhidas:</h2>

<?php if (!empty($frutas)): ?>
    <ul>
        <?php foreach ($frutas as $f): ?>
            <li><?php echo htmlspecialchars($f, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>Vetor em PHP:</h3>
    <pre><?php print_r($frutas); ?></pre>
<?php else: ?>
    <p>Nenhuma fruta selecionada.</p>
<?php endif; ?>

<p><a href="form.php">Voltar ao formulário</a></p>

</body>
</html>
