<?php

namespace Checkout\Cart;

use Checkout\Cart;
use Checkout\Item;
use Checkout\Discount\Decorator\CalculatePercentage;
use Checkout\Discount\Decorator\CalculatePerUnit;
use Checkout\Discount\Decorator\CalculateThreePerTwo;

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
        $decorator_per_unit      = new CalculatePerUnit();
        $decorator_percentage    = new CalculatePercentage($decorator_per_unit);
        $decorator_three_per_two = new CalculateThreePerTwo($decorator_percentage);

        return $result = $decorator_three_per_two->__invoke($line);
    }
}