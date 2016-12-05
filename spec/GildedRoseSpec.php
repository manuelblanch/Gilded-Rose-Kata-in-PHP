<?php
namespace spec\App;
use App\GildedRose;
use PhpSpec\ObjectBehavior;
/**
 * Class GildedRoseSpec
 * @package spec\App
 */
class GildedRoseSpec extends ObjectBehavior
{

    /**
     *
     */
    function it_is_initializable()
    {
        $this->beConstructedWith('of', ['Normal', 10, 5]);
        $this->shouldHaveType(GildedRose::class);
    }

    /**
     *
     */
    function it_updates_normal_items_before_sell_date()
    {
        $this->beConstructedThrough('of', ['Normal', 10, 5]);
        $this->tick();
        $this->quality->shouldBe(9);
        $this->sellIn->shouldBe(4);
    }

    /**
     *
     */
    function it_updates_normal_items_on_the_sell_date()
    {
        $this->beConstructedThrough('of',['Normal', 10, 0]);

        $this->tick();

        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(-1);
    }

    /**
     *
     */
    function it_updates_normal_items_after_the_sell_date()
    {
        $this->beConstructedThrough('of',['Normal', 10, -5]);

        $this->tick();

        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(-6);
    }

    /**
     *
     */
    function it_updates_normal_items_with_a_quality_of_0()
    {
        $this->beConstructedThrough('of',['Normal', 0, 5]);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(4);
    }

    /**
     *
     */
    function it_updates_Brie_items_before_the_sell_date()
    {
        $this->beConstructedThrough('of',['Aged Brie', 10, 5]);

        $this->tick();

        $this->quality->shouldBe(11);
        $this->sellIn->shouldBe(4);
    }

    /**
     *
     */
    function it_updates_Brie_items_before_the_sell_date_with_maximum_quality()
    {
        $this->beConstructedThrough('of',['Aged Brie', 50, 5]);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(4);
    }

    /**
     *
     */
    function it_updates_Brie_items_on_the_sell_date()
    {
        $this->beConstructedThrough('of',['Aged Brie', 10, 0]);

        $this->tick();

        $this->quality->shouldBe(12);
        $this->sellIn->shouldBe(-1);
    }

    /**
     *
     */
    function it_updates_Brie_items_on_the_sell_date_near_maximum_quality()
    {
        $this->beConstructedThrough('of',['Aged Brie', 49, 0]);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(-1);
    }

    /**
     *
     */
    function it_updates_Brie_items_after_the_sell_date()
    {
        $this->beConstructedThrough('of',['Aged Brie', 10, -10]);

        $this->tick();

        $this->quality->shouldBe(12);
        $this->sellIn->shouldBe(-11);
    }

    /**
     *
     */
    function it_updates_Brie_items_after_the_sell_date_with_maximum_quality()
    {
        $this->beConstructedThrough('of',['Aged Brie', 50, -10]);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(-11);
    }

    /**
     *
     */
    function it_updates_Sulfuras_items_before_the_sell_date()
    {
        $this->beConstructedThrough('of',['Sulfuras, Hand of Ragnaros', 10, 5]);

        $this->tick();

        $this->quality->shouldBe(10);
        $this->sellIn->shouldBe(5);
    }

    /**
     *
     */
    function it_updates_Sulfuras_items_before_on_the_sell_date()
    {
        $this->beConstructedThrough('of',['Sulfuras, Hand of Ragnaros', 10, 5]);

        $this->tick();

        $this->quality->shouldBe(10);
        $this->sellIn->shouldBe(5);
    }

    /**
     *
     */
    function it_updates_Sulfuras_items_after_the_sell_date()
    {
        $this->beConstructedThrough('of',['Sulfuras, Hand of Ragnaros', 10, -1]);

        $this->tick();

        $this->quality->shouldBe(10);
        $this->sellIn->shouldBe(-1);
    }

    /**
     *
     */
    function it_updates_Backstage_pass_items_long_before_the_sell_date()
    {
        $this->beConstructedThrough('of',['Backstage passes to a TAFKAL80ETC concert', 10, 11]);

        $this->tick();

        $this->quality->shouldBe(11);
        $this->sellIn->shouldBe(10);
    }

