<?php

namespace Checkout\Cart;

use Checkout\Cart;
use Checkout\Item;

class BasicCart implements Cart
{

    /**
     * @return BasicCart
     */
    public static function create()
    {
        return new self();
    }

    /**
     * @param Item $item
     * @param int $qty
     */
    public function addItem(Item $item, $qty)
    {
        // TODO: Implement addItem() method.
    }
}