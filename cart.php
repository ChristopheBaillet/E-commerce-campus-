<?php
require_once 'my-functions.php';
require_once 'product-list.php';
global $products;
$key = $_GET["key"];
$quantity = $_GET["quantity"];
$product = $products[$key];
$discount = $product['discount'];
$price_of_one_product = $product['price'];
$total_TTC = $price_of_one_product * $quantity;
$HT = priceExcludingVAT($total_TTC);
$TVA = $total_TTC - $HT;
$total_weight = $product['weight']*$quantity;
$price_for_weight = priceForWeight($total_TTC,$total_weight);
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
    <tr>
        <td><?= $product['name'] ?></td>
        <?php
        if ($product['discount'] !== null) {
            ?>
            <td><?= formatPrice(discountPrice($price_of_one_product, $discount)) ?></td>
            <?php
        } else {
            ?>
            <td><?= formatPrice($price_of_one_product) ?></td>
        <?php }
        ?>
        <td><?= $quantity ?></td>
        <td><?= formatPrice($total_TTC) ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Total HT :</td>
        <td><?= formatPrice($HT) ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>TVA :</td>
        <td><?= formatPrice($TVA) ?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <form>
                <select name="transporteur" id="select_transporteur">
                    <option value="La_poste">La poste</option>
                    <option value="Amazon">Amazon</option>
                    <option value="daron">Mon daron</option>
                    <option value="Musk">Elon Musk qui envoi ton colis sur Mars</option>
                </select>
                <input type="submit" value="VALIDER" class="btn btn-light">
            </form>
        </td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Prix transport :</td>
        <td><?= formatPrice($price_for_weight)?></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>Total TTC :</td>
        <td><?= formatPrice($total_TTC+$price_for_weight) ?></td>
    </tr>
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>
