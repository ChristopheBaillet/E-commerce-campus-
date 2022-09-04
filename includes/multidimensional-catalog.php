<?php
require_once 'assets/my-functions.php';
require_once 'assets/database.php';
require_once 'assets/Item.php';
require_once 'assets/Catalogue.php';
require_once 'assets/Mouse.php';
require_once 'assets/Cart.php';

if (isset($_POST['name'])) {
    if (intval($_POST['quantity_purchased']) > 0) {
        if (!isset($_SESSION[$_POST['name']])) {
            $_SESSION[$_POST['name']] = ['quantity_purchased' => $_POST['quantity_purchased'], 'id' => $_POST['id']];
        } elseif ($_SESSION[$_POST['name']]['quantity_purchased'] !== $_POST['quantity_purchased']) {
            $_SESSION[$_POST['name']]['quantity_purchased'] = $_POST['quantity_purchased'];
        }
    }
}
$catalogue = new Catalogue();
displayCatalogue($catalogue);

// Souvent on identifie cet objet par la variable $conn ou $db
/*$colors = getColumnsFromTable(Connection(), 'mouse', 'color');
$mouse = selectASpecificElementFromTable(Connection(), 'products', 'name', 'Mouse');
$mouses = [];
foreach ($colors as $key => $color) {
    $mouses[] = $mouse;
    $mouses[$key]['color'] = $color['color'];
}
$test= [];
foreach ($mouses as $mouse) {
    $test[] = new Mouse($mouse);
}*/


