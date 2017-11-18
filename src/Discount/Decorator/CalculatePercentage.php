<?php

namespace Checkout\Discount\Decorator;

use Checkout\Cart\Line;
use Checkout\Discount\DecoratorAction;

class CalculatePercentage extends DecoratorAction
{
    private const QUANTITY_EDGE = 1;
    private const FIVE_PER_CENT = 5 / 100;
    private const TEN_PER_CENT = 10 / 100;

    protected function executeAction(Line $line)
    {
        $discount_percentage = $this->getDiscountPercentage($line->item->sku());

        return $line->calculate() - ($line->calculate() * $discount_percentage);
    }

    protected function shouldExecuteAction(Line $line): bool
    {
        if (self::QUANTITY_EDGE >= $line->quantity())
        {
            return false;
        }

        return $line->item()->canApplyPercentageDiscount();
    }

    private function getDiscountPercentage($sku): float
    {
        if ('BBB' === $sku)
        {
            return self::FIVE_PER_CENT;
        }

        return self::TEN_PER_CENT;
    }
}