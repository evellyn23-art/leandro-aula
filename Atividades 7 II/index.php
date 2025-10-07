<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Nomes</title>
</head>
<body>
    <h1>Cadastro de Nomes</h1>

    <form action="mostrar_nomes.php" method="get">  
        <label for="nome1">Nome:</label>
        <input type="text" name="nomes[]" id="nome1">

        <label for="nome2">Nome:</label>
        <input type="text" name="nomes[]" id="nome2">

        <label for="nome3">Nome:</label>
        <input type="text" name="nomes[]" id="nome3">

        <button type="submit">Mostrar nomes</button>
    </form>
</body>
</html>
