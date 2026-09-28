<?php

require __DIR__ . '/src/Linea.php';
require __DIR__ . '/src/Precios.php';
require __DIR__ . '/src/Reporte.php';

$compra = [new Linea('Pan sobao (docena)', 2, 120), new Linea('Bizcocho 1 lb', 1, 650)];
echo Reporte::resumen($compra) . PHP_EOL;
