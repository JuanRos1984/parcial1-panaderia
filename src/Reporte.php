<?php

final class Reporte
{
    public static function resumen(array $lineas): string
    {
        $subtotal = Precios::subtotal($lineas);
        $impuesto = Precios::impuesto($subtotal);
        return sprintf('Subtotal: %.2f | ITBIS: %.2f | Total: %.2f', $subtotal, $impuesto, $subtotal + $impuesto);
    }
}
