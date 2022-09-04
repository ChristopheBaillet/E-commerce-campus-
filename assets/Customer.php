<?php
require_once '../assets/my-functions.php';
require_once '../assets/database.php';


class Customer
{
    private ?string $first_name, $last_name, $address, $postal_code, $city;

    public function __construct(array $customer)
    {
        $this->first_name = $customer['first_name'];
        $this->last_name = $customer['last_name'];
        $this->address = $customer['address'];
        $this->postal_code = $customer['postal_code'];
        $this->city = $customer['city'];
    }
}

