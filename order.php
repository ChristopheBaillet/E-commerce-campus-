<?php
session_start();
require_once 'database.php';
header ("Refresh: 5;URL=index.php");
$db = Connection();
var_dump($_POST);
$cart = [];
foreach ($_POST as $key => $value){
    $cart[$key] = unserialize($value);
}
$order_id = rand(1,2);
AddAnOrder($db, $order_id);
foreach ($cart as $key => $product){
    $product_id = $product['id'];
    $quantity = $product['quantity_purchased'];
    LinkAnOrderProductToAnOrder($db, $order_id, $product_id, $quantity);
}
?>
<pre>
    <?php
var_dump($cart);
?>
    </pre>
Vous allez être redirigez le temps de valider la commande
<?php
session_destroy();

