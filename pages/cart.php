<?php
session_start();
require_once '../assets/my-functions.php';
require_once "../assets/database.php";
$mysqlConnection = Connection();
$products = selectAllElementsFromTable($mysqlConnection, 'products');
$cart = [];
$i = 0;
$total_TTC = 0;
$total_weight = 0;
$transporteur = "La poste";
if (isset($_POST['transporteur'])){
    $transporteur = $_POST['transporteur'];
}
foreach ($_SESSION as $key => $product) {
    var_dump($product);
    $cart[$key] = $product;
}
var_dump($cart);
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
    foreach ($cart as $product) {
        $name = $product["name"];
        $quantity = intval($product["quantity_purchased"]);
        $discount = intval($product['discount']);
        $price_of_one_product = intval($product['price']);
        if ($discount !== null) {
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
                    <option <?php if($transporteur == 'La poste'){echo("selected");}?> value="La_poste">La poste</option>
                    <option <?php if($transporteur == 'Amazon'){echo("selected");}?> value="Amazon">Amazon</option>
                    <option <?php if($transporteur == 'daron'){echo("selected");}?> value="daron">Mon daron</option>
                    <option <?php if($transporteur == 'Musk'){echo("selected");}?> value="Musk">Elon Musk qui envoi ton colis sur Mars</option>
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
<form method="post" action="order.php">
    <?php
    foreach ($cart as $key => $product) {
        $product = serialize($product);
        echo "<input type='hidden' name='$key' value='$product'>";
    }
    ?>
    <input type="submit" value="Valider la commande" class="btn btn-success">
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>