<?php

namespace Grinderspro\Cart;

/**
 * Cart
 *
 * @author  Grigorij Miroshnichenko <grinderspro@gmail.com>
 * @version 1.0.0
 * @copyright Copyright (c) 2015
 */

use Grinderspro\Cart\Cost\CalculatorInterface;

class Cart
{
    private $items;
    private $calculator;

    public function __construct(CalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
        $this->items = [];
    }

    public function add($id, $price, $count)
    {
        $currentItems = isset($this->items[$id]) ? $this->items[$id] : 0;
        $this->items[$id] = new CartItem($id, $price, $count + $currentItems);
    }

    public function del($id)
    {
        if(array_key_exists($id, $this->items))
        {
            unset($this->items[$id]);
        }
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getCost()
    {
        return $this->calculator->getCost($this->items);
    }
}