<?php

namespace App;

/**
 * Class BackstagePass
 * @package App
 */
class BackstagePass extends Item  {

    /**
     * @return int|void
     */
    public function tick()
    {
        $this->sellIn -= 1;

        if ($this->quality >= 50){
            return;
        }

        if ($this->sellIn < 0){
            return $this->quality = 0;
        }
        $this->quality += 1;

        if ($this->sellIn < 10){
            $this->quality += 1;
        }

        if ($this->sellIn < 5){
            $this->quality += 1;
        }
    }
}