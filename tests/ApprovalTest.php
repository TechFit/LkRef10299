<?php

declare(strict_types=1);

namespace Tests;

use ApprovalTests\Approvals;
use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class ApprovalTest extends TestCase
{
    public function testTestFixture(): void
    {
        $list = 'OMGHAI!' . \PHP_EOL;

        $items = [
            new Item('+5 Dexterity Vest', 10, 20),
            new Item('Aged Brie', 2, 0),
            new Item('Elixir of the Mongoose', 5, 7),
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
            new Item('Sulfuras, Hand of Ragnaros', -1, 80),
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49),
            new Item('Conjured Mana Cake', 3, 6),
        ];

        $gildedRose = new GildedRose($items);

        for ($i = 0; $i < 31; $i++) {
            $list .= "-------- day ${i} --------" . \PHP_EOL;
            $list .= 'name, sellIn, quality' . \PHP_EOL;
            foreach ($items as $item) {
                $list .= $item . \PHP_EOL;
            }
            $list .= \PHP_EOL;
            $gildedRose->updateQuality();
        }

        Approvals::verifyString($list);
    }
}
