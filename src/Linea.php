<?php

final class Linea
{
    public function __construct(
        public readonly string $producto,
        public readonly int $cantidad,
        public readonly float $precioUnitario,
    ) {
    }
}
