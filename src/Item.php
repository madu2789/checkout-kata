<?php

namespace Checkout;

interface Item
{
    /**
     * @param Item $item
     * @return boolean
     */
    public function equals(Item $item);

    /**
     * @return string
     */
    public function getName();

    public function sku(): string;
    public function price(): float;
}