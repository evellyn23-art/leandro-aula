<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $valor_hora = (float) $_POST['valor_hora'];
    $horas_trabalhadas = (float) $_POST['horas_trabalhadas'];
    $pagamento = $valor_hora * $horas_trabalhadas;

    echo "<h2>Pagamento do Funcionário</h2>";
    echo "<p>O funcionário <b>$nome</b> trabalhou <b>$horas_trabalhadas</b> horas, recebendo R$ <b>$valor_hora</b> por hora.</p>";
    echo "<p>O pagamento total será: <b>R$ $pagamento</b></p>";
    echo '<a href="formulario.html">Voltar para o formulário</a>';
} else {
    echo "Por favor, use o formulário para enviar os dados.";
}
?>  
