<?php

require __DIR__ . '/src/Linea.php';
require __DIR__ . '/src/Precios.php';
require __DIR__ . '/src/Reporte.php';

$compra = [new Linea('Pan sobao (docena)', 2, 120), new Linea('Bizcocho 1 lb', 1, 650)];
$igual = fn (float $a, float $b) => abs($a - $b) < 0.005;

$casos = [
    'El subtotal suma cantidad por precio' => fn () => $igual(Precios::calcularSubtotal($compra), 890),
    'El ITBIS es el 18 % del subtotal' => fn () => $igual(Precios::impuesto(100), 18),
    'El resumen muestra el total' => fn () => str_contains(Reporte::resumen($compra), 'Total'),
    'Envío de 90 por debajo de 1200' => fn () => $igual(Precios::cargoEnvio(100), 90),
    'Envío gratis desde 1200' => fn () => $igual(Precios::cargoEnvio(1200), 0),
    'El resumen con envío muestra el envío' => fn () => str_contains(Reporte::resumenConEnvio($compra), 'Envío'),
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