    /**
     *
     */
    function it_updates_Backstage_pass_items_close_to_the_sell_date()
    {
        $this->beConstructedThrough('of',['Backstage passes to a TAFKAL80ETC concert', 10, 10]);

        $this->tick();

        $this->quality->shouldBe(12);
        $this->sellIn->shouldBe(9);
    }

    /**
     *
     */
    function it_updates_Backstage_pass_items_close_to_the_sell_data_at_max_quality()
    {
        $this->beConstructedThrough('of',['Backstage passes to a TAFKAL80ETC concert', 50, 10]);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(9);
    }

    /**
     *
     */
    function it_updates_Backstage_pass_items_very_close_the_sell_date()
    {
        $this->beConstructedThrough('of',['Backstage passes to a TAFKAL80ETC concert', 10, 5]);

        $this->tick();

        $this->quality->shouldBe(13);
        $this->sellIn->shouldBe(4);
    }

    /**
     *
     */
    function it_updates_Backstage_pass_items_very_close_to_the_sell_date_at_max_quality()
    {
        $this->beConstructedThrough('of',['Backstage passes to a TAFKAL80ETC concert', 50, 5]);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(4);
    }

    /**
     *
     */
    function it_updates_Backstage_pass_items_with_one_day_left_to_sell()
    {
        $this->beConstructedThrough('of',['Backstage passes to a TAFKAL80ETC concert', 10, 1]);

        $this->tick();

        $this->quality->shouldBe(13);
        $this->sellIn->shouldBe(0);
    }

    /**
     *
     */
    function it_updates_Backstage_pass_items_with_one_day_left_to_sell_at_max_quality()
    {
        $this->beConstructedThrough('of',['Backstage passes to a TAFKAL80ETC concert', 50, 1]);

        $this->tick();

        $this->quality->shouldBe(50);
        $this->sellIn->shouldBe(0);
    }

    /**
     *
     */
    function it_updates_Backstage_pass_items_on_the_sell_date()
    {
        $this->beConstructedThrough('of',['Backstage passes to a TAFKAL80ETC concert', 10, 0]);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-1);
    }

    /**
     *
     */
    function it_updates_Backstage_pass_items_after_the_sell_date()
    {
        $this->beConstructedThrough('of',['Backstage passes to a TAFKAL80ETC concert', 10, -1]);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-2);
    }

    /**
     *
     */
    function it_updates_Conjured_items_before_the_sell_date()
    {
        $this->beConstructedThrough('of',['Conjured Mana Cake', 10, 10]);

        $this->tick();

        $this->quality->shouldBe(8);
        $this->sellIn->shouldBe(9);
    }

    /**
     *
     */
    function it_updates_Conjured_items_at_zero_quality()
    {
        $this->beConstructedThrough('of',['Conjured Mana Cake', 0, 10]);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(9);
    }

    /**
     *
     */
    function it_updates_Conjured_items_on_the_sell_date()
    {
        $this->beConstructedThrough('of',['Conjured Mana Cake', 10, 0]);

        $this->tick();

        $this->quality->shouldBe(6);
        $this->sellIn->shouldBe(-1);
    }

    /**
     *
     */
    function it_updates_Conjured_items_on_the_sell_date_at_0_quality()
    {
        $this->beConstructedThrough('of',['Conjured Mana Cake',  0, 0]);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-1);
    }

    /**
     *
     */
    function it_updates_Conjured_items_after_the_sell_date()
    {
        $this->beConstructedThrough('of',['Conjured Mana Cake', 10, -10]);

        $this->tick();

        $this->quality->shouldBe(6);
        $this->sellIn->shouldBe(-11);
    }

    /**
     *
     */
    function it_updates_Conjured_items_after_the_sell_date_at_zero_quality()
    {
        $this->beConstructedThrough('of',['Conjured Mana Cake',  0, -10]);

        $this->tick();

        $this->quality->shouldBe(0);
        $this->sellIn->shouldBe(-11);
    }


}
