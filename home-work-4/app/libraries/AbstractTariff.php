<?php
abstract class AbstractTariff implements necessaryFunctions
{
    use Gps;
    protected $age;
    protected $price;
    protected $minutes;
    protected $mileage;
    protected $multiplier = 1;
    protected $doNotApplicable = false;
    protected $gps;
    protected $driver;
    public $total = 0;


    public function __construct($age, $minutes, $mileage, $gps = false, $driver = false)
    {
        $this->age = $age;
        $this->minutes = $minutes;
        $this->mileage = $mileage;
        $this->driver = $driver;
        $this->gps = $gps;


        $this->ageCalc();
        $this->priceCalc();
        $this->gAddition();
    }

    public function __destruct()
    {
        if ($this->doNotApplicable) {
            echo '<br> выберите другой тариф';
        }
    }

    abstract public function priceCalc();


    public function ageCalc()
    {
        if ($this->age > 65) {
            echo 'мы не работаем с клиентами старше 65';
            $this->doNotApplicable = true;
            exit();
        } elseif ($this->age < 18) {
            echo 'мы не работаем с клиентами младше 18';
            $this->doNotApplicable = true;
            exit();
        } elseif ($this->age <= 21) {
            $this->multiplier = 1.1;
        }
    }

    protected function gAddition()
    {
        if (!$this->doNotApplicable && $this->gps) {
            $this->total = $this->total + $this->gpsAddition($this->minutes);
        }
    }
}
