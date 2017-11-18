<?php

namespace Tests\Unit\Cart;

use Checkout\Cart\BasicCart;
use Checkout\Item\BasicItem;

class CartTest extends \PHPUnit_Framework_TestCase
{
    public function testWhenCartIsEmptyShouldBeZeroLines()
    {
        $cart = BasicCart::create();

        $this->assertEquals(0, count($cart->lines()), 'Number of Lines is not right');
    }

    public function testWhenAddSameItemTwiceTheCartShouldHaveOneLine()
    {
        $cart = BasicCart::create();

        $cart->addItem(new BasicItem('AAA', 100), 4);
        $cart->addItem(new BasicItem('AAA', 100), 2);

        $this->assertEquals(1, count($cart->lines()), 'Number of Lines is not right');
    }

    public function testWhenAddDifferentItemsTheCartShouldHaveSameNumberOfLines()
    {
        $cart = BasicCart::create();

        $cart->addItem(new BasicItem('AAA', 100), 2);
        $cart->addItem(new BasicItem('BBB', 50), 1);
        $cart->addItem(new BasicItem('CCC', 25), 6);
        $cart->addItem(new BasicItem('DDD', 25), 1);

        $this->assertEquals(4, count($cart->lines()), 'Number of Lines is not right');
    }
}
