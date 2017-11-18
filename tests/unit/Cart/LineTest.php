<?php

namespace Tests\Unit\Cart;

use Checkout\Cart\Line;
use Checkout\Item\BasicItem;

class LineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Line $line
     */
    private $line;

    public function setUp()
    {
        $this->line = null;
    }

    public function testTwoLinesWithSameItem()
    {
        $this->havingALine();
        $another_line = $this->havingAnotherLine();

        $this->assertTrue($this->line->hasSameItem($another_line->item));
        $this->assertFalse($this->line === $another_line);
    }

    public function testLineIsImmutable()
    {
        $this->havingALine();
        $new_line = $this->line->increaseQuantity(10);

        $this->assertFalse($this->line === $new_line);
        $this->assertInstanceOf(Line::class, $new_line);
    }

    public function testIncrementQuantity()
    {
        $this->havingALine();
        $this->line = $this->line->increaseQuantity(5);

        $this->assertEquals(15, $this->line->quantity());
    }

    public function testCalculate()
    {
        $this->havingALine();

        $this->assertEquals(100, $this->line->calculate());
    }

    private function havingALine()
    {
        $this->line = Line::create(new BasicItem('ZZZ', 10), 10);
    }

    private function havingAnotherLine()
    {
        return Line::create(new BasicItem('ZZZ', 10), 10);
    }
}
