<?php
session_start();
var_dump($_SESSION);
//pegar os dados da sessão
$nome = $_SESSION['nome'] ?? "";
?>

<h1>Reserva de Quarto</h1>
<form action="reservar_quarto.php" method="post"> 
    <p>
    <label for="name">Nome Completo:</label>
    <input type="text" id="name" name="name" 
    <small><?= $nome?></small> 
</p>

    
    <label for="email">E-mail</label>
    <input type="email" id="email" name="email"><br><br>

    <label for="data_entrada">Data de Entrada</label>
    <input type="date" id="data_entrada" name="data_entrada" ><br><br>

    <label for="data_saida">Data de Saída</label>
    <input type="text" id="data_saida" name="data_saida"><br><br>

    <label for="tipo_quarto">Tipo de Quarto</label>
   
    <select name="tipo_quarto" id="tipo_quarto">
        <option value="0">Selecione Tipo de Quarto</option>
    <option value="1">Suite</option>
    <option value="2">Quarto Executivo Individual</option>
    <option value="3">Quarto Duplo Executivo</option>
    </select>

    <input type="submit" value="Reservar">
</form>