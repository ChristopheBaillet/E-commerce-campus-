<?php
session_start();
require_once '../assets/database.php';
header ("Refresh: 5;URL=../index.php");
$db = Connection();
$customer_id = rand(1,2);
AddAnOrder($db, $customer_id);
$order_id = $db->lastInsertId();
foreach ($_SESSION as $value) {
    LinkAnOrderProductToAnOrder($db, $order_id, $value['id'], $value['quantity_purchased']);
}

?>
Vous allez être redirigez le temps de valider la commande
<?php
session_destroy();

