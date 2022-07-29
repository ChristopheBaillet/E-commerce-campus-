<?php
require_once 'my-functions.php';
$products = [
    "iphone" => [
        "name" => "iPhone",
        "price" => 45056,
        "weight" => 220,
        "discount" => 10,
        "picture_url" => "imgs/iphone.png",
    ],
    "ipad" => [
        "name" => "iPad",
        "price" => 60000,
        "weight" => 500,
        "discount" => 25,
        "picture_url" => "imgs/ipad.jpg",
    ],
    "vacuum-cleaner" => [
        "name" => "Dyson",
        "price" => 25000,
        "weight" => 3000,
        "discount" => 25,
        "picture_url" => "imgs/aspirateur.jpg",
    ],
    "brush" => [
        "name" => "Toothbrush",
        "price" => 300,
        "weight" => 10,
        "discount" => 10,
        "picture_url" => "imgs/brosse-a-dent.jpg",
    ],
    "glass" => [
        "name" => "Glass",
        "price" => 500,
        "weight" => 200,
        "discount" => 50,
        "picture_url" => "imgs/verre.jpg",
    ],
    "mouse" => [
        "name" => "Mouse",
        "price" => 5000,
        "weight" => 60,
        "discount" => null,
        "picture_url" => "imgs/souris.jpg",
    ]
];
?>
<div class="container-fluid col-12 d-flex">
    <?php foreach ($products as $product) {
        ?>
        <div class="card col-4 me-3 ms-3" style="width: 18rem;">
            <img src="<?= $product["picture_url"] ?>">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="container">
                    <h5 class="card-title"><?= $product['name'] ?></h5>

                    <?php
                    if ($product['discount'] !== null) {
                        ?>
                        <p style="text-decoration: line-through red"><?= formatPrice($product["price"]) ?> € TTC</p>
                        <p>-<?= $product['discount'] ?>%</p>
                        <p>Prix : <?= discountPrice($product["price"], $product['discount']); ?>€</p>
                        <?php
                    } else { ?>
                        <p>Prix : <?= formatPrice($product["price"]) ?></p>
                        <?php
                    } ?>
                </div>
                <div class="container">
                    <form method="post" action="cart.php">
                        <div class="container mb-3 ps-0 pe-0">
                            <label for="quantity">Quantité : </label>
                            <input type="number" id="quantity" name="quantity" min="1" max="100" step="1" value="1">
                        </div>
                        <a class="btn btn-primary">Commandez !</a>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

