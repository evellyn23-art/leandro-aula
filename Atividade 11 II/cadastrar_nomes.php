<?php
session_start();

$cidades = ['Bela Vista', 'Jardim', 'Bonito', 'Guia Lopes da Laguna', 'Nioaque'];
$atividades = ['Palestra', 'Curso', 'Workshop', 'Mesa Redonda', 'Painel'];

$errors = [];
$old = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $idade = intval($_POST['idade'] ?? 0);
    $cidade = $_POST['cidade'] ?? '';
    $curso = trim($_POST['curso'] ?? '');
    $atividadesSelecionadas = $_POST['atividades'] ?? [];

    $old = [
        'nome' => $nome,
        'email' => $email,
        'idade' => $_POST['idade'] ?? '',
        'cidade' => $cidade,
        'curso' => $curso,
        'atividades' => $atividadesSelecionadas
    ];

    // Validações
    if ($nome === '') $errors[] = "O campo Nome é obrigatório.";
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Informe um e-mail válido.";
    if ($idade <= 0) $errors[] = "A idade deve ser maior que 0.";
    if ($cidade === '' || !in_array($cidade, $cidades)) $errors[] = "Selecione uma cidade válida.";
    if ($curso === '') $errors[] = "O campo Curso é obrigatório.";
    if (empty($atividadesSelecionadas)) $errors[] = "Selecione pelo menos uma atividade do evento.";

    // Se houver erros, retorna para o formulário
    if ($errors) {
        $_SESSION['errors'] = $errors;
        $_SESSION['old'] = $old;
        header("Location: index.php");
        exit;
    }

    // Armazena na sessão para exibir na confirmação
    $_SESSION['cadastro'] = $old;

    // Redireciona para a página de confirmação
    header("Location: confirmacao.php");
    exit;
} else {
    header("Location: index.php");
    exit;
}
