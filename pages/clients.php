<?php
require_once '../assets/database.php';
require_once '../assets/Customer.php';
require_once '../assets/ClientList.php';

$customersFromDatabase = SelectAllElementsFromTable(Connection(), 'customers');
$customers = [];
foreach ($customersFromDatabase as $customer) {
$customers[] = new Customer($customer);
}
$clientList = new ClientList($customers);
?>
<h2>Customers</h2>
<div class="container-fluid d-flex flex-wrap" style="background-color: #d5d5d5">
    <?php
    displayClientList($clientList);
    ?>
</div>
