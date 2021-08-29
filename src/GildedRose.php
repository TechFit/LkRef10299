<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\QualityCalculator\Strategy\CalculatorStrategyContext;

final class GildedRose implements GlidedRoseInterface
{
    /**
     * @var Item[]
     */
    private array $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            (new CalculatorStrategyContext($item))->calculate();
        }
    }
}
