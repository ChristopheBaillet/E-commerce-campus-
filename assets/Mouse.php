<?php

class Mouse extends Item
{
    private ?string $color;

    public function __construct(array $mouse)
    {
        parent::__construct($mouse);
        $this->color = $mouse['color'];
    }
}