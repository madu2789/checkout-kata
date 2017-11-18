<?php

namespace Tests\Unit\Cart;

use Checkout\Cart\BasicCart;
use Checkout\Item\BasicItem;

class CartTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BasicCart $cart
     */
    private $cart;

    public function setUp()
    {
        $this->cart = null;
    }

    public function testWhenCartIsEmptyShouldBeZeroLines()
    {
        $this->havingABasicCart();

        $this->assertEquals(0, count($this->cart->lines()), 'Number of Lines is not right');
    }

    public function testWhenAddSameItemTwiceTheCartShouldHaveOneLine()
    {
        $this->havingABasicCart();

        $this->cart->addItem(new BasicItem('AAA', 100), 4);
        $this->cart->addItem(new BasicItem('AAA', 100), 2);

        $this->assertEquals(1, count($this->cart->lines()), 'Number of Lines is not right');
    }

    public function testWhenAddDifferentItemsTheCartShouldHaveSameNumberOfLines()
    {
        $this->havingABasicCart();

        $this->cart->addItem(new BasicItem('AAA', 100), 2);
        $this->cart->addItem(new BasicItem('BBB', 50), 1);
        $this->cart->addItem(new BasicItem('CCC', 25), 6);
        $this->cart->addItem(new BasicItem('DDD', 25), 1);

        $this->assertEquals(4, count($this->cart->lines()), 'Number of Lines is not right');
    }

    private function havingABasicCart()
    {
        $this->cart = BasicCart::create();
    }
}
