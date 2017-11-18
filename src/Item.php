<?php

namespace Checkout;

interface Item
{
    /**
     * @param Item $item
     * @return boolean
     */
    public function equals(Item $item);

    public function sku(): string;
    public function price(): float;
}