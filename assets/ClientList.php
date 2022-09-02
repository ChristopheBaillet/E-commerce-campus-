<?php
class ClientList
{
    public array $customers;

    public function __construct(array $customers)
    {
        $this->customers = $customers;
    }
}