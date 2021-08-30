<?php

declare(strict_types=1);

namespace GildedRose\QualityCalculator\Strategy;

final class BackstagePassesCalculatorStrategy extends AbstractCalculatorStrategy
{
    public function calculate(): void
    {
        $qualityLessThanLimit = $this->item->quality < AbstractCalculatorStrategy::ITEM_MAX_QUALITY;

        if ($qualityLessThanLimit) {
            ++$this->item->quality;
        }

        if (($this->item->sell_in < 11) && $qualityLessThanLimit) {
            ++$this->item->quality;
        }

        if (($this->item->sell_in < 6) && $qualityLessThanLimit) {
            ++$this->item->quality;
        }

        --$this->item->sell_in;

        if ($this->item->sell_in < 0) {
            $this->item->quality -= $this->item->quality;
        }
    }
}
