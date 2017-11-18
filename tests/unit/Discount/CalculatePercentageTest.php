<?php

namespace Tests\Unit\Discount;

use Checkout\Cart\Line;
use Checkout\Item\BasicItem;
use Checkout\Discount\Decorator\CalculatePercentage;

class CalculatePercentageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var $decorator CalculatePercentage
     */
    private $decorator;

    /**
     * @var Line $line
     */
    private $line;

    /**
     * @var float $result
     */
    private $result;

    public function setUp()
    {
        $this->decorator = null;
        $this->line      = null;
        $this->result    = null;
    }

    /**
     * @dataProvider validLineProvider
     *
     * @param $sku
     * @param $expected_result
     */
    public function testReturnValidPrice($sku, $expected_result)
    {
        $this->givenAValidLine($sku);
        $this->havingACalculatePercentage();
        $this->whenIsInvoked();
        $this->thenResultHasToBeTheExpected($expected_result);
    }

    public function testCanNotExecuteWhenQuantityIsMinorThanEdge()
    {
        $this->givenALineWithQuantityMinorThanEdge();
        $this->havingACalculatePercentage();
        $this->whenIsInvoked();
        $this->thenResultHasToBeNull();
    }

    public function testCanNotExecuteWhenSkuIsNotValid()
    {
        $this->givenALineWithInvalidSku();
        $this->havingACalculatePercentage();
        $this->whenIsInvoked();
        $this->thenResultHasToBeNull();
    }

    private function givenAValidLine($sku)
    {
        $this->line = new Line(new BasicItem($sku, 100), 2);
    }

    private function givenALineWithQuantityMinorThanEdge()
    {
        $this->line = new Line(new BasicItem('AAA', 100), 1);
    }

    private function givenALineWithInvalidSku()
    {
        $this->line = new Line(new BasicItem('ZZZ', 10), 10);
    }

    private function havingACalculatePercentage(): void
    {
        $this->decorator = new CalculatePercentage();
    }

    private function whenIsInvoked()
    {
        $this->result = $this->decorator->__invoke($this->line);
    }

    private function thenResultHasToBeTheExpected($result_expected)
    {
        $this->assertEquals($result_expected, $this->result);
    }

    private function thenResultHasToBeNull()
    {
        $this->assertNull($this->result);
    }

    public function validLineProvider()
    {
        return [
            [
                'sku'             => 'AAA',
                'expected_result' => 180,
            ],
            [
                'sku'             => 'BBB',
                'expected_result' => 190,
            ],
            [
                'sku'             => 'DDD',
                'expected_result' => 180,
            ],
        ];
    }
}
