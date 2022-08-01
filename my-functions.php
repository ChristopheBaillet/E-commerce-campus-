<?php
declare(strict_types=1);
function formatPrice(int $price):void
{
    $price = $price / 100;
    echo number_format($price, 2, ",", " ");
}
function priceExcludingVAT(int $prixTTC, int $TVA = 20): int
{
    return (int)($prixTTC/(1+$TVA/100));
}
function discountPrice(int $price, int $discount): int {
    return (int)(($price*100)/(100+$discount));
}