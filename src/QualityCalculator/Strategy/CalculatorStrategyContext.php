<?php

declare(strict_types=1);

namespace GildedRose\QualityCalculator\Strategy;

use GildedRose\Item;

class CalculatorStrategyContext
{
    /**
     * @var string
     */
    public const AGED_BRIE_ITEM = 'Aged Brie';

    /**
     * @var string
     */
    public const BACKSTAGE_PASSES_ITEM = 'Backstage passes to a TAFKAL80ETC concert';

    /**
     * @var string
     */
    public const CONJURED_ITEM = 'Conjured Mana Cake';

    /**
     * @var string
     */
    public const SULFURAS_ITEM = 'Sulfuras, Hand of Ragnaros';

    private AbstractCalculatorStrategy $strategy;

    public function __construct(Item $item)
    {
        switch ($item->name) {
            case self::AGED_BRIE_ITEM:
                $this->strategy = new AgedBrieCalculatorStrategy($item);
                break;
            case self::BACKSTAGE_PASSES_ITEM:
                $this->strategy = new BackstagePassesCalculatorStrategy($item);
                break;
            case self::CONJURED_ITEM:
                $this->strategy = new ConjuredCalculatorStrategy($item);
                break;
            case self::SULFURAS_ITEM:
                $this->strategy = new SulfurasCalculatorStrategy($item);
                break;
            default:
                $this->strategy = new RegularCalculatorStrategy($item);
        }
    }

    public function calculate(): void
    {
        $this->strategy->calculate();
    }

    public function getStrategy(): AbstractCalculatorStrategy
    {
        return $this->strategy;
    }
}
