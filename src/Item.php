<?php

namespace Checkout;

interface Item
{
    public function equals(Item $item): bool;

    public function sku(): string;

    public function price(): float;

    public function canApplyPercentageDiscount(): bool;

    public function canApplyPromotionDiscount(): bool;

    public function percentageDiscount(): float;
}