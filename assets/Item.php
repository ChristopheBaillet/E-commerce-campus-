<?php

class Item
{
    private ?string $name, $description, $imageURL;
    private ?int $price, $weight, $available, $quantity, $discount, $id;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getImageURL(): ?string
    {
        return $this->imageURL;
    }

    public function setImageURL(?string $imageURL): void
    {
        $this->imageURL = $imageURL;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): void
    {
        $this->weight = $weight;
    }

    public function getAvailable(): ?int
    {
        return $this->available;
    }

    public function setAvailable(?int $available): void
    {
        $this->available = $available;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function getDiscount(): ?int
    {
        return $this->discount;
    }

    public function setDiscount(?int $discount): void
    {
        $this->discount = $discount;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

}