<?php

abstract class Shape
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    abstract public function calculateArea();
    public function getName()
    {
        return $this->name;
    }
}

class Rectangle extends Shape
{
    private $sideA;
    private $sideB;

    public function __construct($name, $sideA, $sideB)
    {
        $this->sideA = $sideA;
        $this->sideB = $sideB;
        parent::__construct($name);
    }

    public function calculateArea()
    {
        return $this->sideA * $this->sideB;
    }
    
    public function getSideA()
    {
        return $this->sideA;
    }

    public function getSideB()
    {
        return $this->sideB;
    }
}

class Circle extends Shape
{
    private $radius;

    public function __construct($name, $radius)
    {
        parent::__construct($name);
        $this->radius = $radius;
    }

    public function calculateArea()
    {
        return pi() * pow($this->radius, 2);
    }
}

$rectangle1 = new Rectangle("Rectangle", 10, 20);
$circle1 = new Circle("Circle", 10);

echo $rectangle1->calculateArea();
echo "<br />";

echo $circle1->calculateArea();
echo "<br />";


// Advantage of abstract classes & interfaces.

$shapes = [$rectangle1, $circle1];

foreach($shapes as $shape)
{
    echo $shape->getName() . "'s area is: " . $shape->calculateArea();
    echo "<br />";
}