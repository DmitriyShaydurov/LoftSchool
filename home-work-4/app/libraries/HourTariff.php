<?php

class HourTariff extends AbstractTariff
{
    use Driver;

    public function __construct($age, $minutes, $mileage, $gps = false, $driver = false)
    {
        parent::__construct($age, $minutes, $mileage, $gps, $driver);
        $this->driverAdd();
    }

    public function priceCalc()
    {
        $this->total = ceil($this->minutes / 60) * 200;
    }

    protected function driverAdd()
    {
        if ($this->driver) {
            $this->total = $this->total + $this->driverAddition();
        }
    }
}
