<?php
require_once 'assets/my-functions.php';
require_once 'assets/database.php';
require_once 'assets/item.php';
require_once 'assets/Catalogue.php';
// Souvent on identifie cet objet par la variable $conn ou $db
$mysqlConnection = Connection();
$products = selectAllElementsFromTable($mysqlConnection, 'products');
$orders = selectAllElementsFromTable($mysqlConnection, 'orders');
$order_products = selectAllElementsFromTable($mysqlConnection, 'order_product');

$items = [];
foreach ($products as $product) {
    $items[] = new Item($product);
}
$catalogue = new Catalogue($items);
?>
<pre>
    <?php
    var_dump($catalogue);
    ?>
</pre>
<?php
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
<div class="container d-flex justify-content-center" style="height: 100%">

</div>


