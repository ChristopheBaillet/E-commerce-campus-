<?php

class Item
{
    public ?string $name, $description, $imageURL;
    public ?int $price, $weight, $available, $quantity, $discount, $id;

    public function __construct(array $item)
    {
        $this->name = $item['name'];
        $this->description = $item['description'];
        $this->imageURL = $item['image'];
        $this->price = $item['price'];
        $this->weight = $item['weight'];
        $this->available = $item['available'];
        $this->quantity = $item['quantity'];
        $this->discount = $item['discount'];
        $this->id = $item['id'];
    }
}