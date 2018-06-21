<?php

class DayTariff extends AbstractTariff
{
    use Driver;

    public function __construct($age, $minutes, $mileage, $gps = false, $driver = false)
    {
        parent::__construct($age, $minutes, $mileage, $gps, $driver);
        $this->driverAdd();
    }

    public function priceCalc()
    {
        $t1 = $this->mileage;
        $t2 = ceil($this->minutes / 1469) * 1000;
        $this->total = $t1 + $t2;
    }

    protected function driverAdd()
    {
        if ($this->driver) {
            $this->total = $this->total + $this->driverAddition();
        }
    }
}
