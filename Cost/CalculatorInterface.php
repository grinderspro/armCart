<?php

namespace Grinderspro\Cart\Cost;

interface CalculatorInterface
{
    public function getCost($items);
}