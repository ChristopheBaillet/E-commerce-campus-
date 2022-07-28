<?php
$products = [
    "iphone" => [
        "name" => "iPhone",
        "price" => 450,
        "weight" => 220,
        "discount" =>10,
        "picture_url" => "https://www.bouyguestelecom.fr/media/catalog/product//a/p/apple-iphone13-pro-max-argent-face.png",
    ],
    "ipad" => [
        "name" => "iPad",
        "price" => 600,
        "weight" => 500,
        "discount" =>25,
        "picture_url" => "https://c1.lestechnophiles.com/images.frandroid.com/wp-content/uploads/2019/04/ipad-pro-11-2018.png?resize=580,580",
    ]
];
?>
<div class="card">
    <h1><?= $products["iphone"]["name"]?></h1>
    <img src="<?= $products["iphone"]["picture_url"]?>">
    <p><?= $products["iphone"]["weight"]?> g</p>
    <p><?= $products["iphone"]["discount"]?>% discount</p>
    <p><?= $products["iphone"]["price"]?>€</p>
</div>
<div class="card">
    <h1><?= $products["ipad"]["name"]?></h1>
    <img src="<?= $products["ipad"]["picture_url"]?>">
    <p><?= $products["ipad"]["weight"]?> g</p>
    <p><?= $products["ipad"]["discount"]?>% discount</p>
    <p><?= $products["ipad"]["price"]?>€</p>
</div>

