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

function SelectAllFromProductsWhereQuantityIsEqualToZero(PDO $db): array
{
    $query = "SELECT * FROM products WHERE quantity = 0";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function SelectAllOrdersWhereDateIsEqualToToday(PDO $db): array
{
    $query = "SELECT * FROM orders WHERE date = CURDATE()";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function SelectAllOrdersWhereDateIsLessThanTenDaysOld(PDO $db): array
{
    $query = "SELECT * FROM orders WHERE date > DATE_SUB(CURDATE(), INTERVAL 10 DAY)";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function ListOfOrdersWithOrderNumberAndTotalPrice(PDO $db): array{
    $query ="SELECT number, SUM((order_product.quantity*products.price)) AS total
FROM orders
    JOIN order_product ON (orders.id = order_product.order_id)
    JOIN products ON (order_product.product_id = products.id)
GROUP BY number";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function ListOfProductsFromAnOrderWithASpecificID(PDO $db, string $order_id): array{
    $query = "SELECT name,quantity,price
FROM products
WHERE id IN
      (SELECT product_id
       FROM order_product
       WHERE order_id = $order_id);";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function TotalPriceOfOrdersDoneToday(PDO $db): array{
    $query = "SELECT SUM((order_product.quantity*products.price)) AS total
FROM orders
    JOIN order_product ON (orders.id = order_product.order_id)
    JOIN products ON (order_product.product_id = products.id)
WHERE date = CURDATE()";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function ListOfOrdersWhereTotalPriceIsBetween100And550(PDO $db): array{
    $query = "SELECT number, SUM((order_product.quantity*products.price)) AS total
FROM orders
         JOIN order_product ON (orders.id = order_product.order_id)
         JOIN products ON (order_product.product_id = products.id)
GROUP BY number
HAVING total BETWEEN 100 AND 550";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function NumberOfOrdersPerCustomer(PDO $db): array{
    $query = "SELECT customers.first_name, customers.last_name, count(orders.number)
FROM customers
LEFT JOIN orders ON customers.id = orders.customer_id
GROUP BY customers.first_name , customers.last_name";
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
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