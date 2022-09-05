<?php
session_start();
require_once '../assets/my-functions.php';
require_once "../assets/database.php";
require_once '../assets/Cart.php';
require_once '../assets/Item.php';
$Cart = new Cart();
foreach ($_SESSION as $value) {
    $Cart->add($value['id']);
    $Cart->update($value['id'], $value['quantity_purchased']);
}
echo '<pre>';
var_dump($Cart);
echo '</pre>';
displayCart($Cart);

/*$i = 0;
$total_TTC = 0;
$total_weight = 0;
$transporteur = "La poste";
if (isset($_POST['transporteur'])){
    $transporteur = $_POST['transporteur'];
}
foreach ($_SESSION as $key => $product) {
    $cart[$key] = $product;
    $Cart->add(intval($product['id']), intval($product['quantity_purchased']));
}

displayCart($Cart);*/