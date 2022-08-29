<?php
require_once 'my-functions.php';
require_once 'database.php';
// Souvent on identifie cet objet par la variable $conn ou $db
$mysqlConnection = Connection();
$products = selectAllElementsFromTable($mysqlConnection, 'products');
 if (isset($_POST['emptyCart'])) {
    emptyCart();
}
if (isset($_POST['name'])) {
    if (intval($_POST['quantity_purchased']) > 0) {
        if (!isset($_SESSION[$_POST['name']])) {
            $_SESSION[$_POST['name']] = ['name' => $_POST['name'], 'quantity_purchased' => $_POST['quantity_purchased'], 'price' => $_POST['price'], 'discount' => $_POST['discount'], 'weight' => $_POST['weight']];
        } elseif ($_SESSION[$_POST['name']]['quantity_purchased'] !== $_POST['quantity_purchased']) {
            $_SESSION[$_POST['name']]['quantity_purchased'] = $_POST['quantity_purchased'];
        }
    }
} ?>
<h2>Products</h2>

<div class="container-fluid d-flex flex-wrap" style="background-color: #d5d5d5">
    <?php foreach ($products as $product) {
        ?>
        <div class="card col-4 me-3 ms-3 mb-3 mt-3" style="width: 15rem;">
            <img src="<?= $product["image"] ?>" style="height: 200px; border-bottom: darkgrey 1px dotted;">
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
                    <form method="post">
                        <div class="container mb-3 ps-0 pe-0">
                            <label class="mb-1" for="quantity_purchased">Quantité : </label>
                            <input class="mb-3" type="number" name="quantity_purchased" min="0" value="0">
                            <input type="hidden" value="<?= $product['name'] ?>" name="name">
                            <input type="hidden" value="<?= $product['price'] ?>" name="price">
                            <input type="hidden" value="<?= $product['discount'] ?>" name="discount">
                            <input type="hidden" value="<?= $product['weight'] ?>" name="weight">
                            <input type="submit" class="btn btn-primary" value="Ajouter au panier">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }

    ?>
</div>
<div class="container d-flex justify-content-center" style="height: 100%">

</div>


