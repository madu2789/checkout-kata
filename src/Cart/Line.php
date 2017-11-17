<?php

namespace Checkout\Cart;

use Checkout\Item;

class Line
{
    /** @var  \int */
    public $quantity;

    /** @var  Item */
    public $item;

    /**
     * @param Item $item
     * @param int  $quantity
     */
    public function __construct(Item $item, $quantity)
    {
        $this->quantity = $quantity;
        $this->item     = $item;
    }

    public function hasSameItem(Item $item): bool
    {
        return $this->item->equals($item);
    }

    public function increaseQuantity($quantity): Line
    {
        return new self($this->item, $this->quantity + $quantity);
    }

    public function decreaseQuantity($quantity): Line
    {
        return new self($this->item, $this->quantity - $quantity);
    }
}