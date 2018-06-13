<?php
function task1($arr, $unify = false)
{
    if ($unify) {
        return implode(" ", $arr);
    } else {
        foreach ($arr as $value) {
            echo "<p>$value<//p>";
        }
    }
}


function task2()
{
    $argList = func_get_args();


    $whatToDo = array_shift($argList);
    $num = count($argList);


    switch ($whatToDo) {
        case '+':
            $result = 0;
            foreach ($argList as $value) {
                $result = $result + $value;
            };
            echo $result;
            break;
        case '-':
            $result = $argList[0];
            for ($i = 1; $i < $num; $i++) {
                $result = $result - $argList[$i];
            };
            echo $result;
            break;
        case '*':
            $result = $argList[0];
            for ($i = 1; $i < $num; $i++) {
                $result = $result * $argList[$i];
            };
            echo $result;
            break;
        case '/':
            $result = $argList[0];
            for ($i = 1; $i < $num; $i++) {
                $result = $result / $argList[$i];
            };
            echo $result;
            break;
        // можно аналогично сделать возведение в степень, целочисленное деление
        default:
            echo 'неизвестное действие';

    }
}

function task3()
{
    $argList = func_get_args();

    if (count($argList) <> 2) {
        echo 'Требуется два аргумента';
        return;
    };

    if (strcmp('integer', gettype($argList[0])) === 0 and strcmp('integer', gettype($argList[1])) === 0) {
        echo '<table style="width:100%">';
        echo '<tr>';
        for ($i = 1; $i <= $argList[0]; $i++) {
            echo '<tr>';
            for ($j = 1; $j <= $argList[1]; $j++) {
                echo "<td>" . $i * $j . "</td>";
            }
            echo '</tr>';
        }
    } else {
        echo 'Требуется ввести целые числа';
    }

}

function task4()
{
    $date = date('d.m.Y H:i');
    echo $date;
    echo "<br>";
    echo strtotime("24.02.2016 00:00:00");
}

function task5()
{
    echo "<br>";
    $str = "Карл у Клары украл Кораллы";
    echo str_replace("К", "", $str);
    echo "<br>";
    $str = "Две бутылки лимонада";
    echo str_replace("Две", "Три", $str);
    echo "<br>";
}

function task6_1()
{
    $fp = fopen("test.txt", "w");
    $string = "Hello again";
    fwrite($fp, $string);
}
function task6_2($fname){
    $descriptor = fopen($fname, 'r');
    if ($descriptor) {
        while (($string = fgets($descriptor)) !== false) {
            echo $string;
        }
        fclose($descriptor);

    } else {
        echo 'Невозможно открыть указанный файл';
    }

}
