<?php
declare(strict_types=1);
function formatPrice(int $price): string
{
    $price = $price / 100;
    return number_format($price, 2, ",", " ");
}
function priceExcludingVAT(int $prixTTC, int $TVA = 20): string
{
    return formatPrice((int)($prixTTC/(1+$TVA/100)));
}
function discountPrice(int $price, int $discount): string {
    return formatPrice((int)(($price*100)/(100+$discount)));
}