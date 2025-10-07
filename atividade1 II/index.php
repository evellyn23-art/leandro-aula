<h1>Gerador de Nota Promissória</h1>

<form action="nota_promissoria.php" method="POST">
    <label for="nome_devedor">Nome do Devedor</label>
    <input type="text" name="nome_devedor" id="nome_devedor" required>

    <label for="cpf_devedor">CPF do Devedor</label>
    <input type="text" name="cpf_devedor" id="cpf_devedor" required>
    <label for="endereco_devedor">Endereço do Devedor</label>
    <input type="text" name="endereco_devedor" id="endereco_devedor" required>

    <label for="nome_credor">Nome do Credor</label>
    <input type="text" name="nome_credor" id="nome_credor" required>

    <label for="cpf_credor">CPF do Credor</label>
    <input type="text" name="cpf_credor" id="cpf_credor" required>

    <label for="valor_divida">Valor da Dívida</label>
    <input type="number" step="0.01" name="valor_divida" id="valor_divida" min="0" required>
    
    <label for="data_de_vencimento">data de Vencimento</label>
    <input type="date" name="data_de_vencimento" id="data_de_vencimento" required>
    
    <button type="submit">Gerar</button>
</form>
