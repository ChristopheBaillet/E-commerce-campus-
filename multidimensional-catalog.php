<?php
require_once 'my-functions.php';
$products = [
    "iphone" => [
        "name" => "iPhone",
        "price" => 45000,
        "weight" => 220,
        "discount" => 10,
        "picture_url" => "https://www.bouyguestelecom.fr/media/catalog/product//a/p/apple-iphone13-pro-max-argent-face.png",
    ],
    "ipad" => [
        "name" => "iPad",
        "price" => 60000,
        "weight" => 500,
        "discount" => 25,
        "picture_url" => "https://c1.lestechnophiles.com/images.frandroid.com/wp-content/uploads/2019/04/ipad-pro-11-2018.png?resize=580,580",
    ],
    "vacuum-cleaner" => [
        "name" => "dyson",
        "price" => 25000,
        "weight" => 3000,
        "discount" => 25,
        "picture_url" => "imgs/aspirateur.jpg",
    ],
    "brush" => [
        "name" => "toothbrush",
        "price" => 300,
        "weight" => 10,
        "discount" => 10,
        "picture_url" => "https://www.bio.coop/media/catalog/product/1/8/1836347855-3700376702504-bioseptyl-brosse_a_dent_en_nylon_adulte_souple-bf6000.jpeg?quality=80&bg-color=255,255,255&fit=bounds&height=460&width=460&canvas=460:460",
    ],
    "glass" => [
        "name" => "glass",
        "price" => 500,
        "weight" => 200,
        "discount" => 50,
        "picture_url" => "https://www.ikea.com/fr/fr/images/products/pokal-verre-verre-transparent__0713251_pe729361_s5.jpg?f=xs",
    ],
    "mouse" => [
        "name" => "mouse",
        "price" => 5000,
        "weight" => 60,
        "discount" => 25,
        "picture_url" => "https://image.darty.com/darty?type=image&source=/market/2018/02/21/mkp_0YhPtF1wxSBYnQ.jpeg&width=400&height=300&quality=90",
    ]
];
foreach ($products as $product) {
    ?>
    <div class="card">
        <h1><?= $product['name'] ?></h1>
        <img src="<?= $product["picture_url"] ?>">
        <p><?= $product["weight"] ?> g</p>
        <p><?= $product["discount"] ?>% discount</p>
        <p><?= formatPrice($product["price"]) ?></p>
    </div>
    <?php
}

