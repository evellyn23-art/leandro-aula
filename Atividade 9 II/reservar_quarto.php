<?php
session_start();

$campos_post = [
    'name', 
    'email', 
    'data_entrada', 
    'data_saida', 
    'tipo_quarto'
];

$erros_encontrados = false;
session_unset(); 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nome = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $data_entrada = isset($_POST['data_entrada']) ? $_POST['data_entrada'] : '';
    $data_saida = isset($_POST['data_saida']) ? $_POST['data_saida'] : '';
    $tipo_quarto = isset($_POST['tipo_quarto']) ? $_POST['tipo_quarto'] : '';

    
    if (empty($nome)) {
        $_SESSION['erro_nome'] = "O nome é obrigatório.";
        $erros_encontrados = true;
    }
    
    if (empty($data_entrada)) {
        $_SESSION['erro_data_entrada'] = "A data de entrada é obrigatória."; 
        $erros_encontrados = true;
    }

    if (empty($data_saida)) {
        $_SESSION['erro_data_saida'] = "A data de saída é obrigatória.";
        $erros_encontrados = true;
    }

    if (empty($tipo_quarto)) {
        $_SESSION['erro_tipo_quarto'] = "O tipo de quarto é obrigatório.";
        $erros_encontrados = true;
    }

    
    if (!$erros_encontrados) {
      
        
      
        print "<h1>Reserva Efetuada com sucesso</h1>";
        print "<p>Nome: " . htmlspecialchars($nome) . "</p>"; 
        print "<p>E-mail: " . htmlspecialchars($email) . "</p>";
        print "<p>Data de Entrada: " . htmlspecialchars($data_entrada) . "</p>";  
        print "<p>Data de Saída: " . htmlspecialchars($data_saida) . "</p>";
        print "<p>Tipo de Quarto: " . htmlspecialchars($tipo_quarto) . "</p>";
        print "<a href='index.php'>Voltar</a>";

    } else {
    
        header("Location: index.php");
        die();
    }

} else {
    
    header("Location: index.php");
    die();
}
?>