<?php
session_start();
require_once '../assets/database.php';
header ("Refresh: 5;URL=../index.php");
$db = Connection();
$customer_id = rand(1,2);
AddAnOrder($db, $customer_id,$_SESSION);
?>
Vous allez être redirigez le temps de valider la commande
<?php
session_destroy();

