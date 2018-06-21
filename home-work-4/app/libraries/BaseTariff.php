<?php

class BaseTariff extends AbstractTariff
{
    public function priceCalc()
    {
        $t1 = $this->mileage * 10;
        $t2 = $this->minutes * 3;

        $this->total= $t1 + $t2;
    }
}
