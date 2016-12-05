<?php

namespace App;

class Sulfuras {

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

    public function tick() {}
}