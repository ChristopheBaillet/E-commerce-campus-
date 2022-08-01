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
    ],
    "mousee" => [
        "name" => "Mouse",
        "price" => 5000,
        "weight" => 60,
        "discount" => null,
        "picture_url" => "imgs/souris.jpg",
    ],
    "mouseee" => [
        "name" => "Mouse",
        "price" => 5000,
        "weight" => 60,
        "discount" => null,
        "picture_url" => "imgs/souris.jpg",
    ],
    "mouseeee" => [
        "name" => "Mouse",
        "price" => 5000,
        "weight" => 60,
        "discount" => null,
        "picture_url" => "imgs/souris.jpg",
    ],
    "mouseeeee" => [
        "name" => "Mouse",
        "price" => 5000,
        "weight" => 60,
        "discount" => null,
        "picture_url" => "imgs/souris.jpg",
    ],
    "mous" => [
        "name" => "Mouse",
        "price" => 5000,
        "weight" => 60,
        "discount" => null,
        "picture_url" => "imgs/souris.jpg",
    ]
];
?>
<h2>Products</h2>
<div class="container-fluid d-flex flex-wrap">
    <?php foreach ($products as $product) {
        ?>
        <div class="card col-4 me-3 ms-3 mb-3 mt-3" style="width: 18rem;">
            <img src="<?= $product["picture_url"] ?>">
            <div class="card-body d-flex flex-column justify-content-between">
                <div class="container">
                    <h5 class="card-title"><?= $product['name'] ?></h5>

                    <?php
                    if ($product['discount'] !== null) {
                        ?>
                        <p><span style="text-decoration: line-through red;"><?php formatPrice($product["price"]) ?> €</span> TTC  <strong>-<?= $product['discount'] ?>%</strong></p>
                        <p>Prix : <strong><?php formatPrice(discountPrice($product["price"], $product['discount'])); ?>€</strong></p>
                        <?php
                    } else { ?>
                        <p>Prix : <strong><?php formatPrice($product["price"]) ?>€</strong></p>
                        <?php
                    } ?>
                </div>
                <div class="container">
                    <form method="post" action="cart.php">
                        <div class="container mb-3 ps-0 pe-0">
                            <label for="quantity">Quantité : </label>
                            <input type="number" id="quantity" name="quantity" min="1" max="100" step="1" value="1">
                        </div>
                        <input class="btn btn-primary" value="Commandez" type="submit">
                    </form>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

