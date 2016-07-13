<?php

namespace Checkout\Checkout;

use Checkout\Cart;
use Checkout\Checkout;

class BasicCheckout implements Checkout
{
    /**
     * @return BasicCheckout
     */
    public static function createBasicCheckout()
    {
        return new self();
    }

    /**
     * @param Cart $cart
     * @return float
     */
    public function calculate(Cart $cart)
    {
        // TODO: Implement calculate() method.
    }
}