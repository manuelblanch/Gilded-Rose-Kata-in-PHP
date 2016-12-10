<?php

namespace App;

/**
 * Class GildedRose
 * @package App
 */
class GildedRose
{
    /**
     * @var array
     */
    protected static $lookup = [

        'Normal' => Normal::class,
        'Aged Brie' => Brie::class,
        'Sulfuras' => Sulfuras::class,
        'Backstage passes to a TAFKAL80ETC concert' => BackstagePass::class,
        'Conjured Mana Cake' => Conjured::class
    ];

    /**
     * GildedRose constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param $name
     * @param $quality
     * @param $sellIn
     * @return mixed
     */


    public static function of($name, $quality, $sellIn)

    {



        $class = isset(static::$lookup[$name])
            ? static::$lookup[$name]
            : Item::class;


        return new $class($quality, $sellIn);
    }

    public function tick()
    {
        // TODO: write logic here
    }


}
