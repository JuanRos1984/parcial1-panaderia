# Facturación de la panadería

Sistema de facturación de una panadería de barrio. Calcula subtotal, ITBIS, descuentos y
cargo de envío de una compra.

## Ejecutar las pruebas

```
php -l src/Precios.php
php pruebas.php
```

Las pruebas imprimen `OK` o `FALLA` por caso y terminan con «Todas las pruebas pasan.»
cuando no falla ninguna.

## Ramas en curso

- `feature/descuento-pedido-grande`: descuento por compra grande.
- `feature/cargo-delivery`: cargo de envío.
- `hotfix/cantidades-invalidas`: arreglo urgente para rechazar líneas con cantidad cero o negativa. Tiene
  mezclados experimentos de la impresora de tickets.

Las tres están terminadas, pero ninguna se ha integrado a `main`.

## Decisiones del dueño

Estas reglas mandan sobre cualquier valor que aparezca en el código o en una rama:

- **El monto mínimo para aplicar descuento es RD$ 900.**
- El descuento por compra grande es del 12 %.
- El envío cuesta RD$ 90 y es gratis desde RD$ 1,200.
- El arreglo urgente de cantidades inválidas va a `main`. Los experimentos de la impresora
  (carpeta `experimentos/`) no van a `main`.
