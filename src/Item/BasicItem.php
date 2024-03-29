<?php

namespace Checkout\Item;

use Checkout\Item;

class BasicItem implements Item
{
    private const SHOULD_EXECUTE_PERCENTAGE_DISCOUNT = ['AAA', 'BBB', 'DDD'];
    private const SHOULD_EXECUTE_PROMOTION_DISCOUNT = ['AAA', 'DDD'];
    private const FIVE_PER_CENT = (5 / 100);
    private const TEN_PER_CENT = (10 / 100);

    /**
     * @var string
     */
    private $sku;

    /**
     * @var float
     */
    private $price;

    /**
     * BasicItem constructor.
     *
     * @param string $a_sku
     * @param        $a_price
     */
    public function __construct(string $a_sku, float $a_price)
    {
        $this->sku   = $a_sku;
        $this->price = $a_price;
    }

    /**
     * @param Item $item
     * @return boolean
     */
    public function equals(Item $item): bool
    {
        return $this->sku() === $item->sku();
    }

    public function sku(): string
    {
        return $this->sku;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function canApplyPercentageDiscount(): bool
    {
        return in_array($this->sku(), self::SHOULD_EXECUTE_PERCENTAGE_DISCOUNT);
    }

    public function canApplyPromotionDiscount(): bool
    {
        return in_array($this->sku(), self::SHOULD_EXECUTE_PROMOTION_DISCOUNT);
    }

    public function percentageDiscount(): float
    {
        if ('BBB' === $this->sku())
        {
            return self::FIVE_PER_CENT;
        }

        return self::TEN_PER_CENT;
    }
}