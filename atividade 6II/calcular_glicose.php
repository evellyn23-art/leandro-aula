<?php

$medida_glicose = $_GET['glicose'] ?? 0; 
$classificacao = "Indefinido";

// verificar a classificação
if ($medida_glicose < 70) {
    $classificacao = "Hipoglicemia";
} else if ($medida_glicose <= 99) {
    $classificacao = "Normal";
} else if ($medida_glicose <= 125) {
    $classificacao = "Pré-diabetes";
} else if ($medida_glicose <= 140) {
    $classificacao = "Elevada";
} else {
    $classificacao = "Diabetes";
}

print "<p>Classificação: $classificacao</p>";
print '<a href="index.php">Calcular Novamente</a>';
?>
