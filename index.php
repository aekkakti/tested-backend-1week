<?php
class Cat
{
    public $name;
    private $color;
    public $weight;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function sayHello()
    {
        echo 'Привет! Меня зовут ' . $this->name . '.';
        echo 'Мой цвет ' . $this->color;
    }
    
    public function setNameColor(string $name, string $color) {
        $this->name = $name;
        $this->color = $color;
    }

    public function getName(): string {
        return $this->name;
    }
}

$cat1 = new Cat('Снежок', 'красный');
echo $cat1->sayHello() . '<br>';

