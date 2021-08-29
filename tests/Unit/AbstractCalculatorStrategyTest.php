<?php

declare(strict_types=1);

namespace Tests\Unit;

use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\QualityCalculator\Strategy\AbstractCalculatorStrategy;
use GildedRose\QualityCalculator\Strategy\CalculatorStrategyContext;
use PHPUnit\Framework\TestCase;

class AbstractCalculatorStrategyTest extends TestCase
{
    public function testCalculatorFailsIfQualityOverLimit(): void
    {
        $this->expectException(\LogicException::class);
        $this->expectExceptionMessage(
            \sprintf("Item quality must be less than %d", AbstractCalculatorStrategy::ITEM_MAX_QUALITY)
        );

        $item = new Item('some-type', 1, 51);
        (new GildedRose([$item]))->updateQuality();
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testCalculatorSulfurasNotFailsIfQualityOverLimit(): void
    {
        $item = new Item(CalculatorStrategyContext::SULFURAS_ITEM, 1, 51);
        (new GildedRose([$item]))->updateQuality();
    }
}