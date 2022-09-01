<?php
require_once '../assets/database.php';
$db = Connection();
if (isset($_POST['soustract'])){
    SoustractQuantityfromStock($db, $_POST['id'], $_POST['quantity']);
}
if (isset($_POST['delete'])){
    DeleteProductFromDatabase($db, $_POST['product_id']);
}
if (isset($_POST['add'])){
    AddProductToDatabase($db,intval($_POST['category_id']), $_POST['name'], $_POST['description'], $_POST['image'], intval($_POST['price']), intval($_POST['weight']), intval($_POST['available']), intval($_POST['quantity']), intval($_POST['discount']));
}
$products = SelectAllElementsFromTable($db, 'products');
$keys = [];
    foreach ($products[1] as $key => $value){
        $keys[] = $key;

} ?>
<h1>Enlever des produits du stock</h1>
<form method="post">
    <label for="quantity">Quantité</label>
    <input type="number" name="quantity" value="0">
    <label for="id">Id</label>
    <input type="number" name="id" value="0">
    <input type="submit" name="soustract" value="confirmer">
</form>
<h1>Supprimer un produit de la base de données</h1>
<form method="post">
    <label for="product_id">Id</label>
    <input type="number" name="product_id" value="0">
    <input type="submit" name="delete" value="confirmer">
</form>
<h1>Ajouter un produit dans la base de données</h1>
<form method="post" >
    <?php
    foreach ($keys as $key){
        if ($key !== 'id'){
            echo("<label for='$key'>$key</label>");
            echo("<input type='text' name='$key' value=''>");
        }
    }
    ?>
    <input type="submit" name="add" value="confirmer">
<pre>
    <?php
    var_dump($_POST);
    $products = selectAllElementsFromTable($db, 'products');
    var_dump($products);
    ?>
</pre>