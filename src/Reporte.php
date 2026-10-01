<?php

final class Reporte
{
    public static function resumen(array $lineas): string
    {
        $subtotal = Precios::calcularSubtotal($lineas);
        $impuesto = Precios::impuesto($subtotal);
        return sprintf('Subtotal: %.2f | ITBIS: %.2f | Total: %.2f', $subtotal, $impuesto, $subtotal + $impuesto);
    }

    public static function resumenConEnvio(array $lineas): string
    {
        $subtotal = Precios::calcularSubtotal($lineas);
        return self::resumen($lineas) . sprintf(' | Envío: %.2f', Precios::cargoEnvio($subtotal));
    }
}
