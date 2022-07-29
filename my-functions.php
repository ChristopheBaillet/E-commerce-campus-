<?php
declare(strict_types=1);
function formatPrice(int $price): string
{
    $price = strval($price);
    $arr = str_split($price);
    $add = ",";
    array_splice($arr, count($arr)-2, 0, $add);
    $price = implode($arr);
    return $price."€\n";
}
function priceExcludingVAT(int $prixTTC, int $TVA = 20): string
{
    return formatPrice((int)(($prixTTC*100)/(100+$TVA)));
}
function discountPrice(int $price, int $discount): string {
    return formatPrice((int)(($price*100)/(100+$discount)));
}