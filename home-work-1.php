<?php

// Задание №1
$name='Дмитрий';
$age='46';
echo "Меня зовут: $name<br> Мне $age лет <br>";
echo "\"!|\/ '\"\\<br>";

// Задание №2
echo "<br>Дана задача: На школьной выставке 80 рисунков. 23 из них выполнены
          фломастерами, 40 карандашами, а остальные — красками. Сколько рисунков,
          выполненные красками, на школьной выставке? <br>";
const TOTAL_NUMBER = 80;
const F_NUMBER = 23;
const P_NUMBER = 40;

echo 'Красками выполнено '. TOTAL_NUMBER. '-'.F_NUMBER. '-'.P_NUMBER.'='.(TOTAL_NUMBER-F_NUMBER-P_NUMBER ).'<br>';

// Задание №3
$age=0;
if ($age>=18 and $age<=65) {
        echo '<br>Вам еще работать и работать<br>';
} elseif ($age>65) {
        echo '<br>Вам пора на пенсию<br>';
} elseif ($age<18 and $age >=1) {
        echo '<br>Вам еще рано работать<br>';
} else {
        echo '<br>Неизвестный возраст <br>';
}
echo '<br>';
// Задание №4

$day=6;

switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo 'Это рабочий день';
        break;
    case 6:
    case 7:
        echo 'Это выходной день';
        break;

    default:
        echo "Неизвестный день";
}
echo '<br><br>';

// Задание №5

$bmw = array(
    "Model"=>"X5",
    "Speed"=>"220",
    "Doors"=>"5",
    "Year"=>"2015"
);
$opel = array(
    "Model"=>"Corsa",
    "Speed"=>"120",
    "Doors"=>"5",
    "Year"=>"2013"
);
$toyota = array(
    "Model"=>"Corolla",
    "Speed"=>"150",
    "Doors"=>"4",
    "Year"=>"2017"
);
$cars =array($bmw,$opel,$toyota);
foreach ($cars as $car) {
    foreach ($car as $key => $value) {
        echo "{$key} {$value} ";
    }
    echo '<br>';
}
echo '<br>';
// Задание №5

echo '<table style="width:100%">';
for ($i = 1; $i <= 10; $i++) {
    echo'<tr>';
    for ($j = 1; $j <= 10; $j++) {
        $result=$i*$j;
        echo '<td>';
        if (($i % 2==0) and ($j % 2==0)) {
            echo "($result) ";
        } elseif (($i % 2<>0) and ($j % 2<>0)) {
            echo "[$result] ";
        } else {
            echo $result.' ';
        }
        echo '<td>';
    }
    echo "</tr>";
}


