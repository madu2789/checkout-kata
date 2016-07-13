<?php

namespace Checkout;

interface Cart
{
    /**
     * @param Item $item
     * @param int $qty
     */
    public function addItem(Item $item, $qty);
}