<?php

$nome1= $_GET["$nome1"];
$idade1= $_GET["$idade1"];
$nome2= $_GET["$nome2"];
$idade1= $_GET["$idade2"];

//calcular a media
$idademedia = ($idade1 + $idade2)/2;

//imprimir resultado
print "<p>
a idade media de{$nome1} e {$nome2} é de {$idademedia} anos.
</p>";
print "<P> <a href = '/'>calcular novamente<a/> </p>";