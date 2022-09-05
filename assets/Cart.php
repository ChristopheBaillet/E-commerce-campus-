<?php

class Cart
{
    private array $items;


    public function add($product_id): void
    {
        if (isset($this->items[$product_id])) {
            $this->items[$product_id]++;
        } else {
            $this->items[$product_id] = 1;
        }
    }

    public function delete($product_id): void
    {
        if (isset($this->items[$product_id])) {
            unset($this->items[$product_id]);
        }
    }

    public function update(int $product_id, int $quantity_purchased): void
    {
        if (isset($this->items[$product_id])) {
            $this->items[$product_id] = $quantity_purchased;
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

    public function getQuantityPurchased($product_id):int
    {
        return $this->items[$product_id];
    }


}