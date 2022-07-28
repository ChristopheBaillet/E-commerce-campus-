<?php
$iphone = [
    "name" => "iPhone",
    "price" => 450,
    "weight" => 220,
    "discount" =>10,
    "picture_url" => "https://www.bouyguestelecom.fr/media/catalog/product//a/p/apple-iphone13-pro-max-argent-face.png",
];
?>
<div class="card">
    <h1><?= $iphone["name"]?></h1>
    <img src="<?= $iphone["picture_url"]?>">
    <p><?= $iphone["weight"]?> g</p>
    <p><?= $iphone["discount"]?>% discount</p>
    <p><?= $iphone["price"]?>€</p>
</div>
