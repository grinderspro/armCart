<?php

namespace Grinderspro\Cart\Cost;

/**
 * BlackFridayCost класс-калькулятор, для расчета скидки по пятницам
 *
 * @author  Grigorij Miroshnichenko <grinderspro@gmail.com>
 * @version 1.0.0
 */

class BlackFridayCost implements CalculatorInterface
{
    private $simpleCalc;
    private $percent;
    private $date;

    /**
     * BlackFridayCost constructor.
     * @param CalculatorInterface $simpleCalc Стандартный/простой калькулятор
     * @param $percent
     * @param $date
     */
    public function __construct(CalculatorInterface $simpleCalc, $percent, $date)
    {
        $this->simpleCalc = $simpleCalc;
        $this->percent = $percent;
        $this->date = $date;
    }

    /**
     * @param $items CartItem[]
     * @return mixed
     */
    public function getCost($items)
    {
        $date = \DateTime::createFromFormat('Y-m-d', $this->date);

        if($date->format('l') == 'Friday')
        {
            $simpleCost = $this->simpleCalc->getCost($items);
            return $simpleCost - (($this->simpleCalc->getCost($items) * $this->percent) / 100);
        }
        // иначе обычную стоимость
        return $this->simpleCalc->getCost($items);
    }
}