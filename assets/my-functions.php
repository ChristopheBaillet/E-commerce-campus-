<?php
declare(strict_types=1);
function formatPrice(int $price): void
{
    $price = $price / 100;
    echo number_format($price, 2, ",", " ") . "€";
}

function priceExcludingVAT(int $prixTTC, int $TVA = 20): int
{
    return (int)($prixTTC / (1 + $TVA / 100));
}

function discountPrice(int $price, int $discount): int
{
    return (int)(($price * 100) / (100 + $discount));
}

function priceForWeight(int $price, int $weight, string $transporteur): int
{
    $price_for_weight = 0;
    switch ($transporteur) {
        case ("La poste"):
            if ($weight <= 500) {
                $price_for_weight = 500;
            } else if ($weight <= 2000) {
                $price_for_weight = $price * 10 / 100;
            }
            break;
        case ("Amazon"):
            if ($weight <= 500) {
                $price_for_weight = 500 - 1;
            } else if ($weight <= 2000) {
                $price_for_weight = $price * 10 / 100 - 1;
            }
            echo "On est moins cher que la poste ;)";
            break;
        case ("daron"):
            echo "Toi tu vas te bouger les fesses avant que je te colle mon 45 au cul --'";
            break;
        case ("Musk"):
            if ($weight <= 500) {
                $price_for_weight = 500 * 100;
            } else if ($weight <= 2000) {
                $price_for_weight = $price * 10;
            }
            break;
    }
    return (int)$price_for_weight;
}


function displayItem(Item $item): void
{
    ?>
    <div class="card col-4 me-3 ms-3 mb-3 mt-3" style="width: 15rem;">
        <img src="<?= $item->getImageURL() ?>" style="height: 200px; border-bottom: darkgrey 1px dotted;">
        <div class="card-body d-flex flex-column justify-content-between">
            <div class="container">
                <h5 class="card-title"><?= $item->getName() ?></h5>

                <?php
                if ($item->getDiscount() !== null) {
                    ?>
                    <p>
                        <span style="text-decoration: line-through red;"><?php formatPrice($item->getPrice()) ?> </span>
                        TTC <strong>-<?= $item->getDiscount() ?>%</strong></p>
                    <p>Prix :
                        <strong><?php formatPrice(discountPrice($item->getPrice(), $item->getDiscount())); ?></strong>
                    </p>
                    <?php
                } else { ?>
                    <p>Prix : <strong><?php formatPrice($item->getPrice()) ?></strong></p>
                    <?php
                } ?>
            </div>
            <div class="container">
                <form method="post">
                    <div class="container mb-3 ps-0 pe-0">
                        <label class="mb-1" for="quantity_purchased">Quantité : </label>
                        <input class="mb-3" type="number" name="quantity_purchased" min="0" value="0">
                        <input type="hidden" value="<?= $item->getId() ?>" name="id">
                        <input type="hidden" value="<?= $item->getName() ?>" name="name">
                        <input type="submit" class="btn btn-primary" value="Ajouter au panier">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}

function displayCatalogue(Catalogue $catalogue): void
{
    echo "<h2>Products</h2>";
    echo "<div class='container-fluid d-flex flex-wrap' style='background-color: #d5d5d5'>";
    foreach ($catalogue->getItems() as $item) {
        displayItem($item);
    }
    echo "</div>";

}

function displayClientList(ClientList $list): void
{
    echo "<pre>";
    var_dump($list);
    echo "</pre>";
}

function displayCart(Cart $cart): void
{
    $total_TTC = 0;
    $total_weight = 0;
    $transporteur = "La poste";
    if (isset($_POST['transporteur'])){
        $transporteur = $_POST['transporteur'];
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projet-campus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

<h1>Voici votre panier</h1>
<table class="table table-dark table-striped">
    <tr>
        <td>Nom du produit</td>
        <td>Prix Unitaire</td>
        <td>Quantité</td>
        <td>Total</td>
    </tr>
    <?php
    foreach ($cart->getItems() as $key => $quantity_purchased) {
        $product = getProductById(Connection(), $key);
        $name = $product["name"];
        $quantity = intval($quantity_purchased);
        $discount = intval($product['discount']);
        $price_of_one_product = intval($product['price']);
        if ($discount !== 0) {
            $price_of_one_product = discountPrice($price_of_one_product, $discount);
        }
        $total = $price_of_one_product * $quantity;
        $total_TTC += $total;
        $total_weight += $product['weight'] * $quantity;
        ?>
        <tr>
            <td><?= $name ?></td>
            <td><?php formatPrice($price_of_one_product) ?></td>
            <td><?= $quantity ?></td>
            <td><?php formatPrice($total) ?></td>
        </tr>
    <?php }
    $HT = priceExcludingVAT($total_TTC);
    $TVA = $total_TTC - $HT;
    $price_for_weight = priceForWeight($total_TTC, $total_weight, $transporteur);
    ?>
    <tr>
        <td></td>
        <td></td>
        <td>Total :</td>
        <td><?php formatPrice($total_TTC) ?></td>
    </tr>

    <tr>
        <td></td>
        <td></td>
        <td>Total HT :</td>
        <td><?php formatPrice($HT) ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>TVA :</td>
        <td><?php formatPrice($TVA) ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <form method="post">
                <select name="transporteur" id="select_transporteur">
                    <option <?php if ($transporteur == 'La poste') {
                        echo("selected");
                    } ?> value="La_poste">La poste
                    </option>
                    <option <?php if ($transporteur == 'Amazon') {
                        echo("selected");
                    } ?> value="Amazon">Amazon
                    </option>
                    <option <?php if ($transporteur == 'daron') {
                        echo("selected");
                    } ?> value="daron">Mon daron
                    </option>
                    <option <?php if ($transporteur == 'Musk') {
                        echo("selected");
                    } ?> value="Musk">Elon Musk qui envoi ton colis sur Mars
                    </option>
                </select>
                <input type="submit" value="VALIDER" class="btn btn-light">
            </form>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Prix transport :</td>
        <td><?php formatPrice($price_for_weight) ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Total TTC :</td>
        <td><?php formatPrice($total_TTC + $price_for_weight) ?></td>
    </tr>
</table>
<a href="../index.php" class="btn btn-primary">Return</a>
<a href="../pages/order.php" class="btn btn-success">Valider la commande</a>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

    <?php
}