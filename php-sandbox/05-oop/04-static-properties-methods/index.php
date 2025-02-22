<?php

// regular way.

class MathUtils
{
    public $pi = 3.14;

    public function add(...$nums)
    {
        return array_sum($nums);
    }
}

$mathUtil = new MathUtils();

echo $mathUtil->pi . "<br>";

echo $mathUtil->add(1,2,33,4,5,1,1,2,3,1) . "<br>";

// static way

class StaticMathUtils
{
    public static $pi = 3.14;

    public static function add(...$nums)
    {
        return array_sum($nums);
    }
}

echo StaticMathUtils::$pi . "<br>";
echo StaticMathUtils::add(1,2,33,4,5,1,1,2,3,1) . "<br>";