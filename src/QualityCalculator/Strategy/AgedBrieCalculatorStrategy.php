<?php

declare(strict_types=1);

namespace GildedRose\QualityCalculator\Strategy;

final class AgedBrieCalculatorStrategy extends AbstractCalculatorStrategy
{
    public function calculate(): void
    {
        --$this->item->sell_in;

        if ($this->item->quality < AbstractCalculatorStrategy::ITEM_MAX_QUALITY) {
            ++$this->item->quality;

            if ($this->item->sell_in < 0) {
                ++$this->item->quality;
            }
        }
    }
}
