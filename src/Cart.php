<?php

namespace Checkout;

interface Cart
{
    /**
     * @param Item $item
     * @param int $qty
     */
    public function addItem(Item $item, $qty);

    public function lines(): array;
    public function calculate(): float;
}