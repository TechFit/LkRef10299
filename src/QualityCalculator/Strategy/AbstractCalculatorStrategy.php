<?php

declare(strict_types=1);

namespace GildedRose\QualityCalculator\Strategy;

use GildedRose\Item;

abstract class AbstractCalculatorStrategy
{
    /**
     * @var int
     */
    public const ITEM_MAX_QUALITY = 50;

    protected Item $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
        $this->isQualityLessThanLimit();
    }

    public function calculate(): void
    {
        if ($this->item->quality > 0) {
            --$this->item->quality;
        }

        --$this->item->sell_in;

        if (($this->item->sell_in < 0) && $this->item->quality > 0) {
            --$this->item->quality;
        }
    }

    protected function isQualityLessThanLimit(): bool
    {
        if ($this->item->quality > self::ITEM_MAX_QUALITY) {
            throw new \LogicException(
                \sprintf("Item quality must be less than %d", self::ITEM_MAX_QUALITY)
            );
        }

        return true;
    }
}