<?php
interface CalculateSquare
{
    public function calculateSquare(): float;
}
class Rectangle
{

    private $x;
    private $y;

    public function __construct(float $x, float $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function calculateSquare(): float
    {
        return $this->x * $this->y;
    }
}

class Square implements CalculateSquare
{
    private $x;

    public function __construct(float $x) {
        $this->x = $x;
    }

    public function calculateSquare(): float
    {
        return $this->x ** 2;
    }
}

class Circle implements CalculateSquare
{
    const PI = 3.1416;
    private $r;

    public function __construct(float $r)
    {
        $this->r = $r;
    }

    public function calculateSquare():float
    {
        return self::PI * ($this->r ** 2);
    }
}

$objects = [
    new Square(5),
    new Rectangle(2, 4),
    new Circle(5)
];

foreach ($objects as $object) {
    if ($object instanceof CalculateSquare) {
        $name = get_class($object);
        echo 'Объект реализует интерфейс CalculateSquare. Площадь: ' . $object->calculateSquare()  . '. Это результат высчитывания площади для ' . $name;
        echo '<br>';
    }
    else {
        $name = get_class($object);
        echo 'Объекте класса  $name не реализует интерфейс CalculateSquare ';
        echo '<br>';
    }
}