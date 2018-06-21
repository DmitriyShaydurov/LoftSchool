<?php

class StudentTariff extends AbstractTariff
{
    public function priceCalc()
    {

        if ($this->age <= 25) {
            $t1 = $this->mileage * 4;
            $t2 = $this->minutes;
            $this->total = $t1 + $t2;
        } else {
            $this->doNotApplicable = true;
        }
    }
}
