<?php
session_start();
$errors = $_SESSION['errors'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['errors'], $_SESSION['old']);

$cidades = ['Bela Vista', 'Jardim', 'Bonito', 'Guia Lopes da Laguna', 'Nioaque'];
$atividades = ['Palestra', 'Curso', 'Workshop', 'Mesa Redonda', 'Painel'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Participante</title>
</head>
<body>
    <h1>Cadastro de Participante de Evento</h1>
    <?php if ($errors): ?>
        <ul style="color:red;">
            <?php foreach ($errors as $erro): ?>
                <li><?= htmlspecialchars($erro) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="cadastrar_nomes.php" method="post">
        <label>Nome: <input type="text" name="nome" value="<?= htmlspecialchars($old['nome'] ?? '') ?>" required></label><br><br>
        <label>E-mail: <input type="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required></label><br><br>
        <label>Idade: <input type="number" name="idade" min="1" value="<?= htmlspecialchars($old['idade'] ?? '') ?>" required></label><br><br>
        <label>Cidade:
            <select name="cidade" required>
                <option value="">Selecione...</option>
                <?php foreach ($cidades as $cidade): ?><br><br>
                    <option value="<?= $cidade ?>" <?= ($old['cidade'] ?? '') === $cidade ? 'selected' : '' ?>><?= $cidade ?></option>
                <?php endforeach; ?>
            </select>
        </label><br>
        <label>Curso: <input type="text" name="curso" value="<?= htmlspecialchars($old['curso'] ?? '') ?>" required></label><br>
        <fieldset>
            <legend>Atividades do evento (selecione pelo menos uma):</legend>
            <?php foreach ($atividades as $atividade): ?>
                <label>
                    <input type="checkbox" name="atividades[]" value="<?= $atividade ?>"
                        <?= (isset($old['atividades']) && in_array($atividade, $old['atividades'])) ? 'checked' : '' ?>>
                    <?= $atividade ?>
                </label>
            <?php endforeach; ?>
        </fieldset>
        <br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>