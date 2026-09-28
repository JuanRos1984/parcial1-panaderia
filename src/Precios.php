<?php

final class Precios
{
    public const MONTO_MINIMO_DESCUENTO = 700;

    public const ITBIS = 0.18;

    // Suma cantidad por precio unitario de cada línea.
    public static function calcularSubtotal(array $lineas): float
    {
        return array_sum(array_map(fn (Linea $l) => $l->cantidad * $l->precioUnitario, $lineas));
    }

    public static function impuesto(float $subtotal): float
    {
        return round($subtotal * self::ITBIS, 2);
    }
}
