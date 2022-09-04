<?php
class ClientList
{
    private array $customers;

    public function __construct(array $customers)
    {
        $this->customers = $customers;
    }
}