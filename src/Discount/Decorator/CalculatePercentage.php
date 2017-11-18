<?php

namespace Checkout\Discount\Decorator;

use Checkout\Cart\Line;
use Checkout\Discount\DecoratorAction;

class CalculatePercentage extends DecoratorAction
{
    private const QUANTITY_EDGE = 1;

    protected function executeAction(Line $line)
    {
        return $line->calculate() - ($line->calculate() * $line->item()->percentageDiscount());
    }

    protected function shouldExecuteAction(Line $line): bool
    {
        if (self::QUANTITY_EDGE >= $line->quantity())
        {
            return false;
        }

        return $line->item()->canApplyPercentageDiscount();
    }
}