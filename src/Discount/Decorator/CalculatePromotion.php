<?php

namespace Checkout\Discount\Decorator;

use Checkout\Cart\Line;
use Checkout\Discount\DecoratorAction;

class CalculatePromotion extends DecoratorAction
{
    private const SHOULD_EXECUTE_SKU = ['AAA', 'DDD'];
    private const QUANTITY_EDGE = 3;
    private const QUANTITY_PROMOTION = 2;

    protected function executeAction(Line $line)
    {
        $quantity               = $line->quantity();
        $number_of_discounts    = floor($quantity / self::QUANTITY_EDGE);

        $products_with_discount    = $number_of_discounts * self::QUANTITY_PROMOTION;
        $products_without_discount = $quantity % self::QUANTITY_EDGE;

        return ($products_with_discount * $line->item->price()) + ($products_without_discount * $line->item->price());
    }

    protected function shouldExecuteAction(Line $line): bool
    {
        if(self::QUANTITY_EDGE > $line->quantity())
        {
            return false;
        }

        return in_array($line->item->sku(), self::SHOULD_EXECUTE_SKU);
    }
}