<?php

require __DIR__ . "/vendor/autoload.php";

use Grinderspro\Cart\Cart;
use Grinderspro\Cart\Cost\SimpleCost;
use Grinderspro\Cart\Cost\BlackFridayCost;

$cart = new Cart(new SimpleCost());
$cart->add(12, 300, 2);
$cart->add(2, 115, 1);
$cart->add(5, 115, 1);
$cart->del(2);
var_dump($cart->getCost()); // 715

/*$cart = new Cart(new BlackFridayCost(new SimpleCost(), 5, date('Y-m-d')));
$cart->add(12, 300, 2);
var_dump($cart->getCost());*/
