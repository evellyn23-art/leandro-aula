<?php
if (isset($_GET['largura']) && isset($_GET['comprimento']) && isset($_GET['valor'])) {
    $largura = (float) $_GET["largura"];
    $comprimento = (float) $_GET["comprimento"];
    $valor = (float) $_GET["valor"];

    $areaDoTerreno = $largura * $comprimento;
    $precoDoTerreno = $areaDoTerreno * $valor;

    echo "<p>Área do Terreno = {$areaDoTerreno} m²</p>";
    echo "<p>Preço do Terreno = R$ {$precoDoTerreno}</p>";
    echo "<p><a href='calcular_terreno.php'>Calcular novamente</a></p>";
} else {
?>

<?php
}
?>
