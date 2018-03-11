<?php

namespace Grinderspro\Cart\Cost;

/**
 * SimpleCost класс-калькулятор, простой расчет стоимости
 *
 * @author  Grigorij Miroshnichenko <grinderspro@gmail.com>
 * @version 1.0.0
 */

class SimpleCost implements CalculatorInterface
{
    public function getCost($items)
    {
        $cost = 0;
        foreach ($items as $item) {
            $cost += $item->getCost();
        }
        return $cost;
    }
}