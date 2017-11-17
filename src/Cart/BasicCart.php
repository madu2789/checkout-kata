<?php

namespace Checkout\Cart;

use Checkout\Cart;
use Checkout\Item;

class BasicCart implements Cart
{
    /**
     * @var Line[] $lines
     */
    private $lines;

    public function __construct()
    {
        $this->lines = [];
    }

    /**
     * @return BasicCart
     */
    public static function create()
    {
        return new self();
    }

    /**
     * @param Item $item
     * @param int  $quantity
     */
    public function addItem(Item $item, $quantity)
    {
        /**
         * @var Line $line
         */
        foreach ($this->lines as $key => $line)
        {
            if (!$line->hasSameItem($item))
            {
                continue;
            }

            $this->lines[$key] = $line->increaseQuantity($quantity);

            return;
        }

        $this->lines[] = new Line($item, $quantity);
    }

    public function lines(): array
    {
        return $this->lines;
    }

    public function calculate(): float
    {
        $total = 0;

        /**
         * @var Line $line
         */
        foreach ($this->lines as $line)
        {
            $total += $this->calculateLinePrice($line);
        }

        return $total;
    }

    private function calculateLinePrice(Line $line)
    {
        return $base_price = $line->calculate();
    }
}