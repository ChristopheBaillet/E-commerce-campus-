<?php
require_once 'my-functions.php';
require_once 'product-list.php';
global $products;
?>
<h2>Products</h2>
<form method="post" action="cart.php">
    <div class="container-fluid d-flex flex-wrap" style="background-color: #d5d5d5">
        <?php foreach ($products as $key => $product) {
            ?>
            <div class="card col-4 me-3 ms-3 mb-3 mt-3" style="width: 15rem;">
                <img src="<?= $product["picture_url"] ?>" style="height: 200px; border-bottom: darkgrey 1px dotted;">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="container">
                        <h5 class="card-title"><?= $product['name'] ?></h5>

                        <?php
                        if ($product['discount'] !== null) {
                            ?>
                            <p>
                                <span style="text-decoration: line-through red;"><?php formatPrice($product["price"]) ?> </span>
                                TTC <strong>-<?= $product['discount'] ?>%</strong></p>
                            <p>Prix :
                                <strong><?php formatPrice(discountPrice($product["price"], $product['discount'])); ?></strong>
                            </p>
                            <?php
                        } else { ?>
                            <p>Prix : <strong><?php formatPrice($product["price"]) ?></strong></p>
                            <?php
                        } ?>
                    </div>
                    <div class="container">
                        <div class="container mb-3 ps-0 pe-0">
                            <label for="quantity">Quantité : </label>
                            <input type="number" name="quantity[]" min="0" value="0">
                            <input type="hidden" value="<?= $key ?>" name="key[]">
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        ?>
    </div>
    <div class="container d-flex justify-content-center" style="height: 100%">
        <input type="submit" class="btn btn-primary" value="Ajouter au panier">
    </div>
</form>

