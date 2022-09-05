<?php
session_start();
require_once '../assets/my-functions.php';
require_once "../assets/database.php";
require_once '../assets/Cart.php';


$Cart = new Cart();
foreach ($_SESSION as $value) {
    $Cart->add($value['id']);
    $Cart->update($value['id'], $value['quantity_purchased']);
}
displayCart($Cart);