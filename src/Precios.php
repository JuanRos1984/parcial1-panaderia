<?php

final class Precios
{
    public const MONTO_MINIMO_DESCUENTO = 1500;

    public const ITBIS = 0.18;

    // Suma cantidad por precio unitario de cada línea.
    public static function subtotal(array $lineas): float
    {
        return array_sum(array_map(fn (Linea $l) => $l->cantidad * $l->precioUnitario, $lineas));
    }

    public static function impuesto(float $subtotal): float
    {
        return round($subtotal * self::ITBIS, 2);
    }

    public static function descuento(float $subtotal): float { return $subtotal >= self::MONTO_MINIMO_DESCUENTO ? round($subtotal * 12 / 100, 2) : 0.0; }
}
