<?php

namespace spec\App;

use App\GildedRose;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class GildedRoseSpec
 * @package spec\App
 */
class GildedRoseSpec extends ObjectBehavior
{
    /**
     * Check it is initializable
     */
    function it_is_initializable()
    {
        $this->beConstructedWith('normal', 10, 5);
        $this->shouldHaveType(GildedRose::class);
    }

    /**
     * Check it updates normal items before sell date
     */
    function it_updates_normal_items_before_sell_date()
    {
        $this->beConstructedWith('normal', 10, 5);

        $this->tick();

        $this->quality->shouldBe(9);
        $this->sellIn->shouldBe(4);
    }

    /**
     * Check it updates normal items on the sell date
     */
    function it_updates_normal_items_on_the_sell_date()
    {
        $this->beConstructedWith('normal', 10, 0);

        $this->tick();

        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(-1);
    }

    function updates_normal_items_after_the_sell_date()
    {
        $this->beConstructedWith('normal', 10, -5);

        $this->tick();

        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(-6);
    }

    function updates_normal_items_with_a_quality_of_0()
    {
        $this->beConstructedWith('normal', 0, 5);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(4);
    }

    function updates_Brie_items_before_the_sell_date()
    {
        $this->beConstructedWith('Aged Brie', 10, 5);

        $this->tick();

        $this->quality->shouldBe(11);
        $this->sellIn->shouldBe(4);
    }

    function updates_Brie_items_before_the_sell_date_with_maximum_quality()
    {
        $this->beConstructedWith('Aged Brie', 50, 5);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(4);
    }

    function updates_Brie_items_on_the_sell_date()
    {
        $this->beConstructedWith('Aged Brie', 10, 0);

        $this->tick();

        $this->quality->shouldBe(12);
        $this->sellIn->shouldBe(-1);
    }

    function updates_Brie_items_on_the_sell_date_near_maximum_quality()
    {
        $this->beConstructedWith('Aged Brie', 49, 0);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(-1);
    }

    function updates_Brie_items_after_the_sell_date()
    {
        $this->beConstructedWith('Aged Brie', 10, -10);

        $this->tick();

        $this->quality->shouldBe(12);
        $this->sellIn->shouldBe(-11);
    }

    function updates_Brie_items_after_the_sell_date_with_maximum_quality()
    {
        $this->beConstructedWith('Aged Brie', 50, -10);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(-11);
    }

    function updates_Sulfuras_items_before_the_sell_date()
    {
        $this->beConstructedWith('Sulfuras, Hand of Ragnaros', 10, 5);

        $this->tick();

        $this->quality->shouldBe(10);
        $this->sellIn->shouldBe(5);
    }

    function updates_Sulfuras_items_before_on_the_sell_date()
    {
        $this->beConstructedWith('Sulfuras, Hand of Ragnaros', 10, 5);

        $this->tick();

        $this->quality->shouldBe(10);
        $this->sellIn->shouldBe(5);
    }

    function updates_Sulfuras_items_after_the_sell_date()
    {
        $this->beConstructedWith('Sulfuras, Hand of Ragnaros', 10, -1);

        $this->tick();

        $this->quality->shouldBe(10);
        $this->sellIn->shouldBe(-1);
    }

    function updates_Backstage_pass_items_long_before_the_sell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 10, 11);

        $this->tick();

        $this->quality->shouldBe(11);
        $this->sellIn->shouldBe(10);
    }

    function updates_Backstage_pass_items_close_to_the_sell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 10, 10);

        $this->tick();

        $this->quality->shouldBe(12);
        $this->sellIn->shouldBe(9);
    }

    function updates_Backstage_pass_items_close_to_the_sell_data_at_max_quality()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 50, 10);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(9);
    }

    function updates_Backstage_pass_items_very_close_the_sell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 10, 5);

        $this->tick();

        $this->quality->shouldBe(13);
        $this->sellIn->shouldBe(4);
    }

    function updates_Backstage_pass_items_very_close_to_the_sell_date_at_max_quality()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 50, 5);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(4);
    }

    function updates_Backstage_pass_items_with_one_day_left_to_sell()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 10, 1);

        $this->tick();

        $this->quality->shouldBe(13);
        $this->sellIn->shouldBe(3);
    }

    function updates_Backstage_pass_items_with_one_day_left_to_sell_at_max_quality()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 50, 1);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(0);
    }

    function updates_Backstage_pass_items_on_the_sell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 10, 0);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-1);
    }

    function updates_Backstage_pass_items_after_the_sell_date()
    {
        $this->beConstructedWith('Backstage passes to a TAFKAL80ETC concert', 10, -1);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-2);
    }

    function updates_Conjured_items_before_the_sell_date()
    {
        $this->beConstructedWith('Conjured Mana Cake', 10, 10);

        $this->tick();

        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(9);
    }

    function updates_Conjured_items_at_zero_quality()
    {
        $this->beConstructedWith('Conjured Mana Cake', 0, 10);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(9);
    }

    function updates_Conjured_items_on_the_sell_date()
    {
        $this->beConstructedWith('Conjured Mana Cake', 10, 0);

        $this->tick();

        $this->quality->shouldBe(6);
        $this->sellIn->shouldBe(-1);
    }

    function updates_Conjured_items_on_the_sell_date_at_0_quality()
    {
        $this->beConstructedWith('Conjured Mana Cake', 0, 0);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-1);
    }

    function updates_Conjured_items_after_the_sell_date()
    {
        $this->beConstructedWith('Conjured Mana Cake', 10, -10);

        $this->tick();

        $this->quality->shouldBe(6);
        $this->sellIn->shouldBe(-11);
    }

    function updates_Conjured_items_after_the_sell_date_at_zero_quality()
    {
        $this->beConstructedWith('Conjured Mana Cake', 0, -10);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-11);
    }

}
	


    

