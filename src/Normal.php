<?php

namespace App;

class Normal {



    public function tick()
    {
        $this->sellIn -= 1;

        if ($this->quality == 0){
            return;
        }

        $this->quality -= 1;

        if ($this->sellIn <= 0){
            $this->quality -= 1;
        }
    }
}