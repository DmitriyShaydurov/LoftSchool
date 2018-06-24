<?php
require_once 'app/bootstrap.php';
$a = new BaseTariff(30, 30, 1, false, false);
$b = new HourTariff(40, 30, 1, false, false);
$c = new DayTariff(40, 30, 1, true, false);
$d = new StudentTariff(21, 30, 1, false, true);


echo $a->totalCalc().'<br>';
echo $b->totalCalc().'<br>';
echo $c->totalCalc().'<br>';
echo $d->totalCalc().'<br>';
