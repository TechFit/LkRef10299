<?php

declare(strict_types=1);

namespace GildedRose\QualityCalculator\Strategy;

final class SulfurasCalculatorStrategy extends AbstractCalculatorStrategy
{
    public function calculate(): void
    {
        if ($this->item->quality < AbstractCalculatorStrategy::ITEM_MAX_QUALITY) {
            ++$this->item->quality;
        }
    }

    protected function isQualityLessThanLimit(): bool
    {
        return true;
    }
}
