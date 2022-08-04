<?php
declare(strict_types=1);
function formatPrice(int $price):void
{
    $price = $price / 100;
    echo number_format($price, 2, ",", " ")."€";
}
function priceExcludingVAT(int $prixTTC, int $TVA = 20): int
{
    return (int)($prixTTC/(1+$TVA/100));
}
function discountPrice(int $price, int $discount): int {
    return (int)(($price*100)/(100+$discount));
}
function priceForWeight(int $price, int $weight): int
{
    $price_for_weight = 0;
    if ($weight <= 500){
        $price_for_weight = 500;
    }else if ($weight <= 2000){
        $price_for_weight = $price*10/100 ;
    }
    return (int)$price_for_weight;
}

function addItemToCart(string $key_item): void{

}

function deleteItemFromCart(string $key_item): void{

}

function emptyCart():void {
    session_destroy();
}