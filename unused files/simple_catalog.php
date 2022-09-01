<?php
$products = ["iPhone", "iPad", "iMac"];
sort($products);
print_r($products);
echo $products[0];
echo "\n" . $products[count($products) - 1];
