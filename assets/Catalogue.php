<?php
class Catalogue{
    public array $items;
    public function __construct(array $items){
        $this->items = $items;
    }
}