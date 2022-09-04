<?php

class Catalogue
{
    private array $items;

    public function __construct()
    {
        $products = SelectAllElementsFromTable(Connection(), 'products');
        foreach ($products as $product) {
            $this->items[$product['id']] = new Item($product);
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }


}