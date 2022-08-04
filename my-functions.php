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

function priceForWeight(int $price, int $weight, string $transporteur): int
{
    $price_for_weight = 0;
    switch ($transporteur){
        case ("La poste"):
            if ($weight <= 500){
                $price_for_weight = 500;
            }else if ($weight <= 2000){
                $price_for_weight = $price*10/100 ;
            }
            break;
        case ("Amazon"):
            if ($weight <= 500){
                $price_for_weight = 500-1;
            }else if ($weight <= 2000){
                $price_for_weight = $price*10/100-1 ;
            }
            echo "On est moins cher que la poste ;)";
            break;
        case ("daron"):
            echo "Toi tu vas te bouger les fesses avant que je te colle mon 45 au cul --'";
            break;
        case ("Musk"):
            if ($weight <= 500){
                $price_for_weight = 500*100;
            }else if ($weight <= 2000){
                $price_for_weight = $price*10 ;
            }
            break;
    }
    return (int)$price_for_weight;
}

function emptyCart():void {
    session_destroy();
}