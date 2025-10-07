<?php
// obter dados do formulário (vem de name="nomes[]")
$nomes = $_REQUEST['nomes'] ?? []; // se não existir, vira array vazio

echo "<h1>Lista de Nomes</h1>";
echo "<ul>";

// percorrer e mostrar os valores
foreach ($nomes as $nome) {
    $nome = trim($nome); // tira espaços extras
    if (!empty($nome)) { 
        echo "<li>" . htmlspecialchars($nome) . "</li>"; // protege contra código HTML
    }
}

echo "</ul>";

// link para voltar
echo '<a href="index.php">Voltar</a>';
?>
