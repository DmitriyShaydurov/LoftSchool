<?php
require_once 'vendor/autoload.php';

// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;

// configure with favored image driver (gd by default)
//Image::configure(array('driver' => 'imagick'));

// and you are ready to go ...
$image = Image::make('acc.jpg')->widen(300);
$image ->rotate(45);
$image->save('img/ar.jpg', 60);