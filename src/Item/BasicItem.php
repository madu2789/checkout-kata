<?php

namespace Checkout\Item;

use Checkout\Item;

class BasicItem implements Item
{
    /**
     * @var string
     */
    private $sku;

    /**
     * @var float
     */
    private $price;

    /**
     * BasicItem constructor.
     *
     * @param string $a_sku
     * @param        $a_price
     */
    public function __construct(string $a_sku, float $a_price)
    {
        $this->sku   = $a_sku;
        $this->price = $a_price;
    }

    /**
     * @param Item $item
     * @return boolean
     */
    public function equals(Item $item)
    {
        return $this->sku() === $item->sku();
    }

    public function sku(): string
    {
        return $this->sku;
    }

    public function price(): float
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }
}