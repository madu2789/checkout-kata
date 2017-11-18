<?php

namespace Checkout\Discount\Decorator;

use Checkout\Cart\Line;
use Checkout\Discount\DecoratorAction;

class CalculatePerUnit extends DecoratorAction
{
    protected function executeAction(Line $line)
    {
        return $line->calculate();
    }
}