<?php

namespace App;

class Item {

    public $quality;

    public $sellIn;


    /**
     * Normal constructor.
     */
    public function __construct($quality, $sellIn)
    {
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function tick()
    {

    }

}