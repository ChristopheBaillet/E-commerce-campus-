<?php

class Catalogue
{
    private array $items;

    public function __construct(PDO $db)
    {
        $products = SelectAllElementsFromTable($db, 'products');
        $this->setItems($products);
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        foreach ($items as $product) {
            $this->items[$product['id']] = new Item($product);
        }
    }


}