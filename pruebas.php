<?php

require __DIR__ . '/src/Linea.php';
require __DIR__ . '/src/Precios.php';
require __DIR__ . '/src/Reporte.php';

$compra = [new Linea('Pan sobao (docena)', 2, 120), new Linea('Bizcocho 1 lb', 1, 650)];
$igual = fn (float $a, float $b) => abs($a - $b) < 0.005;

$casos = [
    'El subtotal suma cantidad por precio' => fn () => $igual(Precios::subtotal($compra), 890),
    'El ITBIS es el 18 % del subtotal' => fn () => $igual(Precios::impuesto(100), 18),
    'El resumen muestra el total' => fn () => str_contains(Reporte::resumen($compra), 'Total'),
    'Descuento del 12 % en compras grandes' => fn () => $igual(Precios::descuento(20000), 2400),
    'Sin descuento en compras pequeñas' => fn () => $igual(Precios::descuento(100), 0),
];

$fallas = 0;
foreach ($casos as $nombre => $caso) {
    $paso = $caso();
    echo ($paso ? 'OK    ' : 'FALLA ') . $nombre . PHP_EOL;
    if (!$paso) {
        $fallas++;
    }
}
echo ($fallas === 0 ? 'Todas las pruebas pasan.' : "$fallas prueba(s) fallan.") . PHP_EOL;
exit($fallas === 0 ? 0 : 1);
