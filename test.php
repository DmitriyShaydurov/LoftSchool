<?php
$one=mt_rand(1, 100);
$two= mt_rand(1, 100);
echo $one."+".$two."=".($one+$two)."<br>";

for ($x = 1; $x <= 10; $x++) {
    if ($x % 2==0) {
        echo $x." ";
    }

}
