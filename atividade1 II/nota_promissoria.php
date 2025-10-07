<?php
//obter os dados do form cujo input name=?
$nome_devedor = $_POST['nome_devedor'];
$cpf_devedor = $_POST['cpf_devedor'];
$endereco_devedor = $_POST['endereco_devedor'];
$nome_credor = $_POST['nome_credor'];
$cpf_credor = $_POST['cpf_credor'];
$valor_divida = $_POST['valor_divida'];
$data_de_vencimento = $_POST['data_de_vencimento'];     

//exibir os dados
?>
<h1>Nota Promissória</h1>
<p>
<strong>Data de Vencimento:</strong> <?= $data_de_vencimento ?>
</p>
<p>
    Eu, <?= $nome_devedor ?>, inscrito no CPF sob o nº <?= $cpf_devedor ?>, residente e domiciliado no 
    endereço <?= $endereco_devedor ?>, pagarei pela presente <strong>NOTA PROMISSÓRIA</strong>, a <?= $nome_credor ?>, 
    inscrito no CPF sob nº <?= $cpf_credor ?>, o valor de R$<?= $valor_divida ?>.
</p>
<p>
Assinatura do Devedor: ________________________________
</p>
<p>
    <a href="index.php">Gerar outra nota</a>
</p>