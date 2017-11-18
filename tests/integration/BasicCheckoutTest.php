<?php

namespace Tests\Integration\Checkout\Checkout;

use Checkout\Cart\BasicCart;
use Checkout\Checkout\BasicCheckout;
use Checkout\Item\BasicItem;

class BasicCheckoutTest extends \PHPUnit_Framework_TestCase
{
    public function testPriceWithDiscounts()
    {
        $checkout = BasicCheckout::createBasicCheckout();
        $cart     = BasicCart::create();

        $cart->addItem(new BasicItem('AAA', 100), 4);
        $cart->addItem(new BasicItem('BBB', 55), 4);
        $cart->addItem(new BasicItem('AAA', 100), 2);
        $cart->addItem(new BasicItem('DDD', 25), 1);
        $cart->addItem(new BasicItem('CCC', 25), 6);
        $cart->addItem(new BasicItem('DDD', 25), 1);

        $price = $checkout->calculate($cart);
        
        $this->assertEquals(804, $price, 'Price with discounts calculation is not right');
    }

    public function testPriceWithThreePerTwoDiscount()
    {
        $checkout = BasicCheckout::createBasicCheckout();
        $cart     = BasicCart::create();

        $cart->addItem(new BasicItem('AAA', 100), 4);
        $cart->addItem(new BasicItem('AAA', 100), 2);
        $cart->addItem(new BasicItem('DDD', 25), 1);
        $cart->addItem(new BasicItem('DDD', 25), 2);

        $price = $checkout->calculate($cart);

        $this->assertEquals(450, $price, 'Price with discount three per two calculation is not right');
    }

    public function testPriceWithPercentageDiscount()
    {
        $checkout = BasicCheckout::createBasicCheckout();
        $cart     = BasicCart::create();

        $cart->addItem(new BasicItem('DDD', 25), 1);
        $cart->addItem(new BasicItem('DDD', 25), 1);

        $price = $checkout->calculate($cart);

        $this->assertEquals(45, $price, 'Price with discount three per two calculation is not right');
    }

    public function testPriceWithoutDiscounts()
    {
        $checkout = BasicCheckout::createBasicCheckout();
        $cart     = BasicCart::create();

        $cart->addItem(new BasicItem('AAA', 100), 1);
        $cart->addItem(new BasicItem('BBB', 55), 1);
        $cart->addItem(new BasicItem('CCC', 25), 1);
        $cart->addItem(new BasicItem('DDD', 25), 1);

        $price = $checkout->calculate($cart);

        $this->assertEquals(205, $price, 'Price calculation without discounts is not right');
    }
}
