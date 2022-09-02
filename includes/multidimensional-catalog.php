<?php
require_once 'assets/my-functions.php';
require_once 'assets/database.php';
require_once 'assets/Item.php';
require_once 'assets/Catalogue.php';
require_once 'assets/Mouse.php';

// Souvent on identifie cet objet par la variable $conn ou $db
$products = selectAllElementsFromTable(Connection(), 'products');
$items = [];
$colors = getColumnsFromTable(Connection(), 'mouse', 'color');
$mouse = selectASpecificElementFromTable(Connection(), 'products', 'name', 'Mouse');
$mouses = [];
foreach ($colors as $key => $color) {
    $mouses[] = $mouse;
    $mouses[$key]['color'] = $color['color'];
}
?>
<pre>
    <?php
    var_dump($mouses);
    ?>
    </pre>
<?php
$test= [];
foreach ($mouses as $mouse) {
    $test[] = new Mouse($mouse);
}
?>
<pre>
    <?php
    var_dump($test);
    ?>
    </pre>
<?php
foreach ($products as $product) {
    $items[] = new Item($product);
}
$catalogue = new Catalogue($items);
if (isset($_POST['name'])) {
    if (intval($_POST['quantity_purchased']) > 0) {
        if (!isset($_SESSION[$_POST['name']])) {
            $_SESSION[$_POST['name']] = ['name' => $_POST['name'], 'quantity_purchased' => $_POST['quantity_purchased'], 'price' => $_POST['price'], 'discount' => $_POST['discount'], 'weight' => $_POST['weight'], 'id' => $_POST['id']];
        } elseif ($_SESSION[$_POST['name']]['quantity_purchased'] !== $_POST['quantity_purchased']) {
            $_SESSION[$_POST['name']]['quantity_purchased'] = $_POST['quantity_purchased'];
        }
    }
} ?>
<h2>Products</h2>
<div class="container-fluid d-flex flex-wrap" style="background-color: #d5d5d5">
    <?php
    displayCatalogue($catalogue);
    ?>
</div>


