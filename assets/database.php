<?php
function SelectAllElementsFromTable(PDO $db, string $table) :array
{
    $query = "SELECT * FROM $table";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function Connection(): PDO{
    return new PDO(
        'mysql:host=localhost;dbname=boutique;charset=utf8',
        'Christophe'
    );
}

function AddAnOrder(PDO $db, int $customer_id): void{
    $query = "INSERT INTO orders (customer_id, date) VALUES ($customer_id, CURDATE())";
    $statement = $db->prepare($query);
    $statement->execute();
}

function LinkAnOrderProductToAnOrder(PDO $db, int $order_id, int $product_id, int $quantity): void{
    $query = "INSERT INTO order_product (order_id, product_id, quantity) VALUES ($order_id, $product_id, $quantity)";
    $statement = $db->prepare($query);
    $statement->execute();
}

function GetTheMaxOf(PDO $db, string $table, string $column): array{
    $query = "SELECT MAX($column) AS maximum FROM $table";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function makeNumber(int $id):string{
    switch ($id){
        case $id<10 :
            return '000000000'.$id;
        case $id<100:
            return '00000000'.$id;
        case $id<1000:
            return '0000000'.$id;
        case $id<10000:
            return '000000'.$id;
    }
    return '';
}

function SoustractQuantityfromStock(PDO $db, int $product_id, int $quantity): void{
    $query = "UPDATE products SET quantity = quantity - $quantity WHERE id = $product_id";
    $statement = $db->prepare($query);
    $statement->execute();
}

function AddQuantityToStock(PDO $db, int $product_id, int $quantity): void{
    $query = "UPDATE products SET quantity = quantity + $quantity WHERE id = $product_id";
    $statement = $db->prepare($query);
    $statement->execute();
}

function DeleteProductFromDatabase(PDO $db, int $product_id): void{
    $query = "DELETE FROM products WHERE id = $product_id";
    $statement = $db->prepare($query);
    $statement->execute();
}

function AddProductToDatabase(PDO $db,int $category_id, string $name, string $description, string $image, int $price, int $weight, int $available, int $quantity, int $discount): void{
    $query = "INSERT INTO `products`(`category_id`, `name`,`description`, `image`, `price`, `weight`, `available`, `quantity`, `discount`) VALUES ('$category_id','$name','$description','$image','$price','$weight','$available','$quantity', '$discount')";
    $statement = $db->prepare($query);
    $statement->execute();
}