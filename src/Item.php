<?php

namespace App;

/**
 * Class Item
 * @package App
 */
class Item {

    /**
     * @var
     */
    public $quality;

    /**
     * @var
     */
    public $sellIn;


    /**
     * Normal constructor.
     */

    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    /**
     *
     */
    public function tick()
    {

    }

}