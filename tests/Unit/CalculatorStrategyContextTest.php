<?php

declare(strict_types=1);

namespace Tests\Unit;

use GildedRose\Item;
use GildedRose\QualityCalculator\Strategy\AgedBrieCalculatorStrategy;
use GildedRose\QualityCalculator\Strategy\BackstagePassesCalculatorStrategy;
use GildedRose\QualityCalculator\Strategy\CalculatorStrategyContext;
use GildedRose\QualityCalculator\Strategy\ConjuredCalculatorStrategy;
use GildedRose\QualityCalculator\Strategy\RegularCalculatorStrategy;
use GildedRose\QualityCalculator\Strategy\SulfurasCalculatorStrategy;
use PHPUnit\Framework\TestCase;

class CalculatorStrategyContextTest extends TestCase
{
    public function testAgedBrieStrategyUsedSucceed(): void
    {
        $strategyContext = new CalculatorStrategyContext(
            new Item(CalculatorStrategyContext::AGED_BRIE_ITEM, 0, 20)
        );

        self::assertSame(AgedBrieCalculatorStrategy::class, \get_class($strategyContext->getStrategy()));
    }

    public function testBackstagePassesStrategyUsedSucceed(): void
    {
        $strategyContext = new CalculatorStrategyContext(
            new Item(CalculatorStrategyContext::BACKSTAGE_PASSES_ITEM, 0, 20)
        );

        self::assertSame(BackstagePassesCalculatorStrategy::class, \get_class($strategyContext->getStrategy()));
    }

    public function testConjuredCalculatorStrategyUsedSucceed(): void
    {
        $strategyContext = new CalculatorStrategyContext(
            new Item(CalculatorStrategyContext::CONJURED_ITEM, 0, 20)
        );

        self::assertSame(ConjuredCalculatorStrategy::class, \get_class($strategyContext->getStrategy()));
    }

    public function testIsRegularStrategyUsedSucceed(): void
    {
        $strategyContext = new CalculatorStrategyContext(new Item('some-item', 0, 20));

        self::assertSame(RegularCalculatorStrategy::class, \get_class($strategyContext->getStrategy()));
    }

    public function testSulfarusStrategyUsedSucceed(): void
    {
        $strategyContext = new CalculatorStrategyContext(
            new Item(CalculatorStrategyContext::SULFURAS_ITEM, 0, 20)
        );

        self::assertSame(SulfurasCalculatorStrategy::class, \get_class($strategyContext->getStrategy()));
    }
}
