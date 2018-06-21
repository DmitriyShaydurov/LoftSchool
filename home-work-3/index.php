<?php
echo "<br> Задание 1 <br>";
$xml = simplexml_load_file('data.xml');

//foreach ($xml->Address as $key => $value) {
//   echo $key . ' ' . $value . '<br />';
//}
echo '<pre>';
print_r($xml);
echo '______________<br>';
print_r($xml->Address);



// Задание 2

echo "<br> Задание 2 <br>";
$cars =
    [
        ['name' => 'Volvo', 'instock' => 22, 'sold' => 18,],
        ['name' => 'BMW', 'instock' => 23, 'sold' => 14,],
        ['name' => 'Land Rover', 'instock' => 25, 'sold' => 19,],

    ];


file_put_contents('output.json', json_encode($cars));
$carsNew = json_decode(file_get_contents('output.json'), true);

foreach ($carsNew as &$nCar) {
    $nCar['instock'] = rand(1, 50);
    $nCar['sold'] = rand(1, 70);
}
unset($nCar);

$i = 0;
foreach ($carsNew as $nCar) {
    if ($nCar['instock'] !== $cars[$i]['instock']) {
        echo 'на складах разница в ' . abs($nCar['instock'] - $cars[$i]['instock']) . ' машин ' . $nCar['name'] . '<br>';
    }
    if ($nCar['sold'] !== $cars[$i]['sold']) {
        echo 'разница в продажах машин ' . $nCar['name'] . ' равна ' . abs($nCar['sold'] - $cars[$i]['sold']) . ' машин <br>';
    }
    $i++;
}

// Задание 3

echo "<br> Задание 3 <br>";
$arr = array();
for ($x = 0; $x <= 49; $x++) {
    array_push($arr, rand(1, 100));
}
//echo '<pre>';
//print_r($arr);

$fp = fopen('file.csv', 'w');
fputcsv($fp, $arr);
fclose($fp);


$fp = fopen('file.csv', 'r');
$arr = fgetcsv($fp, 1000, ',');
fclose($fp);
//echo '<pre>';
//print_r($ar);
$sum = 0;
foreach ($arr as $ar) {
    if ($ar % 2 === 0) {
        $sum = $sum + $ar;
    }
}
echo "cумма положительных $sum <br>";

// Задание 4

echo "<br> Задание 4 <br>";
$json = file_get_contents("https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json");
$data = json_decode($json, true);

echo 'pageid = ' . $data['query']['pages']['15580374']['pageid'] . '<br>';
echo 'title = ' . ($data['query']['pages']['15580374']['title']);
