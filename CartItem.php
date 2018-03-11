<?php

namespace Grinderspro\Cart;

class CartItem
{
    private $id;
    private $price;
    private $count;

    public function __construct($id, $price, $count)
    {
        $this->id = $id;
        $this->price = $price;
        $this->count = $count;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getCost()
    {
        return $this->price * $this->count;
    }
}