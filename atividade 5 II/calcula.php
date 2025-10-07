<?php
if (isset($_REQUEST["codigo"]) && isset($_REQUEST["quantidade"])) {
    $codigo = intval($_REQUEST["codigo"]);
    $quantidade = intval($_REQUEST["quantidade"]);

    $precos = [
        1 => 4.00,
        2 => 4.50,
        3 => 5.00,
        4 => 2.00,
        5 => 1.50
    ];

    if (isset($precos[$codigo])) {
        $total = $precos[$codigo] * $quantidade;
        echo "Total: R$ " . number_format($total, 2, ',', '.');
    } else {
        echo "Código inválido!";
    }
}
?>
