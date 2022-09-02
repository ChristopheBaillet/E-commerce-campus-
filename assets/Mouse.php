<?php
class Mouse extends Item {
    public ?string $color;
    public function __construct(array $mouse)
    {
        parent::__construct($mouse);
        $this->color = $mouse['color'];
    }
}