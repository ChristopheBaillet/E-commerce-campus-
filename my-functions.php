<?php
function formatPrice($price = 0): void
{
    $price = "$price";
    $arr = str_split($price);
    $add = ",";
    array_splice($arr, count($arr)-2, 0, $add);
    $price = implode($arr);
    echo $price."€\n";
}