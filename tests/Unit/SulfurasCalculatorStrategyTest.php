<?php

declare(strict_types=1);

namespace Tests\Unit;

use GildedRose\Item;
use GildedRose\QualityCalculator\Strategy\CalculatorStrategyContext;
use GildedRose\QualityCalculator\Strategy\SulfurasCalculatorStrategy;
use PHPUnit\Framework\TestCase;

class SulfurasCalculatorStrategyTest extends TestCase
{
    public function testCalculateSucceed(): void
    {
        $item = new Item(CalculatorStrategyContext::SULFURAS_ITEM, 1, 49);
        $strategy = new SulfurasCalculatorStrategy($item);

        $strategy->calculate();

        self::assertSame($item->sell_in, 1);
        self::assertSame($item->quality, 50);
    }
}